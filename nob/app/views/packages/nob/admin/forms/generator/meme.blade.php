            <div class="control-group">
                <label class="control-label">Imagen</label>
                <div class="controls text-center">
                    <div id="meme-content" data-url="{{URL::action('Nob\Admin\Controllers\GeneratorController@loadImageSampled',array('type'=>'meme','form'=>$form,'id'=>$id))}}" data-start="{{URL::action('Nob\Admin\Controllers\GeneratorController@loadImageSampled',array('type'=>'meme','form'=>$form,'id'=>$id))}}">
                        <img width="333" height="333" id="meme-preview" src="{{URL::action('Nob\Admin\Controllers\GeneratorController@loadImageSampled',array('type'=>'meme','form'=>$form,'id'=>$id))}}" />
                    </div>
                    <p class="text-center">
                        <button type="button" class="btn btn-primary" data-command="preview" data-url="{{URL::action('Nob\Admin\Controllers\GeneratorController@loadMemeImageSampled',array('type'=>'meme','form'=>$form,'id'=>$id))}}">Vista Previa</button>
                        <button type="button" class="btn btn-default" data-command="selector">Editar</button>
                    </p>
                </div>
                <div id="data-done" class="text-center"></div>
            </div>
            <div class="control-group">
                <label class="control-label">Texto</label>
                <div class="controls">
                    <input type="text" name="meme[text]" value="{{($errors && Input::old('meme.text'))?Input::old('meme.text'):''}}" class="input-block-level" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Color</label>
                <div class="controls">
                    <input type="text" id="color" name="meme[color]" value="{{($errors && Input::old('meme.color'))?Input::old('meme.color'):'#000000'}}" class="span2 colorpicker" maxlength="7" />
                    <div id="pickercolor"></div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tamaño (px)</label>
                <div class="controls">
                    <select class="input-block-level" name="meme[size]">
                        <option value="" selected="">Seleccione</option>
@foreach($setup['fontsizes'] as $size)
                        <option value="{{$size}}"@if($errors && Input::old('meme.size')==$size) selected="selected"@endif>{{$size}}</option>
@endforeach
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Fuente</label>
                <div class="controls">
                    <select class="input-block-level" name="meme[font]">
                        <option value="" selected="">Seleccione</option>
@foreach($setup['fonts'] as $font=>$label)
                        <option value="{{$font}}"@if($errors && Input::old('meme.font')==$font) selected="selected"@endif>{{$label}}</option>
@endforeach
                    </select>
                </div>
            </div>
{{--
            <div class="control-group">
                <label class="control-label">Ubicacion</label>
                <div class="controls">
                    <select class="input-block-level" name="meme[position]">
                        <option value="" selected="">Seleccione</option>
                        <option value="top">Arriba</option>
                        <option value="center">Centro</option>
                        <option value="bottom">Abajo</option>
                    </select>
                </div>
            </div>
--}}
            <div>
                <input type="hidden" name="meme[position]" value="{{($errors && Input::old('meme.position'))?Input::old('meme.position'):'center'}}"/>
                <input type="hidden" name="position_x" value="{{($errors && Input::old('position_x'))?Input::old('position_x'):'0'}}"/>
                <input type="hidden" name="position_y" value="{{($errors && Input::old('position_y'))?Input::old('position_y'):'0'}}"/>
                <input type="hidden" name="width" value="{{($errors && Input::old('width'))?Input::old('width'):'0'}}"/>
                <input type="hidden" name="height" value="{{($errors && Input::old('height'))?Input::old('height'):'0'}}"/>
            </div>