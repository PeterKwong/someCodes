<!doctype html>
@include('layouts.style.lang')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        @include('layouts.metas.schema')
        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('diamond.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="@include('diamond.keywords')"> 

        @include('layouts.metas.google')

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        @include('layouts.metas.twitter')

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="@include('diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('diamond.keywords')" /> 
        @include('layouts.metas.openGraph')

        <!-- Fonts -->
       
        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
       
    </head>
   
    @include('layouts.frontHeader')
    <body>
      
        <div id="diamondViewerShow">
        	<div class="container">
                    </div >
                      <div class="columns is-mobiled">
                        <div class="column">
                          <iframe src="{{$diamond->video_link}}" style="width: 1000px; height: 800px; max-width: 1002px;"></iframe>
                        </div>
                      </div>                
                    </div>
                
            </div>

            <!-- <xiaohungshu></xiaohungshu> -->



        </div>


    @include('layouts.frontFooter')

  
</body>



</html>

<style>
body, html {
  height: 100%;
  margin: 0;
  color: #777;
}
.cut-bg, .clarity-bg, .bgimg-3 {
  position: relative;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.cut-bg {
    /* The image used */
    background-image: url("/front_end/diamond_show/diamond_cut.jpg");

    /* Full height */
    height: 100%; 

}
.clarity-bg {
    /* The image used */
    background-image: url("/front_end/diamond_show/diamond_clarity.jpg");

    /* Full height */
    height: 100%; 

}
.caption {
  left: 0;
  top: 50%;
  width: 100%;
  text-align: left;
  color: #000;
  padding: 80px;
}

.caption span.border {
  color: #fff;
  font-size: 25px;
  border: 40px;
}

.caption span.cut-text {
  font-weight: bold;
  width: 80px;
  text-align: left;
  color: #fff;
  font-size: 15px;
  border: 40px;
}
</style>