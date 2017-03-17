            <div{{
                HTML::classes([
                    'form-group',
                    'has-error' => ($errors->has($type.'s') || $errors->has($type.'0'))
                ])
            }}>
                <div>
                    <div class="fileupload-buttonbar" id="{{ $type }}sbrowser">
                    	<a href="javascript:;" class="browser btn btn-success" data-browser="#{{ $type }}sbrowser">
                            <i class="fa fa-plus"></i>&nbsp; {{ trans("admin::admin.button.form.browser") }}
                        </a>
                        {{ Form::file($type.'s[]',array_merge(array('class'=>'multifile hidden','data-principal'=>'true'),$setup[$type]['params'])) }}

                    </div>
@if($errors->has($type.'s'))
@foreach ($errors->get($type.'s') as $messages)
                    <span class="help-block">{{ implode('; ',(array) $messages) }}</span>
@endforeach
@endif
@if($errors->has($type.'0'))
@foreach ($errors->get($type.'0') as $field => $messages)
                    <span class="help-block">{{ implode('; ',(array) $messages) }}</span>
@endforeach
@endif
                </div>
@if(array_key_exists('info',$setup[$type]))
                <div class="alert alert-info">{{
                    text2htmlbr(get_title_lang($setup[$type]['info'], $language))
                }}</div>
@endif
            </div>