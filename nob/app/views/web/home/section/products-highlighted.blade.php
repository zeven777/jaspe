@foreach( $hproducts as $product )
                <div class="col-md-3 col-xs-12 prod">

                    <a href="">

                        <picture>

                            <source srcset="{{ $product->image->getUrlRetinableImages(3) }}" />

                            <img src="{{ $product->image->getImage(3) }}" alt="{{ $product->nombre }}" />

                        </picture>

                    </a>

                </div>

@endforeach