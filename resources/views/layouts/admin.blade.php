<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('src/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>My Quotes|Admin</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('src/assets/css/dashlite.css?ver=2.2.0')}}">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="{{asset('js/app.js?v=').time()}}" defer></script>
 
    <link id="skin-default" rel="stylesheet" href="{{asset('src/assets/css/theme.css?ver=2.2.0')}}">
     
</head>

<body class="nk-body bg-lighter npc-general has-sidebar pt-5">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
           @include('inc.sidebar')
            <!-- wrap @s -->
            <div class="nk-wrap">        
                <!-- main header @e -->
                @include('inc.adminheader')
             <main id="content" class="mt-3">
                 @yield('content')
            </main>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
   <script type="text/javascript" src="{{ asset('js/modals.js') }}"></script>
    <script src="{{asset('src/assets/js/bundle.js?ver=2.2.0')}}"></script>
    <script src="{{asset('src/assets/js/scripts.js?ver=2.2.0')}}"></script>
    <!-- <script src="{{asset('src/assets/js/charts/gd-default.js?ver=2.2.0')}}"></script> -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.1/moment.min.js"></script>

</body>

</html>