<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @include('backEnd.templateParts.allCss')

</head>

<body>
<div id="wrapper">
    @include('backEnd.templateParts.sidebar')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('backEnd.templateParts.pageHeading')
        @yield('content')
        @include('backEnd.templateParts.footer')
    </div>
</div>



@include('backEnd.templateParts.allScript')
</body>
</html>