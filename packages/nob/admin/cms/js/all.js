var notifyIcons = { success: 'fa fa-check', info: 'fa fa-info-circle', danger: 'fa fa-close', warning: 'fa fa-warning' };
var notifyOptions = { icon: 'fa fa-check', message: '' };
var notifySettings = { allow_dismiss: true, placement: { from: "top", align: "right" }, delay: 500, timer: 3000 };
$(function(){
    $.ajaxSetup({
        beforeSend: function(xhr){
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
        }
    });
    $('#Modal').on('hidden.bs.modal',function(){
        $(this).find(".modal-content").empty();
    });
    $('#Modal').on('hide.bs.modal',function(){
        if($('#Modal #cycle').size() > 0) $('#cycle').cycle('destroy');
        if(window['ias'] !== undefined) $('.modal-backdrop ~ div').remove();
    });
    $("#Modal").on("show.bs.modal", function(e){
        var link = $(e.relatedTarget);
        var url = link.attr("href") ? link.attr("href") : link.data('url');
        $(this).find(".modal-content").load(url,function(){
            if($('#Modal').find('*[data-login="false"]').size() > 0) return false;
            if($('#Modal #cycle').size() > 0){
                $('#cycle').cycle({
                    fx: 'fade',
                    speed:  'fast',
                    timeout: 0,
                    height: 358,
                    width: 530,
                    fit: 1,
                    cleartypeNoBg: true,
                    next: '#cycle-next',
                    prev: '#cycle-prev',
                    before: function(cSE,nSE){
                        $(cSE).removeAttr('data-active');
                        $(nSE).attr('data-active','active');
                    }
                });
            }
        });
        $(window).scrollTop(0);
    });
    $('body').on('notify',function(e,d){
        notifyOptions.message = d.message;
        notifySettings.type = d.type;
        notifyOptions.icon = notifyIcons[d.type];
        $.notify(notifyOptions,notifySettings);
    });
    bootbox.setDefaults({
        locale: language.lang
    });
});
function notification(message, type){
    $('body').trigger('notify',{ message: message, type: (type === undefined) ? 'success':type });
}