<!doctype html>

@include('layouts.head.lang')

<head>

        @include('layouts.head.schema')
        @include('layouts.head.google')
        @include('layouts.head.twitter')
        
        @include('layouts.metas.userApiToken')
        @include('layouts.metas.mutualVar')

        @include('layouts.head.asset')

        @yield('meta')


        <script type="text/javascript" src="{{mix('js/userAccount.js')}}" defer></script> 

    
</head>
<body>

    @livewire('header')

    @include('layouts.account.userHeader')

    <div class="container-fluid">

            <div class="grid grid-cols-12">
                <div class="col-span-12">

                    <div class="grid grid-cols-12">
                        @include('layouts.account.aside')

                        @yield('content')
                    </div>


                </div>
            </div>
	       
           @include('layouts.frontEnd.footer')



    </div>



  </body>

</html>