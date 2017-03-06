@extends('web.main.layout')
@section('content')
        @include('web.commons.nav')

@if( $contact )
        <aside class="banner contacto">

            <h1>
                {{ HTML::cleanHtml($contact->titulo, 'p') }}
            </h1>

        </aside>

        <section class="main contacto">

            <div class="container">

                <div class="col-md-9 text-center center-block info">

                    {{ HTML::decode($contact->contenido) }}

                </div>

                <div class="mision col-md-12 center-block">

                    <div class="col-md-6 imgs izq">

                        <picture>

                            <source srcset="{{ $contact->image->getUrlRetinableImages(1) }}" />

                            <img src="{{ $contact->image->getImage(1) }}" alt="Jaspe"/>

                        </picture>

                    </div>

                    <div class="col-md-6 imgs der">

                        <img src="{{ $contact->getGoogleMapsStaticUrl() }}" alt="Jaspe" />

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="col-md-8 center-block text-center info2">

                    <h2 class="h1">{{
                        p_system('contacto_gerentes_titulo', $lang)
                    }}</h2>

                </div>

@if( $staff->count() > 0 )
                <div class="clearfix"></div>

                @include('web.contacto.section.staff')

@endif
            </div>

        </section>

@endif
@stop