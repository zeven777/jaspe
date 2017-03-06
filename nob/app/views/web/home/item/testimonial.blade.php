                    <div class="col-md-2 col-xs-6">

                        <a href="javascript:;">

@for( $i = 1; $i <= 2; $i++ )
                            <picture>

                                <source srcset="{{ $testimonial->image->getUrlRetinableImages($i) }}" />

                                <img src="{{ $testimonial->image->getUrlRetinableImages($i) }}" alt="{{ $testimonial->nombre }}"{{
                                    HTML::classes([
                                        'img-item' => $i == 1,
                                        'hover' => $i == 2,
                                    ])
                                }} />

                            </picture>

@endfor

                        </a>

                    </div>