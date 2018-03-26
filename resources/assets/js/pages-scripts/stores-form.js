function verify() {
    var address = $('#location').val();
    var url = '/stores/location/' + address;
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