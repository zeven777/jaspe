@extends('admin::commons.layout')
@section('content')
        @include('admin::forms.commons.title')

        @include('admin::forms.list.tabs')

        @include('admin::forms.list.layout')

@stop
@section('header-search')
        @include('admin::commons.search',[
            'route' => route(Route::currentRouteName(),compact('form','ctab'))
        ])

@stop
@section('mscript')
{{ HTML::script('packages/nob/admin/imgareaselect/scripts/jquery.imgareaselect.pack.js') }}
{{ HTML::script('packages/nob/admin/cms/js/jquery.cycle.js') }}
{{ HTML::script('packages/nob/admin/sortable/js/sortable.min.js') }}
{{ HTML::script('packages/nob/admin/cms/js/list.js') }}
@if($schema['setup']['type']!=='text')
{{ HTML::script('packages/nob/admin/cms/js/tools.js') }}
@endif
@stop
@section('style')
{{ HTML::style('packages/nob/admin/imgareaselect/css/imgareaselect-default.css') }}
@stop
@section('script')
<script>
var items, ias, iasW, iasH, imgW, imgH, url, sortable;
@if($schema['setup']['type']!=='text' && array_key_exists('image',$schema['setup']))
$(function(){
    $('body').on('click','#edit-image',function(){
        var id = $('#cycle').find('*[data-active="active"]').data('id');
        var url = "{{ url('/admin/'.$form.'/image') }}/"+id;
        $(window).scrollTop(0);
        $('#Modal .modal-content').load(url);
    });
});
@endif
@if( p_schema("{$form}.setup.mail") && $ctab === 'all' && $rows->count() > 0 )
$(function(){
    items = document.getElementById('items');
    $('body').on('click','[data-send="mail"]',function(e){
        e.preventDefault();
        var data = {
            id: []
        };
        $('#items > tr').each(function(i,o){
            data.id.push($(this).data('id'));
        });
        $.ajax({
            url: $(this).attr('href'),
            type: 'POST',
            data: data,
            dataType: 'json'
        }).done(function(d){
            if(d.ok){
                notification(d.message,d.type);
            }
        });
    });
});
@endif
@if( p_schema("{$form}.setup.suscription.type") === 'email' && $ctab === p_schema("{$form}.setup.suscription.value") && $rows->count() > 0 )
$(function(){
    items = document.getElementById('items');
    $('body').on('click','[data-send="suscription"]',function(e){
        e.preventDefault();
        var Sthis = $(this);
        var data = {
            page: {{ Input::get('page') ?: 1 }},
            id: []
        };
        $('#items > tr').each(function(i,o){
            data.id.push($(this).data('id'));
        });
        $.ajax({
            url: Sthis.attr('href'),
            type: 'POST',
            data: data,
            dataType: 'json'
        }).done(function(data){
            if(data.ok){
                notification(data.message,data.type);
            }
        });
    });
});
@endif
@if( p_schema("{$form}.setup.orderable") && $rows->count() > 0 )
$(function(){
    items = document.getElementById('items');
    sortable = Sortable.create(items,{
        group: 'list',
        handle: '.draggable',
        ignore: 'a, img, input, button',
        animation: 150,
        disabled: true,
        delay: 1
    });
    $('body').on('click','[data-sortable="order"]',function(){
        var state = sortable.option("disabled");
        var text = state ? '{{ trans("admin::admin.button.save") }}' : '{{ trans("admin::admin.button.form.order") }}';
        sortable.option("disabled", !state);
        if( ! state ){
            var data = {
                pages: {{ $rows->getLastPage() }},
                perPage: {{ $paginate }},
                page: {{ Input::get('page') ?: 1 }},
                id: []
            };
            $('.draggable').each(function(i,o){
                data.id.push($(this).data('id'));
            });
            $.ajax({
                url: "{{ route('admin.form.order',$form) }}",
                type: 'POST',
                data: data,
                dataType: 'json'
            }).done(function(data){
                if(data.ok){
                    notification(data.message,data.type);
                }
            });
        }
        $(this).toggleClass('btn-success');
        $(this).toggleClass('sortable-save');
        $('#items').toggleClass('active');
        $(this).find('span').html( text );
    });
    $('body').on('click.bs.dropdown','.pagelist .dropdown-toggle',function(e){
        var i;
        var cl = $(this).parents('.pagelist').find('.dropdown-menu');
        $('.pagelist .dropdown-menu').empty();
        for( i = 1; i <= {{ $rows->getLastPage() }}; i++ ){
            if( i != {{ Input::get('page') ?: 1 }} ) {
                var li = $('<li></li>');
                var a = $('<a href="javascript:;" data-page="'+i+'">'+i+'</a>');
                li.append(a);
                cl.append(li);
            }
        }
    });
    $('body').on('click','.pagelist .dropdown-menu a',function(e){
        var id = $(this).parents('.draggable').data('id');
        var page = $(this).data('page');
        var data = {
            pageTo: page,
            pages: {{ $rows->getLastPage() }},
            perPage: {{ $paginate }},
            page: {{ Input::get('page') ?: 1 }},
            id: id
        };
        $.ajax({
            url: "{{ route('admin.form.order',$form) }}",
            type: 'POST',
            data: data,
            dataType: 'json'
        }).done(function(data){
            if(data.ok){
                notification(data.message,data.type);
                setTimeout(function(){
                    window.location.reload();
                },2000);
            }
        });
    });
});
@endif
</script>
@stop
