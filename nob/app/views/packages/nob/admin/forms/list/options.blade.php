                    <td class="options text-right no-wrap">
@if(
    $form === 'admin' &&
    p_schema("admin.setup.session") &&
    in_array($r->tipo, ['user'])
)
                        <a href="{{
                            route('admin.session',[$r->getKey()])
                        }}" class="btn btn-default" title="{{
                            trans("admin::admin.button.session")
                        }}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
@endif
@if(
    p_schema($form.".setup.image") &&
    ! is_null($r->images) &&
    (
        ( $r->images instanceof \Illuminate\Database\Eloquent\Collection && $r->images->count() > 0 ) ||
        ( $r->images instanceof \Nob\Admin\Model\FileModel && $r->images->exists )
    )
)
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal" data-url="{{
                            route('admin.form.gallery',[$form, $r->getKey()])
                        }}" title="{{
                            trans("admin::admin.button.images")
                        }}">
                            <i class="fa fa-picture-o"></i>
                        </button>
@endif
@if( p_schema("admin.setup.code") )
                        <button id="buttonmodal" type="button" class="btn btn-primary buttonmodalhtml" title="{{
                            trans("admin::admin.button.code")
                        }}" data-url="{{
                            url($r->username)
                        }}">
                            <i class="fa fa-globe"></i>
                        </button>
@endif
@if(
    $credentials === 'all' &&
    array_key_exists('commutable',$schema['setup']) &&
    $r->{$schema['setup']['commutable']['field']} === $schema['setup']['commutable']['from']
)
                        <a href="{{
                            route('admin.form.commutable',[$form,$r->getKey()])
                        }}" class="btn btn-info ajax" title="{{
                            get_title_lang(p_schema($form.".setup.commutable.title"), $language) ?: trans("admin::admin.button.commute")
                        }}" data-toggle="commutable" data-field="{{
                            p_schema($form.".setup.commutable.field")
                        }}" data-from="{{
                            p_schema($form.".setup.commutable.from")
                        }}" data-to="{{
                            p_schema($form.".setup.commutable.to")
                        }}" data-id="{{ $r->getKey() }}">
                            <i class="fa fa-check"></i>
                        </a>
@endif
@if(
    $credentials === 'all' ||
    (
        is_array($credentials) &&
        array_key_exists($form,$credentials) &&
        in_array('edit',$credentials[$form])
    )
)
                        <a href="{{
                            route('admin.form.edit',[$form, $r->getKey()])
                        }}" class="btn btn-success" title="{{
                            ( $form === 'admin' && p_schema("admin.setup.session") ) ?
                            trans("admin::admin.button.edit-client") :
                            trans("admin::admin.button.edit")
                        }}">
                            <i class="fa fa-cog"></i>
                        </a>
@endif
@if(
    $credentials === 'all' ||
    (
        is_array($credentials) &&
        array_key_exists($form,$credentials) &&
        in_array('delete',$credentials[$form])
    )
)
                        <a href="{{
                            route('admin.form.delete',[$form, $r->getKey()])
                        }}" class="btn btn-danger" title="{{
                            trans("admin::admin.button.delete")
                        }}" data-command="delete">
                            <i class="fa fa-trash"></i>
                        </a>
@endif
@if( p_schema($form.".setup.preview") )
                        <a href="{{
                            route('admin.form.preview',[$form, $r->getKey()])
                        }}" class="btn btn-info" target="_blank">
                            <i class="fa fa-eye"></i>
                        </a>
@endif
                    </td>