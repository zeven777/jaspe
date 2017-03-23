@extends('web.main.layout')
@section('content')
        @include('web.commons.nav')

        @include('web.productos.detail.section.banner')

        <section class="main detalle">

            <div class="container-fluid">

                <div class="detalle-cont col-md-6">

                    <div class="pro-title item col-md-10 text-center center-block">

@if( $product->images->count() >= 2 )
                        <div class="pro-image">

                            <picture>

                                <source srcset="{{ $product->images->get(1)->getUrlRetinableImages(1) }}" />

                                <img src="{{ $product->images->get(1)->getImage(1) }}" alt="{{ $product->nombre }}" class="img-pro"/>

                            </picture>

@if( $product->images->count() == 3 )
                            <picture>

                                <source srcset="{{ $product->images->last()->getUrlRetinableImages(1) }}" />

                                <img src="{{ $product->images->last()->getImage(1) }}" alt="{{ $product->nombre }}" class="hover"/>

                            </picture>

@endif
                        </div>

@endif
                        <h1>{{ $product->nombre }}</h1>

                    </div>

                    <div class="pro-cont item col-md-10 text-center center-block">

@if( $product->categoria->image )
                        <picture>

                            <source srcset="{{ $product->categoria->image->getUrlRetinableImages(1) }}" />

                            <img src="{{ $product->categoria->image->getImage(1) }}" alt="{{ $product->categoria->nombre }}"/>

                        </picture>

@endif
                        {{ HTML::decode($product->descripcion) }}

                    </div>

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