function cropStart(type)
{
    if(type == 'Catalog'){
        var wi = 300;
        var he = 450;
        var ar = 300/450;
    }else if(type == 'Offer'){
        var wi = 1080;
        var he = 1920;
        var ar = 1080/1920;
    }

    $('#cropbox').Jcrop({
        aspectRatio: ar,
        onSelect: updateCoords,
        boxWidth: '100%',
        boxHeight: '100%',
        canResize: false,
        minSize		: [ wi, he ],
        maxSize		: [ wi, he ],

    },function() {
        // Save Jcrop object
        JCropper = this;
    });

}

function updateCoords(c)
{
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
}

let check = false;

function checkCrop() {
    check = true;
}

function checkCoords()
{
    if(check === true){
        if (parseInt($('#w').val())) return true;
        alert('Selecione a região para recortar a imagem.');
        return false;
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#cropbox').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('#image').change(function(){
    readURL(this);
    setTimeout(function(){
        cropStart($('#type').val());
    }, 200);
    checkCrop();
});

$('#type').change(function () {
    JcropAPI = $('#cropbox').data('Jcrop');
    if(JcropAPI){
        JcropAPI.destroy();
        setTimeout(function(){
            cropStart($('#type').val());
        }, 200);
    }
    //console.log($('#type').val());
});