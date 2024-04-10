
const campaniaAgro = localStorage.getItem('campaniaAgro')

let campania = null

if(campaniaAgro == null){
    $('#btnCerrarPlanificacion').css('display','none')
}else{
    campania = localStorage.getItem('campaniaAgro')    
}
const btnsMenusCarga = document.querySelectorAll('.menusCarga')

for (const menu of btnsMenusCarga) {
    
    menu.addEventListener('click',()=>{
        console.log('hola')
        let menuCarga = menu.getAttribute('data-carga')

        document.getElementById('tituloCarga').innerText = `Cargar ${menuCarga}`
        document.getElementById('btnCargar').setAttribute('data-carga',menuCarga.replace(' ',''))
        document.getElementById('nuevosDatosCarga').setAttribute('name',`nuevosDatos${menuCarga.replace(' ','')}`)
        document.getElementById('btnCargar').innerText = `Cargar ${menuCarga}`

        if(menuCarga == 'Planificacion') 
            document.getElementById('inputCampania').classList.remove('hidden')

        if(menuCarga == 'Paihuen')
            document.getElementById('inputPeriodoContable').classList.add('hidden')
    
    })

}

const btnsMenusInforme = document.querySelectorAll('.menusInforme')

for (const menu of btnsMenusInforme) {
    
    menu.addEventListener('click',()=>{

        let menuCarga = menu.getAttribute('data-informe')
        document.getElementById('tituloInforme').innerText = `Informe ${menuCarga}`

    })

}
