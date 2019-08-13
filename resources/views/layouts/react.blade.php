<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="{{ env('APP_URL') }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"           content="http://oktoberfest.brotzeit.co" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Oktoberfest" />
    <meta property="og:description"   content="Grab yours and head to Brotzeit for the Oktoberfest party of the year!" />
    <meta property="og:image"         content="{{ env('APP_URL') }}/images/FBShare.jpg" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Brotzeit Oktoberfest') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app"></div>
    <div id="fb-root"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>    
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=115382038551862&autoLogAppEvents=1"></script>
</body>
</html>
