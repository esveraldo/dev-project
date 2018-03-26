$(function () {
    $('#storesTable').DataTable(
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
                { "orderable": false, "targets": 1 }
            ]
        }
    );
});

function StoreOffers(id) {

    var url = 'store/' + id + '/offers/ajax';
    var items = '';
    var title = '';

    $.getJSON(url, function (data) {
        title = data.name;
        $.each(data.offers, function (i, o) {
            items += '<tr><td class="text-center"><img src="'+o.product.path_image+'" width="50px"></td><td>'+o.product.name+'</td></tr>';
        });
    }).then(function () {
        $('#storeName').html(title);
        $('#products').html(items);
        $('#listProducts').modal('show');
    });

}