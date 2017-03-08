        <aside class="banner detalle" style="background-color: {{ $product->getBackgroundColor() }};">

            <picture>

                <source srcset="{{ $product->image->getUrlRetinableImages(1) }}" />

                <img src="{{ $product->image->getImage(1) }}" alt="{{ $product->nombre }}"/>

            </picture>

        </aside>