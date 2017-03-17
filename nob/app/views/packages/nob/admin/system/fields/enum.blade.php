@if(isset($setup) && count($setup['options'])==2)
@foreach($setup['options'] as $vals)
@if(isset($model))
                <label class="radio inline">
                    <input type="radio" name="{{$name}}" value="{{$vals}}"@if($vals===$model[$name]) checked @endif />
                    {{ucfirst($vals)}}

                </label>
@else
                <label class="radio inline">
                    <input type="radio" name="{{$name}}" value="{{$vals}}"@if(array_key_exists('attributes',$setup) && $setup['attributes']==="default('{$vals}')") checked @endif />
                    {{ucfirst($vals)}}

                </label>
@endif
@endforeach
@endif
@if(isset($setup) && count($setup['options'])>2)
                <select class="input-block-level" name="{{$name}}">
                    <option value="" selected="">Seleccione</option>
@foreach($setup['options'] as $vals)
@if(isset($model))
                    <option value="{{$vals}}"@if($vals===$model[$name]) selected="selected" @endif>{{ucfirst($vals)}}</option>
@else
                    <option value="{{$vals}}">{{ucfirst($vals)}}</option>
@endif
@endforeach
                </select>
@endif
