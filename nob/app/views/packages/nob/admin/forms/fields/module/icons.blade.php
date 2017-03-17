@foreach($setup['icons'] as $icon => $label)
                    <label class="radio-icon text-center">
                        <span class="{{
                            array_key_exists('iconclass', $setup) ? $setup['iconclass'] : 'nb-icon'
                        }} {{ $icon }}"></span>
                        <div class="clearfix"></div>
                        <input type="radio" name="{{ $name }}" value="{{ $icon }}"{{ ($model->exists && $icon===$model->{$name}) ? ' checked':'' }} />
                        <div class="clearfix"></div>
@if(
    ! array_key_exists('iconlabel', $setup) ||
    (bool) $setup['iconlabel']
)
                        {{ $label }}

@endif
                    </label>
@endforeach
@section('moduleIconsStyle')
    {{ HTML::style($setup['css']) }}
@stop