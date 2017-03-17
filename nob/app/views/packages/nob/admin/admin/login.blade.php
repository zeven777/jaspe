<!DOCTYPE html>
<html>
<head>
@include('admin::commons.meta')

</head>
<body class="loginclass">
    <div class="expandido">
        {{ NobForm::open(array('route'=>'admin.login','class' => 'form login-form')) }}

@include('admin::commons.logo')
            {{ NobForm::text('username',false,Input::old('username'),['placeholder' => trans("admin::admin.placeholder.username")]) }}

            {{ NobForm::password('password',false,['placeholder' => trans("admin::admin.placeholder.password.label")]) }}

@if(Session::has('error'))
            <div class="alert alert-danger">
                <i class="fa fa-warning"></i>
                {{ Session::get('error') }}
            </div>
@elseif(Session::has('status'))
            <div class="alert alert-success">
                <i class="fa fa-check"></i>
                {{ Session::get('status') }}
            </div>
@endif
            <div class="form-group">
                <a href="{{ route('admin.password.remind') }}" class="btn btn-link pull-left">{{ trans("admin::admin.button.password.recovery") }}</a>
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-sign-in"></i>&nbsp; {{ trans("admin::admin.button.send") }}
                </button>
            </div>
        {{ NobForm::close() }}

    </div>
@section('style')
</body>
</html>
