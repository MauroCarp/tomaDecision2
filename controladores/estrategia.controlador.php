<?php
class ControladorEstrategia{

	/*=============================================
	MOSTRAR DATOS
	=============================================*/

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






}
	


