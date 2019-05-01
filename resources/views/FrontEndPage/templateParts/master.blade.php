<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

    @include('FrontEndPage.templateParts.allCss')
    
</head>
<body>

@include('FrontEndPage.templateParts.header')

@yield('content')

@include('FrontEndPage.templateParts.footer')


@include('FrontEndPage.templateParts.allScripts')

@yield('scripts')
</body>
</html>