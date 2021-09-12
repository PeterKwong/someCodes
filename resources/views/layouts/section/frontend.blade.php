<!doctype html>

@include('layouts.head.lang')

<head>
        
    @include('layouts.head.schema')
    @include('layouts.head.google')
    @include('layouts.head.twitter')
    
    @include('layouts.metas.userApiToken')
    @include('layouts.metas.mutualVar')
    @include('layouts.metas.stripeHeaders')
    @include('layouts.metas.cache')

    @include('layouts.head.asset')
    @include('layouts.js.screen-width')

    @yield('meta')
    

    @livewireStyles
</head>
<body>

    @php( $baseUrl = url(app()->getLocale()) )
    @include('layouts.frontend.header')
        
        @yield('hero')

        <x-breadcrumb />

        @yield('content')            

            
    @include('layouts.frontend.footer')



    @livewireScripts
  </body>
</html>