var timeOutLoadImage;
$(function(){
    $('body').on('click','#Modal .modal-content .edit-image',function(e){
        imagearea('#image-resize',$(this).data('form'),$(this).data('size'),$(this).data('sizee'),''+$(this).data('free'));
        $('.edit-image').removeClass('btn-success');
        $(this).addClass('btn-success');
        $('input[name="n"]').val($(this).data('num'));
    });
    $('body').on('click','#Modal .modal-content [data-zoom]',function(){
        var length = 3.82;
        var img = $('#image-resize');
        var zoom = $('input[name="z"]');
        var z = parseFloat(zoom.val());
        clearTimeout(timeOutLoadImage);
        switch($(this).data('zoom')){
            case "plus":
                if(z > length) z -= length;
                break;
            case "minus":
                if(z < 100) z += length;
                break;
        }
        z = z.toFixed(3);
        zoom.val(z);
        timeOutLoadImage = setTimeout(function(){
            img.attr('src',img.data('sampleUrl')+'/'+z);
        },1000);
    });
});
function imagearea(obj,form,size,sizee,aspect) {
    var wh, ewh, porc;
    if (size.length !== 0) {
        wh = (aspect !== 'free') ? size.split("x") : '40x40'.split('x');
        ewh = sizee.split("x");
        iasW = parseInt(wh[0]) / 2;
        iasH = parseInt(wh[1]) / 2;
        wEdit = parseInt(ewh[0]);
        hEdit = parseInt(ewh[1]);
        porc = (600/wEdit);
    }
    else return false;
    ias = $(obj).imgAreaSelect({
        aspectRatio : (aspect !== 'free') ? wh[0] + ':' + wh[1] : false,
        handles : true,
        minHeight : (aspect !== 'free') ? parseInt(wh[1] * porc) : 40,
        minWidth : (aspect !== 'free') ? parseInt(wh[0] * porc) : 40,
        show: true,
        x1: (aspect !== 'free') ? Math.round((600-parseInt(wh[0]*porc))/2) : 255,
        x2: (aspect !== 'free') ? Math.round((600+parseInt(wh[0]*porc))/2) : 345,
        y1: (aspect !== 'free') ? Math.round((600-parseInt(wh[1]*porc))/2) : 255,
        y2: (aspect !== 'free') ? Math.round((600+parseInt(wh[1]*porc))/2) : 345,
        onSelectStart : function() {
            imgW = parseInt($(obj).css("width"));
            imgH = parseInt($(obj).css("height"));
            $('input[name="w"]').val(imgW);
            $('input[name="h"]').val(imgH);
        },
        onSelectEnd : function(img,selection) {
            $('input[name="x1"]').val(selection.x1);
            $('input[name="y1"]').val(selection.y1);
            $('input[name="x2"]').val(selection.x2);
            $('input[name="y2"]').val(selection.y2);
        },
        onInit: function(){
            imgW = parseInt($(obj).css("width"));
            imgH = parseInt($(obj).css("height"));
            $('input[name="w"]').val(imgW);
            $('input[name="h"]').val(imgH);
            $('input[name="z"]').val(100);
            $('input[name="x1"]').val(Math.round((600-parseInt(wh[0]*porc))/2));
            $('input[name="y1"]').val(Math.round((600-parseInt(wh[1]*porc))/2));
            $('input[name="x2"]').val(Math.round((600+parseInt(wh[0]*porc))/2));
            $('input[name="y2"]').val(Math.round((600+parseInt(wh[1]*porc))/2));
        }
    });
}