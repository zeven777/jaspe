<!DOCTYPE html>

<html itemscope itemtype="http://schema.org/Article">

<head>

@include('web.commons.meta')

@include('web.commons.style')

@include('web.commons.scripts')
@yield('style')
@yield('mscript')

</head>

<body>

    @include('web.commons.nav')

    @include('web.commons.header')

    <div{{
        HTML::classes([
            'page',
            'detalles' => (bool) ($action === 'productos_detail')
        ])
    }}>

@yield('content')
        @include('web.commons.footer')

    </div>

    <div class="clear"></div>
@yield('script')

    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/main.js') }}
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','{{ p_system('google_analytics', $lang)  }}');ga('send','pageview');
    </script>

</body>

</html>