<!DOCTYPE html>
<html>
<head>
@include('admin::commons.meta')
</head>
<body>
@include('admin::commons.header')

<div class="container-fluid">

    @include('admin::commons.section.sidebar')

@if(
    Auth::check() &&
    ! is_null($administrator) &&
    (
        $administrator->tipo === 'user' ||
        (
            in_array($administrator->tipo,['sadmin','admin']) &&
            (
                is_null($sessionTable) || p_schema('admin.setup.session')
            )
        )
    )
)
    <div class="col-md-9 pull-right panel-body">
@else
    <div>
@endif
@yield('content')
    </div>
</div>
@include('admin::commons.footer')

@yield('script')
</body>
</html>
