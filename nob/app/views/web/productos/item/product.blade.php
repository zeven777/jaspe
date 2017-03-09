                <div class="col-md-3 col-xs-6 prod">

                    <a href="{{ route('products.detail', $product->slug) }}">

                        <picture>

                            <source srcset="{{ $product->image->getUrlRetinableImages(2) }}" />

                            <img src="{{ $product->image->getImage(2) }}" alt="{{ $product->nombre }}" />

                        </picture>

                    </a>

                </div>