                    <textarea class="hidden" name="{{ $name }}" data-type="points"></textarea>
@if(intval(p_schema($form.".setup.image.params.limit")) == 1 && $action === 'form_edit')
@if(!is_null($model->images))
                    <div class="alert alert-info">
                        <p class="points-content" id="points-content">
                            <img data-type="points" src="{{ url('files/'.$form.'/'.substr($form,0,3).$setup['image']."-".$model->images->name) }}" />
                        </p>
                        <div class="clearfix">&nbsp;</div>
                        <script>
                            points = {{ (!empty($model->{$name})) ? $model->{$name} : '[]' }};
                        </script>
                        <label class="form-label">{{ trans("admin::admin.labels.form.points") }}</label>
                        <div class="clearfix"></div>
                        <div id="list-points" class="list-points"></div>
                    </div>
@else
                    <div class="alert alert-danger">
                        {{ trans("admin::admin.message.form.module.point.require") }}
                    </div>
@endif
@elseif(intval(p_schema($form.".setup.image.params.limit")) == 1 && $action === 'form_create')
                    <div class="alert alert-info">
                        {{ trans("admin::admin.message.form.module.points.start") }}
                    </div>
@else
                    <div class="alert alert-danger">
                        {{ trans("admin::admin.message.form.module.points.setup") }}
                    </div>
@endif
@section('modulePointsScript')
@if(intval(p_schema($form.".setup.image.params.limit")) == 1 && $action === 'form_edit')
<script>
var point;
var points = [];
$(function(){
    $('body').on('click','.points-content img[data-type="points"]',function(e){
        e.preventDefault();
        var Sthis = $(this);
        var x = e.pageX, y = e.pageY;
        var posX = parseInt(Sthis.offset().left);
        var posY = parseInt(Sthis.offset().top);
        bootbox.confirm('{{ trans("admin::admin.message.form.js.module.point.add") }}',function(r){
            if(!r) return true;
            point = {};
            point.left  = (((x-posX)*100)/Sthis.width()).toFixed(2)+"%";
            point.top = (((y-posY)*100)/Sthis.height()).toFixed(2)+"%";
            bootbox.prompt({
                title: '{{ trans("admin::admin.title.form.module.point.new") }}',
                value: '',
                placeholder: '{{ trans("admin::admin.placeholder.form.module.point.title") }}',
                callback: function(result) {
                    if(result === null) return;
                    point.title = Encoder.htmlEncode(result);
                    points.push(point);
                    $('body').trigger('points.close');
                }
            });
        });
    });
    $('body').on('points.close',function(e){
        setPointsContainer();
    });
    $('body').on('mouseover','#list-points > ul > li',function(e){
        $('#points-content a:nth('+$(this).index()+')').addClass('hover');
    });
    $('body').on('mouseout','#list-points > ul > li',function(e){
        $('#points-content a').removeClass('hover');
    });
    $('body').on('click','#list-points > ul > li',function(e){
        $('#points-content a:nth('+$(this).index()+')').remove();
        points.splice($(this).index(),1);
        $(this).remove();
        $('textarea[data-type="points"]').val(JSON.stringify(points));
    });
    function addPoint(point){
        $('#list-points > ul').append('<li title="{{ trans("admin::admin.title.form.module.point.delete") }}"><i class="fa fa-remove"></i> <span>'+point.title+'</span></li>');
        $('#points-content').append('<a href="#" data-title="'+point.title+'" style="top: '+point.top+'; left: '+point.left+'" />');
    }
    function setPointsContainer(){
        $('textarea[data-type="points"]').val(JSON.stringify(points));
        $('#list-points').empty();
        $('#points-content a').remove();
        $('#list-points').append('<ul />');
        $.each(points,function(){
            addPoint(this);
        });
    }
    setPointsContainer();
});
</script>
@endif
@stop