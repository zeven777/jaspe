        <div class="media">
            <div class="media-body media-middle form-title">
                <h3 class="no-top">{{
                    ($action==='form_list') ? 
                        trans("admin::admin.title.form.item.list") : 
                        (($action==='form_create') ? trans("admin::admin.title.form.item.new") : trans("admin::admin.title.form.item.edit"))
                }}</h3>
@if( $action === 'form_list' )
@foreach ((array) p_schema("{$form}.setup.head") as $column)
@if(
    p_schema("{$form}.fields.{$column}.type") === 'relationship' &&
    app('session')->get("system_filter_{$form}_{$column}")
)
                <span class="label label-default">{{
                    (p_schema("{$form}.fields.{$column}.legend") ?: ucfirst($column)) . ': ' .
                    p_model(ucfirst($column))
                        ->newQuery()
                        ->find(app('session')->get("system_filter_{$form}_{$column}"))
                        ->getListField(p_schema("{$column}.setup.head"))
                }} &nbsp; <i{{
                    HTML::attributes([
                        'class' => 'fa fa-close',
                        'data-command' => 'filter',
                        'data-url' => route('admin.form.filter.relation.delete',$form),
                        'data-relation' => $column,
                    ])
                }}></i></span>
@endif
@endforeach
@endif
            </div>
            <div class="media-right no-wrap">
@if( array_key_exists('export',$schema['setup']) )
@foreach($schema['setup']['export'] as $format => $setup)
                <a href="{{ route("admin.form.export",compact('form','format')) }}" class="btn btn-info" title="{{ trans("admin::admin.prefix.download") }} {{ $setup['title'] }}">
                    <i class="fa fa-download"></i>&nbsp; {{ $setup['title'] }}
                </a>
@endforeach
@endif
@if( is_null(p_schema($form.".setup.unique")) )
@if(
    ! Input::has('search') && $action === 'form_list' &&
    (
        ( is_bool(p_schema($form.".setup.orderable")) && p_schema($form.".setup.orderable") ) ||
        (
            ! empty(p_schema($form.".setup.orderable.filter")) &&
            ! empty( app('session')->get("system_filter_{$form}_" . p_schema($form.".setup.orderable.filter")) )
        )
    )
)
                <button type="button" class="btn btn-default" data-sortable="order" data-page="{{ Input::get('page') ?: 1 }}">
                    <i class="fa fa-list-ol"></i>&nbsp; <span>{{ trans("admin::admin.button.form.order") }}</span>
                </button>
@endif
@if($action!=='form_list')
                <a href="{{ route('admin.form.list',compact('form')) }}" class="btn btn-default">
                    <i class="fa fa-list"></i>&nbsp; {{ trans("admin::admin.button.form.back") }}
                </a>
@endif
@if(
    is_string($credentials) ||
    (
        array_key_exists($form,$credentials) &&
        in_array('create',$credentials[$form])
    )
)
                <a href="{{ route('admin.form.new',compact('form')) }}" class="btn btn-primary">
                    <i class="fa fa-file"></i>&nbsp; {{ trans("admin::admin.button.form.new") }}
                </a>
@endif
@endif
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
@if(Session::has('ok'))
<script>
$(function(){
    notification("{{ Session::get('ok') }}");
});
</script>
@endif
@if(Session::has('error'))
<script>
$(function(){
    notification("{{ Session::get('error') }}","danger");
});
</script>
@endif