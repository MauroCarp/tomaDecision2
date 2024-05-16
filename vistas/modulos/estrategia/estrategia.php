<div class="row"> 

  <div class="col-md-12">

    <div class="card">

      <div class="card-body">

        <form id="formularioEstrategia" method="post">

          <div class="row">

            <?php if(!$data['estrategia']['seteado']){ ?>

              <div class="col-md-2"> 
      
                <div class="form-group">

                  <label>Dieta:</label>

                  <select class="form-control dietas" style="margin-top:5px;margin-bottom:5px;" name="dieta" id="dieta">
                  
                    <option value="">Seleccionar Dieta</option>

                    <?=$dietasOptions?>

                  </select>

                </div>
      
              </div>
              
            <?php } ?>
                  
            <div class="col-md-2"> 

              <div class="form-group">

                <label>&nbsp;</label>

                <button class="btn btn-primary btn-block" type="button" id="stock" data-toggle="modal" data-target="#modalEstrategiaStock">Stock</button>
              </div>
              
            </div>

            
              <div class="col-md-2"> 

                <div class="form-group">

                  <label>&nbsp;</label>

                  <button class="btn btn-primary btn-block" type="button" id="btnIngEgr" data-toggle="modal" data-target="#modalEstrategiaIngEgr">Ingresos / Egresos</button>

                </div>
                
              </div>
            <?php if(!$data['estrategia']['seteado']){ ?>

              <div class="col-md-2"> 

                <div class="form-group">

                  <label>&nbsp;</label>

                  <button class="btn btn-success btn-block" type="submit" id="btnSetear" name="btnSetear"><b>SETEAR</b></button>

                </div>

              </div>

            <?php } ?>

            <div class="col-md-2"> 

              <div class="form-group" style="margin-bottom:0">

                  <label>Campa&ntilde;a</label>

                  <select class="form-control" name="selectCampania" id="selectCampania">

                  <?php
                      foreach ($data['campanias'] as $key => $campania) {?>
                      
                      <option value="<?=$campania['campania']?>" 
                      <?=($campania['campania'] == $_GET['campania']) ? 'selected' : '' ?>><?=$campania['campania']?></option>

                      <?php }
                  ?>

                  </select>

              </div>

            </div>

            <div class="col-md-2">

              <div class="form-group">

                <label>&nbsp;</label>

                <button class="btn btn-primary btn-block" id="nuevaCampania" data-toggle="modal" data-target="#modalNuevaCampaniaEstrategia">Nueva Campa&ntilde;a</button>

              </div>

            </div>

          </div>

          <table class="table table-bordered tablaEstrategia">

            <thead>

              <tr>
                <th style="width:100px;"></th>
                          
                <?php foreach ($meses as $key => $mes) { ?>
                  
                  <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="<?=$mes?>" <?=(!$data['estrategia']['seteado']) ? 'disabled' : ''?>><?=$mes?></button></th>

                <?php } ?> 

              </tr>

            </thead>
            
            <tbody>
            <!-- ING SILO

              <tr>

                <td>Ing. Silo</td>

                <?php if(!$data['estrategia']['seteado']){

                  foreach ($meses as $key => $mes) { ?>
                  
                  <td><input class="form-control input-sm" type="text" name="ingresoSilo<?=$key?>" id="ingresoSilo<?=$key?>" value="0"></td>

                  <?php } 

                } else {

                  foreach ($meses as $key => $mes) { ?>
                  
                  <td></td>

                  <?php } 


                } ?> 

              </tr>
            <!-ING MAIZ -->

              <!--<tr>

                <td>Ing. Maiz</td>
                
                <?php if(!$data['estrategia']['seteado']){

                foreach ($meses as $key => $mes) { ?>

                <td><input class="form-control input-sm" type="text" name="ingresoMaiz<?=$key?>" id="ingresoMaiz<?=$key?>" value="0"></td>

                <?php } 

                } else {

                  foreach ($meses as $key => $mes) { ?>

                <td></td>

                <?php } 


                } ?> 
              
              </tr>-->
            <!-- ING SOJA -->
              <!--<tr>

                <td>Ing. Soja</td>
                
                <?php if(!$data['estrategia']['seteado']){

                foreach ($meses as $key => $mes) { ?>

                <td><input class="form-control input-sm" type="text" name="ingresoSoja<?=$key?>" id="ingresoSoja<?=$key?>" value="0"></td>

                <?php } 

                } else {

                  foreach ($meses as $key => $mes) { ?>

                <td></td>

                <?php } 


                } ?> 

              </tr> -->

              <tr>

                <td>Ingresos</td>
                <td><span class="planificado" id="ingPlan1"></span><span class="real" id="ingReal1"></span></td>
                <td><span class="planificado" id="ingPlan2"></span><span class="real" id="ingReal2"></span></td>
                <td><span class="planificado" id="ingPlan3"></span><span class="real" id="ingReal3"></span></td>
                <td><span class="planificado" id="ingPlan4"></span><span class="real" id="ingReal4"></span></td>
                <td><span class="planificado" id="ingPlan5"></span><span class="real" id="ingReal5"></span></td>
                <td><span class="planificado" id="ingPlan6"></span><span class="real" id="ingReal6"></span></td>
                <td><span class="planificado" id="ingPlan7"></span><span class="real" id="ingReal7"></span></td>
                <td><span class="planificado" id="ingPlan8"></span><span class="real" id="ingReal8"></span></td>
                <td><span class="planificado" id="ingPlan9"></span><span class="real" id="ingReal9"></span></td>
                <td><span class="planificado" id="ingPlan10"></span><span class="real" id="ingReal10"></span></td>
                <td><span class="planificado" id="ingPlan11"></span><span class="real" id="ingReal11"></span></td>
                <td><span class="planificado" id="ingPlan12"></span><span class="real" id="ingReal12"></span></td>
                
                <!-- <td><span class="planificado">300</span></td>
                <td><span class="planificado">150</span> | <span class="real">100</span></td> -->
              </tr>

              <tr>

                <td>Egresos</td>
                <td><span class="planificado" id="ventaPlan1"></span><span class="real" id="ventaReal1"></span></td>
                <td><span class="planificado" id="ventaPlan2"></span><span class="real" id="ventaReal2"></span></td>
                <td><span class="planificado" id="ventaPlan3"></span><span class="real" id="ventaReal3"></span></td>
                <td><span class="planificado" id="ventaPlan4"></span><span class="real" id="ventaReal4"></span></td>
                <td><span class="planificado" id="ventaPlan5"></span><span class="real" id="ventaReal5"></span></td>
                <td><span class="planificado" id="ventaPlan6"></span><span class="real" id="ventaReal6"></span></td>
                <td><span class="planificado" id="ventaPlan7"></span><span class="real" id="ventaReal7"></span></td>
                <td><span class="planificado" id="ventaPlan8"></span><span class="real" id="ventaReal8"></span></td>
                <td><span class="planificado" id="ventaPlan9"></span><span class="real" id="ventaReal9"></span></td>
                <td><span class="planificado" id="ventaPlan10"></span><span class="real" id="ventaReal10"></span></td>
                <td><span class="planificado" id="ventaPlan11"></span><span class="real" id="ventaReal11"></span></td>
                <td><span class="planificado" id="ventaPlan12"></span><span class="real" id="ventaReal12"></span></td>
                

              </tr>

              <tr>

                <td>Cabezas</td>
                <td><span class="planificado" id="stockPlan1"></span><span class="real" id="stockReal1"></span></td>
                <td><span class="planificado" id="stockPlan2"></span><span class="real" id="stockReal2"></span></td>
                <td><span class="planificado" id="stockPlan3"></span><span class="real" id="stockReal3"></span></td>
                <td><span class="planificado" id="stockPlan4"></span><span class="real" id="stockReal4"></span></td>
                <td><span class="planificado" id="stockPlan5"></span><span class="real" id="stockReal5"></span></td>
                <td><span class="planificado" id="stockPlan6"></span><span class="real" id="stockReal6"></span></td>
                <td><span class="planificado" id="stockPlan7"></span><span class="real" id="stockReal7"></span></td>
                <td><span class="planificado" id="stockPlan8"></span><span class="real" id="stockReal8"></span></td>
                <td><span class="planificado" id="stockPlan9"></span><span class="real" id="stockReal9"></span></td>
                <td><span class="planificado" id="stockPlan10"></span><span class="real" id="stockReal10"></span></td>
                <td><span class="planificado" id="stockPlan11"></span><span class="real" id="stockReal11"></span></td>
                <td><span class="planificado" id="stockPlan12"></span><span class="real" id="stockReal12"></span></td>



              </tr>
              
              <tr>

                <td>Kg Prom.</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>

              </tr>

              <tr>

                <td>ADP</td>

                <?php if(!$data['estrategia']['seteado']){

                foreach ($meses as $key => $mes) { ?>

                  <td><input class="form-control input-sm" type="text" name="adpv<?=$key?>" id="adpv<?=$key?>" value="0"></td>

                <?php } 

                } else {

                  foreach ($meses as $key => $mes) { ?>

                  <td>
                    <span class="planificado"><?=$data['estrategia']['adpPlan']?></span><span class="real"><?php echo ' | ' . $data['estrategia']['adpReal']?></span>
                    </td>
                    <?php } 


                } ?> 

              </tr>
          
              <tr>

                <td>% Cons. MS</td>

                <?php if(!$data['estrategia']['seteado']){

                  foreach ($meses as $key => $mes) { ?>

                  <td><input class="form-control input-sm" type="text" name="porcentMS<?=$key?>" id="porcentMS<?=$key?>" value="0"></td>

                  <?php } 

                } else {

                  foreach ($meses as $key => $mes) { ?>

                  <td><span class="planificado"><?=$data['estrategia']['msPlan']?></span><span class="real"><?php echo ' | ' . $data['estrategia']['msReal']?></span<</td>

                  <?php } 


                } ?> 

              </tr>

              <tr>

                <td>Cons. MS</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>

              </tr>

              <!--  DIETA ---->
    
              <tr>

                <td>Dieta</td>

                <?php 

                  foreach ($meses as $key => $mes) { 

                    if($data['estrategia']['seteado']){ ?>

                      <td><?=$data['estrategia']['idDieta']?></td>

                  <?php

                    } else { ?>

                      <td class="dietaSeleccionada"></td>
                  
                  <?php

                    }

                  } 
                  
                  ?>  

              </tr>

            </tbody>

          </table>

          <input type="hidden" name="stockSilo">
          <input type="hidden" name="stockMaiz">
          <input type="hidden" name="stockSoja">
          <input type="hidden" name="stockAnimales">

          <input type="hidden" name="ingreso1">
          <input type="hidden" name="kgIngreso1">
          <input type="hidden" name="venta1">
          <input type="hidden" name="kgVenta1">

          <input type="hidden" name="ingreso2">
          <input type="hidden" name="kgIngreso2">
          <input type="hidden" name="venta2">
          <input type="hidden" name="kgVenta2">

          <input type="hidden" name="ingreso3">
          <input type="hidden" name="kgIngreso3">
          <input type="hidden" name="venta3">
          <input type="hidden" name="kgVenta3">

          <input type="hidden" name="ingreso4">
          <input type="hidden" name="kgIngreso4">
          <input type="hidden" name="venta4">
          <input type="hidden" name="kgVenta4">

          <input type="hidden" name="ingreso5">
          <input type="hidden" name="kgIngreso5">
          <input type="hidden" name="venta5">
          <input type="hidden" name="kgVenta5">

          <input type="hidden" name="ingreso6">
          <input type="hidden" name="kgIngreso6">
          <input type="hidden" name="venta6">
          <input type="hidden" name="kgVenta6">

          <input type="hidden" name="ingreso7">
          <input type="hidden" name="kgIngreso7">
          <input type="hidden" name="venta7">
          <input type="hidden" name="kgVenta7">

          <input type="hidden" name="ingreso8">
          <input type="hidden" name="kgIngreso8">
          <input type="hidden" name="venta8">
          <input type="hidden" name="kgVenta8">

          <input type="hidden" name="ingreso9">
          <input type="hidden" name="kgIngreso9">
          <input type="hidden" name="venta9">
          <input type="hidden" name="kgVenta9">

          <input type="hidden" name="ingreso10">
          <input type="hidden" name="kgIngreso10">
          <input type="hidden" name="venta10">
          <input type="hidden" name="kgVenta10">

          <input type="hidden" name="ingreso11">
          <input type="hidden" name="kgIngreso11">
          <input type="hidden" name="venta11">
          <input type="hidden" name="kgVenta11">
                
          <input type="hidden" name="ingreso12">
          <input type="hidden" name="kgIngreso12">
          <input type="hidden" name="venta12">
          <input type="hidden" name="kgVenta12">

        </form>

      </div>

    </div>

  </div>

</div>

<?php

  $setear = new ControladorEstrategia();
  $setear->ctrSetearEstrategia();

?>