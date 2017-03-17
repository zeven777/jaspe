{{ HTML::script('packages/nob/admin/tinymce/tinymce.min.js') }}
{{ HTML::script('packages/nob/admin/imgareaselect/scripts/jquery.imgareaselect.pack.js') }}
{{ HTML::script('packages/nob/admin/cms/js/jquery.cycle.js') }}
{{ HTML::script('packages/nob/admin/cms/js/jquery.start.js') }}
{{ HTML::script('packages/nob/admin/spectrum/spectrum.min.js') }}
{{ HTML::script('packages/nob/admin/sortable/js/sortable.min.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/tags/bootstrap-tags.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/datetimepicker/js/moment.js') }}
{{ HTML::script('packages/nob/admin/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js') }}
{{ HTML::script('packages/nob/admin/cms/js/encoder.js') }}
{{ HTML::script('packages/nob/admin/cms/js/form.js') }}
@if( p_schema("{$form}.setup.type") === 'multifile')
@include('admin::forms.commons.fileuploader')
{{ HTML::script('packages/nob/admin/cms/js/multifile.js') }}
{{ HTML::script('packages/nob/admin/cms/js/tools.js') }}
@endif