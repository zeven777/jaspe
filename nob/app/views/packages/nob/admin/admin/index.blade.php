@extends('admin::commons.layout')
@section('content')
            <div class="text-center">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>
@if(
    File::exists(public_path('img/adminlogo.png')) &&
    (
        is_null(p_schema("admin.setup.session")) ||
        ( $administrator->tipo === 'admin' && $sessionTable && $sessionTable->tipo === 'admin' )
    )
)
                    <img src="{{ url('img/adminlogo.png') }}" alt="{{ p_config('app.project')}}" />
@endif
                </p>
                <h3>{{ trans("admin::admin.title.panel") }}</h3>
            </div>
@stop