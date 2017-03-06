                <div class="col-md-3 text-center">

                    <h3>{{ $s->nombre }}</h3>

                    <p>{{ $s->lugar }}</p>

                    <p>
                        <a href="mailto:{{ $s->email }}">{{ $s->email }}</a> <br />

                        {{ $s->telefono }}
                    </p>

                </div>