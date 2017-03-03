                        <ul class="row menu-foot">

                            <u>Productos</u>

@foreach( $categories as $category )
                            @include('web.commons.products.item.category')

@endforeach
                        </ul>