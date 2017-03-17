            <div class="form-group{{ ($errors->has($name)) ? ' has-error':'' }}">
                <label class="form-label">{{ (array_key_exists('legend',$setup)) ? get_title_lang($setup['legend'], $language) : ucfirst($name) }}</label>
                <div class="module{{ ucfirst($setup['module']) }}">
                    @include('admin::forms.fields.module.'.$setup['module'])

@if($errors->has($name))
@foreach($errors->get($name) as $error)
                    <span class="help-block">{{ $error }}</span>
@endforeach
@endif
                </div>
            </div>