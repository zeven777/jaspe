                        <ul class="row menu-foot">

                            <u>Jaspe</u>

@foreach( $enterprises as $enterprise )
                            @include('web.commons.about.item.category')

@endforeach
                            <li><a href="javascript:;">Ser distribuidor</a></li>

                            <li><a href="{{ route('contact') }}">Contacto</a></li>

                        </ul>