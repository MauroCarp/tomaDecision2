<div id="modalEstrategiaStock" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content" style="width:800px">

      <form role="form" method="post" id="formStock">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="">Stock Inicial</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="row"> 

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-body">

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
                                  <td><input class="form-control" type="number" name="stockSilo" id="stockSilo" value="0"></td>
                                  <td><input class="form-control" type="number" name="stockMaiz" id="stockMaiz" value="0"></td>
                                  <td><input class="form-control" type="number" name="stockSoja" id="stockSoja" value="0"></td>
                                  <td><input class="form-control" type="number" name="stockAnimales" id="stockAnimales" value="0"></td>

                              </tr>

                              </tbody>

                          </table>
                                                    
                        </div>
                        
                    </div>

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

      </form>

    </div>

  </div>

</div>

<?php

// $cargarArchivo = new ControladorEstrategia();

// $cargarArchivo->ctrCargarArchivo();


?>

