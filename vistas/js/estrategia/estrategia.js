let calculateStockAndTotals = () => {

    let stock = parseFloat($('#stockAnimales').val())

    let ingresoTotal = 0
    let kgIngresoTotal = 0
    let ventaTotal = 0
    let kgVentaTotal = 0

    let index = 1

    $('.monthRow').each(function(){
        
        let tr = $(this)[0].childNodes

        let tdIng = tr[3].childNodes
        let ingreso = parseFloat(tdIng[0].value)

        let tdVenta = tr[7].childNodes
        let venta = parseFloat(tdVenta[0].value)

        let tdKgVenta = tr[9].childNodes
        let kgVenta = parseFloat(tdKgVenta[0].value)

        let tdKgIngreso = tr[5].childNodes
        let kgIngreso = parseFloat(tdKgIngreso[0].value)

        stock += (parseFloat(ingreso) - parseFloat(venta))

        let tdStock = tr[11].childNodes
        tdStock[0].value = stock

        ingresoTotal += ingreso
        ventaTotal += venta
        kgIngresoTotal += kgIngreso
        kgVentaTotal += kgVenta

        $(`#ingPlan${index}`).html(ingreso)
        $(`#ventaPlan${index}`).html(venta)
        $(`#stockPlan${index}`).html(stock)
        $(`#stockPlan${index}`).html(stock)

        $(`input[name='ingreso${index}']`).val(ingreso)
        $(`input[name='kgIngreso${index}']`).val(kgIngreso)
        $(`input[name='venta${index}']`).val(venta)
        $(`input[name='kgVenta${index}']`).val(kgVenta)

        index++

    });

    $('#totalStock').val(stock)
    $('#totalIngreso').val(ingresoTotal)
    $('#totalKgIngreso').val(kgIngresoTotal)
    $('#totalVenta').val(ventaTotal)
    $('#totalKgVenta').val(kgVentaTotal)

    $('#avgIngreso').val((ingresoTotal / 12).toFixed(2))
    $('#avgKgIngreso').val((kgIngresoTotal / 12).toFixed(2))
    $('#avgVenta').val((ventaTotal / 12).toFixed(2))
    $('#avgKgVenta').val((kgVentaTotal / 12).toFixed(2))

    
}

$('.stockInicial').each(function(){

    
    $(this).on('change',function(){
        
        let id = $(this).attr('id')
        let val = $(this).val()
    
        $(`input[name='${id}']`).val(val)

    })

})

$('#dieta').on('change',function(){

    let dieta = $(this).find("option:selected").text();
    
    $('.dietaSeleccionada').each(function(){
        
        if(dieta != 'Seleccionar Dieta')
            $(this).html(dieta)
        else
            $(this).html('-')
    
    })

    let idDieta = $(this).val()

    if(idDieta != ''){

        $.ajax({
            method:'POST',
            url:'ajax/estrategia.ajax.php',
            data:{accion:'verDieta',idDieta},
            success:function(resp){
    
                let data =  JSON.parse(resp)
                $('.insumosDieta').remove()
                $('.stockInsumos').remove()

                data.forEach(element => {
                    
                    let insumo = element.insumo

                    $('#trStock').append($(`
                        <th class="stockInsumos">${insumo}</th>
                    `))
                    $('#trStockInicial').append($(`
                        <td class="stockInsumos"><input class="form-control" type="number" id="stockInsumo[]" value="0"></td>
                    `))


                    let tr = document.createElement('TR')
                    tr.setAttribute('class','insumosDieta')

                    let td = document.createElement('TD')
                    td.setAttribute('style','border: 1px solid #f4f4f4;padding: 8px;box-sizing:border-boxvertical-align: top;')
                    td.innerText = insumo
                    tr.append(td)

                    let input = document.createElement('INPUT')
                    input.setAttribute('class','form-control input-sm')
                    input.setAttribute('type','number')
                    input.setAttribute('min','0')
                    input.setAttribute('value','0')

                    let i = 5;

                    while (true) {

                        let inputInsumo = input.cloneNode(true)
                        inputInsumo.setAttribute('name',`insumo${element.idInsumo}[]`)
                        
                        let td = document.createElement('TD')
                        td.setAttribute('style','border: 1px solid #f4f4f4;padding: 8px;box-sizing:border-boxvertical-align: top;')


                        td.append(inputInsumo)
                        tr.append(td)

                        if (i === 12) {
                            i = 1;  // Reinicia el índice a 1 después de llegar a 12
                        } else if (i === 4) {
                            break;  // Termina el bucle después de llegar a 4
                        } else {
                            i++;
                        }

                        $('#tbodyEstrategia').before(tr)
                    }
                    
                });
    
            }
    
        })

    } else {
        $('.insumosDieta').remove()
    }

})

$('.btnCargaReal').on('click',function(){
    console.log($(this).attr('data-month'))
})

$('select[name="insumo[]"]').select2({
    width:'100%'
})

$('.selectCampania').select2({
    width:'auto'
})

$('#selectCampania').on('change',function(){

    let campania = $(this).val()
    window.location = `index.php?ruta=estrategia/index&campania=${campania}`

})

$(".ingEgrTable tbody input[type='number']").on("change", function() {
    calculateStockAndTotals();
});


$('#stockAnimales').on('change',function(){
    calculateStockAndTotals()
})


let insumoIndex = 1

$('#btnAgregarInsumo').on('click',function(){

    let nuevoInsumo = $(`<div class="row" style="margin-top:10px;">

                            <div class="col-lg-7    ">

                                <select class="selectInsumos" id="insumo${insumoIndex}" name="insumo[]">
                                
                                </select>

                            </div>

                            <div class="col-lg-3"><input class="form-control input-sm porcentajeInsumo" onchange="sumarPorcentajes()" type="number" name="porcentajeInsumo[]"></div>

                            <div class="col-lg-2"><button class="btn btn-danger" onclick="$(this).closest('.row').remove();sumarPorcentajes()"><i class="fa fa-trash"></i></button></div>


                        </div>`)

    $("#insumos").append(nuevoInsumo);

    generarOptionInsumos(`insumo${insumoIndex}`)

    insumoIndex++
})

let generarOptionInsumos = (idSelect)=>{

    $.ajax({

        method:'post',
        url:'ajax/estrategia.ajax.php',
        data:{accion:'getInsumos'},
        success:function(resp){

            resp = JSON.parse(resp)

            let options = [{id:'',text:'Seleccionar Insumo'}]

            resp.forEach(element => {
                options.push({id:element.id,text:element.insumo})
            });

            $(`#${idSelect}`).select2({
                width:'100%',
                data:options
            })

        }

    })
}

$('.table').on('click','.verDieta',function(){

    $('#composicionDieta').show(200)

    let idDieta = $(this).attr('idDieta')


    $.ajax({
        method:'post',
        url:'ajax/estrategia.ajax.php',
        data:{accion:'verDieta',idDieta},
        success:function(resp){

            resp = JSON.parse(resp)

            let tr = []

            resp.forEach(element => {
                
                tr.push(`<tr><td>${element['insumo']}</td><td>${element['porcentaje']}</td>`)

            });

            $('#insumosDieta').empty().append(tr.join(','))
            

        }
    })

})

$('.table').on('click','.eliminarDieta',function(){

    let idDieta = $(this).attr('idDieta')

    let rowDieta = $(this).closest('tr')
    $('#composicionDieta').hide(200)

    $.ajax({

        method:'post',
        url:'ajax/estrategia.ajax.php',
        data:{accion:'eliminarDieta',idDieta},
        success:function(resp){

          if(resp == 'ok'){
                swal({

                    type: "success",
                    title: "Dieta eliminada correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }) 

                rowDieta.remove()
            }else{
                swal({

                    type: "error",
                    title: "Se produjo un error al eliminar la Dieta",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                });
            }

        }

    })

})


let sumarPorcentajes = ()=>{

    let total = 0

    $('.porcentajeInsumo').each(function(){

        if($(this).val() != '')
            total += parseFloat($(this).val())

    })

    if(total > 100){
        
        swal({
            type: "error",
            title: "La compocision de la dieta supera el 100%",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            })

        $('#btnNuevaDieta').attr('disabled','disabled')

    } else {

        $('#btnNuevaDieta').removeAttr('disabled')

    }

    $('#totalPorcentaje').html(total)

    return total

}
 