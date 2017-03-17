        <div class="media">
            <div class="media-body media-middle">
                <h3 class="no-margin">{{
                    ($action==='form_list') ? 
                        trans("admin::admin.title.form.item.list") : 
                        (($action==='form_create') ? trans("admin::admin.title.form.item.new") : trans("admin::admin.title.form.item.edit"))
                }}</h3>
            </div>
            <div class="media-right no-wrap">
@if(array_key_exists('export',$schema['setup']))
@foreach($schema['setup']['export'] as $format => $setup)
                <a href="{{ route("admin.form.export",compact('form','format')) }}" class="btn btn-info" title="{{ trans("admin::admin.prefix.download") }} {{ $setup['title'] }}">
                    <i class="fa fa-download"></i>&nbsp; {{ $setup['title'] }}
                </a>
@endforeach
@endif
@if( is_null(p_schema($form.".setup.unique")) )
@if( ! Input::has('search') && $action === 'form_list' && p_schema($form.".setup.orderable"))
                <button type="button" class="btn btn-default" data-sortable="order" data-page="{{ Input::get('page') ?: 1 }}">
                    <i class="fa fa-list-ol"></i>&nbsp; <span>{{ trans("admin::admin.button.form.order") }}</span>
                </button>
@endif
@if($action!=='form_list')
                <a href="{{ route('admin.form.list',array('form'=>$form)) }}" class="btn btn-default">
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
                <a href="{{ route('admin.form.new',array('form'=>$form)) }}" class="btn btn-primary">
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