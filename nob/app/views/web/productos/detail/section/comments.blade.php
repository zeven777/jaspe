@if( $product->comentario->count() > 0 )
                    <div class="valora item col-md-10 text-center center-block">

@foreach( $product->comentario as $comment )
                        @include('web.productos.detail.item.comment')

@endforeach
                    </div>

@endif