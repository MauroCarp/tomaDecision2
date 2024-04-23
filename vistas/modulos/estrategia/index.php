<?php         
function selectDietas($dietas){

  $arr = array();
  foreach ($dietas as $key => $dieta) {

    $arr[] = '<option value="' . $dieta['id'] . '">' . $dieta['nombre']. '</option>';
  }

  return implode(' ',$arr);
}


$dietas = ControladorEstrategia::ctrMostrarDietas();

$dietasOptions = selectDietas($dietas);


?>


<div class="content-wrapper">
  
    <div class="box">
    
        <section class="content" style="padding-top:5px;">

        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#estrategia" aria-controls="estrategia" role="tab" data-toggle="tab">Estrategia</a></li>
          <li role="presentation"><a href="#consumos" aria-controls="consumos" role="tab" data-toggle="tab">Consumos</a></li>
          <li role="presentation"><a href="#graficos" aria-controls="graficos" role="tab" data-toggle="tab">Graficos</a></li>
        </ul>

        <div class="tab-content">

          <div role="tabpanel" class="tab-pane active" id="estrategia">
            <?php include('estrategia.php'); ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="consumos">
          <?php include('consumos.php'); ?>

          </div>

          <div role="tabpanel" class="tab-pane" id="graficos">
          <?php include('graficos.php'); ?>

          </div>

        </div>

        

        </section>

    </div>

</div>

<?php

include 'vistas/modulos/modales/estrategia/cargaReal.modal.php';
include 'vistas/modulos/modales/estrategia/ingEgr.modal.php';

include 'vistas/modulos/modales/estrategia/dietas.modal.php';


$campaniaAgro = isset($_COOKIE['campaniaAgro']) ? true : false;

?>
