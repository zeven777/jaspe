@extends('web.main.layout')
@section('content')
    @include('web.commons.nav')

    @include('web.blog.section.banner')

    <section class="main blog">

        <div class="container">

            @include('web.blog.section.items')

        </div>

    </section>
@stop