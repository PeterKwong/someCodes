<div class="col-span-12 sm:col-span-2 text-center p-2">
  <div id="accordion">

    <div class="card box">
      <div class="" id="headingOne">
        <h5 class="mb-0">
          <p @click="mutualVar.tabs.sideBar = '4cs' " class="btn text-blue-600" >
            {{trans('frontHeader.Education')}}
            <i class="fas fa-chevron-down"></i>
          </p>
        </h5>
      </div>

      <div v-if="mutualVar.tabs.sideBar.includes('4cs') ">
        <div class="card-body">
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'carat')?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat">{{__('education.Diamond Carat')}}</a>      
            <br>
            
              <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'cut') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut">{{trans('education.Diamond Cut')}}</a> 
              <br>
            
              <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'color') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color">{{trans('education.Diamond Color')}}</a>     
              <br>
            
              <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'clarity') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity">{{trans('education.Diamond Clarity')}}</a> 
              <br>
        </div>
      </div>
    </div>
    <div class="card box">
      <div class="" id="headingTwo">
        <h5 class="mb-0">
          <p @click="mutualVar.tabs.sideBar = 'gia-report' " class="btn text-blue-600 " >
            {{trans('frontHeader.Diamond Certificate')}}
            <i class="fas fa-chevron-down"></i>
          </p>
        </h5>
      </div>
      <div id="education-certificate" v-if="mutualVar.tabs.sideBar.includes('gia-report') ">
        <div class="card-body" >
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'grading-certficate') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Certificate')}}</a>
            <br>
              
            <a class="text-decoration-none {{ Str::contains(request()->segment(3), 'gia-report') && !request()->segment(4) ?'text-blue-600':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.GIA Report')}}</a>
            <br>
              
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'grading-eye-clean') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean">{{trans('frontHeader.Eye Clean Diamond')}}</a> 
            <br>   

        </div>
      </div>
    </div>
    <div class="card box">
      <div class="" id="headingThree">
        <h5 class="mb-0">
          <p @click="mutualVar.tabs.sideBar = 'anatomy' " class="btn text-blue-600 " >
            {{trans('frontHeader.Diamond Anatomy')}}
            <i class="fas fa-chevron-down"></i>
          </p>
        </h5>
      </div>
      <div id="diamond-anatomy"  v-if="mutualVar.tabs.sideBar.includes('anatomy') ">
        <div class="card-body">
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'shape') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Shape')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'hearts-and-arrows') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows">{{trans('frontHeader.Heards And Arrows')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'proportion') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Proportion')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'symmetry') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Symmetry')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'polish') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Polish')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(4), 'fluorescence') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Fluorescence')}}</a>
            <br>
        </div>
      </div>
    </div>
    <div class="card box">
      <div class="" id="headingFour">
        <h5 class="mb-0">
          <p @click="mutualVar.tabs.sideBar = 'about-us' " class="btn text-blue-600 " data-toggle="collapse" data-target="#about-us" aria-expanded=" {{Str::contains(request()->segment(2), 'about-us') }}" aria-controls="about-us">
            {{trans('aboutUs.About Us')}}
            <i class="fas fa-chevron-down"></i>
          </p>
        </h5>
      </div>
      <div id="about-us"  v-if="mutualVar.tabs.sideBar.includes('about-us') ">
        <div class="card-body">
            <a class="text-decoration-none {{ Str::contains(request()->segment(2), 'about-us') && !request()->segment(3) ?'text-blue-600':'' }}" href="{{url(app()->getLocale())}}/about-us">
            {{trans('aboutUs.Contact Us')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(3), 'guarantee') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/about-us/guarantee">
            {{trans('aboutUs.Quality Guarantee')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(3), 'commitment') ?'text-blue-400':'' }}" href="{{url(app()->getLocale())}}/about-us/commitment">{{trans('aboutUs.Satification Insurence')}}</a>
            <br>
        </div>
      </div>
    </div>
    <div class="card box">
      <div class="" id="headingFive">
        <h5 class="mb-0">
          <p class="btn text-blue-600 " @click="mutualVar.tabs.sideBar = 'buying-procedure' ">
            {{trans('buyingProcedure.BUYING PROCEDURE')}}
            <i class="fas fa-chevron-down"></i>
          </p>
        </h5>
      </div>
      <div id="buying-procedure"  v-if="mutualVar.tabs.sideBar.includes('buying-procedure') ">
        <div class="card-body">
            <a class="text-decoration-none {{ Str::contains(request()->segment(2), 'buying-procedure') && !request()->segment(3) ?'text-blue-600':'' }}" href="{{ url( app()->getLocale())}}/buying-procedure" >{{trans('buyingProcedure.Appointment First')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(3), 'custom-engagement-rings') ?'text-blue-400':'' }}" href="{{ url( app()->getLocale())}}/buying-procedure/custom-engagement-rings" >
            {{trans('buyingProcedure.Choose Ring Setting')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(3), 'diamond-inlay-engrave') ?'text-blue-400':'' }}" href="{{ url( app()->getLocale())}}/buying-procedure/diamond-inlay-engrave">
            {{trans('buyingProcedure.Ring Inlay | Engrave')}}</a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(3), 'take-from-shop-or-gia') ?'text-blue-400':'' }}" href="{{ url( app()->getLocale())}}/buying-procedure/take-from-shop-or-gia" >
            {{trans('buyingProcedure.Shop Or GIA Lab')}} </a>
            <br>
            <a class="text-decoration-none {{ Str::contains(request()->segment(3), 'full-satisfaction') ?'text-blue-400':'' }}" href="{{ url( app()->getLocale())}}/buying-procedure/full-satisfaction" >
            {{trans('buyingProcedure.Pay With Satisfaction')}} </a>
        </div>
      </div>
    </div>
    <div class="card box">
      <div class="" id="headingFive">
        <h5 class="mb-0">
          <p class="btn text-blue-600 " @click="mutualVar.tabs.sideBar = 'engagement-tips' ">
            {{__('customerMoment.Proposal Tips')}}
            <i class="fas fa-chevron-down"></i>
          </p>
        </h5>
      </div>
      <div id="engagement-tips"  v-if="mutualVar.tabs.sideBar.includes('engagement-tips') ">
        <div class="card-body">
            <a class="text-decoration-notext-blue-600ne  }}" href="{{ url( app()->getLocale())}}/engagement-tips" >{{__('customerMoment.Proposal Methods')}}</a>
            <br>
           
        </div>
      </div>
    </div>
    
  </div>
</div>

<script type="application/javascript" defer>
    window.mutualVar.tabs.sideBar = @json(request()->segment(2) . request()->segment(3). request()->segment(4));
</script>
