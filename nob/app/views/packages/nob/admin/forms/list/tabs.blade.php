@if($tabs && $credentials === 'all')
        <ul class="nav nav-tabs nav-inverse nav-justified">
            <li{{
                HTML::classes([
                    'active' => ($ctab === 'all')
                ])
            }} role="presentation">
                <a href="{{ route('admin.form.list',[$form]) }}">{{
                    trans("admin::admin.labels.form.tabs.all")
                }}</a>
            </li>
@foreach($tabs as $tab => $label)
            <li{{
                HTML::classes([
                    'active' => ($ctab === $tab)
                ])
            }} role="presentation">
                <a href="{{ route('admin.form.list.tab',[$form,$tab]) }}">{{
                    $label
                }}</a>
            </li>
@endforeach
        </ul>
@endif