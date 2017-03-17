<title>{{ $title }}</title>
<meta charset="utf-8" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="_token" content="{{ csrf_token() }}" />
@include('admin::commons.styles')

@yield('style')
@include('admin::commons.scripts')

@yield('mscript')