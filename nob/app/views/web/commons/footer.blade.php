        <footer class="footer">

            <div class="container">

                <div class="col-md-3 col-xs-12 text-center">

                    <h6 class="logo"><a href="{{ route('home') }}">logo</a></h6>

                    <p class="social">

@foreach( ['twitter', 'facebook', 'instagram'] as $socialNet )
                        <a href="{{ p_system($socialNet, $lang) }}" class="{{ $socialNet }}" target="_blank"><i class="fa fa-{{ $socialNet }}"></i></a>

@endforeach
                    </p>

                </div>

                <div class="col-md-5 col-xs-12">

                    <div class="col-xs-6">

                        <div class="row">

                            @include('web.commons.products.menu-foot')

                        </div>

                    </div>

                    <div class="col-xs-6">

                        <div class="row">

                            @include('web.commons.about.menu-foot')

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-xs-12">

                    @include('forms.suscribe.form')

                </div>

            </div>

        </footer>
