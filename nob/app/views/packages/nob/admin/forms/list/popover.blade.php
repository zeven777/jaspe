@if( p_schema($form.".setup.popover") )
                    <td>
                        <i class="fa fa-picture-o"
                           title="{{
                               $r->{$schema['setup']['popover']['data']['title']}
                           }}"
                           data-toggle="popover"
@if( p_schema($form.".setup.popover.data.html.image") && $r->file)
                           data-image="{{
                               url('files/'.$form.'/'.p_schema($form.".setup.popover.data.html.image").'-'.$r->file->name)
                           }}"
@else
                           data-content="{{
                               trans("admin::admin.placeholder.popover.no-image")
                           }}"
@endif
@foreach( (array) p_schema($form.".setup.popover.setup") as $k => $v)
@if(is_string($v))
                           data-{{ $k }}="{{ $v }}"
@endif
@endforeach >
                        </i>
                    </td>
@endif