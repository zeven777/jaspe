                <div id="{{ $about->slug }}" class="mision col-md-12">

                    <div class="col-md-7 imgs der">

                        <picture>

                            <source srcset="{{ $about->image->getUrlRetinableImages(1) }}" />

                            <img src="{{ $about->image->getImage(1) }}" alt="{{ $about->titulo }}"/>

                        </picture>

                    </div>

                    <div class="col-md-5 info der">

                        <h3>{{ $about->titulo }}</h3>

                        {{ HTML::decode($about->contenido) }}

                    </div>

                </div>

                <div class="clearfix"></div>