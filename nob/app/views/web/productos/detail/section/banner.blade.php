        <aside class="banner detalle" style="background-color: {{ $product->getBackgroundColor() }}">
            <div class="banner-reel">
@foreach( $product->imagesText as $i => $img )
                <div class="banner-item" style="background-image: url('{{ $img->getImage(1) }}')"></div>
@endforeach
            </div>
            <div class="before"></div>
        </aside>