<!doctype html>
@include('layouts.style.lang')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="api-token" content="{{ Auth::guard('admin')->check()?Auth::guard('admin')->user()->api_token:'' }}">
        
        <title>Ting Diamond</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
       
    </head>

    <body>
        <div>

        @if(auth()->guard('admin')->user())

            @include('layouts.backEnd.header')

        @endif

            <div id="backend" class="container is-widescreen"></div>

                  @yield('content')


                
            </div>
            
        <script type="text/javascript" src="{{mix('js/backend.js')}}"></script>
        <script type="text/javascript" src="{{mix('js/burgers.js')}}"></script>
    </body>
</html>
