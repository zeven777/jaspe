@for( $i = 1; $i <= 4; $i++ )
                <div class="col-md-3 col-xs-6 prod">

                    <a href="">

                        <picture>

                            <source srcset="{{ retina_url("img", "pro{$i}.jpg", 2) }}" />

                            <img src="{{ url("img/pro{$i}.jpg") }}" alt="Jaspe" />

                        </picture>

                    </a>

                </div>

@endfor