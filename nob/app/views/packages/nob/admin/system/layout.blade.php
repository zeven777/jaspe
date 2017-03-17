@extends('admin::commons.layout')
@section('content')
    <div class="media">
        <div class="media-body media-middle">
            <h3 class="no-margin">{{ trans("admin::admin.title.form.system.subtitle") }}</h3>
        </div>
        <div class="media-right no-wrap">
            <a href="{{ route('admin.system.environment.new') }}" class="btn btn-primary">
                <i class="fa fa-file"></i>&nbsp; {{ trans("admin::admin.button.form.new") }}
            </a>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
@if( count((array) app('config')->get('app.locales', ['es'])) > 1 )
    <ul class="nav nav-tabs nav-locales">
@foreach( app('config')->get('app.locales') as $lang )
        <li role="presentation"{{
            HTML::classes([
                'active' => $translate === $lang
            ])
        }}><a href="{{ route('admin.translate.language',$lang) }}">{{ trans("admin::admin.language.{$lang}") }}</a></li>
@endforeach
    </ul>
    <div class="clearfix">&nbsp;</div>
@endif
    <table width="100%" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{ trans("admin::admin.placeholder.name") }}</th>
                <th>{{ trans("admin::admin.placeholder.value") }}</th>
                <th class="options">{{ trans("admin::admin.labels.form.options") }}</th>
            </tr>
        </thead>
        <tbody>
@foreach( $vars as $name => $value )
            <tr>
                <td>{{ $name }}</td>
                <td>
@if( in_array($action,array('system_list','system_add')) || (isset($edit) && $edit!==$name) )
@if( in_array($name,(array) p_config('system.boolean')) )
                    {{ trans("admin::admin.labels.form.system.".($value[$translate] ? "yes":"no")) }}
@elseif( in_array($name,(array) p_config('system.textarea')) )
                    {{ text2htmlbr($value[$translate], ' <br />', false) }}
@else
                    {{ $value[$translate] }}
@endif
@else
                    {{ Form::open(array('route'=>['admin.system.environment.update','name'=>$name],'class'=>'form')) }}

@if( in_array($name,(array) p_config('system.textarea')) )
                        {{ Form::textarea($name,$value[$translate],array('class'=>'form-control required')) }}

@elseif( in_array($name,(array) p_config('system.datetime')) )
                        <div id="{{ $name }}datetimepicker" class="input-group datetimepicker input-append date" data-format="{{ $format }}">
                            {{ Form::text($name,$value[$translate],array('class'=>'form-control', 'id' => $name)) }}

                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        </div>

@elseif( in_array($name,(array) p_config('system.boolean')) )
                        <label class="radio-inline">{{
                            Form::radio($name,'yes',($value[$translate] == 1)) }} {{ trans("admin::admin.labels.form.system.yes")
                        }}</label>

                        <label class="radio-inline">{{
                            Form::radio($name,'no',($value[$translate] == 0)) }} {{ trans("admin::admin.labels.form.system.no")
                        }}</label>

@else
                        {{ Form::text($name,$value[$translate],array('class'=>'form-control required')) }}

@endif
                        <div class="clearfix">&nbsp;</div>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}
                        </button>
                        <a href="{{ route('admin.system.environment.list') }}" class="btn btn-danger">
                            <i class="fa fa-remove"></i>&nbsp; {{ trans("admin::admin.button.cancel") }}
                        </a>
                    {{ Form::close() }}

@endif
                </td>
                <td>
@if( in_array($action,array('system_list','system_add')) || (isset($edit) && $edit!==$name) )
                    <a href="{{ route('admin.system.environment.edit',compact('name')) }}" class="btn btn-success" title="{{ trans("admin::admin.button.edit") }}">
                        <i class="fa fa-pencil"></i>
                    </a>
@endif
                </td>
            </tr>
@endforeach
@if( $action === 'system_add' )
            <tr>
                <td colspan="2">
                    {{ NobForm::open(array('route'=>array('admin.system.environment.store'),'class'=>'form','autocomplete'=>'off')) }}

                        <div class="alert alert-info input-inline-level">{{ trans("admin::admin.title.form.system.var.new") }}</div>
                        <div class="row">
                            <div class="col-md-4 col-lg-3">
                                {{ NobForm::text('name',false,Input::old('name'),array('class'=>'required','placeholder'=>trans("admin::admin.placeholder.name"))) }}
                            </div>
                            <div class="col-md-8 col-lg-9">
                                {{ NobForm::text('value',false,Input::old('value'),array('class'=>'required','placeholder'=>trans("admin::admin.placeholder.value"))) }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i>&nbsp; {{ trans("admin::admin.button.save") }}
                        </button>
                        <a href="{{ route('admin.system.environment.list') }}" class="btn btn-danger">
                            <i class="fa fa-remove"></i>&nbsp; {{ trans("admin::admin.button.cancel") }}
                        </a>
                    {{ NobForm::close() }}

                </td>
                <td></td>
            </tr>
@endif
        </tbody>
    </table>
@stop
@if($action === 'system_edit')
@section('mscript')
{{ HTML::style('packages/nob/admin/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::script('packages/nob/admin/bootstrap/datetimepicker/js/moment.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js') }}
@stop
@section('script')
<script>
$(function(){
    $('.datetimepicker').each(function(){
        $('#'+$(this).attr('id')).datetimepicker({
            format: $('#'+$(this).attr('id')).data('format'),
            locale: language.lang,
@if( p_config('system.range.to') && $edit === p_config('system.range.from') )
            maxDate: '{{ $vars[p_config("system.range.to")] }}',
@endif
@if( p_config('system.range.from') && $edit === p_config('system.range.to') )
            minDate: '{{ $vars[p_config("system.range.from")] }}',
@endif
            dayViewHeaderFormat: 'MMMM YYYY'
        });
    });
});
</script>
@stop
@endif