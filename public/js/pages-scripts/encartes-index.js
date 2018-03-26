$('.select22').select2();

$(function () {
    $('#encartesTable').DataTable(
        {
            "language": {
                "search": "Pesquisar:",
                searchPlaceholder: "Busca por Nome ou Filial",
                "lengthMenu": "Mostrar _MENU_ itens por página",
                "zeroRecords": "Nenhum registro encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro encontrado",
                "infoFiltered": "(filtrado de _MAX_ no total)",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                }
            },
            "order": [[ 1, "asc" ]],
            "columnDefs": [
                { "orderable": false, "targets": 0 },
                { "orderable": false, "targets": 3 },
                { "orderable": false, "targets": 6 },
                { "orderable": false, "targets": 7 }
            ]
        }
    );
});

$('#encarteFilter').keyup(function(){
    $('#encartesTable').DataTable().column(2).search($(this).val()).draw();
    console.log($(this).val());
});