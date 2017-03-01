@extends('web.main.layout')
@section('content')
        @include('web.commons.nav')

        @include('web.home.section.banner')

        <section class="main home">

            <div class="container">

                <div class="col-xs-12">

                    <ul class="menucat">

                        <li><a href="">Baño</a></li>

                        <li><a href="" class="cocina">Cocina</a></li>

                        <li><a href="" class="industria">Industria</a></li>

                        <li><a href="" class="metales">Metales</a></li>

                        <li><a href="" class="extras">Extras</a></li>

                    </ul>

                </div>

                <div class="clearfix"></div>

                @include('web.home.section.products')

            </div>

            <div class="blog">

                <div class="container">

                    <div class="col-md-12">

                        <h2>Blog</h2>

                        <p>Trucos, tips y todo lo que siempre quisiste saber</p>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.blog')

                </div>

            </div>

            <div class="destacados">

                <div class="container">

                    <div class="col-md-12">

                        <h2>Destacados</h2>

                        <p>Productos para todos los usos</p>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.products-highlighted')

                </div>

            </div>

            <div class="testimonio">

                <div class="container">

                    <div class="col-md-12">

                        <h2>En tus palabras</h2>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.testimonials')

                </div>

            </div>

        </section>
@stop