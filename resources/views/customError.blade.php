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
        }

        .mid{
            padding-top:200px;
        }

        .footer{
            margin-top:200px;
        }
    </style>
</head>

<body>
        <div class="container mid w-500">
            <div class="text-center">
                <p><img src="{{asset('/images/idea2.png')}}" width=140px></p>
                <h5 class="text-light">{{__('messages.notauther')}}</h5>
                <a href="/" class="btn btn-dark btn-sm mb-3">{{__('messages.home')}}</a>
            </div>

            <div class="footer">
                @include('layouts.footer')
            </div>

        </div>
</body>
</html>
