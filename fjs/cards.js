$(document).ready(function () {
    const MONTOEFECTIVO=680000;
    var id, opcion;
    opcion = 4;

    tablaVis = $("#tablaV").DataTable({
       
        dom: "<'row justify-content-center'<'col-sm-12 col-md-4 form-group'l><'col-sm-12 col-md-4 form-group col-center'><'col-sm-12 col-md-4 form-group'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",


        buttons: [{
            extend: 'excelHtml5',
            "text": "<i class='fas fa-file-excel'> Excel</i>",
            "titleAttr": "Exportar a Excel",
            "className": 'btn bg-success ',
            exportOptions: { columns: [0,1, 2, 3, 4, 5,6,7] }
        },
        {
            extend: 'pdfHtml5',
            "text": "<i class='far fa-file-pdf'> PDF</i>",
            "titleAttr": "Exportar a PDF",
            "className": 'btn bg-danger',
            exportOptions: { columns: [0,1, 2, 3, 4, 5,6,7] }
        }



    ],

    rowCallback: function (row, data) {
        
        $($(row).find('td')['5']).addClass('text-right');
        $($(row).find('td')['6']).addClass('text-right');
        $($(row).find('td')['7']).addClass('text-right');
        $($(row).find('td')['5']).addClass('currency');
        $($(row).find('td')['6']).addClass('currency');
        $($(row).find('td')['7']).addClass('currency');
  
       
      },
    "columnDefs": [{
        "targets": -1,
        "data": null,
        "defaultContent": "<div class='text-center'><button class='btn btn-sm btn-primary btnSelp'><i class='far fa-hand-point-up'></i></button></div>"
    },],



        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    tablaResumen = $("#tablaResumen").DataTable({

        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><button class='btn btn-sm btn-primary btnSel'><i class='far fa-hand-point-up'></i></button></div>"
        },],
        //Para cambiar el lenguaje a español
        language: {
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            sSearch: "Buscar:",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            sProcessing: "Procesando...",
        },

    });



    tablaPagos = $("#tablaPagos").DataTable({
        "ordering": false,
        info: false,
        orderCellsTop: false,
        
    fixedHeader: true,
    paging:false,
    "searching":false,

     
        //Para cambiar el lenguaje a español
        language: {
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            sSearch: "Buscar:",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            sProcessing: "Procesando...",
        },

        
    rowCallback: function (row, data) {
        $($(row).find('td')['0']).addClass('text-center');
        $($(row).find('td')['1']).addClass('text-center');
        $($(row).find('td')['2']).addClass('text-center');
        $($(row).find('td')['3']).addClass('text-center');
        
        if (data[1] < 50) {
            
            $($(row).find('td')).addClass('bg-gradient-success')
        }
        else if (data[1]<75){
            $($(row).find('td')).addClass('bg-gradient-purple')
        }
        else if (data[1]<100){
            $($(row).find('td')).addClass('bg-gradient-warning')
        }
        else {
            $($(row).find('td')).addClass('bg-gradient-danger')
        }

        
     
        
      
  
       
      },

    });

    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#btnBuscar').click();
        }
        });
  
    $(document).on("click", "#btnBuscar", function() {
        
        texto = $("#tbuscar").val();

        if (texto.length>3){
            buscarcliente(texto);
            $("#modalResumen").modal("show");
        }
        else{
            alert("Su busqueda debe tener mas de 3 caracteres")
        }
    });

    $(document).on("click", ".btnSel", function() {
        fila = $(this).closest("tr");
        cliente = fila.find('td:eq(0)').text();
        nomcliente=fila.find('td:eq(2)').text();

        $('#cliente').text(nomcliente);
        tablaVis.clear();
        tablaVis.draw();
     
  
        $.ajax({
            type: "POST",
            url: "bd/buscarventa.php",
            dataType: "json",
  
            data: { cliente: cliente },
  
            success: function(res) {
                
              
                for (var i = 0; i < res.length; i++) {
                    total= '$ '+ new Intl.NumberFormat('es-MX').format( res[i].total);
                    saldo=  '$ '+ new Intl.NumberFormat('es-MX').format( res[i].saldo);
                    tablaVis.row
                        .add([
                            res[i].folio_venta,
                            res[i].folio_presupuesto,
                            res[i].fecha,
                            res[i].clave_proyecto,
                            res[i].concepto,
                            total,
                            saldo,
                            res[i].saldo_mod_met,
                            
                        ])
                        .draw();
                }
                $("#modalResumen").modal("hide"); 
            },
        });


    });

    $(document).on("click", ".btnSelp", function() {
        $("#modalPagos").modal("show"); 
        fila = $(this).closest("tr");
        venta = fila.find('td:eq(0)').text();
        proyecto=fila.find('td:eq(3)').text();

        
        tablaPagos.clear();
        tablaPagos.draw();
      

    
        $.ajax({
            type: "POST",
            url: "bd/buscarpagos.php",
            dataType: "json",
  
            data: { venta: venta, proyecto: proyecto },
  
            success: function(res) {
              
                for (var i = 0; i < res.length; i++) {
                    monto=res[i].tmonto;
                    diferencia=MONTOEFECTIVO-monto;
                    
                    porcentaje=round((parseFloat(monto)/parseFloat(MONTOEFECTIVO)*100),2) ;
                    pendiente=round(100-porcentaje,2);

                    monto= '$ '+ new Intl.NumberFormat('es-MX').format(diferencia )
                    tablaPagos.row
                        .add([
                            res[i].tipodepago,
                            porcentaje,
                            pendiente,
                            monto
                           
                            
                        ])
                        .draw();
                }
                
            },
        });


    });

    function buscarcliente(texto) {
      tablaResumen.clear();
      tablaResumen.draw();

      $.ajax({
          type: "POST",
          url: "bd/buscarcliente.php",
          dataType: "json",

          data: { texto: texto },

          success: function(res) {
            
              for (var i = 0; i < res.length; i++) {
                  tablaResumen.row
                      .add([
                          res[i].clave,
                          res[i].rfc,
                          res[i].nombre,
                          
                      ])
                      .draw();

                  //tabla += '<tr><td>' + res[i].id_objetivo + '</td><td>' + res[i].desc_objetivo + '</td><td class="text-center">' + icono + '</td><td class="text-center"></td></tr>';
              }
          },
      });
  }
  function round(value, decimals) {
    return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
}

});