<div class="pt-1 pb-1  hidden sm:flex">
  <div class="dropdown">
      <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/gia-loose-diamonds" >
        <span class="mr-1">{{trans('frontHeader.Diamonds')}}  </span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
      </a>

      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
        <li class="w-auto text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/gia-loose-diamonds">{{trans('frontHeader.Loose Diamonds')}}</a>
            <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut">
              <img class="w-6" src="/images/front-end/diamond_shapes/RD.png" > {{trans('frontHeader.Round')}}
            </a>
        </li>
        <li class="border border-gray-300 text-left">
          <a class="text-blue-500 p-1" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond">{{trans('frontHeader.Fancy Cut Diamonds')}}</a>
         </a>
          <span class="flex justify-between p-2 px-4">
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/heart-shaped"><img class="w-6" src="/images/front-end/diamond_shapes/HT.png" > {{trans('frontHeader.Heart')}}
            </a>
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/princess-cut"><img class="w-6" src="/images/front-end/diamond_shapes/PR.png" > {{trans('frontHeader.Princess')}}
            </a>
          </span>
          <span class="flex justify-between p-2 px-4">
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/emerald-cut"><img src="/images/front-end/diamond_shapes/EM.png" class="w-6"> {{trans('frontHeader.Emerald')}}
            </a>
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/asscher-cut"><img src="/images/front-end/diamond_shapes/AC.png" class="w-6"> {{trans('frontHeader.Asscher')}}
            </a>
          </span>

          <span class="flex justify-between p-2 px-4">
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/cushion-cut"><img src="/images/front-end/diamond_shapes/CU.png" class="w-6"> {{trans('frontHeader.Cushion')}}
            </a>
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/oval-cut"><img src="/images/front-end/diamond_shapes/OV.png" class="w-6"> {{trans('frontHeader.Oval')}}
            </a>                 
          </span>  

          <span class="flex justify-between p-2 px-4">
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/marquise-cut"><img src="/images/front-end/diamond_shapes/MQ.png" class="w-6"> {{trans('frontHeader.Marquise')}}
            </a>
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/radiant-cut"><img src="/images/front-end/diamond_shapes/RA.png" class="w-6"> {{trans('frontHeader.Radiant')}}
            </a>                 
          </span>  

          <span class="flex justify-between p-2 px-4">
            <a class="flex justify-start hover:text-blue-300" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond/pear-shaped"><img src="/images/front-end/diamond_shapes/PS.png" class="w-6"> {{trans('frontHeader.Pear')}}
            </a>                 
          </span>  

          <div class="border border-gray-300">
            <a class="dropdown-item color-blue" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color">
            <small class="has-text-info">{{trans('frontHeader.Fancy Color Diamonds')}}</small>
            </a>
          </div>



        </li>
      </ul>
    </div>

    <div class="dropdown">
      <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/engagement-rings" >
        <span class="mr-1">{{trans('frontHeader.Engagement Rings')}}</span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
      </a>

      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 text-left">
        <li class="w-auto text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/engagement-rings">
            {{trans('frontHeader.Engagement Rings')}}
          </a>
            <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting"><img src="/images/front-end/engagementRing/Solitaire.png" class="h-6">{{trans('frontHeader.Solitaire Ring')}}</a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting">
              <img src="/images/front-end/engagementRing/Side-stone.png" class="h-6">{{trans('frontHeader.Side-stone Ring')}}
          </a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/engagement-rings/halo-setting">
            <img src="/images/front-end/engagementRing/Halo.png" class="h-6">
            {{trans('frontHeader.Halo Ring')}}
          </a>

        </li>

      </ul>
    </div>

    <div class="dropdown">
      <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/wedding-rings">
        <span class="mr-1">
          {{trans('frontHeader.Wedding Rings')}}
        </span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
      </a>

      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 text-left">
        <li class="w-auto text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/wedding-rings">{{trans('frontHeader.Wedding Rings')}}</a>
            <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/wedding-rings/classic">{{trans('frontHeader.Classic Ring')}}</a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/wedding-rings/japanese">
                {{trans('frontHeader.Japanese Ring')}}
            </a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/wedding-rings/vintage">
                  {{trans('frontHeader.Vintage Ring')}}
            </a>
        </li>

      </ul>
    </div>


    <div class="dropdown">
      <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/jewellery">
        <span class="mr-1">
            {{trans('frontHeader.Jewellery')}}
      </span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
      </a>

      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 text-left w-auto">
        <li class="text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/jewellery">{{trans('frontHeader.Jewellery')}}
           </a>
           <div class="flex justify-start">
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
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/necklaces">
                <img src="/images/front-end/jewellery/Necklace.png" class="h-6"> {{trans('frontHeader.Necklaces')}}
            </a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/bracelets">
              <img src="/images/front-end/jewellery/Bracelet.png" class="h-6"> {{trans('frontHeader.Bracelets')}}
            </a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/earrings">
              <img src="/images/front-end/jewellery/Earring.png" width="15"> {{trans('frontHeader.Earrings')}}
            </a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/jewellery/pendants">
              <img src="/images/front-end/jewellery/Pendant.png" width="15"> {{trans('frontHeader.Pendants')}}
            </a>
        </li>

      </ul>
    </div>


     <div class="dropdown">
      <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/education-diamond-grading">
        <span class="mr-1">
            {{trans('frontHeader.Education')}}
      </span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
      </a>

      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 text-left w-auto">
        <li class="text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs">{{trans('frontHeader.Diamond Grading')}}</a>
           <div class="flex justify-start">
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
        </li>
            
        <li class="border border-gray-300 text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">
           {{trans('frontHeader.Diamond Certificate')}}
          </a>
           <div class="flex justify-start">
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
        </li>
            
        <li class="border border-gray-300 text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/education-diamond-grading/shape">
            {{trans('frontHeader.Diamond Anatomy')}}
           <div class="flex justify-start">
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
        </li>

      </ul>
    </div>

    <div class="dropdown">
      <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/customer-jewellery">
        <span class="mr-1">
           {{trans('frontHeader.Customer Jewellery')}}
        </span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
      </a>

      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 text-left">
        <li class="w-auto text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/customer-jewellery">{{trans('frontHeader.Customer Jewellery')}}</a>
            <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/customer-jewellery">{{trans('frontHeader.Customer Jewellery')}}</a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/customer-moments">
             {{trans('frontHeader.Customer Moments')}}
          </a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/engagement-tips">
             {{trans('frontHeader.Engagement Tips')}}
          </a>
        </li>

      </ul>
    </div>

    <div class="dropdown">
      <a class="block text-gray-700 font-light sm:hover:text-blue-300 mt-1 px-2 py-1 rounded sm:ml-2 sm:mt-0 inline-flex items-center" href="{{url(app()->getLocale())}}/about-us">
        <span class="mr-1">
           {{trans('frontHeader.About Us')}}
        </span>
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
      </a>

      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 text-left">
        <li class="w-auto text-left p-2">
           <a class="flex justify-start text-blue-500 px-1" href="{{url(app()->getLocale())}}/about-us">
            {{trans('frontHeader.About Us')}}</a>
            <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/about-us">
               {{trans('frontHeader.About Us')}}</a>
        </li>
        <li class="border border-gray-300 text-left p-2">
          <a class="flex justify-start hover:text-blue-300 p-1" href="{{url(app()->getLocale())}}/buying-procedure">
                {{trans('frontHeader.Buying Procedure')}}
          </a>
        </li>

      </ul>
    </div>
    
</div>