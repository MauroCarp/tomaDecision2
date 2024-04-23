$('.btnCargaReal').on('click',function(){
    console.log($(this).attr('data-month'))
})

$('.selectInsumos').select2({
    width:'auto'
})