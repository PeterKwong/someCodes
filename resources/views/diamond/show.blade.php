@extends('layouts.section.frontend')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('diamond.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="@include('diamond.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="@include('diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('diamond.keywords')" /> 

        
        <style>

        hr{
            border: 0.2px solid white;
        }

/*        body, html {
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
*/
        .clarity-bg {
            /* The image used */
            background-image: url("/images/front-end/diamond_show/diamond_clarity.jpg");

            /* Full height */
            height: 100%; 

        }
/*        .caption {
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
        }*/
        </style>

        <!-- Fonts -->
       
 

    @endSection

    @section('content')
        <div id="diamondViewerShow" class="container">

            <div class="row justify-content-center p-20" >
                <div class="col-12">
                    <center> 
                    <h1 class="text-secondary">{{$diamond->weight}} {{trans('diamondSearch.carat')}}
                            {{$diamond->clarity}} {{trans('diamondSearch.Clarity')}} 
                            {{$diamond->color}} {{trans('diamondSearch.Color')}} 
                            {{$diamond->cut?$diamond->cut:''}}  {{$diamond->cut?trans('diamondSearch.Cut'):''}} 
                            {{trans('diamondSearch.' . $diamond->shape)}} {{trans('diamondSearch.diamond')}}</h1>                        
                    </center>
                    
                </div>
            </div>

            <div class="row justify-content-center p-20">
                <keep-alive>
                    <div class="col-sm-6 box">
                        <div v-if="!loadingStatus.image">
                            <center>
                            <img class="img-responsive" src="/images/front-end/loader.gif"  width="200">
                            </center>
                        </div>
                        <div v-if="loadingStatus.image">
                            <figure class="image">
                            <div v-if="diamond.image_cache && selectingShowType == 'image' ">
                                <img class="img-responsive" :src="storageURL + 'images/' + diamond.id + '.jpg' " width="100%" height="auto" ></img>
                            </div>
                            <div v-if=" selectingShowType == 'video' ">
                                <iframe :src=" '/redirect?url=' + diamond.video_link" width="100%" height="700" ></iframe>
                            </div>
                            <div v-if="diamond.plot && selectingShowType == 'plot' ">
                                <img class="img-responsive" :src="storageURL + 'plots/' + diamond.id + '.jpg' "  width="100%" height="auto"></img>
                            </div>
                            <div v-if="!diamond.image_cache && selectingShowType == null">
                                <img class="img-responsive" :src="`/images/front-end/diamond_show/RoundDiamonds_sample.png`" width="100%" height="auto"></img>
                            </div>
                            </figure>
                        </div>

                        <div>
                            <center>
                                <img v-if="diamond.image_cache" @click="selectingShowType = 'image'"  :src="storageURL + 'images/' + diamond.id + '.jpg' " width="20%" height="auto" ></img>
                                <img v-if="diamond.plot" :src="storageURL + 'plots/' + diamond.id + '.jpg' " @click="selectingShowType = 'plot'" width="200"></img>
                                <img v-if="diamond.video_link" @click="selectingShowType = 'video'"  :src="`/images/front-end/diamond_show/d360_degree.png`" width="20%" height="auto" ></img>
                            </center>
                        </div>
                    </div>
                </keep-alive>

                <div class="col-sm-6 box">
                    <article class="message is-primary">
                     
                      <div class="message-body">
                        <center>
                            <strong v-if="diamond.available">
                                <h3 class="text-primary background-op-008-primary box">{{__('diamondSearch.Price')}} HK$: {{$diamond->price}}</h3>
                            </strong>
                            <strong v-if="diamond.available == '0'"><p> {{__('diamondSearch.Sold')}}</p></strong>
                        </center>
                      </div>
                    </article>
                    <article>
                        <center>
                            
                            <shopping-cart :item="diamond" :type="shoppingCartType" :title="appointmentTitle" ></shopping-cart>
                            
                            <button  v-if="diamond.location == '1Hong Kong' " class="btn btn-primary" @click="appointmentState=!appointmentState">{{trans('diamondSearch.Appointment')}}</button>
                            <appointment  v-model="diamond" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns" :processing="false" :langs="langs" :locale="locale"></appointment>
                        </center>
                        <br>
                        <p>
                        {{trans('diamondSearch.For more detailed information, can reach GIA website query')}}：
                        </p>
                        <a :href="`https://www.gia.edu/report-check?reportno=${diamond.certificate}`">
                            <div class="level">
                            <figure class="image">
                                <img class="img-responsive" src="https://www.gia.edu/onlineopinionV5/GIA-Logo.png" width="100%">
                            </figure>
                            <p class="btn btn-primary">GIA {{trans('diamondSearch.Certificate Download')}}</p>
                            </div>
                        </a>
                    </article>

                    <article>
                        <table class="table is-striped is-fullwidth">
                        <thead>
                            <tr>
                                <th>{{trans('diamondSearch.Diamond Info')}} ( {{__($diamond->shape)}} )</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <tr><td>{{trans('diamondSearch.Stock no')}}</td><td> TD-LD{{$diamond->location}}-{{$diamond->id}}</td></tr>
                            <tr><td>{{trans('diamondSearch.Carat Weight')}}</td><td>{{$diamond->weight}}</td></tr>
                            <tr><td>{{trans('diamondSearch.Color Grade')}}</td><td>{{$diamond->color}}</td></tr>
                            <tr><td>{{trans('diamondSearch.Clarity Grade')}}</td><td>{{$diamond->clarity}}</td></tr>
                            <tr><td>{{trans('diamondSearch.Cut Grade')}}</td><td>{{$diamond->cut}}</td></tr>
                        </tbody>

                        <thead>
                            <tr>
                                <th>{{trans('diamondSearch.Finish')}}</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <tr><td>{{trans('diamondSearch.Polish')}}</td><td>{{$diamond->polish}}</td></tr>
                            <tr><td>{{trans('diamondSearch.Symmetry')}}</td><td>{{$diamond->symmetry}}</td></tr>
                        </tbody>

                        <thead>
                            <tr>
                                <th>{{trans('diamondSearch.Fluorescence')}}</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <tr><td>{{trans('diamondSearch.Fluorescence')}}</td><td>{{$diamond->fluorescence}}</td></tr>
                        </tbody>
                        
                        <thead>
                            <tr>
                                <th>{{trans('diamondSearch.Certificate')}}</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <a :href="`https://www.gia.edu/report-check?reportno=${diamond.certificate}`">
                            <tr><td>{{trans('diamondSearch.Certificate')}}</td><td>{{$diamond->certificate}}</td></tr>
                            </a>
                        </tbody>

                        </table>
                    </article>

                </div>
            </div>

            <div class="row justify-content-center p-20">
                <div class="col">
                    <div v-if="!loadingStatus.cert">
                        <center>
                            <img class="img-responsive" src="/images/front-end/loader.gif" width="200">
                        </center>
                    </div>

                    <div v-if="loadingStatus.cert">
                        <img class="img-responsive" :src="storageURL + 'certs/' + diamond.id + '.jpg' " type="application/pdf" height="auto" width="100%" v-if="diamond.cert_cache">
                    </div>


                </div>
            </div>

            <div class="row justify-content-center p-20">
                <div class="col">
                    <div class="image-background" style="background-image: url('/images/front-end/diamond_show/diamond_cut.jpg'); background-repeat: no-repeat; background-size: cover;">
                        <div class="p-70">
                            <h3 class="text-white">{{trans('diamondSearch.Cut Grade')}}: @{{diamond.cut}}</h3>
                            <hr style="text-decoration: whi">
                            <span class="text-white" v-if="diamond.cut == 'EX' || diamond.cut == 'Excellent'">{{trans('diamondSearch.cutEx')}}
                            <br>
                            </span>
                            <span class="text-white" v-if="diamond.cut == 'VG' || diamond.cut == 'Very Good'">{{trans('diamondSearch.cutVg')}}
                            <br>
                            </span>
                            <span class="text-white" v-if="diamond.cut == 'GD' || diamond.cut == 'Good'">{{trans('diamondSearch.cutGd')}}
                            <br>
                            </span>
                            <span class="text-white">{{trans('diamondSearch.Want to learn even more about cut')}}? 
                               <a :href=" localeHref+ 'education-diamond-grading/4cs/cut/'">{{__('diamondSearch.Learn More')}}<br>
                               </a>
                            </span>
                            <span class="text-white">
                                {{trans('diamondSearch.cutDesrciption')}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center p-20">
                <div class="col">
        
                    <h3 class="p-20">
                        {{trans('diamondSearch.DIAMOND SIZE')}}: @{{diamond.weight}} {{__('diamondSearch.Carat')}}
                    </h3>
                    <br>
                           
                    <p1 class="subtitle is-6">
                        {{trans('diamondSearch.caratDescription')}}
                    </p1>
                    <p1 class="subtitle is-6">
                        {{trans('diamondSearch.caratDescription1')}}
                    </p1>
                                       
                    <a :href=" localeHref+ 'education-diamond-grading/4cs/carat/'">
                        {{trans('diamondSearch.Learn More')}}
                    </a>
                                       
                    <br>
                                
                    <img class="img-responsive" src="/images/front-end/diamond_show/diamond_weight.jpg" width="100%">
                        

                </div>
            </div>
                
            <div class="row justify-content-center p-20">
                <div class="col">
                    <article>
                        <div class="columns">
                            <div class="column is-6">
                            
                                <center>
                                    <h3 class="title is-5 is-primary">
                                        {{trans('diamondSearch.Diamond Color')}}: @{{diamond.color}} 
                                    </h3>
                                    <br>
                                </center>
                            
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <center>
                                    <span class="cut-text" v-if="diamond.color == 'D' ||diamond.color == 'E' || diamond.color == 'F'">{{trans('diamondSearch.colorDtoF')}}
                                    <br>
                                    </span>
                                    <span class="cut-text" v-if="diamond.color == 'G'">
                                        {{trans('diamondSearch.colorG')}}
                                    <br>
                                    </span>
                                    <span class="cut-text" v-if="diamond.color == 'H'">
                                        {{trans('diamondSearch.colorH')}}
                                    <br>
                                    </span>
                                    <span class="cut-text" v-if="diamond.color == 'I'">
                                        {{trans('diamondSearch.colorI')}}
                                    <br>
                                    </span>
                                    <span class="cut-text" v-if="diamond.color == 'J'">
                                        {{trans('diamondSearch.colorJ')}}
                                    <br>
                                    </span>


                                <center>
                                    {{trans('diamondSearch.Want to learn even more about colour')}}?
                                    <a :href=" localeHref+ 'education-diamond-grading/4cs/color/'">
                                    {{trans('diamondSearch.Learn More')}}
                                    </a>
                                    </center>
                                    
                                </center>
                                
                            </div>
                            <div class="col-6">
                                <center>
                                    <p1 class="subtitle is-6">
                                        <li>{{trans('diamondSearch.colorDescription')}}
                                        </li>
                                    </p1>
                                    <br>
                                    <p1 class="subtitle is-6">
                                        <li>{{trans('diamondSearch.colorDescription1')}}
                                        </li>
                                    </p1>
                                </center>
                                
                            </div>
                            <br>
                        </div>
                        <img class="img-responsive" src="/images/front-end/diamond_show/diamond_color.jpg" width="100%">
                    </article>
                </div>
            </div>

            <div class="row justify-content-center p-20">
                <div class="col">
                    <div style="background-image: url('/images/front-end/diamond_show/diamond_clarity.jpg');">
                        <div class="p-70">
                            <h3 class="text-white">{{trans('diamondSearch.Clarity')}}: @{{diamond.clarity}}</h3>
                            <hr style="border: 0.2px solid white; ">
                                <span class="text-white" v-if="diamond.clarity == 'I1' ">{{trans('diamondSearch.clarityI')}}
                                <br>
                                </span>
                                <span class="text-white" v-if="diamond.clarity == 'SI1' || diamond.clarity == 'SI2'">{{trans('diamondSearch.claritySi')}}
                                <br>
                                </span>
                                <span class="text-white" v-if="diamond.clarity == 'VS2' ||diamond.clarity == 'VS1' ">
                                    {{trans('diamondSearch.clarityVs')}}
                                <br>
                                </span>
                                <span class="text-white" v-if="diamond.clarity == 'VVS1' || diamond.clarity == 'VVS2'">{{trans('diamondSearch.clarityVvs')}}
                                <br>
                                </span>
                                <span class="text-white" v-if="diamond.clarity == 'IF' ">
                                    {{trans('diamondSearch.clarityIf')}}
                                <br>
                                </span>
                            <hr>
                            
                            <span class="text-white">
                                {{trans('diamondSearch.clarityDescription')}}?
                                <br>
                                <a :href="localeHref+ 'education-diamond-grading/4cs/clarity/'">
                                    {{trans('diamondSearch.Learn More')}}
                                </a>
                            </span>
                            <span class="text-white">
                                <li>{{trans('diamondSearch.clarityDescription1')}}
                                </li>
                                <li>
                                {{trans('diamondSearch.clarityDescription2')}}</li>
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
                



        </div>

    @endSection

        <script>document.write()</script>



<!-- <script type="text/javascript">

function Test1() {

    var ctx = document.getElementById('test1');
    if (ctx.getContext) {

        ctx = ctx.getContext('2d');

        //Loading of the home test image - img1
        var img1 = new Image();

        //drawing of the test image - img1
        img1.onload = function () {
            //draw background image
            ctx.drawImage(img1, 0, 0);
            //draw a box over the top
            ctx.fillStyle = "rgba(200, 0, 0, 0.5)";
            ctx.fillRect(0, 0, 500, 500);

        };

        console.log(mutualVar.viewer.src)
        img1.src = 'https://diamondgirl.website/videoanother.php?refno=1505220' ;
    }
}


</script>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#button').click(function(){ 
        if(!$('#iframe').length) {
                $('#iframeHolder').html('<iframe id="iframe" src="https://diamondgirl.website/videoanother.php?refno=1505220" width="700" height="450"></iframe>');
        }
    });   
});
</script> -->