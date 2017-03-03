@extends('web.main.layout')
@section('content')
        @include('web.commons.nav')

        @include('web.productos.section.banner')

        <section class="main productos">

            <div class="container">

                <div class="col-xs-12">

                    @include('web.commons.products.menu-category')

                </div>

                <div class="clearfix"></div>

                @include('web.home.section.products')

            </div>

        </section>
@stop