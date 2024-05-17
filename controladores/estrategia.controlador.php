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
			
			$data[] = array('insumo'=>ControladorEstrategia::buscarInsumoPorId($value,$insumos),'porcentaje'=>$porcentajes[$key]);

		}

		return $data;

	}

    static public function ctrMostrarEstrategia($campania = null){

		$tabla = "estrategias";

		$respuesta = ModeloEstrategia::mdlMostrarEstrategia($tabla,$campania);
	
		$campanias = ModeloEstrategia::mdlMostrarEstrategia($tabla,'campanias');

		return array('estrategia'=>$respuesta,'campanias'=>$campanias);

	}
    
	/*=============================================
	MOSTRAR DATOS ANUAL
	=============================================*/

	static public function ctrMostrarDatosAnual($item, $anios){

		$tabla = "conversion";

		$respuesta = ModeloConversion::mdlMostrarDatosAnual($tabla, $item, $anios);

		return $respuesta;

	}

	static public function ctrSetearEstrategia(){

		if(isset($_POST['btnSetear'])){

			$data = array('stockSoja'=>$_POST['stockSoja'],
						  'stockSilo'=>$_POST['stockSilo'],
						  'stockMaiz'=>$_POST['stockMaiz'],
						  'stockAnimales'=>$_POST['stockAnimales'],
						  'idDieta'=>$_POST['dieta'],
						  'adp'=>$_POST['adpv5'],
						  'msPorce'=>$_POST['porcentMS5'],
						  'campania'=>$_POST['selectCampania']);

			$actualizarCampania = ControladorEstrategia::ctrSetearCampania($data);

			if($actualizarCampania == 'ok'){
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

				var_dump($actualizarCampania);
				die;
			}

		}

	}

	static public function ctrSetearCampania($data){

		$tabla = 'estrategias';

		return ModeloEstrategia::mdlSetearCampania($tabla,$data);

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

}
	


