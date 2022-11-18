<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i d e a</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Styles -->
    @section('styles')
    @show 
    <style>
        html, body {
            background-color:  rgb(23, 23, 26);
            color: #fff;
            font-family: 'Nunito', 'Droid Arabic Kufi', sans-serif;
            font-weight: 200;
            margin: 0;
        }

        .groupColor{
            background-color:  rgb(23, 23, 26);
            color: #fff;
        }

        .navtext {
            font-size:12px;
        }
    </style>
</head>
<body class="d-flex fixed-column h-100 ">
    
    <div class="container w-25 mt-3">
        <div class="navtext pl-4">
            <div>
            @yield('customNav')
            </div>
        </div>
    </div>
    <div class="container w-100 mt-3">
        @include('shared.error')
        @include('shared.message')
        <div class="pr-3">
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @section('scripts')
    @show
</body>
</html>
