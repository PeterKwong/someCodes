<div id="header">
  <!-- Navigation Bar -->
  <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top sidebarNavigation">
        <a class="navbar-brand" href="/">
          <img src="{{ url('/images/front-end/logo/logo_2019_grey.png') }} " >
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" @click="navBarToggle != navBarToggle" id="navbarNav">
          <ul class="navbar-nav m-auto">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{url(app()->getLocale())}}/gia-loose-diamonds" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{trans('frontHeader.Diamonds')}} 
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/gia-loose-diamonds">{{trans('frontHeader.Loose Diamonds')}}</a>
                <a class="dropdown-item" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut"><img src="/images/front-end/diamond_shapes/RD.png" width="15"> {{trans('frontHeader.Round')}}</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond">{{trans('frontHeader.Fancy Cut Diamonds')}}</a>
                
                <span class="dropdown-item">
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/heart-shaped"><img src="/images/front-end/diamond_shapes/HT.png" width="15"> {{trans('frontHeader.Heart')}}
                  </a>
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/princess-cut"><img src="/images/front-end/diamond_shapes/PR.png" width="15"> {{trans('frontHeader.Princess')}}
                  </a>
                </span>

                <span class="dropdown-item">
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/emerald-cut"><img src="/images/front-end/diamond_shapes/EM.png" width="15"> {{trans('frontHeader.Emerald')}}
                  </a> 
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/asscher-cut"><img src="/images/front-end/diamond_shapes/AC.png" width="15"> {{trans('frontHeader.Asscher')}}
                  </a>                  
                </span>      

                <span class="dropdown-item">
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/cushion-cut"><img src="/images/front-end/diamond_shapes/CU.png" width="15"> {{trans('frontHeader.Cushion')}}
                  </a>
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/oval-cut"><img src="/images/front-end/diamond_shapes/OV.png" width="15"> {{trans('frontHeader.Oval')}}
                  </a>                 
                </span>  

                <span class="dropdown-item">
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/marquise-cut"><img src="/images/front-end/diamond_shapes/MQ.png" width="15"> {{trans('frontHeader.Marquise')}}
                  </a>
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/radiant-cut"><img src="/images/front-end/diamond_shapes/RA.png" width="15"> {{trans('frontHeader.Radiant')}}
                  </a>                 
                </span>  

                <span class="dropdown-item">
                  <a class="p-10 text-dark" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/pear-shaped"><img src="/images/front-end/diamond_shapes/PS.png" width="15"> {{trans('frontHeader.Pear')}}
                  </a>                 
                </span>  

                <div class="dropdown-divider"></div>

                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color">
                <small class="has-text-info">{{trans('frontHeader.Fancy Color Diamonds')}}</small>
                </a>


              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{url(app()->getLocale())}}/engagement-rings">
                {{trans('frontHeader.Engagement Rings')}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/engagement-rings"><img width="15">{{trans('frontHeader.Engagement Rings')}}</a>
                 <a class="dropdown-item" href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting"><img src="/images/front-end/engagementRing/Solitaire.png" width="30">{{trans('frontHeader.Solitaire Ring')}}</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting">
                    <img src="/images/front-end/engagementRing/Side-stone.png" width="30">{{trans('frontHeader.Side-stone Ring')}}
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/engagement-rings/halo-setting">
                 <div class="navbar-content">
                      <img src="/images/front-end/engagementRing/Halo.png" width="30">{{trans('frontHeader.Halo Ring')}}
                    </div>
                </a>

              </div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{url(app()->getLocale())}}/wedding-rings">
                {{trans('frontHeader.Wedding Rings')}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/wedding-rings"><img width="15">{{trans('frontHeader.Wedding Rings')}}</a>
                 <a class="dropdown-item" href="{{url(app()->getLocale())}}/wedding-rings/classic">{{trans('frontHeader.Classic Ring')}}</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/wedding-rings/japanese">
                    {{trans('frontHeader.Japanese Ring')}}
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/wedding-rings/vintage">
                      {{trans('frontHeader.Vintage Ring')}}
                </a>

              </div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{url(app()->getLocale())}}/jewellery">
                {{trans('frontHeader.Jewellery')}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/jewellery"><img width="15">{{trans('frontHeader.Jewellery')}}</a>
                  <p class="dropdown-item">
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/jewellery/rings"><img src="/images/front-end/jewellery/Ring.png" width="15">{{trans('frontHeader.Rings')}}</a>                    
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/jewellery/diamond-rings">
                      ｜ {{trans('frontHeader.Diamond Rings')}}
                    </a>   
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/jewellery/fancy-diamond-rings">｜ {{trans('frontHeader.Fancy Diamond Rings')}}</a>                    
                  </p>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/jewellery/necklaces">
                    <img src="/images/front-end/jewellery/Necklace.png" width="15"> {{trans('frontHeader.Necklaces')}}
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/jewellery/bracelets">
                  <img src="/images/front-end/jewellery/Bracelet.png" width="15"> {{trans('frontHeader.Bracelets')}}
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/jewellery/earrings">
                  <img src="/images/front-end/jewellery/Earring.png" width="15"> {{trans('frontHeader.Earrings')}}
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item " href="{{url(app()->getLocale())}}/jewellery/pendants">
                  <img src="/images/front-end/jewellery/Pendant.png" width="15"> {{trans('frontHeader.Pendants')}}
                </a>

              </div>
            </li>


            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{url(app()->getLocale())}}/education-diamond-grading">
                {{trans('frontHeader.Education')}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs"><img width="15">{{trans('frontHeader.Diamond Grading')}}</a>
                  <p class="dropdown-item">

                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat">{{trans('frontHeader.Carat')}}
                        | </a>                      
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut">{{trans('frontHeader.Cut')}}
                        | </a>                      
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color">{{trans('frontHeader.Color')}}
                        | </a>                      
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity">{{trans('frontHeader.Clarity')}}
                         </a>              
                  </p>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/education-diamond-grading/grading-certficate"><img width="15">{{trans('frontHeader.Diamond Certificate')}}</a>
                  <p class="dropdown-item">

                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate">{{trans('frontHeader.Certificate')}}
                    | </a>
                      
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">{{trans('frontHeader.GIA Report')}}
                    | </a>
                      
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean">{{trans('frontHeader.Eye Clean Diamond')}}
                      </a>    

                  </p>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/education-diamond-grading/shape"><img width="15">{{trans('frontHeader.Diamond Anatomy')}}</a>
                  <p class="dropdown-item" >

                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape">{{trans('frontHeader.Shape')}}
                    | </a>
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows">{{trans('frontHeader.Heards And Arrows')}}
                    | </a>
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion">{{trans('frontHeader.Proportion')}}
                    | </a>
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry">{{trans('frontHeader.Symmetry')}}
                    | </a>
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish">{{trans('frontHeader.Polish')}}
                    | </a>
                    <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence">{{trans('frontHeader.Fluorescence')}}
                    </a>
  
                  </p>


              </div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{url(app()->getLocale())}}/customer-jewellery">
               {{trans('frontHeader.Customer Jewellery')}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/customer-jewellery">{{trans('frontHeader.Customer Jewellery')}}</a>
                   <a class="dropdown-item" href="{{url(app()->getLocale())}}/customer-jewellery">{{trans('frontHeader.Customer Jewellery')}}</a>

                <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="{{url(app()->getLocale())}}/customer-moments">
                     {{trans('frontHeader.Customer Moments')}}
                  </a>

                <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="{{url(app()->getLocale())}}/engagement-tips">
                     {{trans('frontHeader.Engagement Tips')}}
                  </a>

              </div>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{url(app()->getLocale())}}/about-us">
               {{trans('frontHeader.About Us')}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/about-us">
                {{trans('frontHeader.About Us')}}</a>
                   <a class="dropdown-item" href="{{url(app()->getLocale())}}/about-us">
                   {{trans('frontHeader.About Us')}}</a>

                <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="{{url(app()->getLocale())}}/buying-procedure">
                    {{trans('frontHeader.Buying Procedure')}}
                  </a>

              </div>
            </li>


          </ul>

          <ul class="navbar-nav ml-auto">


            <li class="nav-item">  



              <p class="nav-link" >
                <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/shopping-cart" >
                    <i class="fa fa-shopping-cart" ></i>
                </a>
                    <shopping-cart-icon :shopping-cart-number="shoppingCartNumber"></shopping-cart-icon>
                <span style="padding: 3px"></span>

                @guest 

                <a class="color-grey text-decoration-none" href="{{ url(app()->getLocale())}}/login">
                  <i class="fa fa-lg fa-user-circle"></i>                
                </a>

                @else
                @include('layouts.account.loginIcon')
                @endguest

              </p>


            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/images/front-end/langs/{{app()->getLocale()}}.png" width="20" height="10">
                  {{trans('frontHeader.' . strToUpper(app()->getLocale(session('locale')))) }}
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item " href=" {{ '/en' . substr(str_replace(url(''),'',url()->current()), 3) }} "><img src="/images/front-end/langs/en.png" width="20" height="10">{{trans('frontHeader.EN')}}</a>
               <a class="dropdown-item " href=" {{ '/hk'  . substr(str_replace(url(''),'',url()->current()), 3) }}"><img src="/images/front-end/langs/hk.png" width="20" height="10">{{trans('frontHeader.HK')}}</a>
               <a class="dropdown-item " href=" {{ '/cn'  . substr(str_replace(url(''),'',url()->current()), 3) }}"><img src="/images/front-end/langs/china.png" width="20" height="10">{{trans('frontHeader.CN')}}</a>

              </div>
            </li>

          </ul>


           

        </div>
      </nav>
  </section>

  <!-- Modal -->
<!-- <div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: block;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>

 -->
 
  <notification></notification>
<!--   <contact-message></contact-message>
 -->  <shopping-cart-progress></shopping-cart-progress>

</div>



