@include('layouts.style.footerSticker')

<div id="header">
<section class="hero is-primary is-bold">
  <!-- Hero header: will stick at the top -->
   <nav  class="navbar is-transparent">

    <div class="navbar-brand">
      <a class="navbar-item" href="{{url(app()->getLocale())}}">
<!--         <img src="/front_end/company/logo_PNG_sq_60x60_1.png" alt="Bulma: a modern CSS framework based on Flexbox" width="35" height="70"> -->
        <img src="/images/front-end/logo/logo_2019_grey.png" alt="Bulma: a modern CSS framework based on Flexbox" width="55" height="90">
      </a>
        

        <div class="navbar-item is-hidden-desktop">

          <a class="navbar-item is-hidden-desktop" :href="'/en' + partialUrl" >
            <img src="/front_end/langs/en.png" width="20" height="10">
          </a>
          <a class="navbar-item is-hidden-desktop" :href="'/hk' + partialUrl" >
            <img src="/front_end/langs/hk.png" width="20" height="10">
          </a>
          <a class="navbar-item is-hidden-desktop" :href="'/cn' + partialUrl" >
            <img src="/front_end/langs/china.png" width="20" height="10">
          </a>

        </div>     

   
       
        <!-- <a href="https://github.com/jgthms/bulma" target="_blank">
          <span class="icon" style="color: #333;">
            <i class="fa fa-lg fa-github"></i>
          </span>
        </a> -->

  <!--       <div class="navbar-item is-hidden-desktop">


           @if( Auth::user() )
              <a class="navbar-item " href="{{ url(app()->getLocale()).'/account' }}">
                <span class="icon" style="color: #333;">
                  <i class="fa fa-lg fa-user-circle"></i>
                </span>
              </a>
            @else <a class="navbar-item " href="{{ route('login') }}">Login</a>
           @endif
       </div> -->



      <div class="navbar-item is-hidden-desktop">


              @guest 
              <a class="" href="{{url(app()->getLocale())}}/shopping-cart"  v-if="shoppingCartNumber != 0">
                  <i class="fa fa-shopping-cart" ></i>
                    @include('layouts.components.shoppingCartIcon')
                 </p>
              </a>

              <a href="" v-else>
                <span class="icon" style="color: #333;">
                </span>
              </a>

              <a class="" href="{{ url(app()->getLocale())}}/login">
                <i class="fa fa-lg fa-user-circle"></i>
                    <sup v-if="shoppingCartNumber != 0"> 
                      <small>
                       @include('layouts.components.shoppingCartIcon')
                      </small>
                    </sup>                      
              </a>

              @else
              @include('layouts.account.loginIcon')
              @endguest
                 





        </div>

      <div class="button navbar-burger burger" data-target="navMenuTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

  <div id="navMenuTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="{{url(app()->getLocale())}}/gia-loose-diamonds">
          {{trans('frontHeader.Diamonds')}} 
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item " href="{{url(app()->getLocale())}}/gia-loose-diamonds">
            <small class="has-text-info">{{trans('frontHeader.Loose Diamonds')}}</small>
          </a>
              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut"><img src="/front_end/diamond_shapes/RD.png" width="15"> {{trans('frontHeader.Round')}}</a>
                      </div>
                    </div>
                    <div class="level-right">
                      <div class="level-item">
                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>


          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond">
            <small class="has-text-info">{{trans('frontHeader.Fancy Cut Diamonds')}}</small>
          </a>
              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/heart-shaped"><img src="/front_end/diamond_shapes/HT.png" width="15"> {{trans('frontHeader.Heart')}}
                        </a>
                      </div>
                      
                    </div>
                    <div class="level-right">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/princess-cut"><img src="/front_end/diamond_shapes/PR.png" width="15"> {{trans('frontHeader.Princess')}}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/emerald-cut"><img src="/front_end/diamond_shapes/EM.png" width="15"> {{trans('frontHeader.Emerald')}}
                        </a>
                      </div>
                      
                    </div>
                    <div class="level-right">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/asscher-cut"><img src="/front_end/diamond_shapes/AC.png" width="15"> {{trans('frontHeader.Asscher')}}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/cushion-cut"><img src="/front_end/diamond_shapes/CU.png" width="15"> {{trans('frontHeader.Cushion')}}
                        </a>
                      </div>
                      
                    </div>
                    <div class="level-right">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/oval-cut"><img src="/front_end/diamond_shapes/OV.png" width="15"> {{trans('frontHeader.Oval')}}
                        </a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/marquise-cut"><img src="/front_end/diamond_shapes/MQ.png" width="15"> {{trans('frontHeader.Marquise')}}
                        </a>
                      </div>
                      
                    </div>
                    <div class="level-right">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/radiant-cut"><img src="/front_end/diamond_shapes/RA.png" width="15"> {{trans('frontHeader.Radiant')}}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/pear-shaped"><img src="/front_end/diamond_shapes/PS.png" width="15"> {{trans('frontHeader.Pear')}}
                        </a>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>

              <hr class="navbar-divider">

              <a class="navbar-item " href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color">
                <small class="has-text-info">{{trans('frontHeader.Fancy Color Diamonds')}}</small>
              </a>
                  
        </div>
      </div>


      
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="{{url(app()->getLocale())}}/engagement-rings">
          {{trans('frontHeader.Engagement Rings')}}
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item " href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting">
           <div class="navbar-content">
                <p>
                  <small class="has-text-info">{{trans('frontHeader.Engagement Rings')}}</small>
                </p>
                <p><img src="/front_end/engagementRing/Solitaire.png" width="30">{{trans('frontHeader.Solitaire Ring')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting">
           <div class="navbar-content">
                <p><img src="/front_end/engagementRing/Side-stone.png" width="30">{{trans('frontHeader.Side-stone Ring')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/engagement-rings/halo-setting">
           <div class="navbar-content">
                <p><img src="/front_end/engagementRing/Halo.png" width="30">{{trans('frontHeader.Halo Ring')}}</p>
              </div>
          </a>
                  
        </div>
      </div>


      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="{{url(app()->getLocale())}}/wedding-rings">
          {{trans('frontHeader.Wedding Rings')}}
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item " href="{{url(app()->getLocale())}}/wedding-rings/classic">
           <div class="navbar-content">
                <p>
                  <small class="has-text-info">{{trans('frontHeader.Wedding Rings')}}</small>
                </p>
                <p>{{trans('frontHeader.Classic Ring')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/wedding-rings/japanese">
           <div class="navbar-content">
                <p>{{trans('frontHeader.Japanese Ring')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/wedding-rings/vintage">
           <div class="navbar-content">
                <p><p>{{trans('frontHeader.Vintage Ring')}}</p></p>
              </div>
          </a>
                  
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="{{url(app()->getLocale())}}/jewellery">
          {{trans('frontHeader.Jewellery')}}
        </a>

        <div class="navbar-dropdown is-boxed">
          <div class="navbar-item">
              <div class="navbar-content">
                <p>
                  <small class="has-text-info">{{trans('frontHeader.Rings')}}</small> 
                  <img src="/front_end/jewellery/Ring.png" width="15">
                </p>
                <div class="level is-mobile">
                  <div class="level-left">
                    <div class="level-item">
                      <a href="{{url(app()->getLocale())}}/jewellery/rings">
                        <p>{{trans('frontHeader.Rings')}}</p>
                      </a>
                      <a href="{{url(app()->getLocale())}}/jewellery/diamond-rings">
                        <p>｜ {{trans('frontHeader.Diamond Rings')}}</p>
                      </a>
                    </div>
                    
                  </div>
                  <div class="level-right">
                    <div class="level-item">
                      <a href="{{url(app()->getLocale())}}/jewellery/fancy-diamond-rings">
                        <p>｜ {{trans('frontHeader.Fancy Diamond Rings')}}</p>
                      </a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/jewellery/necklaces">
              <div class="navbar-content">
                <p><img src="/front_end/jewellery/Necklace.png" width="15"> {{trans('frontHeader.Necklaces')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/jewellery/bracelets">
              <div class="navbar-content">
                <p><img src="/front_end/jewellery/Bracelet.png" width="15"> {{trans('frontHeader.Bracelets')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/jewellery/earrings">
              <div class="navbar-content">
                <p><img src="/front_end/jewellery/Earring.png" width="15"> {{trans('frontHeader.Earrings')}}</p>
              </div>
          </a> 

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/jewellery/pendants">
              <div class="navbar-content">
                <p><img src="/front_end/jewellery/Pendant.png" width="15"> {{trans('frontHeader.Pendants')}}</p>
              </div>
          </a>


        </div>
      </div>      

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="{{url(app()->getLocale())}}/education-diamond-grading">
          {{trans('frontHeader.Education')}}
        </a>
        <div class="navbar-dropdown is-boxed">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/education-diamond-grading/4cs">
            <small class="has-text-info">{{trans('frontHeader.Diamond Grading')}}</small>
          </a>
              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat">{{trans('frontHeader.Carat')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut">{{trans('frontHeader.Cut')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color">{{trans('frontHeader.Color')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity">{{trans('frontHeader.Clarity')}}</a>
                    </div>
                   
                    </div>
                  </div>
                </div>
              </div>

              <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/education-diamond-grading/grading-certficate">
            <small class="has-text-info">{{trans('frontHeader.Diamond Certificate')}}</small>
          </a>
              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/grading-certficate">{{trans('frontHeader.Certificate')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">{{trans('frontHeader.GIA Report')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/grading-eye-clean">{{trans('frontHeader.Eye Clean Diamond')}}</a>
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
              
              <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/education-diamond-grading/shape">
            <small class="has-text-info">{{trans('frontHeader.Diamond Anatomy')}}</small>
          </a>
              <div class="navbar-item">
                <div class="navbar-content">
                  <div class="level is-mobile">
                    <div class="level-left">
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/shape">{{trans('frontHeader.Shape')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/hearts-and-arrows">{{trans('frontHeader.Heards And Arrows')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-proportion">{{trans('frontHeader.Proportion')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-symmetry">{{trans('frontHeader.Symmetry')}}</a>
                    </div>
                     <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-polish">{{trans('frontHeader.Polish')}}</a>
                      </div>
                      <div class="level-item">
                        <a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-fluorescence">{{trans('frontHeader.Fluorescence')}}</a>
                      </div>
                   
                    </div>
                  </div>
                </div>
              </div>


         
                  
        </div>
      </div>
      

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="{{url(app()->getLocale())}}/customer-jewellery">
          {{trans('frontHeader.Customer Jewellery')}}
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item " href="{{url(app()->getLocale())}}/customer-jewellery">
           <div class="navbar-content">
                <p>
                  <small class="has-text-info">{{trans('frontHeader.Wedding Rings')}}</small>
                </p>
                <p>{{trans('frontHeader.Customer Jewellery')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/customer-moments">
           <div class="navbar-content">
                <p>{{trans('frontHeader.Customer Moments')}}</p>
              </div>
          </a>

          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/engagement-tips">
           <div class="navbar-content">
                <p><p>{{trans('frontHeader.Engagement Tips')}}</p></p>
              </div>
          </a>
                  
        </div>
      </div>
      
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="{{url(app()->getLocale())}}/about-us">
          {{trans('frontHeader.About Us')}}
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item " href="{{url(app()->getLocale())}}/about-us">
           <div class="navbar-content">
                <p>
                  <small class="has-text-info">{{trans('frontHeader.About Us')}}</small>
                </p>
                <p>{{trans('frontHeader.About Us')}}</p>
              </div>
          </a>
          
          <hr class="navbar-divider">

          <a class="navbar-item " href="{{url(app()->getLocale())}}/buying-procedure">
           <div class="navbar-content">
                <p>{{trans('frontHeader.Buying Procedure')}}</p>
              </div>
          </a>
                  
        </div>
      </div>
      
     
     
      
     
    </div>

    <div class="navbar-end">
     
      <!-- <a href="https://github.com/jgthms/bulma" target="_blank">
        <span class="icon" style="color: #333;">
          <i class="fa fa-lg fa-github"></i>
        </span>
      </a> -->

<!--       <div class="navbar-item has-dropdown is-hoverable">

        <div class="navbar-item ">

         @if( Auth::user() )
            <a class="navbar-item " href="{{ url(app()->getLocale()).'/account' }}">
              <span class="icon" style="color: #333;">
                <i class="fa fa-lg fa-user-circle"></i>
              </span>
            </a>
         @endif

         @guest <a class="navbar-item " href="{{ route('login') }}">Login</a>
         @endguest
         
        </div>

        <hr class="dropdown-divider">
        <div id="moreDropdown" class="navbar-dropdown is-boxed">
          @guest
          <a class="navbar-item " href="{{ route('login') }}">Login</a>
          @else
           <a class="navbar-item " href="{{ url(app()->getLocale()).'/account' }}">{{ Auth::user()->name }}</a>
           <a class="navbar-item " href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
          @endguest
           

      </div>
    </div> -->

    <div class="navbar-end">
     
      <!-- <a href="https://github.com/jgthms/bulma" target="_blank">
        <span class="icon" style="color: #333;">
          <i class="fa fa-lg fa-github"></i>
        </span>
      </a> -->


          <div class="navbar-item has-dropdown is-hoverable" >
            <div class="navbar-item">
              @guest 
              <a class="" href="{{ url(app()->getLocale())}}/login">
                <i class="fa fa-lg fa-user-circle"></i>
                      <sup v-if="shoppingCartNumber != 0"> 
                      <small>
                       @include('layouts.components.shoppingCartIcon')
                      </small>
                    </sup>      
              </a>

              @else
              @include('layouts.account.loginIcon')
              @endguest
            </div>

            <hr class="dropdown-divider">
            <div id="moreDropdown" class="navbar-dropdown is-boxed">
              <a class="navbar-item " href="{{url(app()->getLocale())}}/shopping-cart">
                {{__('account.Shopping Cart')}} 
                <i class="fa fa-shopping-cart"></i>
                  <p v-if="shoppingCartNumber != 0"> 
                      @include('layouts.components.shoppingCartIcon')
                  </p>
              </a>

            </div>

          </div>



      <div class="navbar-item has-dropdown is-hoverable">
        <div class="navbar-link">
          <img src="/front_end/langs/{{app()->getLocale()}}.png" width="20" height="10">
         {{trans('frontHeader.' . strToUpper(app()->getLocale(session('locale')))) }}
        </div>
        <hr class="dropdown-divider">
        <div id="moreDropdown" class="navbar-dropdown is-boxed">
           <a class="navbar-item " :href="'/en' + partialUrl"><img src="/front_end/langs/en.png" width="20" height="10">{{trans('frontHeader.EN')}}</a>
           <a class="navbar-item " :href="'/hk' + partialUrl"><img src="/front_end/langs/hk.png" width="20" height="10">{{trans('frontHeader.HK')}}</a>
           <a class="navbar-item " :href="'/cn' + partialUrl"><img src="/front_end/langs/china.png" width="20" height="10">{{trans('frontHeader.CN')}}</a>

        </div>


      

    </div>
  </div>
</nav>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <a href="/">
      <h1 class="title">
        Ting Diamond
      </h1>
      </a>
      <h2 class="subtitle">
 <!--        {{ app()->getLocale() == 'cn'?'皇庭鑽石及珠寶有限公司':'' }}
        <br> -->
        <strong>Twinkle Stars</strong><small> ・For Your Beloved</small>
        
      </h2>

    </div>
  </div>

  <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
      <nav class="tabs is-boxed is-fullwidth" >
        <div class="container">
          <ul>
            <li :class="{'is-active': activeTab.includes('gia-loose-diamonds') }"><a href=" {{url(app()->getLocale())}}/gia-loose-diamonds">{{trans('frontHeader.Diamonds')}}</a>
            </li>
            <li :class="{'is-active': activeTab.includes('engagement-rings') }"><a href=" {{url(app()->getLocale())}}/engagement-rings">{{trans('frontHeader.Engagement Rings')}}</a></li>
            <li :class="{'is-active': activeTab.includes('wedding-rings') }"><a href=" {{url(app()->getLocale())}}/wedding-rings">{{trans('frontHeader.Wedding Rings')}}</a></li>
            <li :class="{'is-active': activeTab.includes('jewellery') && !activeTab.includes('customer-jewellery')}"><a href=" {{url(app()->getLocale())}}/jewellery">{{trans('frontHeader.Jewellery')}}</a></li>
            <li :class="{'is-active': activeTab.includes('education-diamond-grading') }"><a href=" {{url(app()->getLocale())}}/education-diamond-grading">{{trans('frontHeader.Education')}}</a></li>
            <li :class="{'is-active': activeTab.includes('customer-jewellery')|| activeTab.includes('customer-moments') || activeTab.includes('engagement-tips') }"><a href=" {{url(app()->getLocale())}}/customer-jewellery">{{trans('frontHeader.Customer Jewellery')}}</a></li>
            <li :class="{'is-active': activeTab.includes('about-us') }"><a href=" {{url(app()->getLocale())}}/about-us">{{trans('frontHeader.About Us')}}</a></li>
          </ul>
        </div>
      </nav>
    </div>



</section>
<div v-if="activeTab !== '' ">
  <nav class="navbar has-shadow" v-if="!notShowSubTab.filter((data)=>{return activeTab.includes(data)} ).length">
    <div class="container">

        @if(strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'gia-loose-diamonds' ))
        @include('layouts.subTabs.gia-loose-diamonds')
        @endif

        @if(strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'engagement-rings' ))
        @include('layouts.subTabs.engagement-rings')
        @endif
        
        @if(strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'wedding-rings' ))
        @include('layouts.subTabs.wedding-rings')
        @endif
        
        @if(strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'jewellery' ))
        @include('layouts.subTabs.jewellery')
        @endif
        
        @if(strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'education-diamond-grading' ))
        @include('layouts.subTabs.education-diamond-grading')
        @endif
       
        @if(strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'customer-jewellery' ) ||
            strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'customer-moments' ) ||
            strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'engagement-tips' ) )
        @include('layouts.subTabs.customer-jewellery')
        @endif
        
        @if(strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'about-us' ) ||
            strpos(str_replace( url(app()->getLocale()), '' , url()->current() ), 'buying-procedure' ) )
        @include('layouts.subTabs.about-us')
        @endif



    </div>
  </nav>
</div>

  <notification></notification>
  <contact-message></contact-message>
  <shopping-cart-progress></shopping-cart-progress>

  <div class="sticker" v-if="yPosition > 500">
        <button class="button is-primary" @click="scrollToTop()"> <i class="fas fa-arrow-up"></i></button> 
  </div>

 </div>

<!-- <script type="text/javascript" src="{{mix('js/app.js')}}"></script> 
 -->


