@if( $banner )
        <aside class="banner blog" style="background-image: url('{{ $banner->image->getImage(1) }}');">

            <h1>
                Bienvenido a nuestro Blog
            </h1>

        </aside>

@endif