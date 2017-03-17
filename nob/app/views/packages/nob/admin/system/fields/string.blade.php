@if(isset($model))
                    {{ Form::input((isset($setup) && array_key_exists('role',$setup) && strlen($setup['role'])!=0) ? $setup['role'] : 'text',$name,(isset($setup) && array_key_exists('role',$setup) && $setup['role']==='password') ? '' : $model[$name],array('class'=>'input-block-level required','id'=>'id'.ucfirst($name))) }}

@else
                    {{ Form::input((isset($setup) && array_key_exists('role',$setup) && strlen($setup['role'])!=0) ? $setup['role'] : 'text',$name,(isset($setup) && array_key_exists('role',$setup) && $setup['role']==='password') ? '' : Input::old($name),array('class'=>'input-block-level required','id'=>'id'.ucfirst($name))) }}

@endif