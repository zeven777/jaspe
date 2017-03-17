@if( p_schema("{$form}.setup.artisan") )
@foreach( p_schema("{$form}.setup.artisan") as $command => $commandNames )
@foreach( $commandNames as $commandName => $commandSetup )
@if( array_key_exists('fields', $commandSetup) )
                <div class="panel panel-info">

                    <div class="panel-heading">{{ $commandSetup['title'] }}</div>

                    <div class="panel-body">

@foreach( $commandSetup['fields'] as $fieldName => $fieldSetup )
                            {{ NobForm::getField("{$command}_{$commandName}_{$fieldName}",$model->newInstance(),$fieldSetup) }}

@endforeach
                    </div>

                </div>

@endif
@endforeach
@endforeach
@endif