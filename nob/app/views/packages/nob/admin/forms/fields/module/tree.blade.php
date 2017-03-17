                    <div class="panel panel-primary">
                        <div class="panel-heading">&Aacute;rboles</div>
                        <div class="panel-body">
                            <div id="tree-items" class="tree-items">
@if( $model->exists && ! empty( unserialize($model->$name) ) )
@foreach( unserialize($model->$name) as $i => $treeData )
                                <div class="panel panel-info" data-tree="{{ $i }}">
                                    <div class="panel-heading">
                                        <div class="input-group">
@foreach( p_schema($model->getTable() . ".fields.{$name}.tree.fields") as $tField => $tSetup )
@if( $tSetup['type'] === 'module' && $tSetup['module'] === 'fontawesome' )
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary iconpicker"
                                                        role="iconpicker"
                                                        name="{{ $name }}[{{ $i }}][{{ $tField }}]"
                                                        data-iconset="fontawesome"
                                                        data-icon="{{ array_key_exists($tField,$treeData) ? $treeData[$tField] : '' }}"
                                                        data-placement="right">
                                                </button>
                                            </div>
@else
                                            <input{{
                                                HTML::attributes([
                                                    'type'        => 'text',
                                                    'name'        => "{$name}[{$i}][{$tField}]",
                                                    'class'       => 'form-control inline-block',
                                                    'value'       => array_key_exists($tField,$treeData) ? $treeData[$tField] : '',
                                                    'placeholder' => array_key_exists('legend',$tSetup) ? $tSetup['legend'] : ucfirst($tField),
                                                ])
                                            }} />
@endif
@endforeach
                                        </div>
                                    </div>
                                    <ul class="list-group">
@if(
    p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") &&
    array_key_exists('list',$treeData) &&
    ! empty($treeData['list'])
)
@foreach( $treeData['list'] as $j => $treeDataList)
                                        <li class="list-group-item">
@foreach( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") as $tLField => $tLSetup )
                                            <input{{
                                                HTML::attributes([
                                                    'type'        => 'text',
                                                    'name'        => "{$name}[{$i}][list][{$j}][$tLField]",
                                                    'data-name'   => $tLField,
                                                    'class'       => 'form-control inline-block',
                                                    'value'       => array_key_exists($tLField, $treeDataList) ? $treeDataList[$tLField] : '',
                                                    'placeholder' => array_key_exists('legend',$tLSetup) ? $tLSetup['legend'] : ucfirst($tLField),
                                                ])
                                            }} />
@endforeach
                                            <i class="btn btn-danger fa fa-trash pull-right" data-delete-tree-item="{{ $j }}"></i>
                                        </li>
@endforeach
@endif
                                    </ul>
                                    <div class="panel-footer text-right">
                                        <i class="btn btn-success fa fa-plus" data-add-tree-item="{{ $i }}"></i>
                                        <i class="btn btn-danger fa fa-trash" data-delete-tree="{{ $i }}"></i>
                                    </div>
                                </div>
@endforeach
@endif
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="tree-items-buttons">
                                <button type="button" class="btn btn-primary">{{ trans("admin::admin.title.form.module.tree.add") }}</button>
                            </div>
                        </div>
                    </div>
@section('moduleFontawesomeScript')
    {{ HTML::script('packages/nob/admin/bootstrap/iconpicker/js/iconset/iconset-fontawesome-4.3.0.min.js') }}
    {{ HTML::script('packages/nob/admin/bootstrap/iconpicker/js/bootstrap-iconpicker.min.js') }}
@stop
@section('moduleFontawesomeStyle')
    {{ HTML::style('packages/nob/admin/bootstrap/iconpicker/css/bootstrap-iconpicker.min.css') }}
@stop
@section('moduleTreeScript')
<script>
$(function(){
    $('body').on('click','.tree-items-buttons button',function(e){
        e.preventDefault();
        bootbox.confirm('{{ trans("admin::admin.title.form.module.tree.new") }}', function(r) {
            if(! r || r.length == 0) return;
            addTree();
            $('body').trigger('tree-items.close');
        });
    });
    $('body').on('tree-items.close',function(e){
//        setTreeItemsContainer();
    });
    $('body').on('click','#tree-items > .panel[data-tree] .btn[data-delete-tree]',function(e){
        e.preventDefault();
        deleteTree($(this).data('delete-tree'));
    });
    $('body').on('click','#tree-items > .panel[data-tree] .btn[data-add-tree-item]',function(e){
        e.preventDefault();
        addTreeGroupItem($(this).data('add-tree-item'));
    });
    $('body').on('click','#tree-items > .panel[data-tree] .btn[data-delete-tree-item]',function(e){
        e.preventDefault();
        deleteTreeGroupItem($(this).parents('.list-group'), $(this).data('delete-tree-item'));
    });
    function addTree(){
        var i = $('#tree-items > .panel').size();
        var nP = $('<div class="panel panel-info" data-tree="'+i+'" />');
        var nPH = $('<div class="panel-heading" />');
        var nPF = $('<div class="panel-footer text-right" />');
        var nPba = $('<i class="btn btn-success fa fa-plus" data-add-tree-item="'+i+'" />');
        var nPbc = $('<i class="btn btn-danger fa fa-trash" data-delete-tree="'+i+'" />');
@if( p_schema($model->getTable() . ".fields.{$name}.tree.fields") )
        var nIG = $('<div class="input-group" />');
@foreach( p_schema($model->getTable() . ".fields.{$name}.tree.fields") as $tField => $tSetup )
@if( $tSetup['type'] === 'module' && $tSetup['module'] === 'fontawesome' )
        var nIGA = $('<div class="input-group-btn" />');
        var nFA = $('<button class="btn btn-primary" role="iconpicker" name="{{ $name }}['+i+'][{{
            $tField }}]" data-iconset="fontawesome" data-icon="" data-placement="right" />');
        nFA.appendTo(nIGA);
        nIGA.appendTo(nIG);
@else
        var nIF = $('<input type="text" name="{{ $name }}['+i+'][{{
            $tField }}]" class="form-control inline-block" placeholder="{{
            array_key_exists('legend',$tSetup) ? $tSetup['legend'] : ucfirst($tField);
        }}" />');
        nIF.appendTo(nPH);
@endif
@endforeach
        nPba.appendTo(nPF);
        nPF.append(' ');
        nPbc.appendTo(nPF);
        nIF.appendTo(nIG);
        nIG.appendTo(nPH);
        nPH.appendTo(nP);
        nPF.appendTo(nP);
        $('#tree-items').append(nP);
@endif
@if( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") )
        addTreeGroup(i);
        addTreeGroupItem(i);
@endif
    }
    function addTreeGroup(i){
        var nPH = $('#tree-items > .panel[data-tree="'+i+'"] .panel-heading');
        var nLI = $('<ul class="list-group" />');
        nPH.after(nLI);
        $('[role="iconpicker"]').iconpicker();
    }
    function addTreeGroupItem(i){
        var pLG = $('#tree-items > .panel[data-tree="'+i+'"] .list-group');
        var l = pLG.find('.list-group-item').size();
        var nLIG = $('<li class="list-group-item" />');
        var nPbc = $('<i class="btn btn-danger fa fa-trash pull-right" data-delete-tree-item="'+l+'" />');
@if( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") )
@foreach( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") as $tLField => $tLSetup )
        var nLIF = $('<input type="text" name="{{ $name }}['+i+'][list]['+l+'][{{ $tLField }}]" data-name="{{
            $tLField }}" class="form-control inline-block" placeholder="{{
            array_key_exists('legend',$tLSetup) ? $tLSetup['legend'] : ucfirst($tLField);
        }}" />');
        nLIF.appendTo(nLIG);
@endforeach
        nPbc.appendTo(nLIG);
        nLIG.appendTo(pLG);
@endif
    }
    function deleteTree(i){
        var treeItems = $('#tree-items');
        treeItems.find('.panel[data-tree]:nth('+i+')').remove();
        var treePanels = treeItems.children('.panel');
        if(treePanels.size() > 0) treePanels.each(function(n,v){
            $(this).attr('data-tree',n);
            $(this).find('.btn[data-add-tree-item]').attr('data-add-tree-item',n);
            $(this).find('.btn[data-delete-tree]').attr('data-delete-tree',n);
@if( p_schema($model->getTable() . ".fields.{$name}.tree.fields") )
@foreach( p_schema($model->getTable() . ".fields.{$name}.tree.fields") as $tField => $tSetup )
@if( $tSetup['type'] === 'module' && $tSetup['module'] === 'fontawesome' )
            $(this).find('.panel-heading button[role="iconpicker"]').attr('name','{{ $name }}['+n+'][{{ $tField }}]');
@else
            $(this).find('.panel-heading input.form-control').attr('name','{{ $name }}['+n+'][{{ $tField }}]');
@endif
@endforeach
@endif
@if( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") )
            var treeListGroupItem = $(this).find('.list-group .list-group-item');
            if(treeListGroupItem.size() > 0) treeListGroupItem.each(function(m,v){
@foreach( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") as $tLField => $tLSetup )
                $(this).find('input.form-control[data-name="{{ $tLField }}"]').attr('name','{{
                    $name }}['+n+'][list]['+m+'][{{ $tLField }}]');
@endforeach
            });
@endif
        });
    }
    function deleteTreeGroupItem(pLG,i){
        pLG.find('.list-group-item:nth('+i+')').remove();
@if( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") )
        var n = pLG.parents('.panel[data-tree]').data('tree');
        var treeListGroupItem = pLG.find('.list-group-item');
        if(treeListGroupItem.size() > 0) treeListGroupItem.each(function(m,v){
@foreach( p_schema($model->getTable() . ".fields.{$name}.tree.list.fields") as $tLField => $tLSetup )
            $(this).find('input.form-control[data-name="{{ $tLField }}"]').attr('name','{{
                $name}}['+n+'][list]['+m+'][{{ $tLField }}]');
@endforeach
            $(this).find('.btn[data-delete-tree-item]').attr('data-delete-tree-item',m);
        });
@endif
    }
});
</script>
@stop
