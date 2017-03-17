
@foreach($schema['fields'] as $name => $setup)
@if(
    array_key_exists('accordion',$setup) &&
    array_key_exists('role',$setup['accordion']) &&
    in_array('open', (array) $setup['accordion']['role'])
)
            <div class="panel-group" id="{{ $setup['accordion']['id'] }}" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{ $setup['accordion']['id'] }}">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#{{ $setup['accordion']['id'] }}" href="#collapse{{ $setup['accordion']['id'] }}" aria-expanded="false" aria-controls="collapse{{ $setup['accordion']['id'] }}">
                                {{ $setup['accordion']['title'] }}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{ $setup['accordion']['id'] }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $setup['accordion']['id'] }}">
                        <div class="panel-body">
@endif
@if(
    ! array_key_exists('behavior',$setup) ||
    ! in_array($setup['behavior'], array('hidden','session')) ||
    (
        array_key_exists('visible',$setup) &&
        Session::get('ADMINUSER')->tipo === $setup['visible']
    )
)
@if( $setup['type'] === 'credentials' )
                    @include('admin::forms.fields.credentials',compact('model','name','setup','permisos'))

@elseif( $setup['type'] === 'module' )
                    @include('admin::forms.fields.module',compact('model','name','setup','action','form','list'))

@else
                    {{ NobForm::getField($name,$model,$setup) }}

@endif
@endif
@if(
    array_key_exists('accordion',$setup) &&
    array_key_exists('role',$setup['accordion']) &&
    in_array('close', (array) $setup['accordion']['role'])
)
                        </div>
                    </div>
                </div>
            </div>
@endif
@endforeach


