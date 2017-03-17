<!--[if lt IE 9]>
<script type="text/javascript">
var e = ("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
for (var i=0; i<e.length; i++){document.createElement(e[i]);}
</script>
<![endif]-->

<script src="{{ route('admin.javascript') }}"></script>

@if(isset($form))
<script src="{{ route('admin.form.javascript',$form) }}"></script>

@endif
{{ HTML::script('packages/nob/admin/cms/js/jquery.min.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/base/js/bootstrap.min.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/ajax/bootstrap-ajax.js') }}
{{ HTML::script('packages/nob/admin/bootbox/bootbox.min.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/notify/js/bootstrap-notify.min.js') }}
{{ HTML::script('packages/nob/admin/cms/js/all.js') }}