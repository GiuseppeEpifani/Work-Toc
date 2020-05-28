$(document).ready(function () {

    $('#tabla_trabajos').DataTable({
        responsive: true,
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf" style="font-size:35px;"></i>PDF',
                title: 'Registro de Trabajos',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-app export pdf',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                },

            },

            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel" style="font-size:35px;"></i>Excel',
                title: 'Registro de Trabajos',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-app export excel',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                },
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print" style="font-size:35px;"></i>Imprimir',
                title: 'Registro de Trabajos',
                titleAttr: 'Imprimir',
                className: 'btn btn-app export imprimir',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },

        ],

        "language": {
            "info": "_TOTAL_ Registro(s) encontrado(s)",
            "search": '<i class="fas fa-search" style=" font-size:22px;"></i>',
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": '<select>' +
                '<option value="10">Mostrar 10 Registros</option>' +
                '<option value="30">Mostrar 30 Registros</option>' +
                '<option value="50">Mostrar 50 Registros</option>' +
                '<option value="-1">Mostrar todos los Registros</option>' +
                '</select>',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay Datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": ""

        }
    });
});






$(document).ready(function () {
    $('#tabla_usuarios').DataTable({
        responsive: true,
        columnDefs: [
            { responsivePriority: 2, targets: -1 }
        ],
        "language": {
            "info": "_TOTAL_ Registro(s) encontrado(s)",
            "search": '<i class="fas fa-search" style=" font-size:22px;"></i>',
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": '<select>' +
                '<option value="10">Mostrar 10 Registros</option>' +
                '<option value="30">Mostrar 30 Registros</option>' +
                '<option value="50">Mostrar 50 Registros</option>' +
                '<option value="-1">Mostrar todos los Registros</option>' +
                '</select>',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay Datos",
            "zeroRecords": '<center>No hay coincidencias</center>',
            "infoEmpty": "",
            "infoFiltered": ""

        }
    });
});


$(document).ready(function () {
    $('#tabla_usuarios_activar').DataTable({

        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: -1 },
            { responsivePriority: 3, targets: -1 }
        ],
        "language": {
            "info": "_TOTAL_ Registro(s) encontrado(s)",
            "search": '<i class="fas fa-search" style=" font-size:22px;"></i>',
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": '<select>' +
                '<option value="10">Mostrar 10 Registros</option>' +
                '<option value="30">Mostrar 30 Registros</option>' +
                '<option value="50">Mostrar 50 Registros</option>' +
                '<option value="-1">Mostrar todos los Registros</option>' +
                '</select>',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay Datos",
            "zeroRecords": '<center>No hay coincidencias</center>',
            "infoEmpty": "",
            "infoFiltered": ""

        }


    });
});