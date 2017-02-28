                    {{
                        Form::open([
                            'route'              => 'sendmail',
                            'method'             => 'post',
                            'class'              => 'form ajax',
                            'id'                 => 'sendmail',
                            'data-replace-inner' => '#sendmail-content',
                            'data-type-return'   => 'html',
                            'data-success'       => 'clear'
                        ])
                    }}

                        <div class="form-group">
                            <label class="form-label">Nombre y Apellido</label>
                            <div class="form-field">
                                <input type="text" name="cname" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">E-mail</label>
                            <div class="form-field">
                                <input type="email" name="cemail" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tel&eacute;fonos</label>
                            <div class="form-field">
                                <input type="text" name="cphone" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ciudad</label>
                            <div class="form-field">
                                <input type="text" name="ccity" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mensaje</label>
                            <div class="form-field">
                                <textarea name="cmessage" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-buttons">
                                <div id="sendmail-content"></div>
                                <button type="reset" class="btn">Borrar</button>
                                <button type="submit" class="btn">Enviar</button>
                            </div>
                        </div>
                    {{ Form::close() }}
