@extends('layouts.section.frontendWithoutLW')

    @section('meta')

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Place this data between the <head> tags of your website --> 
        <title>@include('frontend.diamond.meta') - {{trans('home.webTitle')}}</title>
        <meta name="description" content="@include('frontend.diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" />
        <meta itemprop="keywords" content="@include('frontend.diamond.keywords')"> 

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="@include('frontend.diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="@include('frontend.diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="@include('frontend.diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="@include('frontend.diamond.meta') {{trans('diamond.metaDescription30')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="@include('frontend.diamond.meta') {{trans('diamond.metaTitle30')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="@include('frontend.diamond.keywords')" /> 


        <!-- Fonts -->
       
 

    @endSection

    @section('content')
        <div id="diamondViewerShow" class=" sm:px-16 md:px-32">

            <div class="flex justify-center p-6" >
                    <center> 
                    <h1 class="text-gray-600 sm:text-2xl">{{$diamond->weight}} {{trans('diamondSearch.carat')}}
                            {{$diamond->clarity}} {{trans('diamondSearch.Clarity')}} 
                            {{$diamond->color}} {{trans('diamondSearch.Color')}} 
                            {{$diamond->cut?$diamond->cut:''}}  {{$diamond->cut?trans('diamondSearch.Cut'):''}} 
                            {{trans('diamondSearch.' . $diamond->shape)}} {{trans('diamondSearch.diamond')}}</h1>                        
                    </center>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 p-1 sm:px-6">
                <keep-alive>
                    <div class="box">
                        <div v-if="!loadingStatus.image">
                            <center>
                            <img class="w-1/3" src="/images/front-end/loader.gif"  width="200">
                            </center>
                        </div>
                        <div v-if="loadingStatus.image">
                            <div class="p-2">
                            <div v-if="diamond.image_cache && selectingShowType == 'image' ">
                                <img class="w-full" :src="storageURL + 'images/' + diamond.id + '.jpg' " ></img>
                            </div>
                            <div v-if=" selectingShowType == 'video' ">
                                <iframe :src=" '/redirect?url=' + diamond.video_link" width="100%" height="700" ></iframe>
                            </div>
                            <div v-if="diamond.plot && selectingShowType == 'plot' ">
                                <img class="w-full" :src="storageURL + 'plots/' + diamond.id + '.jpg' "  width="100%" height="auto"></img>
                            </div>
                            <div v-if="!diamond.image_cache && selectingShowType == null">
                                <img class="w-full" :src="`/images/front-end/diamond_show/RoundDiamonds_sample.png`"></img>
                            </div>
                            </div>
                        </div>

                        <div class="flex items-center w-2/6">
                                <img v-if="diamond.image_cache" @click="selectingShowType = 'image'"  :src="storageURL + 'images/' + diamond.id + '.jpg' " class="p-2 w-auto" ></img>
                                <img v-if="diamond.plot" :src="storageURL + 'plots/' + diamond.id + '.jpg' " @click="selectingShowType = 'plot'" class="p-2 w-auto "></img>
                                <img v-if="diamond.video_link" @click="selectingShowType = 'video'"  :src="`/images/front-end/diamond_show/d360_degree.png`" class="p-2 w-auto" ></img>
                        </div>
                    </div>
                </keep-alive>

                <div class="box p-4">
                     
                      <div class="message-body">
                        <center>
                            @if($diamond->available)
                                <strong>
                                    <h3 class="text-primary text-2xl">{{__('diamondSearch.Price')}} HK$: {{$diamond->price}}
                                        <h4 class="text-gray-600 text-xl">({{__('diamondSearch.location')}} : {{$diamond->location == '1Hong Kong'? __('diamondSearch.1-2 Days') : __('diamondSearch.Order')}} )</h4>
                                    </h3>

                                </strong>
                            @else
                                <strong><p class="text-2xl"> {{__('diamondSearch.Sold')}}</p></strong>
                            @endif
                        </center>
                      </div>
                      <div class="p-2">
                        <center>
                            
                            <shopping-cart :item="diamond" :type="shoppingCartType" :title="appointmentTitle" ></shopping-cart>
                            
                            <button  v-if="diamond.location == '1Hong Kong' " class="btn btn-primary" @click="appointmentState=!appointmentState">{{trans('diamondSearch.Appointment')}}</button>
                            <appointment  v-model="diamond" :title="appointmentTitle" @active="appointmentState=!appointmentState" :active="appointmentState" :columns="columns" :processing="false" :langs="langs" :locale="locale"></appointment>
                        </center>
                      </div>

                        <br>
                        <p>
                        {{trans('diamondSearch.For more detailed information, can reach GIA website query')}}：
                        </p>
                        <a :href="`https://www.gia.edu/report-check?reportno=${diamond.certificate}`">
                            <div class="">
                            <div class="w-auto">
                                <img class="w-auto" src="https://www.gia.edu/onlineopinionV5/GIA-Logo.png" class="w-auto">
                            </div>
                            <button class="btn btn-primary">GIA {{trans('diamondSearch.Certificate Download')}}</pbutton>
                            </div>
                        </a>
                       
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b text-lg font-semibold">
                                    {{trans('diamondSearch.Diamond Info')}}
                                </div>
                                <div class="col-span-6 p-2 border-b"> 
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?shape=' . $diamond->shape }}" target="_blank">
                                        ( {{__($diamond->shape)}} )
                                    </a>
                                </div>
                            </div>
                            
                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Stock no')}}</div>
                                <div class="col-span-6 p-2 border-b font-light"> TD-LD{{$diamond->location}}-{{$diamond->id}}</div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">
                                    {{trans('diamondSearch.Carat Weight')}}
                                </div>
                                <div class="col-span-6 p-2 border-b font-light">
                                     <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?weight=' . $diamond->weight }}" target="_blank">
                                        {{$diamond->weight}}
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Color Grade')}}</div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?color=' . $diamond->color }}" target="_blank">
                                        {{$diamond->color}}
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Clarity Grade')}}</div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?clarity=' . $diamond->clarity }}" target="_blank">
                                        {{$diamond->clarity}}
                                    </a>
                                </div>
                            </div>


                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Cut Grade')}}</div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?cut=' . $diamond->cut }}" target="_blank">
                                        {{$diamond->cut}}
                                    </a>
                                </div>
                            </div>
                       


                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Polish')}}</div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?polish=' . $diamond->polish }}" target="_blank">
                                        {{$diamond->polish}}
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Symmetry')}}</div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?symmetry=' . $diamond->symmetry }}" target="_blank">
                                        {{$diamond->symmetry}}
                                    </a>
                                </div>
                            </div>
                       


                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Fluorescence')}}</div>
                                <div class="col-span-6 p-2 border-b font-light">
                                    <a class="text-blue-400" href="{{ '/' . app()->getlocale() . '/customer-jewellery?fluorescence=' . $diamond->fluorescence }}" target="_blank">
                                        {{$diamond->fluorescence}}
                                    </a>
                                </div>
                            </div>
                       

                       
                        
                            <div class="grid grid-cols-12">
                                <div class="col-span-6 p-2 border-b font-light">{{trans('diamondSearch.Certificate')}}</div>
                                <div class="col-span-6 p-2 border-b font-light">{{$diamond->certificate}}</div>
                            </div>
                       


                </div>
            </div>

            <div class="grid grid-cols-12">
                <div class="col-span-12 p-4">
                    <div v-if="!loadingStatus.cert">
                        <center>
                            <img class="w-1/3" src="/images/front-end/loader.gif" >
                        </center>
                    </div>

                    <div v-if="loadingStatus.cert" class="w-full" >
                        <img class="w-full" :src="storageURL + 'certs/' + diamond.id + '.jpg' "  v-if="diamond.cert_cache">
                    </div>


                </div>
            </div>


            <div class="flex justify-center p-4">
                <div class="flex-auto">
        
                    <h3 class="sm:text-2xl">
                        {{trans('diamondSearch.DIAMOND SIZE')}}: @{{diamond.weight}} {{__('diamondSearch.Carat')}}
                    </h3>
                    <br>
                           
                    <p1 class="subtitle is-6">
                        {{trans('diamondSearch.caratDescription')}}
                    </p1>
                    <p1 class="subtitle is-6">
                        {{trans('diamondSearch.caratDescription1')}}
                    </p1>
                                       
                    <a class="text-blue-400" :href=" localeHref+ 'education-diamond-grading/4cs/carat/'">
                        {{trans('diamondSearch.Learn More')}}
                    </a>
                                       
                    <br>
                                
                    <img class="w-auto" src="/images/front-end/diamond_show/diamond_weight.jpg" width="100%">
                        
                    <x-invoice-post-fetch type="Diamond" upper-type="weight" :query="$diamond->weight" />

                </div>
            </div>

            <div class="flex justify-center p-4">
                <div class="flex-auto">
                    <article>
                        <div class="">
                        
                            <center>
                                <h3 class="sm:text-2xl">
                                    {{trans('diamondSearch.Diamond Color')}}: @{{diamond.color}} 
                                </h3>
                                <br>
                            </center>
                        
                        </div>

                        <div class="flex justify-center">
                            <div class="flex-auto">
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
                                    <a class="text-blue-400" :href=" localeHref+ 'education-diamond-grading/4cs/color/'">
                                    {{trans('diamondSearch.Learn More')}}
                                    </a>
                                    </center>
                                    
                                </center>
                                
                            </div>
                            <div class="flex-auto">
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
                        <img class="w-auto" src="/images/front-end/diamond_show/diamond_color.jpg" width="100%">

                        <x-invoice-post-fetch type="Diamond" upper-type="color" :query="$diamond->color" />

                    </article>
                </div>
            </div>


            <div class="flex justify-center p-4">
                <div class="flex-auto">
                    <div style="background-image: url('/images/front-end/diamond_show/diamond_clarity.jpg'); background-repeat: no-repeat; background-size: cover;">
                        <div class="p-8 sm:p-24 lg:p-56">
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
                                <a class="text-blue-400" :href="localeHref+ 'education-diamond-grading/4cs/clarity/'">
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
                        <x-invoice-post-fetch type="Diamond" upper-type="clarity" :query="$diamond->clarity" />

                    </div>  
                </div>
            </div>
                            
            <div class="flex justify-center p-4">
                <div class="flex-auto">
                    <div class="image-background" style="background-image: url('/images/front-end/diamond_show/diamond_cut.jpg'); background-repeat: no-repeat; background-size: cover;">
                        <div class="p-8 sm:p-24 lg:p-56">
                            <h3 class="text-white border-b border-white sm:text-2xl">{{trans('diamondSearch.Cut Grade')}}: @{{diamond.cut}}</h3>
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
                               <a class="text-blue-400" :href=" localeHref+ 'education-diamond-grading/4cs/cut/'">{{__('diamondSearch.Learn More')}}<br>
                               </a>
                            </span>
                            <span class="text-white">
                                {{trans('diamondSearch.cutDesrciption')}}
                            </span>
                        </div>
                        <x-invoice-post-fetch type="Diamond" upper-type="cut" :query="$diamond->cut" />
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