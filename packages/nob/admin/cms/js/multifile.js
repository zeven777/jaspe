$(function(){
    $('.multifile').MultiFile({
        STRING:{
            remove: '<i class="fa fa-remove"></i> <i class="fa fa-image"></i>',
            selected: language.multifile.string.selected + '$file',
            denied: language.multifile.string.selected + ' ($ext)',
            duplicate: language.multifile.string.duplicate + '\n\n$file'
        },
        onFileAppend: function(element){
            $(element).removeAttr('data-principal');
        }
    });
    $('body').on('click','.fileupload-buttonbar .browser',function(){
        var containerId = $(this).data('browser').replace('browser','');
        var filesLoaded = $($(this).data('browser')).find('.MultiFile-wrap').find('.MultiFile-list');
        var filesUploaded = $(containerId).find('.file-gallery').has('.file').children('.file');
        var nFL = (filesLoaded!==undefined) ? filesLoaded.has('.MultiFile-label').children('.MultiFile-label').length : 0;
        var container = $($(this).data('browser')).find('input.multifile[data-principal="true"]');
        var limit = parseInt(container.attr('limit'));
        if(container.is('[disabled]')) return false;
        if(limit <= (nFL + parseInt(filesUploaded.length))) return false;
        $($(this).data('browser')).find('input.multifile[data-principal="true"]').trigger('click');
    });
});