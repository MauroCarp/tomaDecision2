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
            
            <tbody id="tbodyEstrategia">

              <tr>
              
                <td>Ingresos</td>

                <?php

                foreach (json_decode($data['estrategia']['ingresosPlan']) as $key => $value) { ?>

                <td><span class="planificado"><?=$value?></span><span class="real" id='ingReal<?=$key?>'></span></td>

                <?php } ?>
                
              </tr>

              <tr>

                <td>Egresos</td>

                <?php

                foreach (json_decode($data['estrategia']['egresosPlan']) as $key => $value) { ?>

                <td><span class="planificado"><?=$value?></span><span class="real" id='egrReal<?=$key?>'></span></td>

                <?php } ?>
                

              </tr>

              <tr>

                <td>Cabezas</td>
                <td><span class="planificado" id="stockPlan5"></span><span class="real" id="stockReal5"></span></td>
                <td><span class="planificado" id="stockPlan6"></span><span class="real" id="stockReal6"></span></td>
                <td><span class="planificado" id="stockPlan7"></span><span class="real" id="stockReal7"></span></td>
                <td><span class="planificado" id="stockPlan8"></span><span class="real" id="stockReal8"></span></td>
                <td><span class="planificado" id="stockPlan9"></span><span class="real" id="stockReal9"></span></td>
                <td><span class="planificado" id="stockPlan10"></span><span class="real" id="stockReal10"></span></td>
                <td><span class="planificado" id="stockPlan11"></span><span class="real" id="stockReal11"></span></td>
                <td><span class="planificado" id="stockPlan12"></span><span class="real" id="stockReal12"></span></td>
                <td><span class="planificado" id="stockPlan1"></span><span class="real" id="stockReal1"></span></td>
                <td><span class="planificado" id="stockPlan2"></span><span class="real" id="stockReal2"></span></td>
                <td><span class="planificado" id="stockPlan3"></span><span class="real" id="stockReal3"></span></td>
                <td><span class="planificado" id="stockPlan4"></span><span class="real" id="stockReal4"></span></td>



              </tr>
              
              <tr>

                <td>Kg Prom.</td>
                <td><span class="planificado" id="kgPromPlan5"></span>0<span class="real" id="kgPromRReal5"></span></td>
                <td><span class="planificado" id="kgPromPlan6"></span>0<span class="real" id="kgPromRReal6"></span></td>
                <td><span class="planificado" id="kgPromPlan7"></span>0<span class="real" id="kgPromRReal7"></span></td>
                <td><span class="planificado" id="kgPromPlan8"></span>0<span class="real" id="kgPromRReal8"></span></td>
                <td><span class="planificado" id="kgPromPlan9"></span>0<span class="real" id="kgPromRReal9"></span></td>
                <td><span class="planificado" id="kgPromPlan10"></span>0<span class="real" id="kgPromReal10"></span></td>
                <td><span class="planificado" id="kgPromPlan11"></span>0<span class="real" id="kgPromReal11"></span></td>
                <td><span class="planificado" id="kgPromPlan12"></span>0<span class="real" id="kgPromReal12"></span></td>
                <td><span class="planificado" id="kgPromPlan1"></span>0<span class="real" id="kgPromRReal1"></span></td>
                <td><span class="planificado" id="kgPromPlan2"></span>0<span class="real" id="kgPromRReal2"></span></td>
                <td><span class="planificado" id="kgPromPlan3"></span>0<span class="real" id="kgPromRReal3"></span></td>
                <td><span class="planificado" id="kgPromPlan4"></span>0<span class="real" id="kgPromRReal4"></span></td>

              </tr>

              <tr>

                <td>ADP</td>

                <?php if(!$data['estrategia']['seteado']){

                foreach ($meses as $key => $mes) { ?>

                  <td><input class="form-control input-sm" type="text" name="adpv[]" id="adpv<?=$key?>" value="0"></td>

                <?php } 

                } else {
             
                    foreach (json_decode($data['estrategia']['adpPlan']) as $key => $value) { ?>

                      <td><span class="planificado"><?=$value?></span><span class="real"></span></td>
                      
                    <?php } 
                } ?>

              </tr>
          
              <tr>

                <td>% Cons. MS</td>

                <?php if(!$data['estrategia']['seteado']){

                  foreach ($meses as $key => $mes) { ?>

                  <td><input class="form-control input-sm" type="text" name="porcentMS[]" id="porcentMS<?=$key?>" value="0"></td>

                  <?php } 

                } else {

                  foreach (json_decode($data['estrategia']['msPlan']) as $key => $value) { ?>

                    <td><span class="planificado"><?=$value?></span><span class="real"></span></td>
                    
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

                      <td><?=$data['estrategia']['nombre']?></td>

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

          <input type="hidden" name="stockInsumos">
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

<script>



let seteado = '<?=$data['estrategia']['seteado']?>'


if(seteado){

  let campania = '<?=$data['estrategia']['campania']?>'

  $.ajax({
    method:'post',
    url:'ajax/estrategia.ajax.php',
    data:{accion:'mostrarEstrategia',campania},
    success:function(resp){

      let data = JSON.parse(resp)

      dataEstrategia = data.estrategia
      console.log(dataEstrategia)
      // trStockInicial
      $('#stockAnimales').val(data.estrategia.stockAnimales)

      let stockInsumos = JSON.parse(dataEstrategia.stockInsumos)

      let newObj = {};

      // Lista de las nuevas propiedades
      let newProperties = ['1', '2', '3'];

      // Convertir las claves del objeto original en un array y recorrerlo
      Object.keys(stockInsumos).forEach((key, index) => {
          // Asignar el valor del objeto original al nuevo objeto con la nueva clave
          newObj[newProperties[index]] = stockInsumos[key];

      });


      let index = 1

      for (const key in dataEstrategia.compraInsumos) {
        console.log('hola')
          $('#trStock').append($(`<th>${key}</th>`))
          $('#trStockInicial').append($(`<td><input class="form-control stockInicial" type="number" value="${newObj[1]}" readOnly></td>`))

          index++
      }
      

      let ingresosPlan = JSON.parse(dataEstrategia.ingresosPlan)
      let egresosPlan = JSON.parse(dataEstrategia.ingresosPlan)

      let stock = Number($('#stockAnimales').val())

      Object.keys(ingresosPlan).forEach((key, index) => {

        if(egresosPlan[key] > 0){
          stock += Number(ingresosPlan[key]) - Number(egresosPlan[key])
        }else{
          stock += Number(ingresosPlan)
        }

        $(`#stockPlan${key}`).html(stock)
      })


    }
  })
}
        

</script>

<?php

  $setear = new ControladorEstrategia();
  $setear->ctrSetearEstrategia();

?>
