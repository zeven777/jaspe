@if( p_schema($form.".setup.legend") )
        <p>&nbsp;</p>
        <h4>{{ trans("admin::admin.labels.legend") }}</h4>
        <div class="panel panel-body">
@foreach( p_schema($form.".setup.legend.values") as $v)
            <a href="{{ route('admin.form.list.tab',[$form,$ctab,$v]) }}" class="legend legend-{{ p_schema($form.".setup.legend.colors.{$v}") }}">
                <span>{{
                    p_schema($form.".setup.legend.labels.{$language}.{$v}") ?:
                    p_schema($form.".setup.legend.labels.{$v}")
                }}</span>
            </a>
@endforeach
        </div>
@endif