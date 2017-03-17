            <div class="form-group{{ ($errors->has($name)) ? ' error':'' }}">

                <div class="panel-group no-margin" id="relation" role="tablist">

@if( count($collection) > 0 )
                    <div class="panel panel-info" id="{{ $relation }}">

                        @include('admin::forms.fields.relation.panel.head')

                        @include('admin::forms.fields.relation.panel.collection')

                    </div>
@else
                    <div class="alert alert-danger no-margin">

                        <button type="button" class="close" data-dismiss="alert">&times;</button>

                        <h4>{{ trans("admin::admin.labels.sorry") }}!</h4>

                        {{
                            trans("admin::admin.prefix.form.relation.notexists") }} {{
                            (p_schema("{$relation}.setup.title")) ?
                                get_title_lang(p_schema("{$relation}.setup.title"), $language) :
                                ucfirst($relation)
                        }}

                    </div>
@endif
                    <div class="clearfix"></div>

@if($errors->has($name))
                    <span class="help-block">{{ $errors->get($name) }}</span>

@endif
                </div>

            </div>
@section('relationScript')
@if($setup["type"] === 'Infinite')
<script>
var relationsTimeout;
$(function(){
    $('body').on('change','#list-infinite .list-parent-group input[type="checkbox"]',function(e){
        var sthis = $(this);
        var level = sthis.parents('div.list-parent-group').data('level');
        var values = [];
        var fields = sthis.parents('div.list-parent-group').find(':checkbox:checked').serializeArray();
        $.each(fields,function(){
            values.push(this.value);
        });
        var data = {
            level: parseInt(level + 1),
@if($model->exists)
            not_id: {{ $model->id }},
@endif
            id: values
        };
        clearTimeout(relationsTimeout);
        $('.relations input#infinite-lvl[type="hidden"]').val(0);
        $.ajax({
            url: "{{ route('admin.form.relation',['form' => $name,'type' => 'infinite']) }}",
            type: "POST",
            data: data,
            dataType: "json"
        }).done(function(data){
            $('#list-infinite .list-parent-group[data-level="'+level+'"] ~ div').remove();
            if(data.ok && data.data.length > 0){
                var newList = $('<div class="list-parent-group row" data-level="'+parseInt(level + 1)+'"></div>');
                $('<div class="clearfix" />').appendTo('#list-infinite');
                $('<div class="h4">{{ $setup["title"] }} nivel '+parseInt(level + 1)+'</div>').appendTo('#list-infinite');
                newList.appendTo('#list-infinite');
                var COL = $('<div class="col-xs-12 col-sm-6 col-md-4"></div>');
                var IG = $('<div class="input-group"></div>');
                var IGA = $('<span class="input-group-addon"></span>');
                var label = $('<span class="form-control"></spa>');
                var check = $('<input type="checkbox" data-parent="#{{ $name }}" name="{{ $name }}[]" />');
                $.each(data.data,function(i,v){
                    var newCOL = COL.clone();
                    var newIG = IG.clone();
                    var newIGA = IGA.clone();
                    var newLabel = label.clone();
                    var newCheck = check.clone().attr('value',this._key);
                    newLabel.append(this._head);
                    newIGA.append(newCheck);
                    newIG.append(newIGA);
                    newIG.append(newLabel);
                    newCOL.append(newIG);
                    newList.append(newCOL);
                });
            }
            var newLevel = $('#list-infinite .list-parent-group:has(:checkbox:checked):last').data('level');
            $('.relations input[type="hidden"][id="infinite-lvl"]').val(newLevel);
        });
    });
});
</script>
@endif
@stop