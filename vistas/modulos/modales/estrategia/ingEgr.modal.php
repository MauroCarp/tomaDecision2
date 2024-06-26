<div id="modalEstrategiaIngEgr" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" id="formCarga">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="">Carga de Ingresos y Ventas</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <table class="table table-bordered ingEgrTable">

              <thead>
                <tr>
                  <th></th>
                  <th>Ingreso</th>
                  <th>Kg Ingreso</th>
                  <th>Venta</th>
                  <th>Kg Venta</th>
                  <th>Stock</th>

                </tr>
              </thead>

              <tbody>
                
                <tr class="monthRow">
                  <td>Mayo</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso5" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso5" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta5" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta5" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Junio</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso6" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso6" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta6" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta6" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Julio</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso7" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso7" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta7" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta7" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Agosto</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso8" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso8" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta8" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta8" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Septiembre</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso9" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso9" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta9" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta9" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Octubre</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso10" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso10" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta10" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta10" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Noviembre</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso11" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso11" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta11" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta11" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Diciembre</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso12" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso12" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta12" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta12" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Enero</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso1" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso1" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta1" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta1" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Febrero</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso2" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso2" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta2" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta2" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Marzo</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso3" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso3" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta3" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta3" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>
                <tr class="monthRow">
                  <td>Abril</td>
                  <td><input class="form-control ingreso" type="number"  id="ingreso4" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgIngreso" type="number"  id="kgIngreso4" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control venta" type="number"  id="venta4" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control kgVenta" type="number"  id="kgVenta4" min="0" value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control stock" type="text" name="" id=""  value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?> readOnly></td>
                </tr>

                <tr style="font-weight:bolder;">
                  <td><b>Total</b></td>
                  <td><input class="form-control total" type="text" name="" id="totalIngreso" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control total" type="text" name="" id="totalKgIngreso" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></tdkgIngreso1>
                  <td><input class="form-control total" type="text" name="" id="totalVenta" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control total" type="text" name="" id="totalKgVenta" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control total" type="text" name="" id="totalStock" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                </tr>
                <tr>
                  <td style="font-weight:bolder;"><b>Promedio</b></td>
                  <td><input class="form-control" type="text" name="" id="avgIngreso" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control" type="text" name="" id="avgKgIngreso" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></tdkgIngreso1>
                  <td><input class="form-control" type="text" name="" id="avgVenta" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                  <td><input class="form-control" type="text" name="" id="avgKgVenta" readOnly value="0" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                </tr>
                
              </tbody>

            </table>
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

