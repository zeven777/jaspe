@if( $blogs->count() > 0 )
@foreach( $blogs as $blog )
            @include('web.blog.item.blog')

@endforeach
            <div class="clearfix"></div>

            <div class="text-center">

                {{ $blogs->links() }}

            </div>
@endif