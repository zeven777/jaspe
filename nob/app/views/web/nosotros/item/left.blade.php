                <div class="mision col-md-10 center-block">

                    <div class="col-md-5 imgs izq">

                        <picture>

                            <source srcset="{{ $about->image->getUrlRetinableImages(1) }}" />

                            <img src="{{ $about->image->getImage(1) }}" alt="{{ $about->titulo }}"/>

                        </picture>

                    </div>

                    <div class="col-md-6 info izq">

                        <h3>{{ $about->titulo }}</h3>

                        {{ HTML::decode($about->contenido) }}

                    </div>

                </div>

                <div class="clearfix"></div>