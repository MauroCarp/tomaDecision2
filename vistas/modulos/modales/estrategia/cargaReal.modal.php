<div id="modalCargarEstrategiaReal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" id="formCarga">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="">Carga de Ingresos y Egresos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <div class="row">
            
            <div class="col-sm-4">

              <div class="form-group">
                <label>Ingreso Silo</label>
                <input type="text" class="form-control">
              </div>
              
            </div>

            <div class="col-sm-4">

              <div class="form-group">
                <label>Ingreso Maiz</label>
                <input type="text" class="form-control">
              </div>
              
            </div>

            <div class="col-sm-4">

              <div class="form-group">
                <label>Ingreso Soja</label>
                <input type="text" class="form-control">
              </div>
              
            </div>

          </div>

          <div class="row">

            <div class="col-sm-4">

              <div class="form-group">

                <label>Cantidad Ing.</label>

                <input type="text" class="form-control">

              </div>

            </div>

            <div class="col-sm-4">

              <div class="form-group">

                <label>Kg Ing.</label>

                <input type="text" class="form-control">

              </div>

            </div>

            <div class="col-sm-4">

              <div class="form-group">

                <label>ADP</label>

                <input type="text" class="form-control">

              </div>

            </div>
              
          </div>

          <div class="row">

            <div class="col-sm-4">

              <div class="form-group">

                <label>Cantidad Egr.</label>

                <input type="text" class="form-control">

              </div>

            </div>

            <div class="col-sm-4">

              <div class="form-group">

                <label>Kg Egr.</label>

                <input type="text" class="form-control">

              </div>

            </div>

            <div class="col-sm-4">

              <div class="form-group">

                <label>% Cons. MS</label>

                <input type="text" class="form-control">

              </div>

            </div>

          </div>
          
          <hr>

          <h3>Dieta</h3>

          <div class="row">

            <div class="col-sm-4">

              <div class="form-group">

                <label>% Silo</label>

                <input type="text" class="form-control">

              </div>

            </div>

            <div class="col-sm-4">

              <div class="form-group">

                <label>% Maiz</label>

                <input type="text" class="form-control">

              </div>

            </div>

            <div class="col-sm-4">

              <div class="form-group">

                <label>% Soja</label>

                <input type="text" class="form-control">

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

          <button type="submit" class="btn btn-primary" id="btnCargar" name="btnCargar">Cargar</button>

        </div>

      </form>

    </div>

  </div>

</div>

<?php

// $cargarArchivo = new ControladorEstrategia();

// $cargarArchivo->ctrCargarArchivo();


?>

