                        <div class="panel-heading" role="tab" id="{{ $relation }}One">

                            <h4 class="panel-title">

                                <a class="collapsed" data-toggle="collapse" data-parent="#relation" href="#{{
                                    $relation }}Items" aria-controls="{{
                                    $relation }}Items">

@if($setup['type'] === 'Infinite')
                                    {{ (p_schema($relation.".setup.title")) ? get_title_lang(p_schema($relation.".setup.title"), $language) : ucfirst($relation) }}

@else
                                    <span data-all="{{
                                        count($collection) }}" data-items="">{{
                                        (array_key_exists('title',$schemas[$relation]['setup'])) ?
                                            $schemas[$relation]['setup']['title'] :
                                            ucfirst($relation)
                                    }}</span>

@endif
                                    <i class="fa pull-right"></i>

                                </a>

                            </h4>

                        </div>
