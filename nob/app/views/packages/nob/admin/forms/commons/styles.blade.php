{{ HTML::style('packages/nob/admin/imgareaselect/css/imgareaselect-default.css') }}
{{ HTML::style('packages/nob/admin/spectrum/spectrum.css') }}
{{ HTML::style('packages/nob/admin/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css') }}
@if(
    isset($form) &&
    array_where(p_schema("{$form}.fields"),function($field, $setup){
        return array_key_exists('api',$setup) && $setup['api'] === 'googlefonts';
    })
)
<link media="all" type="text/css" rel="stylesheet" href="{{
    p_config("api.google.font.server") }}?family={{
    implode('|',array_map(function($font){
        return str_replace('_','+',$font);
    },p_config("api.google.font.fonts")))
}}">
@endif