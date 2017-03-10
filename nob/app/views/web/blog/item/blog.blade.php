            <div class="col-sm-6 col-xs-12 prod">

                <a href="{{ route('blog.detail',$blog->slug) }}">

                    <picture>

                        <source srcset="{{ $blog->image->getUrlRetinableImages(2) }}" />

                        <img src="{{ $blog->image->getImage(2) }}" alt="{{ $blog->titulo }}" />

                    </picture>

                </a>

            </div>