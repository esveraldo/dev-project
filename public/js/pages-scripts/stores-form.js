
$('#phone').mask('(00) 00000-0000');

function verify() {
    var address = $('#location').val();
    var url = '/api-web-cacula/public/stores/location/' + address;
    if(address) {
        $.getJSON(url, function (data) {
            if (data.status === 'OK') {
                $('#address-div').show();
                $('#address').val(data.results[0].formatted_address);
                $('#lat').val(data.results[0].geometry.location.lat);
                $('#long').val(data.results[0].geometry.location.lng);
            }
        });
    }
}

