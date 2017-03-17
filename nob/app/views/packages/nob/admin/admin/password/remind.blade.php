<!DOCTYPE html>
<html>
<head>
@include('admin::commons.meta')
@yield('style')
</head>
<body class="loginclass">
    <div class="expandido">
        {{ NobForm::open(array('route'=>'admin.password.send','method'=>'post','class'=>'form login-form')) }}

@include('admin::commons.logo')
            {{ NobForm::text('email',false,Input::old('email'),array('placeholder' => trans("admin::admin.placeholder.email"),'id'=>'inputUser')) }}

@if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
@elseif(Session::has('status'))
            <div class="alert alert-success">
                {{ Session::get('status') }}
            </div>
@endif
            <div class="form-group">
                <a href="{{ route('admin.login') }}" class="btn btn-link pull-left">{{ trans("admin::admin.button.login") }}</a>
                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-send"></i>&nbsp; {{ trans("admin::admin.button.send") }}
                </button>
            </div>
        {{ Form::close() }}
    </div>
</body>
</html>