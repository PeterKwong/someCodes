<div class="sm:hidden" :class=" burgerOpen? 'inline' : 'hidden' ">
  <div class="relative">
    <button @click="burgerOpen = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-black opacity-50 cursor-default"></button>

    <div class="fixed z-10 bg-white top-0 left-0 bottom-0 w-7/12" >
      <div class="flex justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1" @click="onClickedHeader(1)">
        {{trans('frontHeader.Diamonds')}}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>
      <div v-if="headerSection == 1" class="block py-4 bg-gray-200">
        <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/gia-loose-diamonds">{{trans('frontHeader.Loose Diamonds')}}</a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut">
          <img class="w-6" src="/images/front-end/diamond_shapes/RD.png" > {{trans('frontHeader.Round')}}
        </a>

        <a class="flex justify-center text-blue-500 p-1" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond">{{trans('frontHeader.Fancy Cut Diamonds')}}</a>
       </a>
          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/heart-shaped"><img class="w-6" src="/images/front-end/diamond_shapes/HT.png" > {{trans('frontHeader.Heart')}}
          </a>

          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/princess-cut"><img class="w-6" src="/images/front-end/diamond_shapes/PR.png" > {{trans('frontHeader.Princess')}}
          </a>

          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/emerald-cut"><img src="/images/front-end/diamond_shapes/EM.png" class="w-6"> {{trans('frontHeader.Emerald')}}
          </a>
          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/asscher-cut"><img src="/images/front-end/diamond_shapes/AC.png" class="w-6"> {{trans('frontHeader.Asscher')}}
          </a>


          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/cushion-cut"><img src="/images/front-end/diamond_shapes/CU.png" class="w-6"> {{trans('frontHeader.Cushion')}}
          </a>
          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/oval-cut"><img src="/images/front-end/diamond_shapes/OV.png" class="w-6"> {{trans('frontHeader.Oval')}}
          </a>                 


          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/marquise-cut"><img src="/images/front-end/diamond_shapes/MQ.png" class="w-6"> {{trans('frontHeader.Marquise')}}
          </a>
          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/radiant-cut"><img src="/images/front-end/diamond_shapes/RA.png" class="w-6"> {{trans('frontHeader.Radiant')}}
          </a>                 


          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/pear-shaped"><img src="/images/front-end/diamond_shapes/PS.png" class="w-6"> {{trans('frontHeader.Pear')}}
          </a>                 


          <a class="flex justify-center hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color">
          <small class="has-text-info">{{trans('frontHeader.Fancy Color Diamonds')}}</small>
          </a>

      </div>

      <div class="flex justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1 " @click="onClickedHeader(2)">
        {{trans('frontHeader.Engagement Rings')}}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>
      <div v-if="headerSection == 2" class="block py-4 bg-gray-200">
       <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/engagement-rings">
        {{trans('frontHeader.Engagement Rings')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting">
          <img src="/images/front-end/engagementRing/Solitaire.png" class="h-6">{{trans('frontHeader.Solitaire Ring')}}</a>
        </li>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting">
          <img src="/images/front-end/engagementRing/Side-stone.png" class="h-6">{{trans('frontHeader.Side-stone Ring')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/engagement-rings/halo-setting">
            <img src="/images/front-end/engagementRing/Halo.png" class="h-6">
            {{trans('frontHeader.Halo Ring')}}
        </a>

      </div>


      <div class="flex justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1 " @click="onClickedHeader(3)">
        {{trans('frontHeader.Wedding Rings')}}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>

      <div v-if="headerSection == 3" class="block py-4 bg-gray-200">
        <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/wedding-rings">{{trans('frontHeader.Wedding Rings')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/wedding-rings/classic">
          {{trans('frontHeader.Classic Ring')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/wedding-rings/japanese">
          {{trans('frontHeader.Japanese Ring')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/wedding-rings/vintage">
          {{trans('frontHeader.Vintage Ring')}}
        </a>
        
      </div>


      <div class="flex justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1 " @click="onClickedHeader(4)">
        {{trans('frontHeader.Jewellery')}}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>

      <div v-if="headerSection == 4" class="block py-4 bg-gray-200">
        <div class="flex justify-center">
         <div class="flex-initial">
          <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/jewellery/rings"><img src="/images/front-end/jewellery/Ring.png" class="h-6">{{trans('frontHeader.Rings')}}
          </a>
         </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/jewellery/diamond-rings">
              ｜ {{trans('frontHeader.Diamond Rings')}}
            </a>   
         </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/jewellery/fancy-diamond-rings">｜ {{trans('frontHeader.Fancy Diamond Rings')}}</a>                    
          </p> 
        </div>
       </div>

        <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/jewellery/rings">
          {{trans('frontHeader.Jewellery')}}
        </a>

        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/necklaces">
            <img src="/images/front-end/jewellery/Necklace.png" class="h-6"> {{trans('frontHeader.Necklaces')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/bracelets">
            <img src="/images/front-end/jewellery/Bracelet.png" class="h-6"> {{trans('frontHeader.Bracelets')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/earrings">
          <img src="/images/front-end/jewellery/Earring.png" width="15"> 
          {{trans('frontHeader.Earrings')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/pendants">
          <img src="/images/front-end/jewellery/Pendant.png" width="15"> 
          {{trans('frontHeader.Pendants')}}
        </a>                 
      </div>

      <div class="flex justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1 " @click="onClickedHeader(5)">
        {{trans('frontHeader.Education')}}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>


      <div v-if="headerSection == 5" class="block py-4 bg-gray-200">

        <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs">{{trans('frontHeader.Diamond Grading')}}
        </a>
         <div class="flex justify-center">
           <div class="flex-initial">
            <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat">
              {{trans('frontHeader.Carat')}} | 
            </a> 
           </div>
           <div class="flex-initial">
             <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut">
              {{trans('frontHeader.Cut')}} | 
             </a>
           </div>
           <div class="flex-initial">
             <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color">
              {{trans('frontHeader.Color')}} |
             </a>
          </div>
           <div class="flex-initial">
             <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity">
              {{trans('frontHeader.Clarity')}}
             </a>
          </div>
         </div>

      <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">
       {{trans('frontHeader.Diamond Certificate')}}
      </a>
       <div class="flex justify-center">
         <div class="flex-initial">
          <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate">{{trans('frontHeader.Certificate')}} |
          </a>
         </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">
           {{trans('frontHeader.GIA Report')}}|
         </a>
         </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean">{{trans('frontHeader.Eye Clean Diamond')}}
           </a>
        </div>
       </div>

        <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/education-diamond-grading/shape">
        {{trans('frontHeader.Diamond Anatomy')}}
        </a>
       <div class="flex justify-center">
         <div class="flex-initial">
          <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape">
            {{trans('frontHeader.Shape')}}|
          </a>
         </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows">{{trans('frontHeader.Heards And Arrows')}}|
           </a>
         </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion">{{trans('frontHeader.Proportion')}}|
            </a>
        </div>
       </div>

       <div class="flex justify-center">
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry">{{trans('frontHeader.Symmetry')}}|
           </a>
        </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish">
            {{trans('frontHeader.Polish')}}|
          </a>
        </div>
         <div class="flex-initial">
           <a class="flex hover:text-blue-300 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence">{{trans('frontHeader.Fluorescence')}}
           </a>
        </div>
       </div>

      </div>

      <div class="flex justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1 " @click="onClickedHeader(6)">
       {{trans('frontHeader.Customer Jewellery')}}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>

      <div v-if="headerSection == 6" class="block py-4 bg-gray-200">
        <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/customer-jewellery">{{trans('frontHeader.Customer Jewellery')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/customer-jewellery">
          {{trans('frontHeader.Customer Jewellery')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/customer-moments">
           {{trans('frontHeader.Customer Moments')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1"  href="{{url(app()->getLocale())}}/engagement-tips">
           {{trans('frontHeader.Engagement Tips')}}
        </a>
        
      </div>


       <div class="flex justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1 " @click="onClickedHeader(7)">
       {{trans('frontHeader.About Us')}}
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>

      <div v-if="headerSection == 7" class="block py-4 bg-gray-200">
        <a class="flex justify-center text-blue-500" href="{{url(app()->getLocale())}}/about-us">
          {{trans('frontHeader.About Us')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/about-us">
           {{trans('frontHeader.About Us')}}
        </a>
        <a class="flex justify-center hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/buying-procedure">
            {{trans('frontHeader.Buying Procedure')}}
        </a>
        
      </div>
      
     
       <div class="flex items-center justify-center text-lg font-light border border-gray-400 hover:text-blue-400 p-1 " @click="onClickedHeader(8)">
        <img class="h-4 w-4" src="/images/front-end/langs/{{app()->getLocale()}}.png" >
        <span class="mr-1">
          {{trans('frontHeader.' . strToUpper(app()->getLocale(session('locale')))) }} 
        </span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
        </svg>
      </div>

      <div v-if="headerSection == 8" class="block py-4 bg-gray-200 justify-center">
         <a class="flex items-center justify-center h-8 hover:text-blue-300 hover:bg-gray-100" href=" {{ '/en' . substr(str_replace(url(''),'',url()->current()), 3) }} ">
          <img class="h-4 w-4" src="/images/front-end/langs/en.png" >{{trans('frontHeader.EN')}}
         </a>
        <a class="flex items-center justify-center h-8 hover:text-blue-300 hover:bg-gray-100" href=" {{ '/hk'  . substr(str_replace(url(''),'',url()->current()), 3) }}">
        <img class="h-4 w-4" src="/images/front-end/langs/hk.png" >{{trans('frontHeader.HK')}}
       </a>
         <a class="flex items-center justify-center h-8 hover:text-blue-300 hover:bg-gray-100" href=" {{ '/cn'  . substr(str_replace(url(''),'',url()->current()), 3) }}">
          <img class="h-4 w-4" src="/images/front-end/langs/china.png" >{{trans('frontHeader.CN')}}
         </a>
      </div>

  </div>
</div>
