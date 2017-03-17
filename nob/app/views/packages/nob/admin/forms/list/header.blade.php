            <thead>
                <tr>
@if( p_schema($form.".setup.popover") )
                    <th></th>
@endif
                    <th></th>
@foreach( (array) p_schema($form.".setup.head") as $col )
@if( $col !== $group )
                    <th>{{
                        get_title_lang( p_schema($form.".fields.{$col}.legend") , $language) ?: ucfirst($col)
                    }}</th>
@endif
@endforeach
                    <th>{{ trans("admin::admin.labels.form.options") }}</th>
                </tr>
            </thead>