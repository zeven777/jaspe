            <div class="col-sm-6 col-xs-12">

                <a href="{{ route('blog.detail',$blog->slug) }}" class="bcont">

                  <span class="thover">
                  	<b>{{ $blog->titulo }}</b>
                  </span>

                    <picture>

                        <source srcset="{{ $blog->image->getUrlRetinableImages(2) }}" />

                        <img src="{{ $blog->image->getImage(2) }}" alt="{{ $blog->titulo }}" />

                    </picture>

                </a>

            </div>