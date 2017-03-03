        <aside class="banner detalle" style="background-color: #fff0e1;">

            <picture>

                <source srcset="{{ $product->image->getUrlRetinableImages(1) }}" />

                <img src="{{ $product->image->getImage(1) }}" alt="{{ $product->nombre }}"/>

            </picture>

        </aside>