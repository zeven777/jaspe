@if($schema['setup']['type']!=='text' && $action==='form_edit')
<script>
var ias,iasW,iasH,imgW,imgH,url;
$(function(){
    $('body').on('click','button[data-button]',function(e){
        var Sthis = $($(this).data('list'));
        switch($(this).data('role')){
            case "select":
                Sthis.find(':checkbox').prop('checked',true);
            break;
            case "unselect":
                Sthis.find(':checkbox').prop('checked',false);
            break;
            case "delete":
                if(Sthis.find(':checkbox:checked').size() > 0){
                    bootbox.confirm('{{ trans("admin::admin.message.form.js.delete.ask") }}',function(r){
                        if(!r) return true;
                        var data = Sthis.find(':checkbox:checked').serializeArray();
                        $.ajax({
                            url: '{{ route("admin.form.delete.images",[$form, $model->id]) }}',
                            type: 'POST',
                            data: data,
                            dataType: 'json'
                        }).done(function(data){
                            $.each(data.deleted,function(i,v){
                                Sthis.find('.file').has('input[value="'+v+'"]').fadeOut(1000,function(){
                                    $(this).remove();
                                    if(Sthis.children().size()===0) Sthis.parents('.form-group.file-container').remove();
                                });
                            });
                        });
                    });
                    return false;
                }
                notification('{{ trans("admin::admin.message.form.js.delete.select") }}','warning');
            break;
        }
    });
    $('body').on('click','.file-gallery .file .highlighted .fa',function(){
        var Sthis = $(this);
        bootbox.confirm('{{ trans("admin::admin.message.form.js.file.highlight") }}',function(r){
            if(!r) return true;
            $('.file-gallery .file .fa').removeClass('fa-star-o').removeClass('fa-star').addClass('fa-star-o');
            Sthis.removeClass('fa-star-o').addClass('fa-star');
            var data = {};
            data.id = Sthis.parent().data('id');
            $.ajax({
                url: '{{ route("admin.form.highlight",[$form, $model->id]) }}',
                type: 'POST',
                data: data,
                dataType: 'json',
                statusCode: {
                    200: function(){
                        notification('{{ trans("admin::admin.message.form.js.file.highlighted") }}');
                    }
                }
            });
        });
    });
});
</script>
@endif
<script>
$(function(){
    $('body').on('change','select[data-module="countries"]',function(){
        var dat = {};
        var url = "{{ route('admin.form.module.countries',$form) }}";
        var list = $('select[data-module="countries"][data-from="'+$(this).attr('name')+'"]');
        dat.module = $(this).attr('data-module');
        dat.from = $(this).attr('data-from');
        dat.value = $(this).val();
        dat.from = $(this).attr('name');
        if(list.size() > 0){
            list.find('option + option').remove();
            $.ajax({
                url: url,
                data: dat,
                type: 'POST',
                dataType: 'json'
            }).done(function(d){
                if(d.ok){
                    $.each(d.list,function(i,v){
                        $('select[data-module="countries"][data-from="'+d.from+'"]').append('<option value="'+v+'">'+v+'</option>');
                    });
                }
            });
        }
    });
@if(
    isset($form) &&
    array_where(p_schema("{$form}.fields"),function($field, $setup){
        return array_key_exists('api',$setup) && $setup['api'] === 'googlefonts';
    })
)
    $('select.googlefonts').each(function(){
        var children = $(this).children();
        var select = $(this);
        children.each(function(){
            var font = $(this).attr('value');
            var selected = $(this).attr('selected');
            if( font !== 'null' ) $(this).css({ fontFamily: font.replace(new RegExp("_", 'g'), " ") });
            if( selected !== undefined ) select.css({ 'fontFamily': font.replace(new RegExp("_", 'g'), " ") });
        });
    });
    $('body').on('change','select.googlefonts',function(){
        var font = $(this).val();
        if(font !== 'null') $(this).css({ fontFamily: font.replace(new RegExp("_", 'g'), " ") });
        if(font === 'null') $(this).removeAttr('style');
    });
@endif
    });
</script>