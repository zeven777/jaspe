<div class="image-resampled">
    {{
        HTML::image(
            route('admin.form.loadresampled',array($form,$file->getKey(),100)),
            $file->foot,
            array(
                'title'           => $file->foot,
                'id'              => 'image-resize',
                'data-sample-url' => route('admin.form.loadresampled', array($form,$file->getKey()) )
            )
        )
    }}
</div>
<div class="image-parameters">
    {{ Form::open(array('route'=>array('admin.form.imageresampled',$form),'class'=>'form ajax','data-replace-inner'=>'#data-done','data-type-return'=>'html')) }}
        <h4>{{ trans("admin::admin.title.form.modal.image.edit") }}</h4>
        <div class="form-group">
            {{ Form::label('foot', trans("admin::admin.labels.form.modal.sample.foot")) }}
            {{ Form::textarea('foot',$file->foot,array('class'=>'form-control','id'=>'foot')) }}
        </div>
@if($fields)
@foreach($fields as $f)
        <div class="form-group">
            {{ Form::label($f, ucfirst($f)) }}

            {{ View::make('admin::system.fields.'.preg_replace('/(\[[^\]]+\])/','',$archivo[$f]['type']),array('setup'=>$archivo[$f],'name'=>$f,'model'=>$file)) }}

        </div>
@endforeach
@endif
        <div class="form-group">
            <h4 class="no-top">{{ trans("admin::admin.title.form.modal.crop") }}</h4>
@foreach($sizes as $n => $s)
            <div style="display: inline-block;">
@if( is_array($s) )
                <button type="button" class="btn btn-default edit-image"
                        data-sizee="{{ $sizeE }}"
                        data-size="{{ $s['landscape'] }}"
                        data-num="{{ substr($n,4,strlen($n)) }}">
                    <i class="fa fa-crop"></i>&nbsp; {{ $s['landscape'] }}
                </button>
                <button type="button" class="btn btn-default edit-image"
                        data-sizee="{{ $sizeE }}"
                        data-size="{{ $s['portrait'] }}"
                        data-num="{{ substr($n,4,strlen($n)) }}">
                    <i class="fa fa-crop"></i>&nbsp; {{ $s['portrait'] }}
                </button>
@else
                <button type="button" class="btn btn-default edit-image"
                        data-sizee="{{ $sizeE }}"
                        data-size="{{ $s }}"
                        data-num="{{ substr($n,4,strlen($n)) }}"
                        data-free="{{
                            starts_with(p_schema("{$form}.setup.sizes.".substr($n,-1)), 'p') ? 'free':''
                        }}">
                    <i class="fa fa-crop"></i>&nbsp; {{
                        starts_with(p_schema("{$form}.setup.sizes.".substr($n,-1)), 'p') ?
                            trans("admin::admin.labels.form.modal.sample.free") : $s
                    }}
                </button>
@endif
@if( starts_with(p_schema("{$form}.setup.sizes.".substr($n,-1)), 'p') )
                <div class="clearfix">&nbsp;</div>
                <div class="text-center">
                    <span>{{ trans("admin::admin.labels.form.modal.sample.zoom") }}</span>
                    <div class="clearfix"></div>
                    <button type="button" class="btn btn-default" data-zoom="plus"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-default" data-zoom="minus"><i class="fa fa-minus"></i></button>
                </div>
@endif
            </div>
@endforeach
        </div>
        {{ Form::hidden('form',$form) }}
        {{ Form::hidden('id',$file->getKey()) }}
        {{ Form::hidden('x1') }}
        {{ Form::hidden('y1') }}
        {{ Form::hidden('x2') }}
        {{ Form::hidden('y2') }}
        {{ Form::hidden('w') }}
        {{ Form::hidden('h') }}
        {{ Form::hidden('n') }}
        {{ Form::hidden('z',100) }}
        <div class="text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}</button>
        </div>
    {{ Form::close() }}

    <div class="clearfix">&nbsp;</div>
    <div id="data-done"></div>
</div>