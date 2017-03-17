    <div id="cycle" data-modal="modal" data-title="{{ $title }}" class="gallery-mode">
@foreach($files as $i=>$file)
        <div class="item" data-id="{{ $file->getKey() }}"{{ ($i==0) ? ' data-active="active"':'' }}>
            {{ HTML::image(route('admin.form.loadgallery',array('form'=>$form,'id'=>$file->getKey())),$file->foot, array('title'=>$file->foot)) }}
@if(!empty($file->foot))
            <div class="filefoot">
                {{ $file->foot }}
            </div>
@endif
        </div>
@endforeach
    </div>
    <div class="panel-body text-center">
@if($schema['setup']['image']['params']['maxlength'] > 1)
        <a href="javascript:;" id="cycle-prev" class="btn btn-info"><i class="fa fa-chevron-left"></i></a>
@endif
@if(
    is_null(p_schema($file->form . ".setup.image.params.cropped")) ||
    p_schema($file->form . ".setup.image.params.cropped")
)
        <button type="button" id="edit-image" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp; {{ trans("admin::admin.button.edit") }}</button>
@endif
@if($schema['setup']['image']['params']['maxlength'] > 1)
        <a href="javascript:;" id="cycle-next" class="btn btn-info"><i class="fa fa-chevron-right"></i></a>
@endif
    </div>
