@extends('admin::commons.layout')
@section('content')
    <table width="100%">
        <tbody>
            <tr>
                <td><h2>Generador de {{ $bind['setup']['title'] }}</h2></td>
            </tr>
@if(isset($bind))
            <tr>
                <td><h4>Guardar como nuevo item de {{ $bind['setup']['title'] }}</h4></td>
            </tr>
@endif
        </tbody>
    </table>
@if(Session::has('ok'))
    <div class="alert alert-success text-center">
        <button class="close" data-dismiss="alert" type="button">×</button>
        {{ Session::get('ok') }}
    </div>
@endif
@if(Session::has('errors'))
    <div class="alert alert-error text-center">
        <button class="close" data-dismiss="alert" type="button">×</button>
@foreach($errors->getMessages() as $error=>$messages)
@foreach($messages as $message)
            <span class="help-block">{{ trans($message) }}</span>
@endforeach
@endforeach
    </div>
@endif
    {{ Form::open(array('action'=>array($action,'type'=>$type,'form'=>$form,'id'=>$id),'id'=>'generator','class'=>((isset($bind))) ? 'form form-vertical':'form ajax form-vertical','data-replace-inner'=>'#data-done','data-type-return'=>'html')) }}

@if(isset($bind))
        <fieldset>
@foreach($bind['fields'] as $name=>$setup)
@if(!array_key_exists('behavior',$setup) || !in_array($setup['behavior'], array('hidden','session')) || (array_key_exists('visible',$setup) && Session::get('ADMINUSER')->tipo===$setup['visible']))
@if($setup['type']==='relationship')
            {{ View::make('admin::forms.fields.relationship', array('name'=>$name,$name=>$rtable,'schemas'=>$schemas,'setup'=>$setup)) }}

@elseif($setup['type']==='colorpicker')
            {{ View::make('admin::forms.fields.colorpicker', array('name'=>$name,'setup'=>$setup)) }}

@else
            {{ View::make('admin::forms.fields.'.preg_replace('/(\[[^\]]+\])/','',$setup['type']), array('name'=>$name,'setup'=>$setup)) }}

@endif
@endif
@endforeach
        </fieldset>
@endif
        <fieldset>
            {{ View::make('admin::forms.generator.'.$type,array('form'=>$form,'id'=>$id,'setup'=>$schema['setup']['generator'][$type])) }}

        </fieldset>
        <fieldset>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </fieldset>
    {{ Form::close() }}

@endsection
@section('mscript')
{{ HTML::script('packages/nob/admin/js/tinymce/tinymce.min.js') }}
{{ HTML::script('packages/nob/admin/js/imgareaselect/scripts/jquery.imgareaselect.pack.js') }}
{{ HTML::script('packages/nob/admin/js/jquery.cycle.js') }}
{{ HTML::script('packages/nob/admin/js/jquery.start.js') }}
{{ HTML::script('packages/nob/admin/js/farbtastic/farbtastic.js') }}
{{ HTML::script('packages/nob/admin/js/bootstrap/bootstrap-datetimepicker.min.js') }}
{{ HTML::script('packages/nob/admin/js/bootstrap/bootstrap-datetimepicker.es.js') }}
{{ HTML::script('packages/nob/admin/js/encoder.js') }}
{{ HTML::script('packages/nob/admin/js/jquery-ui.min.js') }}
@endsection
@section('style')
{{ HTML::style('packages/nob/admin/js/farbtastic/farbtastic.css') }}
{{ HTML::style('packages/nob/admin/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('css/nob.css') }}
@endsection
@section('script')
<script>
var offset_x = {{ Config::get("schema.{$form}.setup.generator.{$type}.offset_x") }};
var offset_y = {{ Config::get("schema.{$form}.setup.generator.{$type}.offset_y") }};
var busy = false;
$(function(){
    $('body').find('.colorpicker').each(function(){
        $(this).bind({
            focus: function(){
                var sthis = $(this);
                $.farbtastic('#picker'+sthis.attr('id'),function(color){
                    $('#'+sthis.attr('id')).val(color);
                    $('#'+sthis.attr('id')).trigger('change');
                });
                $('#picker'+sthis.attr('id')).find('.farbtastic').hide().slideDown({
                    complete: function(){
                        sthis.filter('[data-style]').attr('style',sthis.attr('data-style'));
                    }
                });
            },
            blur: function(){
                var sthis = $(this);
                $('#picker'+sthis.attr('id')).find('.farbtastic').slideUp({
                    complete: function(){
                        sthis.attr('data-style',sthis.attr('style'));
                        sthis.removeAttr('style');
                    }
                });
            }
        });
    });
    $('body').on('click','button[data-command="preview"]',function(){
        if(busy) return;
        busy = true;
        $('#meme-content').find("#meme-dinamic-text").remove();
        var url = $(this).data('url');
        var datos = {};
        datos.text = $('*[name="meme[text]"]').val();
        datos.color = $('*[name="meme[color]"]').val();
        datos.size = $('*[name="meme[size]"]').val();
        datos.font = $('*[name="meme[font]"]').val();
        if(datos.text.length===0){ alert('Debe agregar un Texto.'); return false; }
        if(datos.color.length===0 || datos.color.length!==7){ alert('Debe agregar un Color valido.'); return false; }
        if(datos.size.length===0){ alert('Debe seleccionar un Tamaño de Fuente.'); return false; }
        if(datos.font.length===0){ alert('Debe seleccionar un Tipo de Fuente.'); return false; }
        datos.position = $('*[name="meme[position]"]').val();
        if(datos.position==='user') datos.offset_x = parseFloat($('*[name="position_x"]').val());
        if(datos.position==='user') datos.offset_y = parseFloat($('*[name="position_y"]').val());
        if(datos.position==='user') datos.width = parseFloat($('*[name="width"]').val());
        $('#meme-content').addClass('loading');
        $.ajax({
            url: url,
            type: 'post',
            data: datos
        }).done(function(data){
            busy = false;
            var url = "data:"+data.mimetype+";"+data.base+","+data.content;
            $('#meme-preview').delay(200).attr('src',url);
            $('#meme-content').removeClass('loading');
        });
    });
    $('body').on('change keyup','*[name="meme[text]"]',function(){
        if($(this).val()!=='') $('#meme-content').find("#meme-dinamic-text").find(".meme-text").html($(this).val());
    });
    $('body').on('change','*[name="meme[color]"]',function(){
        if($(this).val()!=='') $('#meme-content').find("#meme-dinamic-text").css({color: $(this).val()});
    });
    $('body').on('change','*[name="meme[size]"]',function(){
        if($(this).val()!=='') $('#meme-content').find("#meme-dinamic-text").css({fontSize: pt2px($(this).val())});
    });
    $('body').on('change','*[name="meme[font]"]',function(){
        if($(this).val()!=='') $('#meme-content').find("#meme-dinamic-text").css({fontFamily: "'"+$(this).val()+"'"});
    });
    $('body').on('click','button[data-command="selector"]',function(){
        if(busy) return;
        $('#meme-content').find("#meme-dinamic-text").remove();
        var url = $('#meme-content').data('start');
        var draggable = $('<div id="meme-dinamic-text"></div>');
        var draggableText = $('<div class="meme-text"></div>');
        var datos = {};
        datos.text = $('*[name="meme[text]"]').val();
        datos.color = $('*[name="meme[color]"]').val();
        datos.size = $('*[name="meme[size]"]').val();
        datos.font = $('*[name="meme[font]"]').val();
        if(datos.text.length===0){ alert('Debe agregar un Texto.'); return false; }
        if(datos.color.length===0 || datos.color.length!==7){ alert('Debe agregar un Color valido.'); return false; }
        if(datos.size.length===0){ alert('Debe seleccionar un Tamaño de Fuente.'); return false; }
        if(datos.font.length===0){ alert('Debe seleccionar un Tipo de Fuente.'); return false; }
        $('#meme-preview').attr('src',url);
        var w = ($('*[name="meme[position]"]').val()!=='user') ? 'auto' : parseFloat($('*[name="width"]').val());
        var h = ($('*[name="meme[position]"]').val()!=='user') ? 'auto' : parseFloat($('*[name="height"]').val());
        var t = ($('*[name="meme[position]"]').val()!=='user') ? (333-50)/2 : parseFloat($('*[name="position_y"]').val());
        var l = parseFloat($('*[name="position_x"]').val());
        draggable.css({
            fontFamily: "'"+datos.font+"'",
            fontSize: pt2px(datos.size),
            color: datos.color,
            width: w,
            height: h,
            top: t,
            left: l
        });
        if($('*[name="meme[position]"]').val()!=='user') draggable.css({left: pt2px(offset_x), right: pt2px(offset_x)});
        draggable.append(draggableText);
        draggableText.html(datos.text);
        $('#meme-content').append(draggable);
        draggable.draggable({
            containment: "parent",
            cursor: "crosshair",
            create: function(event,ui){
                $(this).height('auto');
            },
            stop: function(event,ui){
                $('*[name="position_x"]').val(ui.position.left);
                $('*[name="position_y"]').val(ui.position.top);
                $('*[name="width"]').val($(this).width());
                $('*[name="height"]').val($(this).height());
                $('*[name="meme[position]"]').val('user');
            }
        });
        draggable.resizable({
            containment:"parent",
            handles: "ne,se,sw,nw",
            minWidth: pt2px(120),
            stop: function(event,ui){
                $(this).css({height:"auto"});
                $('*[name="position_x"]').val(ui.position.left);
                $('*[name="position_y"]').val(ui.position.top);
                $('*[name="width"]').val(parseInt(ui.size.width)+2);
                $('*[name="height"]').val($(this).height());
                $('*[name="meme[position]"]').val('user');
                $(this).width(parseInt(ui.size.width)+2);
                $(this).css({top:parseInt(ui.position.top),left:parseInt(ui.position.left)});
            }
        });
    });
    setTimeout(function(){
        if(busy) return;
        busy = true;
        $('#meme-content').find("#meme-dinamic-text").remove();
        var url = $('button[data-command="preview"]').data('url');
        var datos = {};
        datos.text = $('*[name="meme[text]"]').val();
        datos.color = $('*[name="meme[color]"]').val();
        datos.size = $('*[name="meme[size]"]').val();
        datos.font = $('*[name="meme[font]"]').val();
        if(
            datos.text.length===0 ||
            datos.color.length===0 ||
            datos.color.length!==7 ||
            datos.size.length===0 ||
            datos.font.length===0
        ){ busy = false; return false; }
        datos.position = $('*[name="meme[position]"]').val();
        if(datos.position==='user') datos.offset_x = parseFloat($('*[name="position_x"]').val());
        if(datos.position==='user') datos.offset_y = parseFloat($('*[name="position_y"]').val());
        if(datos.position==='user') datos.width = parseFloat($('*[name="width"]').val());
        $('#meme-content').addClass('loading');
        $.ajax({
            url: url,
            type: 'post',
            data: datos
        }).done(function(data){
            busy = false;
            var url = "data:"+data.mimetype+";"+data.base+","+data.content;
            $('#meme-preview').delay(200).attr('src',url);
            $('#meme-content').removeClass('loading');
        });
    },100);
});
function px2pt(px){
    return 3*px/4;
}
function pt2px(pt){
    return 4*pt/3;
}
</script>
@endsection
