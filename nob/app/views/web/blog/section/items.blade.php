@if( $blogs->count() > 0 )
@foreach( $blogs as $blog )
            @include('web.blog.item.blog')

@endforeach
@endif