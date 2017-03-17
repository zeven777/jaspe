@if( array_key_exists('pre',$schema['setup']) )
@foreach($schema['setup']['pre'] as $preName => $preSetup)
            <div id="{{ $preName }}" class="panel panel-body">

                <div class="panel panel-info no-margin">

                    <div class="panel-heading">{{
                        e($preSetup['title'])
                    }}</div>

                    <div class="panel-body">

                        <pre class="no-margin">{{
                            ( array_key_exists('var',$preSetup) && $model->exists ) ?
                            e(loadVars($model,$preSetup['var'],$preSetup['content'])) :
                            e($preSetup['content']);
                        }}</pre>

                    </div>

                </div>

            </div>

@endforeach
@endif