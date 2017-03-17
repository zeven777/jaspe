<!DOCTYPE html>
<html>
<head>
@include('admin::commons.meta')
@yield('style')
</head>
<body class="loginclass">
    <div class="expandido">
        <form action="{{ route('admin.password.update') }}" method="post" class="form login-form">
            <input type="hidden" name="token" value="{{ $token }}">
@include('admin::commons.logo')
            {{ NobForm::text('email',false,null,array('placeholder' => trans("admin::admin.placeholder.email"),'id'=>'inputUser')) }}

            {{ NobForm::password('password',false,array('placeholder' => trans("admin::admin.placeholder.password.new"),'id'=>'inputUser')) }}

            {{ NobForm::password('password_confirmation',false,array('placeholder' => trans("admin::admin.placeholder.password.confirm"),'id'=>'inputUser')) }}

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
                    <i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}
                </button>
            </div>
        </form>
    </div>
<style type="text/css">
.loginclass .form {
    min-height: 100px;
}
.form-horizontal {
    max-width: 420px;
    padding: 29px;
    margin: 20px auto 0;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
</style>
</body>
</html>