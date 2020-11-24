$(document).ready(function () {
    var id, opcion;
    opcion = 4;

    tablaVis = $("#tablaV").DataTable({
       
        dom: "<'row justify-content-center'<'col-sm-12 col-md-4 form-group'l><'col-sm-12 col-md-4 form-group col-center'B><'col-sm-12 col-md-4 form-group'f>>" +
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
  



});