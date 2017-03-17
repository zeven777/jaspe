@if( $schema['setup']['type'] !== 'text' && array_key_exists('image',$schema['setup']) && array_key_exists('preview',$schema['setup']))
@if( $model->exists && ! empty($model->previewImage) )
            <div class="image-preview text-center">
                <img src="{{ $model['previewImage'] }}" alt="" />
            </div>
@endif
@endif