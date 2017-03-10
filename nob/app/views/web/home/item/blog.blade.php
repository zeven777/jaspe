                <div class="col-md-4 col-xs-12 prod">

                    <a href="{{ route('blog.detail',$blog->slug) }}">

                        <picture>

                            <source srcset="{{ $blog->image->getUrlRetinableImages(3) }}" />

                            <img src="{{ $blog->image->getImage(3) }}" alt="{{ $blog->titulo }}" />

                        </picture>

                    </a>

                </div>