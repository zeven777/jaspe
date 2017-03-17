@extends('admin::commons.layout')
@section('content')
@if(!isset($command) || (isset($command) && $command!=='new'))
@if($files)
        <div class="form-group" id="images">
            <label class="form-label">{{ trans("admin::admin.labels.form.images") }}</label>
            <div>
                <div class="file-gallery">
@foreach($files as $id=>$file)
                    <div class="file thumbnail text-center">
@if(ends_with($file['url'],array('jpg','png','jpeg')))
                        {{ HTML::image(route('admin.system.gallery.sample',array('name' => $id)),$file['title'], array('title' =>$file['title'],'data-url'=>route('admin.system.gallery.edit',compact('id')),'data-toggle'=>'modal','data-target'=>'#Modal')) }}
@else
                        {{ HTML::image(route('admin.system.gallery.sample',array('name' => $id)),$file['title'], array('title' =>$file['title'])) }}
@endif

                        {{ Form::checkbox('file[]',$id,false,array('class'=>'input-inline-level')) }}

                    </div>
@endforeach
                </div>
                <div class="clearfix"></div>
                <button type="button" class="btn btn-default" data-button data-list="#images .file-gallery" data-role="select">
                    <i class="fa fa-check-square-o"></i>&nbsp; {{ trans("admin::admin.button.form.file.select") }}
                </button>
                <button type="button" class="btn btn-default" data-button data-list="#images .file-gallery" data-role="unselect">
                    <i class="fa fa-square-o"></i>&nbsp; {{ trans("admin::admin.button.form.file.unselect") }}
                </button>
                <button type="button" class="btn btn-danger" data-button data-list="#images .file-gallery" data-role="delete">
                    <i class="fa fa-trash"></i>&nbsp; {{ trans("admin::admin.button.form.file.delete") }}
                </button>
            </div>
        </div>
@endif
@endif
        <div>
            {{ Form::open(array('route'=>'admin.system.gallery.store','class'=>'form form-vertical','autocomplete'=>'off','id'=>'fileupload','files'=>true)) }}

                <div class="form-group{{ ($errors->has('images')) ? ' error':'' }}">
                    <label class="form-label">{{ trans("admin::admin.labels.form.files") }}</label>
                    <div>
                        <p id="imagesbrowser">
                            <a href="javascript:void(0);" class="browser btn btn-success" data-browser="#imagesbrowser">
                                <i class="fa fa-plus"></i>&nbsp; {{ trans("admin::admin.button.form.browser") }}
                            </a>
                            <input type="file" name="files[]" class="multifile hidden" maxlength="{{ $maxlength }}" data-principal="true" accept="{{ $accept }}" />
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}
                    </button>
                </div>
            {{ Form::close() }}

        </div>
@stop
@section('mscript')
@include('admin::forms.commons.fileuploader')
{{ HTML::script('packages/nob/admin/imgareaselect/scripts/jquery.imgareaselect.pack.js') }}
{{ HTML::script('packages/nob/admin/farbtastic/farbtastic.js') }}
{{ HTML::script('packages/nob/admin/cms/js/tools.js') }}
@stop
@section('style')
{{ HTML::style('packages/nob/admin/imgareaselect/css/imgareaselect-default.css') }}
{{ HTML::style('packages/nob/admin/farbtastic/farbtastic.css') }}
@endsection
@section('script')
<script>
var ias,iasW,iasH,imgW,imgH;
$(function(){
    $('.multifile').MultiFile({
        STRING:{
            remove:'<i class="fa fa-remove"></i>',
            selected:'Archivo Selecionado: $file',
            denied:'Tipo de Archivo no permitido ($ext)',
            duplicate:'Ya existe en la lista:\n\n$file'
        },
        onFileAppend: function(element){
            $(element).removeAttr('data-principal');
        }
    });
    $('body').on('click','.browser',function(){
        $($(this).data('browser')).find('input.multifile[data-principal="true"]').trigger('click');
    });
    $('body').on('change','.colorpicker',function(){
        var color = $(this).val();
        $('#image-resize').delay(300).attr('src',$('#image-resize').data('url')+'/'+color.substr(1,7));
    });
    $('body').on('focus','.colorpicker',function(){
        var sthis = $(this);
        $('#picker'+sthis.attr('name')).farbtastic(function(color){
            sthis.val(color);
            $('#image-resize').delay(300).attr('src',$('#image-resize').data('url')+'/'+color.substr(1,7));
        });
        $('#picker'+sthis.attr('name')).find('.farbtastic').hide().slideDown({
            complete: function(){
                sthis.filter('[data-style]').attr('style',sthis.data('style'));
            }
        });
    });
    $('body').on('blur','.colorpicker',function(){
        var sthis = $(this);
        $('#picker'+sthis.attr('name')).find('.farbtastic').slideUp({
            complete: function(){
                sthis.data('style',sthis.attr('style'));
                sthis.removeAttr('style');
            }
        });
    });
    $('body').on('change','#edit-image',function(e){
        e.preventDefault();
        $('.image-parameters div[class]').addClass('hidden');
        $('.image-parameters div.'+$(this).find('option:selected').data('fields')).removeClass('hidden');
        imagearea('#image-resize','',$(this).find('option:selected').data('size'),$(this).find('option:selected').data('sizee'));
        $('input[name="dst"]').val($(this).find('option:selected').data('size'));
    });
    $('body').on('click','button[data-button]',function(e){
        e.preventDefault();
        switch($(this).data('role')){
            case "select":
                $($(this).data('list')).find(':checkbox').prop('checked',true);
            break;
            case "unselect":
                $($(this).data('list')).find(':checkbox').prop('checked',false);
            break;
            case "delete":
                if($($(this).data('list')).find(':checkbox:checked').size()!==0){
                    var sthis = $($(this).data('list'));
                    var dat = sthis.find(':checkbox:checked').serializeArray();
                    bootbox.confirm('¿Desea eliminar los archivos seleccionados?',function(r){
                        if(!r) return true;
                        $.ajax({
                            url: '{{ route("admin.system.gallery.delete") }}',
                            type: 'POST',
                            data: dat,
                            dataType: 'json',
                            headers: {
                                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                            }
                        }).done(function(data){
                            if(data.ok){
                                $.each(data.deleted,function(i,v){
                                    sthis.find('.file').has('input[value="'+v+'"]').fadeOut(1000,function(){
                                        $(this).remove();
                                        if(sthis.children().size()===0) sthis.parents('.control-group').remove();
                                    });
                                });
                            }
                        });
                    });
                    return false;
                }
                notification('Debes seleccionar al menos un archivo para eliminar','danger');
            break;
        }
    });
});
</script>
@stop