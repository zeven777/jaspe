    <nav class="menu-main">

        <ul class="menu-foot">

            <u>Productos</u>

@foreach( $categories as $category )
            <li><a href="{{ route('products.list',[$category->slug]) }}" class="{{ $category->icon }}">{{ $category->nombre }}</a></li>

@endforeach
        </ul>

        <ul class="menu-foot">

            <u>Jaspe</u>

@foreach( $enterprises as $enterprise )
            <li><a href="{{ route('about.us') }}#{{ $enterprise->slug }}">{{ $enterprise->titulo }}</a></li>

@endforeach
            <li><a href="javascript:;">Ser distribuidor</a></li>

            <li><a href="{{ route('contact') }}">Contacto</a></li>

        </ul>

    </nav>
