$(function(){
    $('body').find('.colorpicker').each(function(){
        $(this).spectrum({
            flat: false,
            showInput: true,
            preferredFormat: "rgb",
            showAlpha: true,
            showButtons: false,
            showInitial: true,
            showPalette: false,
            showPaletteOnly: false
        });
    });
    $('.datetimepicker').each(function(){
        $('#'+$(this).attr('id')).datetimepicker({
            format: $('#'+$(this).attr('id')).data('format'),
            locale: 'es',
            dayViewHeaderFormat: 'MMMM YYYY'
        });
    });
    $('.datepicker').each(function(){
        $('#'+$(this).attr('id')).datetimepicker({
            locale: 'es',
            format: $('#'+$(this).attr('id')).data('format'),
            dayViewHeaderFormat: 'MMMM YYYY'
        });
    });
    $('.timepicker').each(function(){
        $('#'+$(this).attr('id')).datetimepicker({
            locale: 'es',
            format: $('#'+$(this).attr('id')).data('format')
        });
    });
    $("body").on("dp.change",".datetimepicker[data-to]",function (e) {
        $('#'+$(this).data('to')+'datetimepicker').data("DateTimePicker").minDate(e.date);
    });
    $("body").on("dp.change",".datetimepicker[data-from]",function (e) {
        $('#'+$(this).data('from')+'datetimepicker').data("DateTimePicker").maxDate(e.date);
    });
    $('body').on('click','#relation .relations input[type="checkbox"]',function(){
        var items = $('#relation '+$(this).data('parent')).find('input:checked').length;
        $('#relation '+$(this).data('parent')+' a span').attr('data-items',items);
    });
    $('#relation .panel').each(function(){
        $(this).find('.panel-heading span').attr('data-items',$(this).find('input:checked').length);
    });
    $('body').on('click','*[data-toggle="tabulate"]',function(){
        var hidden = $(this).find('input:checked').val();
        $('#fileupload .form-group[data-tab]').filter('[class!="hidden"]').addClass('hidden');
        $('#fileupload .form-group[data-tab*="'+hidden+'"]').removeClass('hidden');
    });

    var sortableItems = $('[data-sortable="items"]');
    if(sortableItems.length > 0){
        $.each(sortableItems,function(){
            Sortable.create(this,{
                group: 'list',
                handle: '.draggable',
                ignore: 'a, img, input, button',
                animation: 150,
                delay: 1,
                onEnd: function (e) {
                    var arr = [];
                    $.each($(e.from).children(),function(){
                        arr.push($(this).data('index'));
                    });
                    $(e.from).parent().find('input[name="'+$(e.from).data('name')+'"]').val(arr.join('|'));
                }
            });
        });
    }

    $('body').on('click','[data-toggle="dataloader"]',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: $(this).data('url'),
            type: 'POST',
            data: { id: id },
            dataType: 'json'
        }).done(function(d){
            if(d.ok){
                var tabulate;
                $.each(d.fields,function(field,value){
                    var type;
                    var element = $('*[name="'+field+'"]');
                    if(element.length > 0){
                        type = element.prop('tagName') === "INPUT" ? element.attr('type') : element.prop('tagName').toLowerCase();
                        switch(type){
                            case "radio":
                                element.filter('[value="'+value+'"]').trigger('click');
                                break;
                            case "select":
                                var val = (value == null || value == "") ? 'null' : value;
                                element.find('option[value="'+val+'"]').prop('selected', 'selected');
                                element.trigger('change');
                                break;
                            default:
                                element.val(value);
                                break;
                        }
                        tabulate = $('[data-toggle="tabulate"]').has('*[name="'+field+'"]');
                        if(tabulate) tabulate.trigger('click');
                    }
                });
            }
        });
    });

    $('body').on('click','.last-tags .fa',function(e){
        e.preventDefault();
        var provideId = $(this).parents('.last-tags').data('id');
        var provideTags = $('[data-provide="tags"][id="'+provideId+'"]').data('tag');
        var tag = $(this).parents('span.label');
        provideTags.add(tag.data('tag'));
        tag.toggleClass('hidden');
    });

    $('body').on('added.bs.tags',function(e,d){
        e.preventDefault();
        var id = $(e.target).attr('id');
        var lastTags = $('.last-tags[data-id="'+id+'"]');
        lastTags.find('[data-tag="'+d+'"]').toggleClass('hidden');
    });

    $('body').on('removed.bs.tags',function(e,d){
        e.preventDefault();
        var id = $(e.target).attr('id');
        var lastTags = $('.last-tags[data-id="'+id+'"]');
        lastTags.find('[data-tag="'+d+'"]').toggleClass('hidden');
    });

    $('body').on('click','.nav-locales a',function(e){
        e.preventDefault();
        var Sthis = $(this);
        bootbox.confirm("Recomendamos guardar la información actual antes de editar otro idioma.<br /><br />¿Desea cambiar de idioma?",function(r){
            if(r){
                window.location.href = Sthis.attr('href');
            }
        });
    });

    $('body').on('click','[data-toggle="clipboard"]',function(e){
        e.preventDefault();
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).data('text')).select();
        document.execCommand("copy");
        notification('Copiado al portapapeles');
        $temp.remove();
    });
});