<!doctype html>
@include('layouts.head.lang')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ting Diamond</title>
        
        @include('layouts.metas.userApiToken')


        <!-- App favicon -->
        <link rel="shortcut icon" href="/front_end/company/logo_2019_white.png">   

        <!-- Plugin css -->
        <link href="/admin/assets/libs/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="/admin/assets/css/{{isset($_COOKIE['theme'])?'light/':''}}bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/{{isset($_COOKIE['theme'])?'light/':''}}app.min.css" rel="stylesheet" type="text/css" />

        @livewireStyles


    </head>

    <body>

        <!-- Navigation Bar-->

        @if( !strpos(url()->current(), 'invoices/pdf'))

            @include('layouts.backEnd.header')

        @endif

        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid">


                <div class="row flex-row flex-nowrap">
                    <div class="col-12">
                        <div id="backend" class="container is-widescreen"></div>

                              @yield('content')

                        <!-- end col-12 -->
                    </div>
                </div> <!-- end row -->



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->

<!--             @include('layouts.backEnd.footer')
 -->            
        <!-- end Footer -->

        <!-- Right Sidebar -->

            @include('layouts.backEnd.rightBar')

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

            
        <script type="text/javascript" src="{{mix('js/backend.js')}}"></script>
       <!-- Vendor js -->
        <script src="/admin/assets/js/vendor.min.js"></script>

        <!-- fullcalendar plugins -->
        <script src="/admin/assets/libs/moment/moment.js"></script>
        <script src="/admin/assets/libs/jquery-ui/jquery-ui.min.js"></script>
        <script src="/admin/assets/libs/fullcalendar/fullcalendar.min.js"></script>

        <!-- fullcalendar js -->
        <script src="/admin/assets/js/pages/fullcalendar.init.js"></script>

        <!-- App js-->
        <script src="/admin/assets/js/app.min.js"></script>
        
        @livewireScripts

    </body>
</html>
