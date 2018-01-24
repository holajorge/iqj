
function inicalizarDataTable(name){
    $('#' + name).DataTable({
                    // pageLength: 25,
                    // responsive: true,
                    // dom: '<"html5buttons"B>lTfgitp',
                    // buttons: [
                        
                    // ]
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            //"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            //"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "iDisplayLength": 10,
        "aLengthMenu": [
            [10, 20, 30],
            [10, 20, 30]
        ],
        // "pageLength": 25,
                    "responsive": true,
                    "dom": '<"html5buttons"B>lTfgitp',
                    "buttons": [
                        
                    ]


     });
}