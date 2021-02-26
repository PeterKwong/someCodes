<!doctype html>

@include('layouts.head.lang')

<head>

        @include('layouts.head.schema')

        @include('layouts.head.google')

        @include('layouts.head.twitter')

        @include('layouts.metas.userApiToken')
        @include('layouts.metas.stripeHeaders')
        @include('layouts.metas.cache')

        @include('layouts.head.asset')

        @yield('meta')
        

</head>
<body>
    <div class="container-fluid">

	    @livewire('header')

	      	@yield('content')

	    @include('layouts.frontEnd.footer')



    </div>


  </body>
</html>