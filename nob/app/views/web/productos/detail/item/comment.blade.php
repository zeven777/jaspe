                        <div class="post">

                            <h4>

                                {{ $comment->nombre }}<br />

                                <span class="fecha">{{ date('F d, Y', strtotime($comment->created_at)) }}</span>

                                <span class="rate">
@for( $i = 1; $i <= 5; $i++ )
                                    <i{{
                                        HTML::classes([
                                            'fa fa-star' => true,
                                            'bit' => (int) $comment->rank >= $i
                                        ])
                                    }} aria-hidden="true"></i>
@endfor
                                </span>

                            </h4>

                            <p>
                                {{ $comment->comentario }}
                            </p>

                        </div>