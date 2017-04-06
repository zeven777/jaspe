$(function(){
    $('body').on('click','*[data-command]',function(e){
        e.preventDefault();
        var Sthis = $(this);
        switch($(this).data('command')){
            case "delete":
                bootbox.confirm(language.message.confirm.delete,function(r){
                    if(r) window.location.href = Sthis.attr('href');
                    return true;
                });
            break;
            case "filter":
                $.ajax({
                    url: Sthis.data('url'),
                    type: 'POST',
                    data: Sthis.data(),
                    dataType: 'json'
                }).done(function(d){
                    if(d.redirect) window.location.href = d.redirect;
                });
                break;
        }
    });
    $('*[data-toggle="popover"]').each(function(i,v){
        var mdata = $(v).data();
        if( mdata.content === undefined ){
            mdata.html = true;
            mdata.content = function(){
                var image = $('<div class="text-center"><img src="'+$(this).data('image')+'" /></div>');
                return image;
            };
        }
        $(this).popover(mdata);
    });
});