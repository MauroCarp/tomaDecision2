<?php

require_once "conexion.php";

class ModeloEstrategia{

	/*=============================================
	MOSTRAR Datos
	=============================================*/

	static public function mdlMostrarInsumos($tabla,$id = null){

		if($id == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY insumo ASC");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT id,insumo FROM $tabla WHERE id IN ($id) ORDER BY id ASC");
			// $stmt -> bindParam(":id", $id, PDO::PARAM_STR);

			$stmt -> execute();
	
			return $stmt -> fetchAll();

		}

		
	}

	static public function mdlMostrarDietas($tabla,$idDieta = null){

		if($idDieta == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
			$stmt -> bindParam(":id", $idDieta, PDO::PARAM_STR);
	
			$stmt -> execute();
	
			return $stmt -> fetch();

		}
		
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


	static public function mdlSetearCampania($tabla,$data){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idDieta = :idDieta, stockSoja = :stockSoja , stockMaiz = :stockMaiz, stockSilo = :stockSilo, adpPlan = :adpPlan, msPlan = :msPlan, stockAnimales = :stockAnimales, seteado = 1 WHERE campania = :campania");

		$stmt -> bindParam(":idDieta", $data['idDieta'], PDO::PARAM_STR);
		$stmt -> bindParam(":stockSoja", $data['stockSoja'], PDO::PARAM_STR);
		$stmt -> bindParam(":stockMaiz", $data['stockMaiz'], PDO::PARAM_STR);
		$stmt -> bindParam(":stockSilo", $data['stockSilo'], PDO::PARAM_STR);
		$stmt -> bindParam(":adpPlan", $data['adp'], PDO::PARAM_STR);
		$stmt -> bindParam(":msPlan", $data['msPorce'], PDO::PARAM_STR);
		$stmt -> bindParam(":stockAnimales", $data['stockAnimales'], PDO::PARAM_STR);
		$stmt -> bindParam(":campania", $data['campania'], PDO::PARAM_STR);
				
		if($stmt -> execute()){
		
			return 'ok';
		
		}else{

			return $stmt->errorInfo();
		
		};


	}

	static public function mdlEliminarDieta($tabla,$id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);
				
		if($stmt -> execute()){
		
			return 'ok';
		
		}else{

			return $stmt->errorInfo();
		
		};


	}

	static public function mdlNuevaDieta($tabla,$data){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,insumos,porcentajes) VALUES(:nombre,:insumos,:porcentajes)");

		$stmt -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":insumos", str_replace('"','',$data['insumos']), PDO::PARAM_STR);
		$stmt -> bindParam(":porcentajes", str_replace('"','',$data['porcentajes']), PDO::PARAM_STR);
				
		if($stmt -> execute()){
		
			return 'ok';
		
		}else{

			return $stmt->errorInfo();
		
		};


	}

}
