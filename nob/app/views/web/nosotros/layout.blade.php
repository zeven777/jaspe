@extends('web.main.layout')
@section('content')
        @include('web.commons.nav')

        <aside class="banner nosotros" style="background-image: url('{{ url('img/bannernos.jpg') }}');">
        </aside>

        <section class="main nosotros">

            <div class="container">

                <div class="col-md-12 col-xs-12 text-center">

                    <picture>

                        <source srcset="{{ retina_url('img', 'titlenos.jpg', 2) }}" />

                        <img src="{{ url('img/titlenos.jpg') }}" alt="Jaspe" class="titlenos"/>

                    </picture>

                </div>

                <div class="col-md-8 center-block col-xs-12 text-center">

                    <h1>
                        {{ p_system('nosotros_subtitulo',$lang) }}
                    </h1>

                </div>

                @include('web.nosotros.item.first')

@foreach( $allAbouts as $i => $about )
                @include('web.nosotros.item.' . $about->posicion)

@if( $i == 0 )
                <div class="col-md-6 center-block text-center">

                    <h2 class="h1">{{ p_system('nosotros_slogan',$lang) }}</h2>

                </div>

                <div class="clearfix"></div>

@endif
@endforeach
                <div class="col-md-8 center-block text-center hagamos">

                    <h2 class="h1">
                        Hagamos algo grande, justos
                    </h2>

                    <p>
                        Interesado en distribuir nuestros productos? Nuevas ideas? No dudes en contactarnos!
                        Si quieres formar parte de nuestro equipo, acércate! Nos encantaría escuchar de tí :)
                    </p><p>

                        Tenemos mucho para ofrecer y más para lograr unidos.
                    </p>

                </div>


            </div>


        </section>
@stop