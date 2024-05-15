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

let calculateStockAndTotals = () => {

    let stock = parseFloat($('#stockAnimales').val())
    let ingresoTotal = 0
    let kgIngresoTotal = 0
    let ventaTotal = 0
    let kgVentaTotal = 0


    $('.monthRow').each(function(){
        
        let tr = $(this)[0].childNodes

        let tdIng = tr[3].childNodes
        let ingreso = parseFloat(tdIng[0].value)

        let tdVenta = tr[7].childNodes
        let venta = parseFloat(tdVenta[0].value)

        let tdKgVenta = tr[7].childNodes
        let kgVenta = parseFloat(tdKgVenta[0].value)

        let tdKgIngreso = tr[7].childNodes
        let kgIngreso = parseFloat(tdKgIngreso[0].value)

        stock += (parseFloat(ingreso) - parseFloat(venta))

        let tdStock = tr[11].childNodes
        tdStock[0].value = stock

        ingresoTotal += ingreso
        ventaTotal += venta
        kgIngresoTotal += kgIngreso
        kgVentaTotal += kgVenta

    });

    $('#totalStock').val(stock)
    $('#totalIngreso').val(ingresoTotal)
    $('#totalKgIngreso').val(kgIngresoTotal)
    $('#totalVenta').val(ventaTotal)
    $('#totalKgVenta').val(kgVentaTotal)
    
}

