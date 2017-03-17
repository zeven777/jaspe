            <div class="form-group">
@if(
    File::exists(public_path('/img/adminlogo.png')) &&
    is_null(Session::get('domain'))
)
                <img src="{{ url('/img/adminlogo.png') }}" alt="{{ p_config('app.project') }}" />
                &nbsp;
@elseif(
    Session::get('domain') &&
    Session::get('domain')->images instanceof \Nob\Admin\Model\FileModel &&
    Session::get('domain')->images->exists
)
                <img src="{{ Session::get('domain')->urlLogo() }}" alt="" />
                &nbsp;
@else
                &nbsp;
                <strong>{{ p_config('app.project') }}</strong>
@endif
            </div>