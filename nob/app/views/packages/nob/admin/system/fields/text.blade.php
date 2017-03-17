@if(isset($model))
                    {{ Form::textarea($name,$model[$name],array('class'=>'input-block-level')) }}

@else
                    {{ Form::textarea($name,'',array('class'=>'input-block-level')) }}

@endif