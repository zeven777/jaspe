                        <div id="{{ $relation }}Items" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{
                            $relation }}One">

                            <div class="panel-body relations">

@if($setup['type']==='Infinite')
                                <input type="hidden" name="lvl" id="infinite-lvl" value="{{
                                    $model->getInfiniteLevel() ?: 0 }}" />

                                <div id="list-infinite">

                                    <div class="list-parent-group row" data-level="0">

@include('admin::forms.fields.relation.panel.items')

                                    </div>

@if($model->getListParentGroup())
@for($lp=1; $lp<=count($model->getListParentGroup()); $lp++)
                                    <div class="clearfix"></div>

                                    <div class="h4">{{ $setup["title"] }} nivel {{ $lp }}</div>

                                    <div class="list-parent-group row" data-level="{{ $lp }}">

@foreach($model->getListParentGroup()[$lp] as $i=>$d)
                                        <div class="col-xs-12 col-sm-6 col-md-4">

                                            @include('admin::forms.fields.relation.panel.item')

                                        </div>

@if( ($i+1) %2 === 0 )
                                        <div class="clearfix"></div>

@endif
@endforeach
                                    </div>

@endfor
@endif
                                </div>

@else
                                <div id="all-list" class="row">

@if(
    array_key_exists('filter',$setup) &&
    array_key_exists('tabs',$setup['filter'])
)
@foreach(
    array_intersect_key(
        p_schema("{$relation}.fields.{$setup['filter']['field']}.labels"),
        array_flip((array) $setup['filter']['value'])
    ) as $tabKey => $tabLabel
)
                                    <div class="col-xs-12">

                                        <p><strong>{{ get_title_lang($tabLabel, $language) }}</strong></p>

                                    </div>

                                    <div class="clearfix"></div>

@include('admin::forms.fields.relation.panel.items', [
    'collection' => $collection->filter(function($item) use($tabKey, $setup)
        {
            return $item->{$setup['filter']['field']} === $tabKey;
        })
])
                                    <div class="clearfix"></div>
@endforeach
@else
@include('admin::forms.fields.relation.panel.items')
@endif
                                </div>

@endif
                            </div>

                        </div>
