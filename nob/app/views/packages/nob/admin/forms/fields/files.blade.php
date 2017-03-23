@if( $files->count() )
            <div class="form-group file-container" id="{{ $list }}s">
                <div>
                    <div class="file-gallery">
@foreach($files as $file)
                        <div class="file {{ $list }} thumbnail text-center">
@if( p_schema("{$form}.setup.{$list}.params.highlight") && p_schema("{$form}.setup.{$list}.params.highlight") > 0 )
                            <div class="highlighted" data-id="{{ $file->getKey() }}">
@if( $file->highlighted === 'yes' )
                                <i class="fa fa-star" title="{{ trans("admin::admin.title.form.file.highlighted") }}"></i>
@else
                                <i class="fa fa-star-o" title="{{ trans("admin::admin.title.form.file.highlight") }}"></i>
@endif
                            </div>
@endif
@if( in_array($list,['image','text']) )
                            {{
                                HTML::image(
                                    '/files/'.$form.'/avt-'.$file->name,
                                    $file->foot,
                                    (
                                        $list === 'image' &&
                                        (
                                            is_null(p_schema("{$form}.setup.image.params.cropped")) ||
                                            p_schema("{$form}.setup.image.params.cropped")
                                        )
                                    ) ?
                                        array_merge_recursive([
                                            'title'       => $file->foot,
                                            'class'       => 'img-polaroid',
                                        ],[
                                            'data-url'    => route('admin.form.image',[$form, $file->getKey()]),
                                            'data-toggle' => 'modal',
                                            'data-target' => '#Modal'
                                        ]) :
                                        [
                                            'title'       => $file->foot,
                                            'class'       => 'img-polaroid',
                                        ]
                                )
                            }}
@else
                            {{
                                HTML::image(
                                    '/packages/nob/admin/cms/img/type/'.$setup[$list]['params']['output'].'.jpg',
                                    $file->foot,
                                    array(
                                        'title' => $file->foot,
                                        'class' => 'img-polaroid'
                                    )
                                )
                            }}
@endif
                            <div class="group">
                                {{ Form::checkbox('file[]',$file->getKey(),false,array('class'=>'input-inline-level')) }}

@if( p_schema("{$form}.setup.{$list}.params.downloable") )
@if( $list === 'image' )
                                <a href="{{ url('/files/'.$form.'/'.substr($form,0,3).p_schema("{$form}.setup.{$list}.params.downloable").'-'.$file->name) }}" class="edit" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("admin::admin.title.form.file.view") }}">
                                    <i class="fa fa-cloud-download"></i>
                                </a>
@else
                                <a href="{{ url('/files/'.$form.'/'.$file->name) }}" class="edit" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans("admin::admin.title.form.file.view") }}">
                                    <i class="fa fa-cloud-download"></i>
                                </a>
@endif
@endif
@if( p_schema("{$form}.setup.{$list}.params.copyable") )
                                <a href="javascript:;" class="clipboard" data-toggle="clipboard" data-text="{{
                                    '/files/'.$form.'/'.substr($form,0,3) . p_schema("{$form}.setup.{$list}.params.copyable").'-'.$file->name
                                }}" title="Copiar al portapapeles">
                                    <i class="fa fa-copy"></i>
                                </a>
@endif
@if( $list === 'image' && array_key_exists('generator',$setup) )
@foreach($setup['generator'] as $gen=>$gsetup)
                                <a title="Generador de {{ $schemas[$gsetup['bind']]['setup']['title'] }}" href="{{
                                    URL::action('Nob\Admin\Controllers\GeneratorController@index',array('type'=>$gen,'form'=>$file->table,'id'=>$file->id)) 
                                }}">
                                    <i class="icon icon-{{ $gsetup['icon'] }}"></i>
                                </a>
@endforeach
@endif
                            </div>
                        </div>
@endforeach
                    </div>
                    <div class="clearfix"></div>
@if( p_schema("{$form}.setup.{$list}.params.limit") && p_schema("{$form}.setup.{$list}.params.limit") > 1 )
                    <button type="button" class="btn btn-default" data-button data-list="#{{ $list }}s .file-gallery" data-role="select">
                        <i class="fa fa-check-square-o"></i>&nbsp; {{ trans("admin::admin.button.form.file.select") }}
                    </button>
                    <button type="button" class="btn btn-default" data-button data-list="#{{ $list }}s .file-gallery" data-role="unselect">
                        <i class="fa fa-square-o"></i>&nbsp; {{ trans("admin::admin.button.form.file.unselect") }}
                    </button>
@endif
                    <button type="button" class="btn btn-danger" data-button data-list="#{{ $list }}s .file-gallery" data-role="delete">
                        <i class="fa fa-trash"></i>&nbsp; {{ trans("admin::admin.button.form.file.delete") }}
                    </button>
@if(
    $list === 'image' &&
    (
        is_null(p_schema("{$form}.setup.image.params.cropped")) ||
        p_schema("{$form}.setup.image.params.cropped")
    )
)
                    <div class="clearfix">&nbsp;</div>
                    <div class="alert alert-info">
                        {{ trans("admin::admin.message.form.file.more") }}
                    </div>
@endif
                </div>
            </div>
@endif