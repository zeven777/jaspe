                    <div class="input-prepend input-append">
                        <button class="btn btn-primary"
                                role="iconpicker"
                                name="{{ $name }}"
                                data-iconset="fontawesome"
                                data-icon="{{ ($model->exists) ? $model->{$name} : '' }}"
                                data-placement="right">
                        </button>
                    </div>
@section('moduleFontawesomeScript')
{{ HTML::script('packages/nob/admin/bootstrap/iconpicker/js/iconset/iconset-fontawesome-4.7.0.min.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/iconpicker/js/bootstrap-iconpicker.min.js') }}
@stop
@section('moduleFontawesomeStyle')
{{ HTML::style('packages/nob/admin/bootstrap/iconpicker/css/bootstrap-iconpicker.min.css') }}
@stop