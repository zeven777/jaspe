    <header>

        <div class="container">

            <h6>{{ link_to_route('home',$project,null,['id'=>'logo']) }}</h6>

            <nav>

                <a href="javascript:;">menu</a>

                <ul>

@foreach( p_config('menu') as $m => $s )
                <li><a href="{{ url($s['url']) }}">{{ array_key_exists('label',$s) ? $s['label'] : ucfirst($m) }}</a></li>

@endforeach
                </ul>

            </nav>

        </div>

    </header>
