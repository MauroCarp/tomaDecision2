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
    
        $(this).html(dieta)
    
    })

})

$('.btnCargaReal').on('click',function(){
    console.log($(this).attr('data-month'))
})

$('.selectInsumos').select2({
    width:'auto'
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


