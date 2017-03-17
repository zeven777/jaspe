            <tbody id="items">
@foreach($rows as $i => $r)
@if(
    ! array_key_exists('hidden',$schema['setup']) ||
    ! in_array(
        $r->{$schema['setup']['hidden']['field']},
        (array) $schema['setup']['hidden']['value']
    )
)
                <tr {{
                    HTML::classes([
                        'draggable' => p_schema($form.".setup.orderable")
                    ])
                }} data-id="{{ $r->getKey() }}">
                    @include('admin::forms.list.popover')

                    @include('admin::forms.list.column')

                    @include('admin::forms.list.options')

                </tr>
@endif
@endforeach
            </tbody>