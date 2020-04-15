<!doctype html>

@include('layouts.head.lang')

<head>

        @include('layouts.head.schema')

        @include('layouts.head.google')

        @include('layouts.head.twitter')

        @include('layouts.head.asset')

        @yield('meta')
        
        @include('layouts.metas.userApiToken')
        @include('layouts.metas.stripeHeaders')

    
</head>
<body>
    <div class="container-fluid">

	    @include('layouts.frontEnd.header')

	      	@yield('content')

	    @include('layouts.frontEnd.footer')



    </div>



  </body>
</html>