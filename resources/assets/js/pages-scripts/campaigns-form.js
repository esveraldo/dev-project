$(function () {
    $('#usersTable').DataTable(
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
            "columnDefs": [
                {"orderable": false, "targets": 5}
            ],
            "dom": "<t><'row'<'col-sm-6'l><'col-sm-6'p>>"
        }
    );
});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
});

$('.select2-container').css({ width: '100%' });

$('.select2').select2MultiCheckboxes();

$('.select').select2();

$('.slider').slider();