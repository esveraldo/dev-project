$('.select2').select2MultiCheckboxes();
$('.select22').select2();

$(function () {
    $('#listsTable').DataTable(
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
                {"orderable": false, "targets": 3}
            ]
        }
    );
});

function sendList(id) {
    $('#formSendList').attr('action', 'lists/send/users');
    $('#list_id').val(id).trigger('change.select2');
    $("#sendListModal").modal()
}

function ListProducts(id) {

    var url = 'list/' + id + '/products/ajax';
    var items = '';
    var title = '';

    $.getJSON(url, function (data) {
        title = data.name;
        $.each(data.products, function (i, p) {
            items += '<tr><td class="text-center"><img src="'+p.path_image+'" width="50px"></td><td>'+p.name+'</td></tr>';
        });
    }).then(function () {
        $('#listName').html(title);
        $('#products').html(items);
        $('#listProducts').modal('show');
    });

}