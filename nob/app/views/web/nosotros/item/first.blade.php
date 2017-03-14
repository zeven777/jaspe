@if( $firstAbout )
                <div if="{{ $firstAbout->slug }}" class="col-md-6 col-xs-12 text-center">

                    <picture>

                        <source srcset="{{ $firstAbout->image->getUrlRetinableImages(1) }}" />

                        <img src="{{ $firstAbout->image->getImage(1) }}" alt="{{ $firstAbout->titulo }}"/>

                    </picture>

                </div>

                <div class="col-md-6 col-xs-12 text-center text-cont">

                    <div class="text">

                        {{ HTML::decode($firstAbout->contenido) }}

                    </div>

                </div>

                <div class="clearfix"></div>

@endif