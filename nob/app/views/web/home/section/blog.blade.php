@for( $i = 1; $i <= 3; $i++ )
                <div class="col-md-4 col-xs-12 prod">

                    <a href="">

                        <picture>

                            <source srcset="{{ retina_url("img", "bl{$i}.jpg", 2) }}" />

                            <img src="{{ url("img/bl{$i}.jpg") }}" alt="Jaspe" />

                        </picture>

                    </a>

                </div>

@endfor