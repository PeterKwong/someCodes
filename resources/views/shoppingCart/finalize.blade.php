<!doctype html>
@include('layouts.style.lang')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.metas.schema')
        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('shoppingCart.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" />
        <meta name="keywords" content="@include('shoppingCart.keywords')"> 

        @include('layouts.metas.google')

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('shoppingCart.meta') {{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        @include('layouts.metas.twitter')

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('engagementRing.metaDescription1')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('shoppingCart.meta') - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('shoppingCart.keywords')" /> 
        @include('layouts.metas.openGraph')
        @include('layouts.style.checkoutHeader')

        @include('layouts.metas.stripeHeaders')
        @include('layouts.metas.userApiToken')

        <!-- Fonts -->
       
        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
       
    </head>
   
    @include('layouts.frontHeader')
    <body>
            <br>
            <div class="columns is-mobile is-centered is-multiline box">
              <div class="column is-narrow">
                <center>

                    <p class="subtitle is-3">
                      {{__('shoppingCart.Order Finalize')}}<br>
                    </p>
                         <p>{{__('shoppingCart.Congratulations, you have successfully confirmed your order!')}}</p>

                    <div class="notification is-primary">
                            <a href="/login">{{__('shoppingCart.Login/Sign up to track your order.')}}</a>
                    </div>

                </center>

              </div>
            </div>



    @include('layouts.frontFooter')

  

</body>



</html>
