@extends('web.main.layout')
@section('content')
    @include('web.commons.nav')

    @include('web.blog.section.banner')

    <section class="main blog">

        <div class="container">

@foreach( $blogs as $blog )
            @include('web.blog.item.blog')

@endforeach
        </div>

    </section>
@stop