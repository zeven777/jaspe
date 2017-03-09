@extends('web.main.layout')
@section('content')
    @include('web.commons.nav')

    <aside class="banner blog-detail" style="background-image: url('{{ url('img/bannernos.jpg') }}');">
    </aside>

    <section class="main blog detail">

        <div class="container">

            {{ HTML::decode($blog->contenido) }}

            <h2>Gracias por dejarnos tanto</h2>

            @include('web.blog.section.items')

        </div>

    </section>
@stop