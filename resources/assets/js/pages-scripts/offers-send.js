$('.select2-container').css({ width: '100%' });
$(document).ready(function () {
    $("[name=price]").maskMoney({thousands: '', decimal: '.'});
    /*
     $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
     checkboxClass: 'icheckbox_minimal',
     radioClass: 'iradio_minimal'
     });*/
});

$('.select2').select2MultiCheckboxes();

$(function () {
    $('#usersTable').DataTable();
});