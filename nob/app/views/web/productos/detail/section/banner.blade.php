        <aside class="banner detalle" style="background-color: {{ $product->getBackgroundColor() }}">

            <div class="banner-reel">

                <div id="carousel" class="carousel slide" data-ride="carousel">

@if(
    $product->imagesText instanceof \Illuminate\Database\Eloquent\Collection &&
    $product->imagesText->count() > 1
)
                    <!-- Indicators -->
                    <ol class="carousel-indicators">

@foreach( $product->imagesText as $i => $img )
                        <li{{
                            HTML::classes([
                                'active' => ($i == 0)
                            ])
                        }} data-target="#carousel" data-slide-to="{{ $i }}"></li>

@endforeach
                    </ol>

@endif
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

@foreach( $product->imagesText as $i => $img )
                        <div{{
                            HTML::classes([
                                'item',
                                'active' => ($i == 0)
                            ])
                        }} style="background-image: url('{{ $img->getImage(1) }}')"></div>

@endforeach
                    </div>

@if(
    $product->imagesText instanceof \Illuminate\Database\Eloquent\Collection &&
    $product->imagesText->count() > 1
)
                    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

@endif
                </div>

            </div>

            <div class="before"></div>

        </aside>