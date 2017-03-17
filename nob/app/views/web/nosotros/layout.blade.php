@extends('web.main.layout')
@section('content')
        @include('web.commons.nav')

@if( $banner )
        <aside class="banner nosotros" style="background-image: url('{{ $banner->image->getImage(1) }}');">
        </aside>

@endif
        <section class="main nosotros">

            <div class="container">

@if( $banner->imageText )
                <div class="col-md-12 col-xs-12 text-center">

                    <picture>

                        <source srcset="{{ $banner->imageText->getUrlRetinableImages(1) }}" />

                        <img src="{{ $banner->imageText->getImage(1) }}" alt="{{ $banner->titulo }}" class="titlenos"/>

                    </picture>

                </div>

                <div class="clearfix"></div>

@endif
                <div class="col-md-8 center-block col-xs-12 text-center">

                    <h1>
                        {{ p_system('nosotros_subtitulo',$lang) }}
                    </h1>

                </div>

                @include('web.nosotros.item.first')

@foreach( $allAbouts as $i => $about )
                @include('web.nosotros.item.' . $about->posicion)

@if( $i == 0 )
                <div class="text-center">

                    <h2 class="h1">{{ text2htmlbr(p_system('nosotros_slogan',$lang)) }}</h2>

                </div>

                <div class="clearfix"></div>

@endif
@endforeach
                <div class="col-md-8 center-block text-center hagamos">

                    <h2 class="h1">{{ p_system('nosotros_footer_titulo',$lang) }}</h2>

                    <p>
                        {{ text2htmlbr(p_system('nosotros_footer_contenido',$lang), '<br />', false) }}
                    </p>

                </div>

            </div>

        </section>
@stop