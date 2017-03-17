@if($rows->count() > 0)
@if($group)
@foreach($groupList as $list)
        <h3 class="grouped">{{ $list->getListfield(p_schema($list->getTable().".setup.head")) }}</h3>
        <table class="table table-striped table-hover">
            @include('admin::forms.list.body',['rows' => $list->getRelation($form)])

        </table>
@endforeach
@else
        <table class="table table-striped table-hover">
            @include('admin::forms.list.header')

            @include('admin::forms.list.body')

        </table>
@endif
        <div class="text-center">{{
            ( $group ) ? $groupList->links() : $rows->links()
        }}</div>
@if( p_schema("{$form}.setup.suscription.type") === 'email' && $ctab === p_schema("{$form}.setup.suscription.value") )
        <div class="panel-body text-center">
            <a href="{{ route('admin.form.suscription',[$form]) }}" class="btn btn-primary" data-send="suscription">
                <i class="fa fa-envelope"></i>&nbsp; {{ trans("admin::admin.button.form.suscription.email") }}
            </a>
        </div>
@endif
@if( $ctab === 'all' && p_schema("{$form}.setup.mail") )
        <div class="panel-body text-center">
@foreach( p_schema("{$form}.setup.mail") as $module => $msetup )
            <a href="{{ route('admin.form.mail',[$form,$module]) }}" class="btn btn-primary" data-send="mail">
                <i class="fa fa-envelope"></i>&nbsp; {{ get_title_lang($msetup['title'], $language) }}
            </a>
@endforeach
        </div>
@endif
        @include('admin::forms.list.legend')
@else
        <div class="alert alert-danger text-center no-radius">
            {{ trans("admin::admin.message.form.row.nofound") }}
        </div>
@endif