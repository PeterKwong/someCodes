<footer class="pt-42 bg-gray-900 " id="footer">


  <div class="sm:flex text-center sm:text-left p-2">
    <div class="flex-1 px-2">
      <h5 class="flex justify-start items-center text-xl p-3 text-white border-2 border-gray-600 sm:border-none hover:text-gray-600" @click="onClickedFooter(1)"> {{trans('frontFooter.DIAMOND PRICES')}}
        <svg class="sm:hidden fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </h5>
      <div class="text-sm text-white" v-if="footerSection == 1 || mutualVar.css.innerWidth >640">
        <div class="m-2" id="wrap"></div> 
          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut" class="p-3 hover:text-gray-600">．
          {{trans('frontFooter.Round Cut Diamond')}}</a><br>
          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond" class="p-3 hover:text-gray-600">．{{trans('frontFooter.Fancy Cut Diamond')}}</a><br>
          <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color" class="p-3 hover:text-gray-600">．{{trans('frontFooter.Fancy Color Diamond')}}</a><br>
          <p class="p-3 hover:text-gray-600" >{{trans('frontFooter.TING DIAMOND PROVIDES BRILLIANT GIA')}}</p>        
      </div>
    </div>

    <div class="flex-1 px-2">
      <h5 class="flex justify-start items-center text-xl p-3 text-white border-2 border-gray-600 sm:border-none hover:text-gray-600" @click="onClickedFooter(2)">{{trans('frontFooter.DIAMOND JEWELLRY')}}
        <svg class="sm:hidden fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </h5>
      <div class="text-sm text-white" v-if="footerSection == 2 || mutualVar.css.innerWidth >640">      
        <div class="m-2" id="wrap"></div>
          <a href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Solitaire Ring')}}</a><br>
          <a href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Side Stone Ring')}}</a><br>
          <a href="{{url(app()->getLocale())}}/engagement-rings/halo-setting" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Halo Ring')}}</a><br>
          <a href="{{url(app()->getLocale())}}/wedding-rings/classic" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Women')}} | {{trans('frontFooter.Classic Rings')}}</a><br>
          <a href="{{url(app()->getLocale())}}/wedding-rings/classic" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Men')}} | {{trans('frontFooter.Classic Rings')}}</a>
      </div>
    </div>

    <div class="flex-1 px-2">
      <h5 class="flex justify-start items-center text-xl p-3 text-white border-2 border-gray-600 sm:border-none hover:text-gray-600" @click="onClickedFooter(3)"> {{trans('frontFooter.DIAMOND EDUCATION')}}
        <svg class="sm:hidden fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </h5>
      <div class="text-sm text-white" v-if="footerSection == 3 || mutualVar.css.innerWidth >640">      
        <div class="m-2" id="wrap"></div>
          <a href="{{url(app()->getLocale())}}/education-diamond-grading" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.How To Choose Diamond 4Cs')}}？</a><br>
          <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-fluorescence" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.What Is Diamond Fluorescence')}} ?</a><br>
          <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-symmetry" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.What Is Diamond Symmetry')}} ?</a><br>
          <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-proportion" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.What Is Diamond Proportion')}} ?</a><br>
          <a class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Fancy Color Intensity')}}</a>
      </div>
    </div>
    
    <div class="flex-1 px-2">
      <h5 class="flex justify-start items-center text-xl p-3 text-white border-2 border-gray-600 sm:border-none hover:text-gray-600" @click="onClickedFooter(4)">{{trans('frontFooter.ABOUT TING DIAMOND')}}
        <svg class="sm:hidden fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </h5>
      <div class="text-sm text-white" v-if="footerSection == 4 || mutualVar.css.innerWidth >640">      
        <div class="m-2" id="wrap"></div>
          <a href="{{url(app()->getLocale())}}/about-us" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.About Us')}}</a><br>
          <a href="{{url(app()->getLocale())}}/buying-procedure/custom-engagement-rings" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Custom Make Engagement Rings')}}</a><br>
          <a href="{{url(app()->getLocale())}}/buying-procedure/diamond-inlay-engrave" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Diamond Inlay')}} | {{trans('frontFooter.Engrave')}}</a><br>
          <a href="{{url(app()->getLocale())}}/customer-jewellery" class="p-3 hover:text-gray-600" >．{{trans('frontFooter.Customer Monents')}}</a><br>
      </div>
    </div>
  </div>


  <div class="flex items-center justify-center text-center">
    <div class="flex-1">
        <a class="p-3 mb-2 text-white font-bold" href="/links/facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a class="p-3 mb-2 text-white font-bold" href="/links/instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a class="p-3 mb-2 text-white font-bold" href="/links/twitter">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="p-3 mb-2 text-white font-bold" href="/links/youtube">
          <i class="fab fa-youtube"></i>
        </a>
    </div>
  </div>

  <div class="flex items-center justify-center text-center p-2">

    <img src="/images/front-end/footer/logo_eps.jpg" class="m-1 h-6" >
    <img src="/images/front-end/footer/logo_mastercard.jpg" class="m-1 h-6" >
    <img src="/images/front-end/footer/logo_visa.jpg" class="m-1 h-6" >
    <img src="/images/front-end/footer/logo_american_express-512.png" class="m-1 h-6" >
    <img src="/images/front-end/footer/logo_unionpay.jpg" class="m-1 h-6" >
    <img src="/images/front-end/footer/logo_wechat.jpg" class="m-1 h-6" >
    <img src="/images/front-end/footer/logo_alipay.jpg" class="m-1 h-6" >  

  </div>

  <div class="flex items-center justify-center text-center p-2">

    <img src="/images/front-end/footer/logo_brand012.jpg" class="m-1 h-6" >            
    <img src="/images/front-end/GIA/GIA-Logo.jpg" class="m-1 h-6" >

  </div>

  <div class="flex items-center justify-center text-center p-2 px-12">

    <a class="p-3 mb-2 text-white">
      <strong>&reg; </strong><small>2016</small><strong> Ting Diamond</strong> by 
    </a>
      <a class="p-3 mb-2 text-white" href="/">Ting Diamond 
     
    </a> 
      <a class="p-3 mb-2 text-white">|</a> 
      <a class="p-3 mb-2 text-white" href="/sitemap_index.xml">Site Map</a> 
      <a class="text-gray-700" ><small>粤ICP备19125751号-1</small></a> 

  </div> 

      @include('layouts.metas.footer')


</footer>



<!-- 
<section id="footer" class="pt-40">

  <div class="d-none d-sm-block bg-dark">

    <div class="row justify-content-center bg-dark">
      <div class="col-10">

        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h5 class="p-3 mb-2 text-white" > {{trans('frontFooter.DIAMOND PRICES')}}</h5>
            <div id="wrap"></div>
              <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut" class="p-3 mb-2 text-white font-bold">．
              {{trans('frontFooter.Round Cut Diamond')}}</a><br>
              <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond" class="p-3 mb-2 text-white font-bold">．{{trans('frontFooter.Fancy Cut Diamond')}}</a><br>
              <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color" class="p-3 mb-2 text-white font-bold">．{{trans('frontFooter.Fancy Color Diamond')}}</a><br>
              <p class="p-3 mb-2 text-white font-bold" >{{trans('frontFooter.TING DIAMOND PROVIDES BRILLIANT GIA')}}</p>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-3">
            <h5 class="p-3 mb-2 text-white" >{{trans('frontFooter.DIAMOND JEWELLRY')}}</h5>
            <div id="wrap"></div>
              <a href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Solitaire Ring')}}</a><br>
              <a href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Side Stone Ring')}}</a><br>
              <a href="{{url(app()->getLocale())}}/engagement-rings/halo-setting" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Halo Ring')}}</a><br>
              <a href="{{url(app()->getLocale())}}/wedding-rings/classic" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Women')}} | {{trans('frontFooter.Classic Rings')}}</a><br>
              <a href="{{url(app()->getLocale())}}/wedding-rings/classic" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Men')}} | {{trans('frontFooter.Classic Rings')}}</a>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-3">
            <h5 class="p-3 mb-2 text-white" > {{trans('frontFooter.DIAMOND EDUCATION')}}</h5>
            <div id="wrap"></div>
              <a href="{{url(app()->getLocale())}}/education-diamond-grading" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.How To Choose Diamond 4Cs')}}？</a><br>
              <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-fluorescence" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.What Is Diamond Fluorescence')}} ?</a><br>
              <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-symmetry" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.What Is Diamond Symmetry')}} ?</a><br>
              <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-proportion" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.What Is Diamond Proportion')}} ?</a><br>
              <a class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Fancy Color Intensity')}}</a>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-3">
            <h5 class="p-3 mb-2 text-white" >{{trans('frontFooter.ABOUT TING DIAMOND')}}</h5>
            <div id="wrap"></div>
              <a href="{{url(app()->getLocale())}}/about-us" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.About Us')}}</a><br>
              <a href="{{url(app()->getLocale())}}/buying-procedure/custom-engagement-rings" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Custom Make Engagement Rings')}}</a><br>
              <a href="{{url(app()->getLocale())}}/buying-procedure/diamond-inlay-engrave" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Diamond Inlay')}} | {{trans('frontFooter.Engrave')}}</a><br>
              <a href="{{url(app()->getLocale())}}/customer-jewellery" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Customer Monents')}}</a><br>
          </div>

        </div>
        
      </div>
    </div>


  </div>

  <div class="d-sm-none d-block bg-dark">
    <div class="row bg-dark">

      <div class="col-12 p-3 mb-2 bg-dark text-white">

        <div class="accordion" id="footerCollapse">

          <div class="card p-3 mb-2 bg-dark text-white">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#footerCollapseOne" aria-expanded="true" aria-controls="footerCollapseOne">
                  {{trans('frontFooter.DIAMOND PRICES')}} <i class="fas fa-chevron-down"></i>
                </button>
              </h2>
            </div>

            <div id="footerCollapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#footerCollapse">
              <div class="card-body">
                <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut" class="p-3 mb-2 text-white font-bold">．
                {{trans('frontFooter.Round Cut Diamond')}}</a><br>
                <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond" class="p-3 mb-2 text-white font-bold">．{{trans('frontFooter.Fancy Cut Diamond')}}</a><br>
                <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color" class="p-3 mb-2 text-white font-bold">．{{trans('frontFooter.Fancy Color Diamond')}}</a><br>
              </div>
            </div>
          </div>

          <div class="card p-3 mb-2 bg-dark text-white">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#footerCollapseTwo" aria-expanded="false" aria-controls="footerCollapseTwo">
                  {{trans('frontFooter.DIAMOND JEWELLRY')}} <i class="fas fa-chevron-down"></i>
                </button>
              </h2>
            </div>
            <div id="footerCollapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#footerCollapse">
              <div class="card-body">
                <a href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Solitaire Ring')}}</a><br>
                <a href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Side Stone Ring')}}</a><br>
                <a href="{{url(app()->getLocale())}}/engagement-rings/halo-setting" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Setting')}} | {{trans('frontFooter.Halo Ring')}}</a><br>
                <a href="{{url(app()->getLocale())}}/wedding-rings/classic" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Women')}} | {{trans('frontFooter.Classic Rings')}}</a><br>
                <a href="{{url(app()->getLocale())}}/wedding-rings/classic" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Men')}} | {{trans('frontFooter.Classic Rings')}}</a>
              </div>
            </div>
          </div>

          <div class="card p-3 mb-2 bg-dark text-white">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#footerCollapseThree" aria-expanded="false" aria-controls="footerCollapseThree">
                  {{trans('frontFooter.DIAMOND EDUCATION')}} <i class="fas fa-chevron-down"></i>
                </button>
              </h2>
            </div>
            <div id="footerCollapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#footerCollapse">
              <div class="card-body">
                <a href="{{url(app()->getLocale())}}/education-diamond-grading" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.How To Choose Diamond 4Cs')}}？</a><br>
                <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-fluorescence" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.What Is Diamond Fluorescence')}} ?</a><br>
                <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-symmetry" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.What Is Diamond Symmetry')}} ?</a><br>
                <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-proportion" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.What Is Diamond Proportion')}} ?</a><br>
                <a class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Fancy Color Intensity')}}</a>
              </div>
            </div>
          </div>

          <div class="card p-3 mb-2 bg-dark text-white">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#footerCollapseFour" aria-expanded="false" aria-controls="footerCollapseFour">
                  {{trans('frontFooter.ABOUT TING DIAMOND')}} <i class="fas fa-chevron-down"></i>
                </button>
              </h2>
            </div>
            <div id="footerCollapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#footerCollapse">
              <div class="card-body">
                <a href="{{url(app()->getLocale())}}/about-us" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.About Us')}}</a><br>
                <a href="{{url(app()->getLocale())}}/buying-procedure/custom-engagement-rings" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Custom Make Engagement Rings')}}</a><br>
                <a href="{{url(app()->getLocale())}}/buying-procedure/diamond-inlay-engrave" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Diamond Inlay')}} | {{trans('frontFooter.Engrave')}}</a><br>
                <a href="{{url(app()->getLocale())}}/customer-jewellery" class="p-3 mb-2 text-white font-bold" >．{{trans('frontFooter.Customer Monents')}}</a><br>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>


  <div class="row bg-dark justify-content-center text-center pt-30">

      <div class="col-12">

        <div class="row pt-10">
          <div class="col-12">
              <a class="p-3 mb-2 text-white font-bold" href="/links/facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="p-3 mb-2 text-white font-bold" href="/links/instagram">
                <i class="fab fa-instagram"></i>
              </a>
              <a class="p-3 mb-2 text-white font-bold" href="/links/twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a class="p-3 mb-2 text-white font-bold" href="/links/youtube">
                <i class="fab fa-youtube"></i>
              </a>
          </div>
        </div>

        <div class="row pt-10">
          <div class="col-12">
            
            <img src="/images/front-end/footer/logo_eps.jpg" width="40px" >
            <img src="/images/front-end/footer/logo_mastercard.jpg" width="40px" >
            <img src="/images/front-end/footer/logo_visa.jpg" width="40px" >
            <img src="/images/front-end/footer/logo_american_express-512.png" width="40px" >
            <img src="/images/front-end/footer/logo_unionpay.jpg" width="40px" >
            <img src="/images/front-end/footer/logo_wechat.jpg" width="30px" >
            <img src="/images/front-end/footer/logo_alipay.jpg" width="30px" >       

          </div>
        </div>

        <div class="row pt-10">
          <div class="col-12">

            <img src="/images/front-end/footer/logo_brand012.jpg" width="40px" >            
            <img src="/images/front-end/GIA/GIA-Logo.jpg" width="50px" >


          </div>
        </div>

        <div class="row p-30">
          <div class="col-12">
            

            <a class="p-3 mb-2 text-white">
              <strong>&reg; </strong><small>2016</small><strong> Ting Diamond</strong> by 
            </a>
              <a class="p-3 mb-2 text-white" href="/">Ting Diamond 
                       | {{ app()->getLocale() == 'cn'?'皇庭鑽石及珠寶有限公司':'' }}
                      
             </a> 
              <a class="p-3 mb-2 text-white">|</a> 
              <a class="p-3 mb-2 text-white" href="/sitemap_index.xml">Site Map</a> 
              <a class="text-secondary" ><small>粤ICP备19125751号-1</small></pa> 
              <a class="text-secondary" href="http://www.beian.miit.gov.cn"><small>粤ICP备19125751号-1</small></pa> 


          </div>
        </div>
           


      </div>

    </div>  
    

    @include('layouts.metas.footer')

</section> -->
