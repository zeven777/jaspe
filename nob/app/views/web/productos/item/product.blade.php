                <div class="col-md-3 col-sm-6 col-xs-12 text-center prod">

                    <a href="{{ route('products.detail', $product->slug) }}">

                        <picture>

                            <source srcset="{{ $product->images->first()->getUrlRetinableImages(1) }}" />

                            <img src="{{ $product->images->first()->getImage(1) }}" alt="{{ $product->nombre }}" />

                        </picture>

                    </a>

                </div>