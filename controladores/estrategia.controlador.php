<?php
class ControladorEstrategia{

	/*=============================================
	MOSTRAR DATOS
	=============================================*/

	static public function buscarInsumoPorId($id, $array) {

		foreach ($array as $item) {

			if ($item['id'] == $id) {

				return $item['insumo'];

			}

		}
		return null; // Si no se encuentra el id, devolver null o un valor por defecto
	}

	static public function ctrMostrarInsumos(){

		$tabla = "insumos";

		$respuesta = ModeloEstrategia::mdlMostrarInsumos($tabla);

		return $respuesta;

	}

    static public function ctrMostrarDietas(){

		$tabla = "dietas";

		$respuesta = ModeloEstrategia::mdlMostrarDietas($tabla);

		return $respuesta;

	}

	static public function ctrMostrarDieta($idDieta){

		$tabla = "dietas";

		$respuesta = ModeloEstrategia::mdlMostrarDietas($tabla,$idDieta);

		$idInsumos = implode(',',json_decode($respuesta['insumos']));

		$porcentajes = json_decode($respuesta['porcentajes']);

		$insumos = ModeloEstrategia::mdlMostrarInsumos('insumos',$idInsumos);

		$data = array();

		foreach (json_decode($respuesta['insumos']) as $key => $value) {
			
			$data[] = array('insumo'=>ControladorEstrategia::buscarInsumoPorId($value,$insumos),'idInsumo'=>$value,'porcentaje'=>$porcentajes[$key]);

		}

		return $data;

	}

    static public function ctrMostrarEstrategia($campania = null){

		$tabla = "estrategias";

		$respuesta = ModeloEstrategia::mdlMostrarEstrategia($tabla,$campania);
		
		$insumos = ControladorEstrategia::ctrMostrarInsumos();

		$arr_cerealesPlan = json_decode($respuesta['cerealesPlan'],true);

		ksort($arr_cerealesPlan);

		foreach ($arr_cerealesPlan as $key => $value) {

			$insumoCompra = ControladorEstrategia::buscarInsumoPorId($key,$insumos);

			$respuesta['compraInsumos'][$insumoCompra] = $value;

		}
	
		$campanias = ModeloEstrategia::mdlMostrarEstrategia($tabla,'campanias');

		return array('estrategia'=>$respuesta,'campanias'=>$campanias);

	}

	static public function ctrSetearEstrategia(){

		if(isset($_POST['btnSetear'])){
		
			$ingresos = array();
			$kgIngresos = array();
			$ventas = array();
			$kgVentas = array();
			$compraInsumos = array();

			foreach ($_POST as $key => $value) {

				if(strpos($key,'insumo') === 0 && !strpos($key,'stockInsumo')){

					$compraInsumos[str_replace('insumo','',$key)] = $value;		

				}

				if(strpos($key,'ingreso') === 0 AND strpos($key,'kg') !== 0){

					$ingresos[str_replace('ingreso','',$key)] = $value;		

				}

				if(strpos($key,'kgIngreso') === 0){

					$kgIngresos[str_replace('kgIngreso','',$key)] = $value;		

				}

				if(strpos($key,'venta') === 0 AND strpos($key,'kg') !== 0){

					$ventas[str_replace('venta','',$key)] = $value;		

				}

				if(strpos($key,'kgVenta') === 0){

					$kgVentas[str_replace('kgVenta','',$key)] = $value;		

				}
			}

			$data = array('stockInsumos'=>json_encode($_POST['stockInsumos']),
						  'stockAnimales'=>$_POST['stockAnimales'],
						  'idDieta'=>$_POST['dieta'],
						  'adp'=>$_POST['adpv'],
						  'msPorce'=>$_POST['porcentMS'],
						  'campania'=>$_POST['selectCampania']);

			$idEstrategia = ControladorEstrategia::ctrSetearCampania($data);

			$dataAnimales = array('idEstrategia'=>$idEstrategia['id'],'ingresos'=>$ingresos,'kgIngresos'=>$kgIngresos,'ventas'=>$ventas,'kgVentas'=>$kgVentas);
			
			$setearAnimales = ControladorEstrategia::ctrSetearAnimales($dataAnimales);
			
			$dataInsumos = array('idEstrategia'=>$idEstrategia['id'],'insumos'=>$compraInsumos);
	
			$setearInsumos = ControladorEstrategia::ctrSetearInsumos($dataInsumos);

			if($setearAnimales == 'ok' && $setearInsumos == 'ok'){
				echo'<script>

				swal({
					type: "success",
					title: "Estrategia seteada correctamente.",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result) {
						if (result.value) {

						window.location = "estrategia";

						}
					})

				</script>';
			}else{

				var_dump($idEstrategia);
				die;
			}

		}

	}

	static public function ctrSetearCampania($data){

		$tabla = 'estrategias';

		return ModeloEstrategia::mdlSetearCampania($tabla,$data);

	}

	static public function ctrSetearAnimales($data){

		$tabla = 'movimientosanimales';

		return ModeloEstrategia::mdlSetearAnimales($tabla,$data);

	}

	static public function ctrSetearInsumos($data){

		$tabla = 'movimientosCereales';

		return ModeloEstrategia::mdlSetearInsumos($tabla,$data);

	}

	static public function ctrEliminarDieta($id){

		$tabla = 'dietas';

		return ModeloEstrategia::mdlEliminarDieta($tabla,$id);

	}

	static public function ctrNuevaDieta(){
		
		if(isset($_POST['btnNuevaDieta'])){

			$tabla = 'dietas';

			$data = array('nombre'=>$_POST['nombreDieta'],'insumos'=>json_encode($_POST['insumo']),'porcentajes'=>json_encode($_POST['porcentajeInsumo']));

			$respuesta = ModeloEstrategia::mdlNuevaDieta($tabla,$data);
	
			if($respuesta != 'ok'){

				echo'<script>

                swal({
                        type: "error",
                        title: `Hubo un problema al cargar la dieta!';

                        if($_SESSION['usuario'] == 'tecnicoEstrategia'){
                            echo json_encode($respuesta);
                        }

                        echo '`,
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        })
                    })

                </script>';

            } else {

                echo'<script>

                swal({
                        type: "success",
                        title: "La Dieta ha sido cargada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result) {
                                if (result.value) {

									window.location = "index.php?ruta/estrategia"
                                }
                            })

                </script>';

            
			}

		}

		

	}

	static public function ctrCargaReal(){

		if(isset($_POST['btnCargaReal'])){
		
			$campania = $_POST['campania'];
			$month = $_POST['month'];
			$dataEstrategia = ControladorEstrategia::ctrMostrarEstrategia($campania);

			$dataKeys = ['msReal', 'adpReal', 'ingresosReal', 'kgIngresosReal', 'ventasReal', 'kgVentasReal'];
			$data = [];

			foreach ($dataKeys as $key) {

				if (!is_null($dataEstrategia['estrategia'][$key])) {
					$data[$key] = json_decode($dataEstrategia['estrategia'][$key], true);
				} else {
					$data[$key] = [];
				}

				$data[$key][$month] = $_POST[$key];

			}

			foreach ($_POST as $key => $value) {

				if(strpos($key,'dietaReal') === 0){

					$index = str_replace('dietaReal','',$key);
					$data['dietaReal'][$month][$index] = $value;

				}
	
				if(strpos($key,'insumoReal') === 0){

					$index = str_replace('insumoReal','',$key);


					$data['cerealesReal'][$month][$index] = $value;

				}



			}
	
			$data['idEstrategia'] = $dataEstrategia['estrategia']['id'];
			$estrategiaReal = ModeloEstrategia::mdlEstrategiaReal('estrategias',$data);
			$cerealesReal = ModeloEstrategia::mdlInsumosReal('movimientoscereales',$data,'cerealesReal');
			$animalesReal = ModeloEstrategia::mdlAnimalesReal('movimientosanimales',$data);
			var_dump($animalesReal);

			die;


			
		}

	}


}
	


