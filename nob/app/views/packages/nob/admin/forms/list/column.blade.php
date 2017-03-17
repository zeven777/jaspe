                    <td{{
                        HTML::classes([
                            'num',
                            (
                                array_key_exists('legend',$schema['setup']) &&
                                ! empty($schema['setup']['legend']) &&
                                (
                                    ! array_key_exists('filter',$schema['setup']['legend']) ||
                                    (
                                        in_array(
                                            $r->{$schema['setup']['legend']['filter']['field']},
                                            (array) $schema['setup']['legend']['filter']['values']
                                        )
                                    )
                                )
                            ) ? "{$schema['setup']['legend']['colors'][$r->{$schema['setup']['legend']['field']}]}" : ''
                        ])
                    }}>
@if( $group )
                        <span>{{ ($i + 1) }}</span>
@else
                        <i class="fa fa-{{ (p_schema($form.".setup.orderable")) ? 'arrows-v':'circle' }}"></i>
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
    $schema['fields'][$field]['type']==='relationship'
)
@if( ! is_null( $r->getRelation($field) ) )
                        <a href="{{
                            route('admin.form.edit',[ $field, $r->getRelation($field)->getKey() ])
                        }}">{{
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
            $r->$schema['setup']['info']['field'] === $schema['setup']['info']['value']
        )
    )
)
                        <i class="{{ $schema['setup']['info']['icon'] }}" @if(array_key_exists('title',$schema['setup']['info'])) title="{{$schema['setup']['info']['title']}}" @endif></i>
@endif
                        {{ $r->getListfield($field) }}

@endif
                    </td>
@endforeach