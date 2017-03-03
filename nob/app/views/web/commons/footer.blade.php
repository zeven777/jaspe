        <footer class="footer">

            <div class="container">

                <div class="col-md-3 col-xs-12 text-center">

                    <h6 class="logo"><a href="{{ route('home') }}">logo</a></h6>

                    <p class="social">

@foreach( ['facebook', 'twitter', 'instagram'] as $socialNet )
                        <a href="{{ p_system($socialNet, $lang) }}" class="{{ $socialNet }}" target="_blank"><i class="fa fa-{{ $socialNet }}"></i></a>

@endforeach
                    </p>

                </div>

                <div class="col-md-5 col-xs-12">

                    <div class="col-md-6">

                        <ul class="row menu-foot">

                            <u>Productos</u>

@foreach( $categories as $category )
                            <li><a href="{{ route('products.list',[$category->slug]) }}" class="{{ $category->icon }}">{{ $category->nombre }}</a></li>

@endforeach
                        </ul>

                    </div>

                    <div class="col-md-6">

                        <ul class="row menu-foot">

                            <u>Jaspe</u>

@foreach( $enterprises as $enterprise )
                            <li><a href="{{ route('about.us') }}#{{ $enterprise->slug }}">{{ $enterprise->titulo }}</a></li>

@endforeach
                            <li><a href="javascript:;">Ser distribuidor</a></li>

                            <li><a href="{{ route('contact') }}">Contacto</a></li>

                        </ul>

                    </div>

                </div>

                <div class="col-md-4 col-xs-12">

                    <form action="//jaspe.us12.list-manage.com/subscribe/post?u=1c7e0ec3819394a1e78e869c5&amp;id=a201824f38"
                          method="post"
                          id="mc-embedded-subscribe-form"
                          name="mc-embedded-subscribe-form"
                          target="_self"
                          class="form-mail" novalidate>

                        <h3>Para fanatic@s de la limpiesa</h3>

                        <p>No te pierdas todas nuestras novedades, regalos y consejos.</p>

                        <input type="email" name="EMAIL" placeholder="Email aquí"/>

                        <button type="submit" class="btn" name="subscribe">Enviar</button>

                    </form>


                </div>

            </div>

        </footer>