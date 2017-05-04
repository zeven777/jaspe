                        <ul class="menu-foot">

                            <u>Jaspe</u>

@foreach( $enterprises as $enterprise )
                            @include('web.commons.about.item.category')

@endforeach
                            <li><a href="{{ route('contact') }}#distribuidor">Ser distribuidor</a></li>

                            <li><a href="{{ route('contact') }}">Cont&aacute;ctanos</a></li>

                            <li><a href="{{ route('blog.list') }}">Blog</a></li>

                        </ul>
