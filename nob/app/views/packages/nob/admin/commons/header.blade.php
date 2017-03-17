<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{ route('admin.home') }}" class="navbar-brand session-project"><i class="minilogo"></i></a>
@if($mainTitle)
            <h2 class="navbar-title visible-md">{{ $mainTitle }}</h2>
@endif
        </div>
        <div class="collapse navbar-collapse" id="nav">
@if($mainTitle)
            <h2 class="navbar-title hidden-md">{{ $mainTitle }}</h2>
@endif
@if( Auth::check() && ! is_null($administrator) )
            <ul class="nav navbar-nav navbar-right">
@if( $administrator->tipo === 'sadmin' )
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-cogs"></i>&nbsp; {{ trans("admin::admin.menu.system") }} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('admin.system.environment.list') }}">
                                <i class="fa fa-cog"></i>&nbsp; {{ trans("admin::admin.menu.setup") }}
                            </a>
                        </li>
@if( File::exists(public_path('/nob/project/gallery.yaml')) )
                        <li>
                            <a href="{{ route('admin.system.gallery.list') }}">
                                <i class="fa fa-picture-o"></i>&nbsp; {{ trans("admin::admin.menu.gallery") }}
                            </a>
                        </li>
                        <li class="divider"></li>
@endif
                        <li>
                            <a href="{{ route('admin.form.list','admin') }}">
                                <i class="fa fa-users"></i>&nbsp; {{ trans("admin::admin.menu.operator") }}
                            </a>
                        </li>
                    </ul>
                </li>
@endif
@if( p_config('app.language') )
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-language"></i>&nbsp; {{ trans("admin::admin.labels.app.language") }}
                    </a>
                    <ul class="dropdown-menu">
@foreach( (array) p_config('app.language') as $lang )
                        <li>{{ link_to_route('admin.language',trans("admin::admin.language.{$lang}"),$lang) }}</li>
@endforeach
                    </ul>
                </li>
@endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user"></i>&nbsp; {{
                            (
                                is_null($sessionTable) ||
                                in_array($sessionTable->tipo,['sadmin','admin'])
                            ) ? $administrator->username : $sessionTable->username
                        }} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('admin.password') }}" data-toggle="modal" data-target="#Modal">
                                <i class="fa fa-asterisk"></i>&nbsp; {{ trans("admin::admin.menu.password") }}
                            </a>
                        </li>
@if(
    in_array($administrator->tipo,['sadmin','admin']) &&
    $sessionTable &&
    $sessionTable->tipo === 'user'
)
                        <li>
                            <a href="{{ route('admin.session',$administrator->id) }}">
                                <i class="fa fa-reply"></i>&nbsp; {{ trans("admin::admin.menu.backTo") . $administrator->username }}
                            </a>
                        </li>
@endif
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="fa fa-sign-out"></i>&nbsp; {{ trans("admin::admin.menu.logout") }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
@endif
@yield('header-search')
        </div>
    </div>
</nav>