@extends('web.main.layout')
@section('content')
        @include('web.commons.nav')

        @include('web.productos.detail.section.banner')

        <section class="main detalle">

            <div class="container">

                <div class="detalle-cont col-md-6">

                    <div class="pro-title item col-md-10 text-center center-block">

                        <picture>

                            <source srcset="{{ $product->images->last()->getUrlRetinableImages(1) }}" />

                            <img src="{{ $product->images->last()->getImage(1) }}" alt="{{ $product->nombre }}"/>

                        </picture>

                        <h1>{{ $product->nombre }}</h1>

                    </div>

@if( $product->categoria->image )
                    <div class="pro-cont item col-md-10 text-center center-block">

                        <picture>

                            <source srcset="{{ $product->categoria->image->getUrlRetinableImages(1) }}" />

                            <img src="{{ $product->categoria->image->getImage(1) }}" alt="{{ $product->categoria->nombre }}"/>

                        </picture>

                        {{ HTML::decode($product->descripcion) }}

                    </div>

@endif
                    <div class="caract item col-md-10 text-center center-block">

                        {{ HTML::decode($product->caracteristicas) }}

                    </div>

                    <div class="sabias item col-md-10 text-center center-block">

                        <picture>

                            <source srcset="{{ retina_url('img','sabias.png',2) }}" />

                            <img src="{{ url('img/sabias.png') }}" alt="Jaspe"/>

                        </picture>

                        <p>
                            {{ $product->tip }}

                        </p>

                    </div>

                    @include('web.productos.detail.section.comments')

                </div>

            </div>

@if( $products->count() > 0 )
            <div class="masprod">

                <div class="container">

                    <div class="col-md-12">

                        <h3>{{ p_system('productos_otros_titulo', $lang) }}</h3>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.products')

                </div>

            </div>

@endif
        </section>
@stop