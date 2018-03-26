$(document).ready(function () {
    $("[name=price]").maskMoney({thousands: '', decimal: '.'});
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#primaryImage").change(function(){
    readURL(this);
});

function openFile() {
    $("#primaryImage").trigger('click');
}

$('.select2-container').css({ width: '100%' });

$('.select2').select2MultiCheckboxes();

$('.select').select2();