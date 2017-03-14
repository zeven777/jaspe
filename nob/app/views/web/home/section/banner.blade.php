@if( $banner )
        <aside class="banner home" style="background-color: {{ $banner->color }};">

            <picture>

                <source srcset="{{ $banner->image->getUrlRetinableImages(1) }}" />

                <img src="{{ $banner->image->getImage(1) }}" alt="{{ $banner->titulo }}" />

            </picture>

        </aside>

@endif