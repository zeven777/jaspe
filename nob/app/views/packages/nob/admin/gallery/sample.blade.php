<div class="image-resampled" data-modal="modal">
    {{ HTML::image(route('admin.system.gallery.sample.load',array('id' => $id)),$file['title'], array('title' =>$file['title'],'id'=>'image-resize','data-url'=>route('admin.system.gallery.sample.load',array('id' => $id)))) }}
</div>
<div class="image-parameters">
    {{ Form::open(array('route'=>array('admin.system.gallery.update','id'=>$id),'class'=>'form ajax','data-replace-inner'=>'#data-done','data-type-return'=>'html')) }}
        <h4>{{ trans("admin::admin.title.form.modal.image.edit") }}</h4>
        <p class="form-group">
            {{ Form::label('title', trans("admin::admin.labels.form.modal.gallery.title")) }}

            {{ Form::text('title',$file['title'],array('class'=>'form-control','id'=>'title')) }}

        </p>
@if($location)
@foreach($location as $l=>$s)
@if($s)
@foreach($s as $sl=>$slset)
@if(array_key_exists('fields',$slset) && !empty($slset['fields']))
        <div class="{{ $l."_".$sl }} hidden">
@foreach($slset['fields'] as $f=>$fs)
            <div class="form-group">
                {{ Form::label("{$sl}_{$f}",$fs['title']) }}

                {{ Form::text("{$sl}_{$f}",(array_key_exists($f,$file)) ? $file[$f]:'',array('class'=>$fs['class'],'id'=>$f,'maxlength'=>$fs['maxlength'],'placeholder'=>$fs['placeholder'])) }}

            </div>
@endforeach
        </div>
@endif
@endforeach
@endif
@endforeach
@endif
        <p class="form-group">
            {{ Form::label('color', trans("admin::admin.labels.form.modal.gallery.bg-color")) }}

            {{ Form::text('color','#FFFFFF',array('class'=>'form-control colorpicker','id'=>'color','maxlength'=>'7')) }}

            <div id="pickercolor"></div>
        </p>
        <h4 class="no-top">{{ trans("admin::admin.title.form.modal.crop") }}</h4>
@if($location)
        <p class="form-group">
            <select id="edit-image" class="form-control" name="location">
                <option selected="selected">{{ trans("admin::admin.labels.form.modal.gallery.select") }}</option>
@foreach($location as $l=>$s)
@if($s)
                <optgroup label="{{ ucfirst($l) }}">
@foreach($s as $sl=>$slset)
@if($slset)
@foreach($slset['sizes'] as $n=>$size)
@if(array_key_exists('type',$slset) && $slset['type']==='gallery')
@for($j=0;$j<$slset['limit'];$j++)
                    <option data-sizee="{{ $resolution }}"
                            data-fields="{{ $l."_".$sl }}"
                            data-limit="{{ $slset['limit'] }}"
                            value="{{ $l.'_'.$sl.'_'.($j+1) }}"
                            data-size="{{ $size }}">
                        {{ ucfirst($l) }} {{ ucfirst($sl) }} {{ $size }} {{ ($j+1) }}
                    </option>
@endfor
@else
                    <option data-sizee="{{ $resolution }}"
                            data-fields="{{ $sl }}"
                            data-limit="{{ $slset['limit'] }}"
                            value="{{ $l.'_'.$sl.'_'.($n+1) }}"
                            data-size="{{ $size }}">
                        {{ ucfirst($l) }} {{ ucfirst($sl) }} {{ $size }}
                    </option>
@endif
@endforeach
@endif
@endforeach
                </optgroup>
@endif
@endforeach
            </select>
        </p>
@endif
        {{ Form::hidden('id',$id) }}
        {{ Form::hidden('x1') }}
        {{ Form::hidden('y1') }}
        {{ Form::hidden('x2') }}
        {{ Form::hidden('y2') }}
        {{ Form::hidden('w') }}
        {{ Form::hidden('h') }}
        {{ Form::hidden('n') }}
        {{ Form::hidden('dst') }}
        <p class="text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}</button>
        </p>
    {{ Form::close() }}

    <div class="clearfix">&nbsp;</div>
    <div id="data-done"></div>
</div>