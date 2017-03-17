@if( array_key_exists('relation',$schema['setup']) )
@foreach( $schema['setup']['relation'] as $table => $binds )
@foreach( $binds as $bind => $setup )
@if( ! array_key_exists('behavior',$setup) || $setup['behavior'] !== 'hidden' )
            @include(
                'admin::forms.fields.relation.list',
                array_merge(
                    [
                        'name'       => $table,
                        'relation'   => $table,
                        'collection' => $model->getRelation($table)
                    ],
                    compact(
                        'model',
                        'action',
                        'setup',
                        'schemas',
                        'relations',
                        'listParentGroup',
                        'infinite'
                    )
                )
            )
@endif
@endforeach
@endforeach
@endif