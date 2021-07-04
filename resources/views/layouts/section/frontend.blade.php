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

    @yield('meta')
    

    @livewireStyles
</head>
<body>
    <div class="container-fluid">

        @livewire('header')

            <div class="mt-16">
                
                <x-breadcrumb />

                @yield('content')            
            </div>

        @include('layouts.frontEnd.footer')



    </div>


        @livewireScripts
  </body>
</html>