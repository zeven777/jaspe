@for( $i = 1; $i <= 4; $i++ )
                <div class="col-md-3 col-xs-12 prod">

                    <a href="">

                        <picture>

                            <source srcset="{{ retina_url("img", "es{$i}.jpg", 2) }}" />

                            <img src="{{ url("img/es{$i}.jpg") }}" alt="Jaspe" />

                        </picture>

                    </a>

                </div>

@endfor