$('.select2').select2();
$('.select2-container').css({ width: '100%' });
$(document).ready(function () {
    $("[name=price]").maskMoney({thousands: '', decimal: '.'});
});

function maxLengthCheck(object)
{
    if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
}

function mostraParcelamentoAtualDoProduto() {

    var parcelas = $("option:selected").data('content');

    $('#installment').val(parcelas);

    var preco = $("option:selected").data('placement');

    $('#price_product').val(preco);
}