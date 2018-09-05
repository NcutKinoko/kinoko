<!DOCTYPE html>
<html lang="en">
<style>
    html,body{
        background-color: #FFFFFF;
    }
</style>

<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
          crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/navigation.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.5.3/csshake.min.css"/>
</head>

<body>
@include('layouts.partials.navigation')
@yield('content')
<!--footer-->
@include('layouts.partials.footer')



<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>