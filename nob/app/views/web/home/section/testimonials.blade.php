@for( $i = 1; $i <= 6; $i++ )
                    <div class="col-md-2 col-xs-6">

                        <a href="">

                            <picture>

                                <source srcset="{{ retina_url("img", "p{$i}.jpg", 2) }}" />

                                <img src="{{ url("img/p{$i}.jpg") }}" alt="Jaspe" class="img-item" />

                            </picture>

                            <picture>

                                <source srcset="{{ retina_url("img", "ho" . ($i % 2 == 0 ? '1' : '2') . ".jpg", 2) }}" />

                                <img src="{{ url("img/ho" . ($i % 2 == 0 ? '1' : '2') . ".jpg") }}" alt="Jaspe" class="hover" />

                            </picture>

                        </a>

                    </div>

@endfor