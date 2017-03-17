@if(
    Auth::check() &&
    ! is_null($administrator) &&
    (
        $administrator->tipo === 'user' ||
        (
            in_array($administrator->tipo,['sadmin','admin']) &&
            (
                is_null($sessionTable) || p_schema('admin.setup.session')
            )
        )
    )
)
    <div class="col-md-3 menu-col">
        <div class="row">
@if(
    p_schema("admin.setup.session") &&
    $sessionTable->tipo === 'user' &&
    (
        $sessionTable->images instanceof \Nob\Admin\Model\FileModel &&
        $sessionTable->images->exists
    )
)
            <div class="well well-small session-logo no-margin">
                <img src="{{ $sessionTable->images->getImage(1) }}" alt="{{ $sessionTable->project }}" class="center-block" />
                <p class="no-margin">{{ $sessionTable->project }}</p>
            </div>
@endif
            <ul class="nav nav-list">
@foreach( p_schema() as $table => $setup )
@if( ! in_array($table,['admin']) )
@if(
    $administrator->tipo === 'sadmin' ||
    (
        is_null(p_schema("admin.setup.session")) &&
        in_array($administrator->tipo,['admin','user']) &&
        is_array($administrator->credentials) &&
        array_key_exists($table,$administrator->credentials)
    ) ||
    (
        p_schema("admin.setup.session") &&
        $sessionTable->tipo === 'user' &&
        in_array($administrator->tipo,['admin']) &&
        is_array($administrator->credentials) &&
        array_key_exists($table,$administrator->credentials) &&
        (
            ! array_key_exists('modulable',$setup['setup']) ||
            (
                array_key_exists('modulable',$setup['setup']) &&
                array_key_exists($table,$sessionTable->credentials)
            )
        )
    ) ||
    (
        p_schema("admin.setup.session") &&
        in_array($administrator->tipo,['user']) &&
        is_array($administrator->credentials) &&
        array_key_exists($table,$administrator->credentials)
    )
)
                <li{{ HTML::classes([
                    'active' => ( isset($form) && $form === $table )
                ]) }}>{{
                    link_to_route(
                        'admin.form.list',
                        get_title_lang( p_schema("{$table}.setup.title"), $language ) ?: ucfirst($table),
                        $table
                    )
                }}</li>
@endif
@endif
@endforeach
@foreach( (array) p_config('modules') as $module => $setup )
@if(
    $administrator->tipo === 'sadmin' ||
    (
        is_null(p_schema("admin.setup.session")) &&
        in_array($administrator->tipo,['admin','user']) &&
        is_array($administrator->credentials) &&
        array_key_exists($module,$administrator->credentials)
    )
)
                <li{{ HTML::classes([
                    'active' => starts_with($action, $module)
                ]) }}>{{
                    link_to_route(
                        $setup['route'],
                        $setup['title']
                    )
                }}</li>
@endif
@endforeach
            </ul>
        </div>
    </div>
@endif