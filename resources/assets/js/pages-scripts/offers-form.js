$('.select2').select2();
$('.select2-container').css({ width: '100%' });
$(document).ready(function () {
    $("[name=price]").maskMoney({thousands: '', decimal: '.'});
});

function mostraParcelamentoAtualDoProduto() {
    $('#product_id').data('content');

    var parcelas = $("option:selected").data('content');

    $('#installment').val(parcelas);
}