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

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla 
													INNER JOIN movimientoscereales mc ON $tabla.id = mc.idEstrategia 
													INNER JOIN movimientosanimales ma ON $tabla.id = ma.idEstrategia 
													INNER JOIN dietas ON $tabla.idDieta = dietas.id 
													WHERE $tabla.campania = :campania");

				$stmt -> bindParam(":campania", $campania, PDO::PARAM_STR);
					
			} else {

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla 
				INNER JOIN movimientoscereales mc ON $tabla.id = mc.idEstrategia 
				INNER JOIN movimientosanimales ma ON $tabla.id = ma.idEstrategia 
				INNER JOIN dietas ON $tabla.idDieta = dietas.id 
				WHERE $tabla.id = (select MAX($tabla.id) from $tabla)");

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
		
	}


	static public function mdlSetearCampania($tabla,$data){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idDieta = :idDieta, stockInsumos = :stockInsumos, adpPlan = :adpPlan, msPlan = :msPlan, stockAnimales = :stockAnimales, seteado = 1 WHERE campania = :campania");

		$stmt -> bindParam(":idDieta", $data['idDieta'], PDO::PARAM_STR);
		$stmt -> bindParam(":stockInsumos", json_encode($data['stockInsumos']), PDO::PARAM_STR);
		$stmt -> bindParam(":adpPlan", json_encode($data['adp']), PDO::PARAM_STR);
		$stmt -> bindParam(":msPlan", json_encode($data['msPorce']), PDO::PARAM_STR);
		$stmt -> bindParam(":stockAnimales", $data['stockAnimales'], PDO::PARAM_STR);
		$stmt -> bindParam(":campania", $data['campania'], PDO::PARAM_STR);
				
		if($stmt -> execute()){

			$selectStmt = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE campania = :campania");
			$selectStmt->bindParam(":campania", $data['campania'], PDO::PARAM_STR);
			$selectStmt->execute();
		
			// Retornar los datos del registro actualizado
			return $selectStmt->fetch(PDO::FETCH_ASSOC);
		
		}else{

			return $stmt->errorInfo();
		
		};


	}

	static public function mdlSetearAnimales($tabla,$data){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ingresosPlan, kgIngresosPlan, egresosPlan, kgEgresosPlan, idEstrategia) VALUES(:ingresosPlan, :kgIngresosPlan, :egresosPlan, :kgEgresosPlan,:idEstrategia)");


		$stmt -> bindParam(":ingresosPlan", json_encode($data['ingresos']), PDO::PARAM_STR);
		$stmt -> bindParam(":kgIngresosPlan", json_encode($data['kgIngresos']), PDO::PARAM_STR);
		$stmt -> bindParam(":egresosPlan", json_encode($data['ventas']), PDO::PARAM_STR);
		$stmt -> bindParam(":kgEgresosPlan", json_encode($data['kgVentas']), PDO::PARAM_STR);
		$stmt -> bindParam(":idEstrategia", $data['idEstrategia'], PDO::PARAM_STR);
				
		if($stmt -> execute()){
		
			return 'ok';
		
		}else{

			return $stmt->errorInfo();
		
		};


	}

	static public function mdlSetearInsumos($tabla,$data){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cerealesPlan, idEstrategia) VALUES(:cerealesPlan,:idEstrategia)");

		$stmt -> bindParam(":cerealesPlan",json_encode($data['insumos']),PDO::PARAM_STR);
		$stmt -> bindParam(":idEstrategia",$data['idEstrategia'], PDO::PARAM_STR);

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
		$stmt -> bindParam(":insumos", $data['insumos'], PDO::PARAM_STR);
		$stmt -> bindParam(":porcentajes", $data['porcentajes'], PDO::PARAM_STR);
				
		if($stmt -> execute()){
		
			return 'ok';
		
		}else{

			return $stmt->errorInfo();
		
		};


	}

}
