<?php

require_once "conexion.php";

class ModeloEstrategia{

	/*=============================================
	MOSTRAR Datos
	=============================================*/

	static public function mdlMostrarInsumos($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY insumo ASC");

        $stmt -> execute();

        return $stmt -> fetchAll();
		
	}

	static public function mdlMostrarDietas($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

        $stmt -> execute();

        return $stmt -> fetchAll();
		
	}

	/*=============================================
	MOSTRAR Datos ANUAL
	=============================================*/

	static public function mdlMostrarDatosAnual($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE YEAR($item) IN ($valor)");

			$stmt -> execute();
			
			return $stmt -> fetchAll();
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY periodoTime");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

}
