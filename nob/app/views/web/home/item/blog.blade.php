                <div class="col-md-4 col-xs-12 prod">

                    <a href="javascript:;">

                        <picture>

                            <source srcset="{{ $blog->image->getUrlRetinableImages(1) }}" />

                            <img src="{{ $blog->image->getImage(1) }}" alt="{{ $blog->titulo }}" />

                        </picture>

                    </a>

                </div>