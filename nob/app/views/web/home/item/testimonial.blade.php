                    <div class="col-sm-4 col-lg-2 col-md-3 col-xs-6">

                        <a href="javascript:;">

                            <picture>

                                <source srcset="{{ $testimonial->image->getUrlRetinableImages(1) }}" />

                                <img src="{{ $testimonial->image->getUrlRetinableImages(1) }}" alt="{{
                                    $testimonial->nombre
                                }}" class="img-item" />

                            </picture>

                            <picture>

                                <source srcset="{{ $testimonial->imageText->getUrlRetinableImages(1) }}" />

                                <img src="{{ $testimonial->imageText->getUrlRetinableImages(1) }}" alt="{{
                                    $testimonial->nombre
                                }}" class="hover" />

                            </picture>

                        </a>

                    </div>