$(function () {
    $('#productsTable').DataTable(
        {
            "language": {
                "search": "Pesquisar:",
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
                { "orderable": false, "targets": 4 }
            ],
            "dom": "<t><'row'<'col-sm-6'l><'col-sm-6'p>>"
        }
    );
});

$('.slider').slider();

$('#productFilter').keyup(function(){
    $('#productsTable').DataTable().search($(this).val()).draw() ;
});

$('.select2-container').css({ width: '100%' });

$('.select2').select2MultiCheckboxes();

function exportar(){
    $('#excel').val('1');
    $('#filter').submit();
    $('.modal').modal('toggle');
}