<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ env('APP_URL') }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta description="Grab yours and head to Brotzeit for the Oktoberfest party of the year!">
    <!-- FB OG Tags -->
    <meta property="og:url"           content="http://oktoberfest.brotzeit.co" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Get yours today! / Get your free beer!" />
    <meta property="og:description"   content="Original Oktoberfest beer imported from Germany - while stocks last!" />
    <meta property="og:image"         content="{{ env('APP_URL') }}/images/FBShare.jpg" />
    <!-- Twitter Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Brotzeit_SG">
    <meta name="twitter:creator" content="@Brotzeit_SG">
    <meta name="twitter:title" content="Get yours today! / Get your free beer!">
    <meta name="twitter:description" content="Original Oktoberfest beer imported from Germany - while stocks last!">
    <meta name="twitter:image" content="{{ env('APP_URL') }}/images/FBShare.jpg">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Brotzeit Oktoberfest') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MPQJS5R');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPQJS5R"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app"></div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>    
</body>
</html>
