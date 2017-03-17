            <div{{
                HTML::classes([
                    'form-group',
                    'has-error' => $errors->has($name) ?: false
                ]) .
                HTML::attributes([
                    'data-tab' => (
                        (
                            ! is_null(p_schema($model->getTable().".fields.{$name}.tab")) &&
                            ! is_null(p_schema($model->getTable().".setup.tabulate"))
                        ) &&
                        p_schema($model->getTable().".fields.{$name}.tab") !== p_schema($model->getTable().".setup.tabulate")
                    ) ? implode('|',(array) p_schema($model->getTable().".fields.{$name}.tab")) : null,
                ])
            }}>
                <label class="control-label">{{
                    array_key_exists('legend',$setup) ?
                        get_title_lang($setup['legend'], $language) :
                        ucfirst($name)
                }}</label>
                <div class="credentials">
@foreach( $permisos as $table => $commands )
                    <div class="col inline">
                        <label><strong>{{
                            p_config("modules.{$table}") ?
                                get_title_lang(p_config("modules.{$table}.title"), $language):
                                (
                                    get_title_lang(p_schema("{$table}.setup.title"), $language) ?:
                                    ucfirst($table)
                                )
                        }}</strong></label>
@foreach( $commands as $c => $l )
                        <div>
                            <input type="checkbox" name="{{
                                "{$name}[{$table}][]"
                            }}" value="{{ $c }}"{{
                                (
                                    $model->exists &&
                                    is_array($model->{$name}) &&
                                    array_key_exists($table, $model->{$name} ) &&
                                    in_array($c, $model->{$name}[$table])
                                ) ? ' checked':''
                            }} />
                            {{ $l }}

                        </div>
@endforeach
                    </div>
@endforeach

@if( $errors->has($name) )
@foreach( $errors->get($name) as $error )
                    <span class="help-block">{{ $error }}</span>
@endforeach
@endif
                </div>
            </div>
