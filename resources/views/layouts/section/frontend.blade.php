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

        @livewireStyles
</head>
<body>

	    @livewire('header')

	      	@yield('content')

	    @include('layouts.frontEnd.footer')



    </div>


        @livewireScripts
  </body>
</html>