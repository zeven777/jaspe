@extends('admin::commons.modal')
@section('title')
{{ trans("admin::admin.title.change") }}
@stop
@section('body')
    {{ NobForm::open(array('route'=>'admin.save.password','class'=>'form ajax','data-replace-inner'=>'.modal-content','data-type-return'=>'html')) }}

        {{ NobForm::password('oldpass',false,['placeholder' => trans("admin::admin.placeholder.password.current")]) }}

        {{ NobForm::password('newpass',false,['placeholder' => trans("admin::admin.placeholder.password.new")]) }}

        {{ NobForm::password('confirmpass',false,['placeholder' => trans("admin::admin.placeholder.password.confirm")]) }}

        <div class="text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}</button>
        </div>
    {{ NobForm::close() }}

@stop