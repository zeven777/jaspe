@extends('web.main.layout')
@section('content')
        @include('web.home.section.banner')

        <section class="main home">

            <div class="container">

                <div class="col-xs-12">

                    @include('web.commons.products.menu-category')

                </div>

                <div class="clearfix"></div>

@if( $products->count() > 0 )
                @include('web.home.section.products')

@endif
            </div>

@if( $blogs->count() > 0 )
            <div class="blog">

                <div class="container">

                    <div class="col-md-12">

                        <h2>{{ p_system('inicio_blog_titulo', $lang) }}</h2>

                        <p>{{ p_system('inicio_blog_subtitulo', $lang) }}</p>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.blog')

                </div>

            </div>

@endif
@if( $hblogs->count() > 0 )
            <div class="blog">

                <div class="container">

                    <div class="col-md-12">

                        <h2>{{ p_system('inicio_blog_historia_titulo', $lang) }}</h2>

                        <p>{{ p_system('inicio_blog_historia_subtitulo', $lang) }}</p>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.blog-history')

                </div>

            </div>

@endif
@if( $hproducts->count() > 0 )
            <div class="destacados">

                <div class="container">

                    <div class="col-md-12">

                        <h2>{{ p_system('inicio_productos_destacados_titulo', $lang) }}</h2>

                        <p>{{ p_system('inicio_productos_destacados_subtitulo', $lang) }}</p>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.products-highlighted')

                </div>

            </div>

@endif
@if( $testimonials->count() > 0 )
            <div class="testimonio">

                <div class="container">

                    <div class="col-md-12">

                        <h2>{{ p_system('inicio_testimonios_titulo', $lang) }}</h2>

                    </div>

                    <div class="clearfix"></div>

                    @include('web.home.section.testimonials')

                </div>

            </div>

@endif
        </section>
@stop
