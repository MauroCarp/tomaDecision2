<div class="row"> 

  <div class="col-md-12">

    <div class="card">

      <div class="card-body">

        <div class="row">

          <?php if(!$data['estrategia']['seteado']){ ?>

            <div class="col-md-2"> 
    
              <div class="form-group">

                <label>Dieta:</label>

                <select class="form-control dietas" style="margin-top:5px;margin-bottom:5px;"name="dieta" id="dieta"><?=$dietasOptions?></select>

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

                <button class="btn btn-success btn-block" type="button"><b>SETEAR</b></button>

              </div>

            </div>

          <?php } ?>

          <div class="col-md-2"> 

            <div class="form-group" style="margin-bottom:0">

                <label>Campa&ntilde;a</label>

                <select class="form-control" id="selectCampania">

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
          <!-- ING SILO -->

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
          <!-- ING MAIZ -->

            <tr>

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
             
            </tr>
          <!-- ING SOJA -->
            <tr>

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

            </tr>

            <tr>

              <td>Ingresos</td>
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
              <!-- <td><span class="planificado">300</span></td>
              <td><span class="planificado">150</span> | <span class="real">100</span></td> -->
            </tr>

            <tr>

              <td>Egresos</td>
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

              <td>Cabezas</td>
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

              <td></td>

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

                <td></td>

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

                foreach ($meses as $key => $mes) { ?>

                <td></td>

                <?php } 
                
                ?>  

            </tr>

          </tbody>

        </table>

      </div>

    </div>

  </div>

</div>