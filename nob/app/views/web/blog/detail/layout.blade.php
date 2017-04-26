@extends('web.main.layout')
@section('content')
    <aside class="banner blog-detail" style="background-image: url('{{ $blog->image->getImage(1) }}');">
    </aside>

    <section class="main blog detail">

        <div class="container">

            <div class="blog-content center-block">

                {{ HTML::decode($blog->contenido) }}

            </div>

            @include('web.blog.section.items')

        </div>

    </section>
@stop