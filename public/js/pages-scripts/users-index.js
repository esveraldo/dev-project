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

$('#userFilter').keyup(function(){
    $('#usersTable').DataTable().search($(this).val()).draw();
});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
});

var users = new Array();

$('.checkUser').on('ifChecked', function(event){
    users.push(event.target.id);
    checkEnable();
}).on('ifUnchecked', function(event){
    var index = users.indexOf(event.target.id);
    users.splice(index, 1);
    checkEnable();
});

function checkEnable() {
    if(users.length > 0){
        $('#enableAll').prop('disabled', false).click(statusAll);
    }else{
        $('#enableAll').prop('disabled', true).unbind('click');
    }
}

function statusAll() {
    window.location.href = "users/status/"+users;
}

$('.select2-container').css({ width: '100%' });

$('.select2').select2MultiCheckboxes();

$('.slider').slider();

function exportar(){
    $('#excel').val('1');
    $('#filter').submit();
    $('.modal').modal('toggle');
}