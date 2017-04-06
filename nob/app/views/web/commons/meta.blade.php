<title>{{ $title }}</title>

<meta charset="utf-8" />

<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<meta name="robots" content="index, follow">

<meta name="_token" content="{{ csrf_token() }}" />

<meta name="author" content="Neurobyte Diseños, C.A." />

<meta name="keywords" content="{{ p_system('keywords', $lang) }}" />

<meta name="description" content="{{ p_system('description', $lang) }}" />

<meta property="og:title" content="{{ $ogtitle }}" />

<meta property="og:description" content="{{ $ogdescription }}" />

<meta property="og:type" content="{{ $ogtype }}" />

<meta property="og:url" content="{{ $ogurl }}" />

<meta property="og:image" content="{{ $ogimage }}" />

<meta property="og:site_name" content="{{ $ogsiteName }}" />

<meta property="fb:admins" content="{{ p_system('fbadmins', $lang) }}" />

<meta itemprop="name" content="{{ $ogtitle }}" />

<meta itemprop="description" content="{{ $ogdescription }}" />

<meta itemprop="image" content="{{ $ogimage }}" />
