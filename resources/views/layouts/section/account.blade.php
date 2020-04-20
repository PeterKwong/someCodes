<!doctype html>

@include('layouts.head.lang')

<head>

        @include('layouts.head.schema')

        @include('layouts.head.google')

        @include('layouts.head.twitter')

        @include('layouts.head.asset')

        @yield('meta')

        @include('layouts.metas.userApiToken')

        <script type="text/javascript" src="{{mix('js/userAccount.js')}}" defer></script> 

    
</head>
<body>

    @include('layouts.frontEnd.header')

    @include('layouts.account.userHeader')

    <div class="container-fluid">



            <div class="row justify-content-center">
                <div class="col-11">

                    <div class="row justify-content-center">
                        @include('layouts.account.aside')

                        @yield('content')
                    </div>


                </div>
            </div>
	       
           @include('layouts.frontEnd.footer')



    </div>



  </body>

</html>