<div class="row"> 

  <div class="col-md-12">

    <div class="card">

      <div class="card-body">

        <div class="row">

          <div class="col-md-6">

            <table class="table table-bordered">

                <thead>
                  <tr>
                    <th></th>
                    <th>Silo</th>
                    <th>Maiz</th>
                    <th>Soja</th>
                    <th>Animales</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><b>Stock Inicial</b></td>
                    <td><input class="form-control" type="text" name="ingresoSilo1" id="ingresoSilo1"></td>
                    <td><input class="form-control" type="text" name="ingresoSilo1" id="ingresoSilo1"></td>
                    <td><input class="form-control" type="text" name="ingresoSilo1" id="ingresoSilo1"></td>
                    <td><input class="form-control" type="text" name="ingresoSilo1" id="ingresoSilo1"></td>
                  </tr>
                </tbody>

            </table>
            
          </div>
        
          <div class="col-md-2" style="padding-top:5px;padding-bottom:5px"> 
            <button class="btn btn-primary btn-block" type="button" id="dietas" data-toggle="modal" data-target="#modalEstrategiaDietas">Dietas</button><br>
            <button class="btn btn-primary btn-block" type="button" id="btnIngEgr" data-toggle="modal" data-target="#modalEstrategiaIngEgr">Ingresos / Egresos</button>
          </div>

          <div class="col-md-2" style="padding-top:5px;padding-bottom:5px"> 

           <button class="btn btn-success btn-block" type="button" style="line-height:5.5em"><b>SETEAR</b></button>

          </div>
          
        </div>

        <table class="table table-bordered tablaEstrategia">

          <thead>

            <tr>
              <th style="width:100px;"></th>
              
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="May">May</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Jun">Jun</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Jul">Jul</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Ago">Ago</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Sep">Sep</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Oct">Oct</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Nov">Nov</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Dic">Dic</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Ene">Ene</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Feb">Feb</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Mar">Mar</button></th>
              <th><button type="button" class="btn btn-block btn-secondary btnCargaReal" data-toggle="modal" data-target="#modalCargarEstrategiaReal" data-month="Abr">Abr</button></th>
            </tr>

          </thead>
          
          <tbody>
          <!-- ING SILO -->

            <tr>

              <td>Ing. Silo</td>
              
              <td><input class="form-control input-sm" type="text" name="ingresoSilo4" id="ingresoSilo4"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo5" id="ingresoSilo5"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo6" id="ingresoSilo6"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo7" id="ingresoSilo7"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo8" id="ingresoSilo8"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo9" id="ingresoSilo9"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo10" id="ingresoSilo10"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo11" id="ingresoSilo11"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo12" id="ingresoSilo12"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo1" id="ingresoSilo1"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo2" id="ingresoSilo2"></td>
              <td><input class="form-control input-sm" type="text" name="ingresoSilo3" id="ingresoSilo3"></td>

            </tr>
          <!-- ING MAIZ -->

            <tr>

              <td>Ing. Maiz</td>
              
              <td><input class="form-control" type="text" name="ingresoMaiz4" id="ingresoMaiz4"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz5" id="ingresoMaiz5"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz6" id="ingresoMaiz6"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz7" id="ingresoMaiz7"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz8" id="ingresoMaiz8"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz9" id="ingresoMaiz9"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz10" id="ingresoMaiz10"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz11" id="ingresoMaiz11"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz12" id="ingresoMaiz12"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz1" id="ingresoMaiz1"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz2" id="ingresoMaiz2"></td>
              <td><input class="form-control" type="text" name="ingresoMaiz3" id="ingresoMaiz3"></td>
            </tr>
          <!-- ING SOJA -->
            <tr>

              <td>Ing. Soja</td>
              
              <td><input class="form-control" type="text" name="ingresoSoja4" id="ingresoSoja4"></td>
              <td><input class="form-control" type="text" name="ingresoSoja5" id="ingresoSoja5"></td>
              <td><input class="form-control" type="text" name="ingresoSoja6" id="ingresoSoja6"></td>
              <td><input class="form-control" type="text" name="ingresoSoja7" id="ingresoSoja7"></td>
              <td><input class="form-control" type="text" name="ingresoSoja8" id="ingresoSoja8"></td>
              <td><input class="form-control" type="text" name="ingresoSoja9" id="ingresoSoja9"></td>
              <td><input class="form-control" type="text" name="ingresoSoja10" id="ingresoSoja10"></td>
              <td><input class="form-control" type="text" name="ingresoSoja11" id="ingresoSoja11"></td>
              <td><input class="form-control" type="text" name="ingresoSoja12" id="ingresoSoja12"></td>
              <td><input class="form-control" type="text" name="ingresoSoja1" id="ingresoSoja1"></td>
              <td><input class="form-control" type="text" name="ingresoSoja2" id="ingresoSoja2"></td>
              <td><input class="form-control" type="text" name="ingresoSoja3" id="ingresoSoja3"></td>

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
              <td><input class="form-control" type="text" name="adpv5" id="adpv5"></td>
              <td><input class="form-control" type="text" name="adpv6" id="adpv6"></td>
              <td><input class="form-control" type="text" name="adpv7" id="adpv7"></td>
              <td><input class="form-control" type="text" name="adpv8" id="adpv8"></td>
              <td><input class="form-control" type="text" name="adpv9" id="adpv9"></td>
              <td><input class="form-control" type="text" name="adpv10" id="adpv10"></td>
              <td><input class="form-control" type="text" name="adpv11" id="adpv11"></td>
              <td><input class="form-control" type="text" name="adpv12" id="adpv12"></td>
              <td><input class="form-control" type="text" name="adpv1" id="adpv1"></td>
              <td><input class="form-control" type="text" name="adpv2" id="adpv2"></td>
              <td><input class="form-control" type="text" name="adpv3" id="adpv3"></td>
              <td><input class="form-control" type="text" name="adpv4" id="adpv4"></td> 

            </tr>
        
            <tr>

              <td>% Cons. MS</td>
              <td><input class="form-control" type="text" name="porcentMS5" id="porcentMS5"></td>
              <td><input class="form-control" type="text" name="porcentMS6" id="porcentMS6"></td>
              <td><input class="form-control" type="text" name="porcentMS7" id="porcentMS7"></td>
              <td><input class="form-control" type="text" name="porcentMS8" id="porcentMS8"></td>
              <td><input class="form-control" type="text" name="porcentMS9" id="porcentMS9"></td>
              <td><input class="form-control" type="text" name="porcentMS10" id="porcentMS10"></td>
              <td><input class="form-control" type="text" name="porcentMS11" id="porcentMS11"></td>
              <td><input class="form-control" type="text" name="porcentMS12" id="porcentMS12"></td>
              <td><input class="form-control" type="text" name="porcentMS1" id="porcentMS1"></td>
              <td><input class="form-control" type="text" name="porcentMS2" id="porcentMS2"></td>
              <td><input class="form-control" type="text" name="porcentMS3" id="porcentMS3"></td>
              <td><input class="form-control" type="text" name="porcentMS4" id="porcentMS4"></td> 

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

              <td>DIETA</td>
              <td><select class="form-control dietas" name="diesta5" id="diesta5"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta6" id="diesta6"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta7" id="diesta7"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta8" id="diesta8"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta9" id="diesta9"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta10" id="diesta10"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta11" id="diesta11"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta12" id="diesta12"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta1" id="diesta1"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta2" id="diesta2"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta3" id="diesta3"><?=$dietasOptions?></select></td>
              <td><select class="form-control dietas" name="diesta4" id="diesta4"><?=$dietasOptions?></select></td> 

            </tr>

          </tbody>

        </table>

      </div>

    </div>

  </div>

</div>