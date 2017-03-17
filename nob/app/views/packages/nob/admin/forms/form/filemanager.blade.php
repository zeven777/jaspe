@if( $schema['setup']['type'] !== 'text' )
@foreach(['image','text','file'] as $type)
@if( array_key_exists($type,$schema['setup']) )
            <div{{
                HTML::classes([
                    'form-group panel panel-default',
                    'hidden' => (
                        p_schema($model->getTable().".setup.tabulate") &&
                        ! is_null(p_schema($model->getTable().".setup.{$type}.tab")) &&
                        ! in_array(
                            $model->{p_schema($model->getTable().".setup.tabulate")},
                            (array) p_schema($model->getTable().".setup.{$type}.tab")
                        )
                    )
                ]) .
                HTML::attributes([
                    'data-tab' =>
                        (
                            p_schema($model->getTable().".setup.tabulate") &&
                            ! is_null(p_schema($model->getTable().".setup.{$type}.tab"))
                        ) ? implode('|',(array) p_schema($model->getTable().".setup.{$type}.tab")) : null,
                ])
            }}>

                <div class="panel-heading">{{
                    array_key_exists('title',$schema['setup'][$type]) ?
                        get_title_lang($schema['setup'][$type]['title'],$language) :
                        trans("admin::admin.labels.form." . ( ($type === 'image') ? "images":"files") )
                }}</div>

                <div class="panel-body">

@if( $action === 'form_edit' )
                    {{
                        Nob\Admin\Libraries\Files::getList(
                            $form,
                            $model->getKey(),
                            ['tpl'=>'admin::forms.fields.files', 'setup'=>$schema['setup'], 'schemas'=>$schemas],
                            $type
                        )
                    }}

@endif
                    @include('admin::forms.fields.file',['setup' => $schema['setup']])

                </div>

            </div>

@endif
@endforeach
@endif
