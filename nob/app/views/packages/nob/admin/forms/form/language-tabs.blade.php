@if(
    p_schema($model->getTable().".setup.translatable") &&
    count((array) app('config')->get('app.locales', ['es'])) > 1
)
            <ul class="nav nav-tabs nav-locales">

@foreach( app('config')->get('app.locales') as $lang )
                <li role="presentation"{{
                    HTML::classes([
                        'active' => app('session')->get('translate_language') === $lang
                    ])
                }}>

                    <a href="{{ route('admin.translate.language',$lang) }}">{{ trans("admin::admin.language.{$lang}") }}</a>

                </li>

@endforeach
            </ul>

            <div class="clearfix">&nbsp;</div>
@endif