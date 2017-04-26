                <div class="col-md-3 staff text-center">

                    <h3><a href="mailto:{{ $s->email }}">{{ $s->nombre }}</a></h3>

                    <p><a href="mailto:{{ $s->email }}">{{ $s->lugar }}</a></p>

                    <p>
                        <a href="mailto:{{ $s->email }}">{{ $s->email }}</a> <br />

                        {{ $s->telefono }}
                    </p>

                </div>