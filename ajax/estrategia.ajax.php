<?php

require_once "../controladores/estrategia.controlador.php";
require_once "../modelos/estrategia.modelo.php";

class AjaxEstrategia{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

    public $idDieta;

	public function ajaxGenerarOptionInsumos(){

		$data = ControladorEstrategia::ctrMostrarInsumos();

		echo json_encode($data);

	}

    public function ajaxMostrarDieta(){

        $idDieta = $this->idDieta;

		$data = ControladorEstrategia::ctrMostrarDieta($idDieta);

		echo json_encode($data);

	}

    public function ajaxEliminarDieta(){

        $idDieta = $this->idDieta;

		$respuesta = ControladorEstrategia::ctrEliminarDieta($idDieta);

		echo $respuesta;

	}
    

}


/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["accion"])){

	$accion = $_POST['accion'];
	
	if($accion == 'getInsumos'){

		$mostrarData = new AjaxEstrategia();
        $mostrarData -> ajaxGenerarOptionInsumos();

    }
	
	if($accion == 'verDieta'){

		$mostrarDieta = new AjaxEstrategia();
        $mostrarDieta ->idDieta = $_POST['idDieta'];
        $mostrarDieta ->ajaxMostrarDieta();

    }
	
	if($accion == 'eliminarDieta'){

		$mostrarDieta = new AjaxEstrategia();
        $mostrarDieta ->idDieta = $_POST['idDieta'];
        $mostrarDieta ->ajaxEliminarDieta();

    }

}

