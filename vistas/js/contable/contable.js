
    const generarColores = (cantidad,tipo)=>{

        let coloresBg = ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(100, 255, 64, 0.2)'];

        let coloresBr = ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(100, 255, 64, 1)'];

        let colores = [];

        for (let index = 0; index < cantidad; index++) {

        if(tipo == 'bg'){
            
            colores.push(coloresBg[index])
            
        }else{
            
            colores.push(coloresBr[index]);
            
        }
        
        }

        return colores;

    }

    const formatearFecha = (fecha)=>{

        if(fecha){

            let fechaSplit = fecha.split('-')
            
            return `${fechaSplit[2]}-${fechaSplit[1]}-${fechaSplit[0]}`
        
        }else{

            return '-'
        
        }
    }

    const numberWithCommas = (num)=>{

        var parts = num.toString().split(".");
        
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        
        return parts.join(",");
    
    }

    const format = (number)=>{

      if(number > 1){

      
        let num = number.toString().replace(/\./g,'*');
              
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      
        num = num.split('').reverse().join('').replace(/^[\.]/,'');
      
        num = num.replace('*',',');

        return num

      }else{
        return number
      }
    }

    const generarGraficoBarSimple = (registros,divId,labels,tituloLabel)=>{

        let coloresBg = generarColores(registros.length,'bg');
                
        let coloresBr = generarColores(registros.length,'br');
                
        let ctx = document.getElementById(divId).getContext('2d');


        let myChart = new Chart(ctx, {
                                      type: 'bar',
                                      data: {
                                          labels: labels,
                                          datasets: [{
                                              label: tituloLabel,
                                              data: registros,
                                              backgroundColor: coloresBg,
                                              borderColor: coloresBr,
                                              borderWidth: 1
                                          }]
                                      },
                                      options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    callback: function(value, index, ticks) {
                                                        return  format(value);
                                                    }
                                                }
                                            }]
                                        },
                                        tooltips: {
                                          callbacks: {
                                            label: function(tooltipItem, data) {
                                                  return `$ ${tooltipItem.yLabel.toLocaleString('de-DE')}`
                                              }
                                          }
                                        },
                                        plugins: {
                                          labels: {
                                            // render: 'value'
                                            render: (val)=>{ 
                                              // return format(val.value);
                                              return '';
                                            },

                                          },
                                          legend: {
                                            display: false,
                                          },
                                          tooltip: {
                                            callbacks: {
                                                label: function(context) {

                                                    let label = `$ ${context.dataset.label}`;

                                                    return label;
                                                }
                                            }
                                          }
                                        }
                                      }
                                    });   
      
        return myChart; 
      
    }

    const generarGraficoPieContable = (idDiv,data,label)=>{
        
        let colores = generarColores(data.length,'bg');

        let pieChart = document.getElementById(idDiv).getContext('2d');   

        let configuracion = {
            type: 'pie',
            data: {
              datasets: [{
                data: data,
                backgroundColor:colores,
                label: 'Porcentaje'
              }],
              labels: label
            },
            options: {
              responsive: true,
              title: {
                display: false,
              },
              scales: {
                yAxes: [{
                    ticks: {
                        callback: function(value, index, ticks) {
                            return  format(value);
                        }
                    }
                }]
              },
              legend: {
                labels: {
                    boxWidth: 5
                }
              }
        
            }
        };   

        let grafico = new Chart(pieChart, configuracion);
      
        return grafico;
      
    }

    const generarGraficoMultiBar = (divId,labels,dataset)=>{
  
      let ctx = document.getElementById(divId).getContext('2d');
     
      let myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                      labels  : labels,
                                      datasets: dataset
                                    },
                                    options: {
                                      tooltips: {
                                        callbacks: {
                                          label: function(tooltipItem, data) {
                                                return `$ ${tooltipItem.yLabel.toLocaleString('de-DE')}`
                                            }
                                        }
                                      },
                                      scales: {
                                        xAxes: [{
                                              gridLines: {
                                                  color: "rgba(0, 0, 0, 0)",
                                              }
                                          }],
                                          yAxes: [{
                                            ticks: {
                                                  beginAtZero: true,
                                                  callback: function(value, index, ticks) {
                                                      return  format(value);
                                                  }
                                              }
                                            }]
                                      
                                        },
                                        plugins: {
                                          labels: {

                                            render: (val)=>{ 
                                              if(divId == 'saldoIvaBarlovento' || divId == 'saldoIvaPaihuen'){
                                                return format(val.value);
                                              }else{
                                                return '';
                                              }
                                            },
                                            // render: 'value',
                                          },
                                        }
                                    }
                                  });
      return myChart; 
    
    }

    const generarGraficoStackedGroup = (divId,labels,dataset)=>{
  
      let ctx = document.getElementById(divId).getContext('2d');
      
      let myChart = new Chart(ctx,
                                  {
                                    type: 'bar',
                                    data: dataset,
                                    options: {
                                      tooltips: {
                                        callbacks: {
                                          label: function(tooltipItem, data) {
                                                return `$ ${tooltipItem.yLabel.toLocaleString('de-DE')}`
                                            }
                                        }
                                      },
                                      interaction:{
                                        intersect:false
                                      },
                                      scales: {
                                        xAxes: [{
                                              gridLines: {
                                                  color: "rgba(0, 0, 0, 0)",
                                              }
                                        }],
                                        yAxes: [{
                                          ticks: {
                                                beginAtZero: true,
                                                callback: function(value, index, values) {
                                                  return value.toLocaleString('de-DE')
                                                }
                                            }
                                        }],
                                        x:{
                                          stacked:true
                                        },
                                        y:{
                                          stacked:true
                                        }
                                      },
                                      plugins: {
                                        labels: {
                                          render: (val)=>{ 
                                            if(divId == 'sueldos12VentasBarlovento' || divId == 'sueldos12VentasPaihuen' || divId == 'sueldos12HonorariosVentasBarlovento' || divId == 'sueldos12HonorariosVentasPaihuen'){
                                              return format(val.value);
                                            }else{
                                              return '';
                                            }
                                          }
                                          // render: 'value',
                                        },
                                      }
                                    }
                                  });
      return myChart; 



    
    }

    const getMonthData = (respuesta,dato,start = 'Jun')=>{

      let data = []

      for (const key in respuesta) {

        if(key < 6){

          if(respuesta.length > 1){

            if(respuesta[key].periodo == start){
              data.push(Number(respuesta[key].graficos[dato]).toFixed(2))
            }else{

              data.push((respuesta[key].graficos[dato] - respuesta[Number(key) + 1].graficos[dato]).toFixed(2))
            }

          }else{
            data.push(Number(respuesta[key].graficos[dato]).toFixed(2))
          } 

        }

      }

      return data
      
    }
    
    const getMonthDataCajas = (respuesta,dato,start = 'Jun')=>{
      
      let data = []


        if(respuesta.length > 1){

          if(respuesta[0].periodo == start){
            data.push(Number(respuesta[0].cajas[dato]).toFixed(2))
          }else{
            data.push((respuesta[0].cajas[dato] - respuesta[1].cajas[dato]).toFixed(2))
          }

        }else{
          data.push(Number(respuesta[0].cajas[dato]).toFixed(2))
        }

    

      return data
      
    }

    const btnGenerarReporte = document.getElementById('generarReporteContabilidad')

    const cargarDatosCampo = (campo,respuesta)=>{

      /* CAJAS SUPERIORES */
        // ECONOMICO
          let ventasTotales = 0;

          let start = (campo != 'Paihuen') ? 'Jun' : 'Ene'

          if (campo != 'Paihuen'){
            $(`#agricultura1${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.agricultura1 / 1000).toFixed(0)))
            $(`#agricultura2${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.agricultura2 / 1000).toFixed(0)))
            $(`#ganaderiaResto1${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.ganaderiaResto1 / 1000).toFixed(0)))
            $(`#ganaderiaResto2${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.ganaderiaResto2 / 1000).toFixed(0)))
            ventasTotales = respuesta[0].cajas.agricultura1 + respuesta[0].cajas.agricultura2 + respuesta[0].cajas.ganaderiaResto1 + respuesta[0].cajas.ganaderiaResto2
            
          } else {

            $(`#agricultura1${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.agricultura / 1000).toFixed(0)))
            $(`#agricultura2${campo}`).html('$ ' + 0)
            $(`#ganaderiaResto1${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.ganaderiaResto / 1000).toFixed(0)))
            $(`#ganaderiaResto2${campo}`).html('$ ' + 0)
            ventasTotales = respuesta[0].cajas.agricultura + respuesta[0].cajas.ganaderiaResto
            
          }

          $(`#ventasTotales${campo}`).html('$ ' + numberWithCommas((ventasTotales / 1000).toFixed(0)))
            
        
        // FINANCIERO
          $(`#deudaTotal${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.deudaTotal / 1000).toFixed(0)))          
          $(`#pasivoTotal${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.pasivoTotal / 1000).toFixed(0)))          
          $(`#activoCirculante${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.activoCirculante / 1000).toFixed(0)))          
          $(`#patrimonioNeto${campo}`).html('$ ' + numberWithCommas((respuesta[0].cajas.patrimonioNeto / 1000).toFixed(0)))          

          let deudaBienes = respuesta[0].cajas.deudaBancaria / respuesta[0].cajas.bienesDeCambio
          $(`#duedaBienes${campo}`).html(numberWithCommas((deudaBienes * 100).toFixed(2)) + '%')          

          let activoCircActivoCorr = respuesta[0].cajas.activoCirculante / respuesta[0].cajas.activoCorriente

          $(`#activoCircActivoCorr${campo}`).html(numberWithCommas((activoCircActivoCorr * 100).toFixed(2)) + '%')          

          let pasivoPatrimonio = respuesta[0].cajas.pasivoTotal / respuesta[0].cajas.patrimonioNeto
          $(`#pasivoPatrimonio${campo}`).html(numberWithCommas((pasivoPatrimonio * 100).toFixed(2)) + '%')

          let actPasCorriente = Number(respuesta[0].cajas.activoCorriente) / Number(respuesta[0].cajas.pasivoCorriente)
          $(`#indiceActPasCorriente${campo}`).html(numberWithCommas((actPasCorriente).toFixed(2)))

        // IMPOSITIVO
          $(`#ingresoBruto${campo}`).html('$ ' + numberWithCommas((getMonthDataCajas(respuesta,'ingresosBrutos',start)/ 1000).toFixed(0)))

          $(`#inmobiliarioComuna${campo}`).html('$ ' + numberWithCommas((getMonthDataCajas(respuesta,'inmobiliario',start) / 1000).toFixed(0)))

          $(`#cargasSociales${campo}`).html('$ ' + numberWithCommas((getMonthDataCajas(respuesta,'cargasSociales',start) / 1000).toFixed(0)))

          let sueldosVentas = respuesta[0].cajas.sueldos / ventasTotales

          $(`#sueldosVentas${campo}`).html('$ ' + numberWithCommas((getMonthDataCajas(respuesta,'sueldos12',start) / 1000).toFixed(0)))

          $(`#sueldosTotal${campo}`).html('$ ' + numberWithCommas((getMonthDataCajas(respuesta,'sueldos12Honorarios',start) / 1000).toFixed(0)))

      /* GRAFICOS */

        // ECONOMICO
          let divId = `ventasChart${campo}`

          let datoVariable = 'agricultura1'
          if(campo == 'Paihuen') datoVariable = 'agricultura'

          let dataAgricultura1 = getMonthData(respuesta,datoVariable,start)
          dataAgricultura1.reverse()
          let dataAgricultura2 = getMonthData(respuesta,'agricultura2',start)
          dataAgricultura2.reverse()

          let dataGanaderiaResto1= getMonthData(respuesta,'ganaderiaResto1',start)
          dataGanaderiaResto1.reverse()

          let dataGanaderiaResto2 = getMonthData(respuesta,'ganaderiaResto2',start)
          dataGanaderiaResto2.reverse()
          
          let registros = [{
                            label: 'Agricultura 1',
                            backgroundColor: 'rgba(255,0,100,.2)',
                            borderColor: 'rgb(255,0,0)',
                            borderWidth: 1, 
                            data: dataAgricultura1
                        },{
                          label: 'Agricultura 2',
                          backgroundColor: 'rgba(50,0,255,.2)',
                          borderColor: 'rgb(0,0,255)',
                          borderWidth: 1, 
                          data: dataAgricultura2
                      }
          ]
          
          let labels = []; 
        
          for (let index = 0; index < 6; index++) {

            if(respuesta[index]?.periodo != undefined){
              labels.push(respuesta[index]?.periodo)
            }
            
          }

          labels.reverse()

          generarGraficoMultiBar(divId,labels,registros)
          generarGraficoMultiBar(`idGraficoVentas${campo}`,labels,registros)

          divId = `ventasChart2${campo}`
          
          var registrosGanaderia = {
            labels: labels,
            datasets: [
              {
                label: 'G/R 1',
                data: dataGanaderiaResto1,
                backgroundColor: 'rgba(255,0,100,.2)',
                borderColor: 'rgb(255,0,0)',
                borderWidth: 1, 
                stack: 'Stack 0',
              },
              {
                label: 'G/R 2',
                data: dataGanaderiaResto2,
                backgroundColor: 'rgba(50,0,255,.2)',
                borderColor: 'rgb(0,0,255)',
                borderWidth: 1,
                stack: 'Stack 0',
              },
            ]
          };
                                
          generarGraficoStackedGroup(divId,labels,registrosGanaderia)
          generarGraficoStackedGroup(`idGraficoVentas2${campo}`,labels,registrosGanaderia)

          divId = `ventasGanaderiaChart${campo}`
                        
          let dataVaquillonasNovillos= getMonthData(respuesta,'vaquillonasNovillos',start)
          dataVaquillonasNovillos.reverse()

          let dataCarneSubproductos= getMonthData(respuesta,'carneSubproductos',start)
          dataCarneSubproductos.reverse()

          let dataExportacion= getMonthData(respuesta,'exportacion',start)
          dataExportacion.reverse()

          let dataProduccionHacienda= getMonthData(respuesta,'produccionHacienda',start)
          dataProduccionHacienda.reverse()
               
          registrosGanaderia2 = [{
              label: 'Vaquillonas y Novillos',
              backgroundColor: 'rgba(255,0,100,.2)',
              borderColor: 'rgb(255,0,0)',
              borderWidth: 1, 
              data: dataVaquillonasNovillos
            },{
              label: 'Carnes y Subproductos',
              backgroundColor: 'rgba(50,0,255,.2)',
              borderColor: 'rgb(0,0,255)',
              borderWidth: 1, 
              data: dataCarneSubproductos
            },{
              label: 'Exportación',
              backgroundColor: 'rgba(0,255,0,.2)',
              borderColor: 'rgb(0,255,0)',
              borderWidth: 1, 
              data: dataExportacion
            },{
              label: 'Prod. Hacienda',
              backgroundColor: 'rgba(0,255,255,.2)',
              borderColor: 'rgb(0,255,255)',
              borderWidth: 1, 
              data: dataProduccionHacienda
          }]

          generarGraficoMultiBar(divId,labels,registrosGanaderia2)
          generarGraficoMultiBar(`idGraficoGanaderia2${campo}`,labels,registrosGanaderia2)

          divId = `margenVentasChart${campo}`
          tituloLabel = 'Margen/Ventas'

          registros = []

          for (const key in respuesta) {
            if(key < 6){
              registros.push(Number(respuesta[key].graficos.margenSobreVentas).toFixed(2))
            }
          }
          registros.reverse()      
          
          dataResultExpl = getMonthData(respuesta,'resultadoExplotacion2',start)
          dataResultExpl.reverse()

          if(campo != 'Paihuen'){

            let baaiAccum = respuesta.map((element,index)=>{

              if(index < 6){
                
                return element['graficos']['resultadoExplotacion2'].toFixed(1)
              }

            })

            baaiAccum.pop()
            baaiAccum.reverse()
            
            let configMargenVentasChart = {
              type: 'bar',
              data: {
                labels: labels,
                datasets: [
                  {
                    type: 'line',
                    label: 'BAAI',
                    borderColor: window.chartColors.red,
                    fill:false,
                    yAxisID: 'A',
                    data: dataResultExpl
                  }
                  ,
                  {
                    type: 'line',
                    label: 'BAAI ACCUM',
                    borderColor: window.chartColors.blue,
                    fill:false,
                    yAxisID: 'A',
                    data: baaiAccum,
                    borderWidth: 2

                  }
                  ,
                  {
                    label: 'm/v',
                    type: 'line',
                    backgroundColor:'rgba(0,255,0,.2)',
                    borderColor: 'rgb(0,255,0)',
                    yAxisID: 'B',
                    data: registros,
                    borderWidth: 2
                  }
                ]
              },
              options: {
                tooltips: {
                  callbacks: {
                    label: function(tooltipItem, data) {

                        if(tooltipItem.datasetIndex == 2){
                          return `${tooltipItem.yLabel}%`
                        }else{
                          return `$ ${tooltipItem.yLabel.toLocaleString('de-DE')}`
                        }
                      }
                  }
                },
                scaleShowValues: true,
                scales: {
                  xAxes: [{
                    display:true,
                    ticks: {
                      autoSkip: false,
                    }
                  }],
                  yAxes: [{
                    id: 'A',
                    type: 'linear',
                    position: 'left',
                    ticks:{
                      beginAtZero: true,
                      callback: function(value, index, ticks) {
                        return  format(value);
                      }     
                    }
                  }, {
                    id: 'B',
                    type: 'linear',
                    position: 'right',
                    ticks:{
                      beginAtZero: true
                    }
                  }]
                },
                plugins:{
                  labels:{                  
                    render: (val)=>{ return ''},
                  }
                },
                legend:{
                  labels: {
                        boxWidth: 5
                  }
                }
              }
            }
                  

            generarGraficoBar(divId,configMargenVentasChart,'noOption');
            generarGraficoBar(`idGraficoMargenVentas${campo}`,configMargenVentasChart,'noOption')

          

        
            divId = `rentabilidadEconomicaChart${campo}`
            tituloLabel = 'Renta/Activo'

            registros = []

            for (const key in respuesta) {
              if(key < 6){
                registros.push(Number(respuesta[key].graficos.rentabilidadEconomica).toFixed(2))
              }
            }

            registros.reverse()

            let configRentabilidadChart = {
              type: 'line',
              data: {
                labels: labels,
                datasets: [
                  {
                    type: 'line',
                    label: 'R/A',
                    borderColor: window.chartColors.red,
                    data: registros
                  }
                ]
              },
              options: {
                tooltips: {
                  callbacks: {
                    label: function(tooltipItem, data) {
                          return `${tooltipItem.yLabel}%`
                      }
                  }
                },
                scaleShowValues: true,
                scales: {
                  xAxes: [{
                    display:true,
                    ticks: {
                      autoSkip: false,
                    }
                  }],
                },
                plugins:{
                  labels:{                  
                    render: (val)=>{ return format(val.value);},
                  }
                },
                legend:{
                  labels: {
                        boxWidth: 5
                  }
                }
              }
            }

            generarGraficoBar(divId,configRentabilidadChart,'noOption');
            /********************************* */

            let dataABG = []

            for (const key in respuesta) {
              if(key < 6){
                dataABG.push(Number(respuesta[key].graficos.bienesDeCambio.activosBiologicosGan).toFixed(2))
              }
            }
            dataABG.reverse()

            let dataPA = []

            for (const key in respuesta) {
              if(key < 6){
                dataPA.push(Number(respuesta[key].graficos.bienesDeCambio.productosAgropecuarios).toFixed(2))
              }
            }
            dataPA.reverse()

            let dataBUPP = []

            for (const key in respuesta) {
              if(key < 6){
                dataBUPP.push(Number(respuesta[key].graficos.bienesDeCambio.bienesUPP).toFixed(2))
              }
            }
            dataBUPP.reverse()

            registros = [{
                              label: 'Activos biologicos ganaderos',
                              backgroundColor: 'rgba(255,0,100,.2)',
                              borderColor: 'rgb(255,0,0)',
                              borderWidth: 1, 
                              data: dataABG
                          },{
                            label: 'Productos Agropecuarios (granos)',
                            backgroundColor: 'rgba(50,0,255,.2)',
                            borderColor: 'rgb(0,0,255)',
                            borderWidth: 1, 
                            data: dataPA
                          },{
                            label: 'Bienes a utilizar proceso productivo',
                            backgroundColor: 'rgba(0,255,0,.2)',
                            borderColor: 'rgb(0,255,0)',
                            borderWidth: 1, 
                            data: dataBUPP
                          }]

            divId = `bienesDeCambioChart${campo}`

            generarGraficoMultiBar(divId,labels,registros)
            generarGraficoMultiBar(`idGraficoBienesDeCambio${campo}`,labels,registros)
            
            /******************************** */

            let dataBUE = []

            for (const key in respuesta) {
              if(key < 6){
                dataBUE.push(Number(respuesta[key].graficos.bienesDeUso.buEstructura).toFixed(2))
              }
            }
            dataBUE.reverse()

            let dataBUM = []

            for (const key in respuesta) {
              if(key < 6){
                dataBUM.push(Number(respuesta[key].graficos.bienesDeUso.buMoviles).toFixed(2))
              }
            }
            dataBUM.reverse()

            let dataBUR = []

            for (const key in respuesta) {
              if(key < 6){
                dataBUR.push(Number(respuesta[key].graficos.bienesDeUso.buReproductores).toFixed(2))
              }
            }
            dataBUR.reverse()

            let dataBUD = []

            for (const key in respuesta) {
              if(key < 6){
                dataBUD.push(Number(respuesta[key].graficos.bienesDeUso.buDiversos).toFixed(2))
              }
            }
            dataBUD.reverse()

            let dataBUGE = []

            for (const key in respuesta) {
              if(key < 6){
                dataBUGE.push(Number(respuesta[key].graficos.bienesDeUso.buGastosEstructura).toFixed(2))
              }
            }
            dataBUGE.reverse()

            registros = [{
                              label: 'Estructura',
                              backgroundColor: 'rgba(255,0,100,.2)',
                              borderColor: 'rgb(255,0,0)',
                              borderWidth: 1, 
                              data: dataBUE
                          },{
                            label: 'Moviles',
                            backgroundColor: 'rgba(50,0,255,.2)',
                            borderColor: 'rgb(0,0,255)',
                            borderWidth: 1, 
                            data: dataBUM
                          },{
                            label: 'Diversos',
                            backgroundColor: 'rgba(0,255,0,.2)',
                            borderColor: 'rgb(0,255,0)',
                            borderWidth: 1, 
                            data: dataBUD
                          },
                          {
                            label: 'Reproductores',
                            backgroundColor: 'rgba(0,255,255,.2)',
                            borderColor: 'rgb(0,255,0)',
                            borderWidth: 1, 
                            data: dataBUR
                          },
                          {
                            label: 'Gastos Estructura',
                            backgroundColor: 'rgba(100,0,100,.2)',
                            borderColor: 'rgb(0,255,0)',
                            borderWidth: 1, 
                            data: dataBUGE
                          },
                        ]

            divId = `bienesDeUsoChart${campo}`

            generarGraficoMultiBar(divId,labels,registros)
            generarGraficoMultiBar(`idGraficoBienesDeUso${campo}`,labels,registros)
          
          }

        // FINANCIERO
          divId = `endeudamientoChart${campo}`

          /** */

          let dataPrestamos = []

          for (const key in respuesta) {
            if(key < 6){
              dataPrestamos.push(Number(respuesta[key].graficos.endeudamiento.prestamos).toFixed(2))
            }
          }

          dataPrestamos.reverse()

          /** */

          let dataTarjetas = []

          for (const key in respuesta) {
            if(key < 6){
              dataTarjetas.push(Number(respuesta[key].graficos.endeudamiento.tarjetas).toFixed(2))
            }
          }

          dataTarjetas.reverse()

          /** */

          let dataProveedores = []

          for (const key in respuesta) {
            if(key < 6){
              dataProveedores.push(Number(respuesta[key].graficos.endeudamiento.proveedores).toFixed(2))
            }
          }

          dataProveedores.reverse()

          /** */

          let dataSgr = []

          for (const key in respuesta) {
            if(key < 6){
              dataSgr.push(Number(respuesta[key].graficos.endeudamiento.sgr).toFixed(2))
            }
          }

          dataSgr.reverse()

          /** */
          
          let dataMutuales = []

          for (const key in respuesta) {
            if(key < 6){
              dataMutuales.push(Number(respuesta[key].graficos.endeudamiento.mutuales).toFixed(2))
            }
          }

          dataMutuales.reverse()
          
          /** */

          let dataCLP = []

          for (const key in respuesta) {
            if(key < 6){
              dataCLP.push(Number(respuesta[key].graficos.endeudamiento.cerealPL).toFixed(2))
            }
          }
          dataCLP.reverse()

          registros = [{
                            label: 'Prestamos',
                            backgroundColor: 'rgba(255,0,100,.2)',
                            borderColor: 'rgb(255,0,0)',
                            borderWidth: 1, 
                            data: dataPrestamos
                        },{
                          label: 'Tarjetas',
                          backgroundColor: 'rgba(50,0,255,.2)',
                          borderColor: 'rgb(0,0,255)',
                          borderWidth: 1, 
                          data: dataTarjetas
                        },{
                          label: 'Sgr',
                          backgroundColor: 'rgba(0,255,0,.2)',
                          borderColor: 'rgb(0,255,0)',
                          borderWidth: 1, 
                          data: dataSgr
                        },{
                          label: 'Mutuales',
                          backgroundColor: 'rgba(0,255,255,.2)',
                          borderColor: 'rgb(0,255,255)',
                          borderWidth: 1, 
                          data: dataMutuales
                        },{
                          label: 'Proveedores',
                          backgroundColor: 'rgba(200,0,255,.2)',
                          borderColor: 'rgb(200,0,255)',
                          borderWidth: 1, 
                          data: dataProveedores
                        },{
                          label: 'CPL',
                          backgroundColor: 'rgba(236,255,0,.2)',
                          borderColor: 'rgb(236,255,0)',
                          borderWidth: 1, 
                          data: dataCLP
                        }]

          generarGraficoMultiBar(divId,labels,registros)
          generarGraficoMultiBar(`idGraficoDeudaBancaria${campo}`,labels,registros)

          /** */

          divId = `deudaBancariaChart${campo}`

          let dataDeudaBancaria = []

          for (const key in respuesta) {
            if(key < 6){
              dataDeudaBancaria.push(Number(respuesta[key].graficos.deudaBancaria).toFixed(2))
            }
          }

          dataDeudaBancaria.reverse()
          tituloLabel = 'Deuda Bancaria'

          generarGraficoBarSimple(dataDeudaBancaria,divId,labels,tituloLabel)

          divId = `interesesPagadosChart${campo}`

          datainteresesPagados = getMonthData(respuesta,'interesesPagados',start)

          datainteresesPagados.reverse()
          tituloLabel = 'Intereses Pagados'

          generarGraficoBarSimple(datainteresesPagados,divId,labels,tituloLabel)

        // IMPOSITIVO

                          
          divId = `saldoIva${campo}`
          
          /** */

          let dataSld = []

          for (const key in respuesta) {
            if(key < 6){
              dataSld.push(Number(respuesta[key].graficos.saldos.sld).toFixed(2))
            }
          }

          dataSld.reverse()

          /** */

          let dataSaldoTecnico = []

          for (const key in respuesta) {
            if(key < 6){
              dataSaldoTecnico.push(Number(respuesta[key].graficos.saldos.saldoTecnico).toFixed(2))
            }
          }

          dataSaldoTecnico.reverse()

          registros = [{
                            label: 'SLD',
                            backgroundColor: 'rgba(255,0,100,.2)',
                            borderColor: 'rgb(255,0,0)',
                            borderWidth: 1, 
                            data: dataSld
                        },{
                          label: 'Saldo Técnico',
                          backgroundColor: 'rgba(50,0,255,.2)',
                          borderColor: 'rgb(0,0,255)',
                          borderWidth: 1, 
                          data: dataSaldoTecnico
          }]

          generarGraficoMultiBar(divId,labels,registros)

          generarGraficoMultiBar(`idGraficoSaldoIva${campo}`,labels,registros)

          let ventasTotalesGraficos = getMonthData(respuesta,'ventasTotales',start)

          divId = `sueldos12Ventas${campo}`

          let dataSueldos12 = getMonthData(respuesta,'sueldos12',start)

          let denominadorVentas = getMonthData(respuesta,'denominadorVentas')

          let dataSueldos12Ventas = dataSueldos12.map((registro,index)=> Number(((registro / denominadorVentas[index]) * 100)).toFixed(2))
          
          dataSueldos12.reverse()
          dataSueldos12Ventas.reverse()

          tituloLabel = 'Sueldos 1 + 2 / Ventas'

          let configSueldos12VentasChart = {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [
                {
                  type: 'bar',
                  label: 'Suedos 1 + 2',
                  borderColor: window.chartColors.red,
                  backgroundColor:'rgba(255,0,0,.2)',
                  borderColor: 'rgb(255,0,0)',
                  yAxisID: 'A',
                  data: dataSueldos12
                }
                ,
                {
                  label: 'Sueldos 1 + 2 / Ventas.',
                  type: 'line',
                  borderColor: 'rgb(0,255,0)',
                  yAxisID: 'B',
                  fill:false,
                  data: dataSueldos12Ventas,
                  borderWidth: 2
                }
              ]
            },
            options: {
              tooltips: {
                callbacks: {
                  label: function(tooltipItem, data) {

                      if(tooltipItem.datasetIndex == 1){
                        return `${tooltipItem.yLabel}%`
                      }else{
                        return `$ ${tooltipItem.yLabel.toLocaleString('de-DE')}`
                      }
                    }
                }
              },
              scaleShowValues: true,
              scales: {
                xAxes: [{
                  display:true,
                  ticks: {
                    autoSkip: false,
                  }
                }],
                yAxes: [{
                  id: 'A',
                  type: 'linear',
                  position: 'left',
                  ticks:{
                    beginAtZero: true,
                    callback: function(value, index, ticks) {
                      return  format(value);
                    }     
                  }
                }, {
                  id: 'B',
                  type: 'linear',
                  position: 'right',
                  ticks:{
                    beginAtZero: true
                  }
                }]
              },
              plugins:{
                labels:{                  
                  render: (val)=>{ return format(val.value);},
                }
              },
              legend:{
                labels: {
                      boxWidth: 5
                }
              }
            }
          }
                
          generarGraficoBar(divId,configSueldos12VentasChart,'noOption');
          generarGraficoBar(`idGraficoSueldo12${campo}`,configSueldos12VentasChart,'noOption');
          
          divId = `sueldos12HonorariosVentas${campo}`

          let dataSueldos12Honorarios = getMonthData(respuesta,'sueldos12Honorarios',start)

          ventasTotalesGraficos = getMonthData(respuesta,'ventasTotales',start)
          let dataSueldos12HonorariosVentas = dataSueldos12.map((registro,index)=> Number(((registro / denominadorVentas[index]) * 100)).toFixed(2))


          dataSueldos12Honorarios.reverse()
          dataSueldos12HonorariosVentas.reverse()
          
          tituloLabel = 'Sueldos 1 + 2 + Honorarios / Ventas' 

          let configSueldos12HonorariosVentasChart = {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [
                {
                  type: 'bar',
                  label: 'Suedos 1 + 2 + Honorarios',
                  backgroundColor:'rgba(255,0,0,.2)',
                  borderColor: 'rgb(255,0,0)',
                  yAxisID: 'A',
                  data: dataSueldos12Honorarios
                }
                ,
                {
                  label: 'Sueldos 1 + 2 + Honorarios / Ventas.',
                  type: 'line',
                  borderColor: 'rgb(0,255,0)',
                  yAxisID: 'B',
                  fill:false,
                  data: dataSueldos12HonorariosVentas,
                  borderWidth: 2
                }
              ]
            },
            options: {
              tooltips: {
                callbacks: {
                  label: function(tooltipItem, data) {

                      if(tooltipItem.datasetIndex == 1){
                        return `${tooltipItem.yLabel}%`
                      }else{
                        return `$ ${tooltipItem.yLabel.toLocaleString('de-DE')}`
                      }
                    }
                }
              },
              scaleShowValues: true,
              scales: {
                xAxes: [{
                  display:true,
                  ticks: {
                    autoSkip: false,
                  }
                }],
                yAxes: [{
                  id: 'A',
                  type: 'linear',
                  position: 'left',
                  ticks:{
                    beginAtZero: true,
                    callback: function(value, index, ticks) {
                      return  format(value);
                    }     
                  }
                }, {
                  id: 'B',
                  type: 'linear',
                  position: 'right',
                  ticks:{
                    beginAtZero: true,
                    callback: function(value, index, ticks) {
                      return  format(value);
                    } 
                  }
                }]
              },
              plugins:{
                labels:{                  
                  render: (val)=>{ return format(val.value);},
                }
              },
              legend:{
                labels: {
                      boxWidth: 5
                }
              }
            }
          }

          generarGraficoBar(divId,configSueldos12HonorariosVentasChart,'noOption');

          generarGraficoBar(`idGraficoSueldo12Honorario${campo}`,configSueldos12HonorariosVentasChart,'noOption');

          if(campo != 'Paihuen'){

            let dataCargasSociales = []

            for (const key in respuesta) {
              if(key < 6){
                dataCargasSociales.push(Number(respuesta[key].cajas.cargasSociales).toFixed(2))
              }
            }

            dataCargasSociales.reverse()
            
            divId = `cargasSocialesGrafico${campo}`

            tituloLabel = 'Cargas Sociales'
  
            generarGraficoBarSimple(dataCargasSociales,divId,labels,tituloLabel)

          }
        
      const btnsZoomGrafico = document.querySelectorAll('.zoomGraficos')

      btnsZoomGrafico.forEach(element => {

        element.addEventListener('click',()=>{

          switch (element.attributes['data-modal'].value) {
            case `zGraficoVentas${campo}`:
                $(`#graficoVentaModal${campo}`).modal('show')

              break;
            
            case `zGraficoVentas2${campo}`:
                $(`#graficoVenta2Modal${campo}`).modal('show')

              break;

              case `zGraficoMargenVentas${campo}`:
                $(`#graficoMargenVentaModal${campo}`).modal('show')

              break;

              case `zGraficoGanaderia${campo}`:
                $(`#graficoGanaderiaModal${campo}`).modal('show')

              break;

              case `zGraficoEndeudamiento${campo}`:
                $(`#graficoDeudaBancariaModal${campo}`).modal('show')

              break;

              case `zGraficoSaldoIva${campo}`:
                $(`#graficoSaldoIvaModal${campo}`).modal('show')
                break;

              case `zGraficoSueldos12${campo}`:
                $(`#graficoSueldo12Modal${campo}`).modal('show')
                break;

              case `zGraficoSueldos12Honorarios${campo}`:
                $(`#graficoSueldo12HonorarioModal${campo}`).modal('show')
                break;

              case `zGraficoBienesDeCambio${campo}`:
                $(`#graficoBienesDeCambioModal${campo}`).modal('show')
                break;

              case `zGraficoBienesDeUso${campo}`:
                $(`#graficoBienesDeUsoModal${campo}`).modal('show')
                break;

              case `zGraficoCargasSociales${campo}`:
                $(`#graficoCargasSocialesModal${campo}`).modal('show')
                break;
          
            default:
              break;
          }
          
        })

      });
    }

    if(btnGenerarReporte != null){
      btnGenerarReporte.addEventListener('click',function(){

        let periodo = document.querySelector('.periodoContable').value

        window.location = `index.php?ruta=contable/contable&periodo=${periodo}`

      })
    }
    
    let url = 'ajax/contable.ajax.php';

    let periodo = getQueryVariable('periodo')

    let periodoData = 'last'

    if(periodo != '') periodoData = `${periodo}-01`
    
    let data = new FormData()
    data.append('periodo',periodoData)
    data.append('accion','mostrarData')

    // fetch(url,{
    //     method:'POST',
    //     body:data
    // }).then(resp=>resp.json())
    // .then(respuesta=>{
    $.ajax({
      method:'post',
      url,
      data:{
        'periodo':periodoData,
        'accion':'mostrarData'
      }
    }).done(function(respuesta){
      respuesta = JSON.parse(respuesta)

      if(!respuesta){

        swal({
          title: "No hay información para el mes seleccionado.",
          text: ``,
          type: "error",
          confirmButtonText: "¡Cerrar!"
        }).then(()=>{
          window.location = `index.php?ruta=contable/contable`
        });
        return
      }

      if(respuesta.error){

        let padre = document.querySelector('.content-wrapper .box .content')

        padre.removeChild(padre.lastChild)

        let alert = document.createElement('H1')
        alert.innerHTML = 'Buscar informacion desde el boton de filtros.'
        padre.appendChild(alert)

        swal({
            title: "Falta cargar una planillas.",
            text: `Ultimas planillas cargadas:
            PRINCIPAL - ${formatearFecha(respuesta.principal)} ||
            CONSOLIDADO - ${formatearFecha(respuesta.consolidado)} ||
            PAIHUEN - ${formatearFecha(respuesta.paihuen)}`,
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
    
          return
        
      }

      // PERIODO VISIBLE
      document.getElementById('periodoVisible').innerHTML = respuesta['barlovento'][0].periodoVisible

      cargarDatosCampo('Barlovento',respuesta['barlovento'])
      cargarDatosCampo('Paihuen',respuesta['paihuen'])

    })
    .catch(err=>console.log(err))



/*=============================================
ELIMINAR ARCHIVO
=============================================*/
$(".tablas").on("click", ".btnEliminarArchivoContable", function(){

  var idArchivo = $(this).attr("idArchivo");
  var tabla = $(this).attr("tablaDB");

  swal({
    title: '¿Está seguro de borrar los registros asociados a este Archivo?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      if(tabla != 'contable' && tabla != 'contablePaihuen'){ 
        window.location = "index.php?ruta=archivosCarga&nombreArchivo=" + idArchivo + "&tabla=" + tabla;
      }else{
        window.location = "index.php?ruta=contable/archivos&nombreArchivo=" + idArchivo + "&tabla=" + tabla;
      }

    }

  })

})