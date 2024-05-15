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

	static public function mdlMostrarEstrategia($tabla,$campania){

		if($campania == 'campanias'){

			$stmt = Conexion::conectar()->prepare("SELECT campania FROM $tabla ORDER BY created_at DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		} else {

			if($campania != null){

			$stmt = Conexion::conectar()->prepare("SELECT *, dietas.nombre FROM $tabla INNER JOIN movimientosCereales mc ON $tabla.id = mc.idEstrategia INNER JOIN movimientosAnimales ma ON $tabla.id = ma.idEstrategia INNER JOIN dietas ON $tabla.idDieta = dietas.id WHERE $tabla.campania = :campania");
			$stmt -> bindParam(":campania", $campania, PDO::PARAM_STR);
				
			} else {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id = (select MAX(id) from $tabla)");

			}

			$stmt -> execute();

			return $stmt -> fetch();

		}
	
		
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
