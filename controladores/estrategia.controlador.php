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
    
	/*=============================================
	MOSTRAR DATOS ANUAL
	=============================================*/

	static public function ctrMostrarDatosAnual($item, $anios){

		$tabla = "conversion";

		$respuesta = ModeloConversion::mdlMostrarDatosAnual($tabla, $item, $anios);

		return $respuesta;

	}



}
	


