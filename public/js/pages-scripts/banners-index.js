$(function () {
    $('#bannersTable').DataTable(
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
                { "orderable": false, "targets": 5 }
            ],
            "dom": "<t><'row'<'col-sm-6'l><'col-sm-6'p>>"
        }
    );
});

$('#bannerFilter').keyup(function(){
    $('#bannersTable').DataTable().search($(this).val()).draw() ;
});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
});

var banners = new Array();

$('.minimal').on('ifChecked', function(event){
    banners.push(event.target.id);
    //console.log('Enable ' + event.target.id);
    //console.log(banners);
    checkEnable();
});

$('.minimal').on('ifUnchecked', function(event){
    var index = banners.indexOf(event.target.id);
    banners.splice(index, 1);
    //console.log('Disable ' + event.target.id);
    //console.log(banners);
    checkEnable();
});

function checkEnable() {
    if(banners.length > 0){
        $('#enableAll').prop('disabled', false);
        $('#enableAll').click(statusAll);
        $('#deleteAll').prop('disabled', false);
        $('#banners').val(banners);
    }else{
        $('#enableAll').prop('disabled', true);
        $('#enableAll').unbind('click');
        $('#deleteAll').prop('disabled', true);
        $('#deleteAll').unbind('click');
    }
}

function statusAll() {
    window.location.href = "banners/status/"+banners;
}

$('.select2-container').css({ width: '100%' });

$('.select2').select2().change(function() {
    this.form.submit();
});