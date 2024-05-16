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
                                  <th>Animales</th>
                              </thead>

                              <tbody>

                              <tr>

                                  <!-- <td><input class="form-control stockInicial" type="number" id="stockSilo" value="<?//=($data['estrategia']['seteado']) ? $data['stockSilo'] : '0'?>" <?//=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                                  <td><input class="form-control stockInicial" type="number" id="stockMaiz" value="<?//=($data['estrategia']['seteado']) ? $data['stockMaiz'] : '0'?>" <?//=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>
                                  <td><input class="form-control stockInicial" type="number" id="stockSoja" value="<?//=($data['estrategia']['seteado']) ? $data['stockSoja'] : '0'?>" <?//=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td> -->
                                  <td><input class="form-control stockInicial" type="number" id="stockAnimales" value="<?=($data['estrategia']['seteado']) ? $data['stockAnimales'] : '0'?>" <?=($data['estrategia']['seteado']) ? 'readOnly' : ''?>></td>

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

