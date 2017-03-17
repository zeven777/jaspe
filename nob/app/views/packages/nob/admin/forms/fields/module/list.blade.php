                    <textarea class="hidden" name="{{ $name }}" data-type="listItems"></textarea>
                    <div id="list-items" class="list-items"></div>
                    <div class="list-items-buttons">
                        <button type="button" class="btn btn-primary">Agregar</button>
                    </div>
@section('moduleListScript')
<script>
var listItems = {{
    Input::old($name) ?: (
        ( $model->exists && ! empty($model->{$name}) ) ?
        $model->{$name} : '[]'
    )
}};
var listItem;
$(function(){
    $('body').on('click','.list-items-buttons button',function(e){
        e.preventDefault();
        var listItem = {};
        bootbox.prompt({
            title: '{{ trans("admin::admin.title.form.module.list.new") }}',
            value: '',
            callback: function(result) {
                if(result.length == 0) return;
                listItem.title = Encoder.htmlEncode(result);
                listItems.push(listItem);
                $('body').trigger('list-items.close');
            }
        });
    });
    $('body').on('list-items.close',function(e){
        setListItemsContainer();
    });
    $('body').on('click','#list-items > ul > li',function(e){
        listItems.splice($(this).index(),1);
        $(this).remove();
        setListItemsContainer();
    });
    function addItemToList(listItem){
        $('#list-items > ul').append('<li title="{{
            trans("admin::admin.title.form.module.list.delete")
        }}"><i class="fa fa-remove"></i> <span>'+listItem.title+'</span></li>');
    }
    function setListItemsContainer(){
        $('textarea[data-type="listItems"]').val(JSON.stringify(listItems));
        $('#list-items').empty();
        $('#list-items').append('<ul />');
        $.each(listItems,function(){
            addItemToList(this);
        });
    }
    setListItemsContainer();
});
</script>
@stop