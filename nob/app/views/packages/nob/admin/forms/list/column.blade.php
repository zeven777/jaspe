                    <td{{
                        HTML::classes([
                            'num no-wrap',
                            (
                                array_key_exists('legend',$schema['setup']) &&
                                ! empty($schema['setup']['legend']) &&
                                (
                                    ! array_key_exists('filter',$schema['setup']['legend']) ||
                                    (
                                        in_array(
                                            $r->getAttribute($schema['setup']['legend']['filter']['field']),
                                            (array) $schema['setup']['legend']['filter']['values']
                                        )
                                    )
                                )
                            ) ? "{$schema['setup']['legend']['colors'][$r->getAttribute($schema['setup']['legend']['field'])]}" : ''
                        ])
                    }}>
@if( $group )
                        <span>{{ ($i + 1) }}</span>
@else
                        <i class="fa fa-{{ (p_schema($form.".setup.orderable")) ? 'arrows-v' : 'circle' }}"></i>

                        <div class="btn-group pagelist">
                            <a href="javascript:;" type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-list-ol"></i>
                            </a>
                            <ul class="dropdown-menu"></ul>
                        </div>
@endif
                    </td>
@foreach( (array) $schema['setup']['head'] as $field )
                    <td{{
                        HTML::classes([
                            'date' => in_array(p_schema($form.".fields.{$field}.type"), ['datetime','timestamp']),
                            'text-right' => in_array($field, (array) p_schema($form.".setup.badge"))
                        ])
                    }}>

@if(
    array_key_exists($field,$schema['fields']) &&
    $schema['fields'][$field]['type'] === 'relationship'
)
@if( ! is_null( $r->getRelation($field) ) )
                        <a{{
                            HTML::attributes([
                                'href' => 'javascript:;',
                                'title' => trans("admin::admin.labels.form.filter.title"),
                                'data-command' => 'filter',
                                'data-url' => route('admin.form.filter.relation.insert',$form),
                                'data-relation' => $field,
                                'data-key' => $r->getRelation($field)->getKey()
                            ])
                        }}>{{
                            $r->getRelation($field)->getListField(p_schema("{$field}.setup.head"), true)
                        }}</a>

@endif
@else
@if(
    array_key_exists('info',$schema['setup']) &&
    (
        (
            ! array_key_exists('value',$schema['setup']['info']) &&
            ! empty($r->$schema['setup']['info']['field'])
        ) ||
        (
            array_key_exists('value',$schema['setup']['info']) &&
            $r->getAttribute($schema['setup']['info']['field']) === $schema['setup']['info']['value']
        )
    )
)
                        <i{{
                            HTML::attributes([
                                'class' => $schema['setup']['info']['icon'],
                                'title' => array_key_exists('title',$schema['setup']['info']) ?
                                    $schema['setup']['info']['title'] : NULL
                            ])
                        }}></i>
@endif
                        {{ $r->getListfield($field) }}

@endif
                    </td>
@endforeach