<div id="header" >
  <header class="bg-white sm:flex sm:justify-between sm:items-center sm:px-2 sm:py-2" >
    <div class="flex items-center justify-between px-4 py-3 sm:p-0" >
      
      <div>
        <a href="/">
          <img class="h-10" src="{{ url('/images/front-end/logo/logo_2019_grey.png') }} " >
        </a>
      </div>


      <div class="flex sm:hidden items-center">
        <div class="">
          <a class="text-gray-700 text-decoration-none" href="{{url(app()->getLocale())}}/shopping-cart" >
              <i class="fa fa-shopping-cart" ></i>
          </a>
        </div>
        <shopping-cart-icon :shopping-cart-number="shoppingCartNumber"></shopping-cart-icon>
        <span style="padding: 3px"></span>

        @guest 

        <a class="text-gray-700 text-decoration-none" href="{{ url(app()->getLocale())}}/login">
          <i class="fa fa-lg fa-user-circle"></i>                
        </a>

        @else
        @include('layouts.account.loginIcon')
        @endguest

        <button @click="burgerOpen = !burgerOpen" type="button" class="hover:text-gray-400 focus:text-gray-600 focus:outline-none text-lg px-4">
          <i v-if="!burgerOpen" class="fa fa-bars" aria-hidden="true"></i>
          <i v-else class="fa fa-times" aria-hidden="true"></i>
        </button>


<!--         <button wire:click="$toggle('burgerOpen')" type="button" class="hover:text-gray-400 focus:text-gray-600 focus:outline-none text-lg px-4">
          @if(!$burgerOpen)
            <i class="fa fa-bars" aria-hidden="true"></i>
          @else
            <i class="fa fa-times" aria-hidden="true"></i>
          @endif
        </button>
 -->
      </div>

    </div>


    @include('layouts.frontEnd.headerDesktop')

      <div class="hidden sm:flex items-center px-4">
        <div class="">
          <a class="text-gray-700 text-decoration-none" href="{{url(app()->getLocale())}}/shopping-cart" >
                <i class="fa fa-shopping-cart" ></i>
            </a>

        </div>

        <shopping-cart-icon :shopping-cart-number="shoppingCartNumber"></shopping-cart-icon>
        <span style="padding: 3px"></span>

        @guest 

        <a class="text-gray-700 text-decoration-none" href="{{ url(app()->getLocale())}}/login">
          <i class="fa fa-lg fa-user-circle"></i>                
        </a>

        @else
        @include('layouts.account.loginIcon')
        @endguest

        <div class="dropdown hidden sm:block">
          <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/gia-loose-diamonds" >
            <img class="h-4 w-4" src="/images/front-end/langs/{{app()->getLocale()}}.png" >
            <span class="mr-1">{{trans('frontHeader.' . strToUpper(app()->getLocale(session('locale')))) }} </span>
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
          </a>

          <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 right-0">
            <li class="">
               <a class="flex items-center justify-center w-24 px-2 py-1 hover:text-blue-300 hover:bg-gray-100" href=" {{ '/en' . substr(str_replace(url(''),'',url()->current()), 3) }} ">
                <img class="h-4 w-4" src="/images/front-end/langs/en.png" >{{trans('frontHeader.EN')}}
               </a>
            </li>
            <li class="">
              <a class="flex items-center justify-center w-24 px-2 py-1 hover:text-blue-300 hover:bg-gray-100" href=" {{ '/hk'  . substr(str_replace(url(''),'',url()->current()), 3) }}">
              <img class="h-4 w-4" src="/images/front-end/langs/hk.png" >{{trans('frontHeader.HK')}}
             </a>
            </li>
            <li class="">
               <a class="flex items-center justify-center w-24 px-2 py-1 hover:text-blue-300 hover:bg-gray-100" href=" {{ '/cn'  . substr(str_replace(url(''),'',url()->current()), 3) }}">
                <img class="h-4 w-4" src="/images/front-end/langs/china.png" >{{trans('frontHeader.CN')}}
               </a>
            </li>
          </ul>
        </div>
        
      </div>



      @include('layouts.frontEnd.headerMobile')

    </div>


  </header>


 
  <shopping-cart-progress></shopping-cart-progress>
<!--   <notification></notification>
 -->
  <x-notification/>
  <x-floating-contact/>
  <x-loading/>
  
</div>




