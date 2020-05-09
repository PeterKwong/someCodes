<div class="col-sm-2 text-center">
  <div id="accordion">

    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#education-4cs" aria-expanded="{{request()->segment(3) == '4cs'}}" aria-controls="education-4cs">
            {{trans('frontHeader.Education')}}
            <i class="fas fa-chevron-down"></i>
          </button>
        </h5>
      </div>

      <div id="education-4cs" class="collapse {{request()->segment(3) == '4cs'?'show':''}}" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <a class="text-decoration-none {{ request()->segment(4) == 'carat'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat">{{__('education.Diamond Carat')}}</a>      
            <br>
            
              <a class="text-decoration-none {{ request()->segment(4) == 'cut'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut">{{trans('education.Diamond Cut')}}</a> 
              <br>
            
              <a class="text-decoration-none {{ request()->segment(4) == 'color'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color">{{trans('education.Diamond Color')}}</a>     
              <br>
            
              <a class="text-decoration-none {{ request()->segment(4) == 'clarity'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity">{{trans('education.Diamond Clarity')}}</a> 
              <br>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#education-certificate" aria-expanded="{{request()->segment(3) == 'gia-report'}}" aria-controls="education-certificate">
            {{trans('frontHeader.Diamond Certificate')}}
            <i class="fas fa-chevron-down"></i>
          </button>
        </h5>
      </div>
      <div id="education-certificate" class="collapse {{request()->segment(3) == 'gia-report'?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          
            <a class="text-decoration-none {{ request()->segment(4) == 'grading-certficate' && !request()->segment(4)?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Certificate')}}</a>
            <br>
              
            <a class="text-decoration-none {{ request()->segment(3) == 'gia-report' && !request()->segment(4) ?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.GIA Report')}}</a>
            <br>
              
            <a class="text-decoration-none {{ request()->segment(4) == 'grading-eye-clean'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean">{{trans('frontHeader.Eye Clean Diamond')}}</a> 
            <br>   

        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#diamond-anatomy" aria-expanded=" {{request()->segment(3) == 'anatomy'}}" aria-controls="diamond-anatomy">
            {{trans('frontHeader.Diamond Anatomy')}}
            <i class="fas fa-chevron-down"></i>
          </button>
        </h5>
      </div>
      <div id="diamond-anatomy" class="collapse {{request()->segment(3) == 'anatomy'?'show':''}}" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            <a class="text-decoration-none {{ request()->segment(4) == 'shape'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Shape')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(4) == 'hearts-and-arrows'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows">{{trans('frontHeader.Heards And Arrows')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(4) == 'proportion'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Proportion')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(4) == 'symmetry'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Symmetry')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(4) == 'polish'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Polish')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(4) == 'fluorescence'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Fluorescence')}}</a>
            <br>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingFour">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#about-us" aria-expanded=" {{request()->segment(2) == 'about-us'}}" aria-controls="about-us">
            {{trans('aboutUs.About Us')}}
            <i class="fas fa-chevron-down"></i>
          </button>
        </h5>
      </div>
      <div id="about-us" class="collapse {{request()->segment(2) == 'about-us'?'show':''}}" aria-labelledby="headingFour" data-parent="#accordion">
        <div class="card-body">
            <a class="text-decoration-none {{ request()->segment(2) == 'about-us' && !request()->segment(3) ?'':'color-grey' }}" href="{{url(app()->getLocale())}}/about-us">
            {{trans('aboutUs.Contact Us')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(3) == 'guarantee'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/about-us/guarantee">
            {{trans('aboutUs.Quality Guarantee')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(3) == 'commitment'?'':'color-grey' }}" href="{{url(app()->getLocale())}}/about-us/commitment">{{trans('aboutUs.Satification Insurence')}}</a>
            <br>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingFive">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#buying-procedure" aria-expanded=" {{request()->segment(2) == 'buying-procedure'}}" aria-controls="buying-procedure">
            {{trans('buyingProcedure.BUYING PROCEDURE')}}
            <i class="fas fa-chevron-down"></i>
          </button>
        </h5>
      </div>
      <div id="buying-procedure" class="collapse {{request()->segment(2) == 'buying-procedure'?'show':''}}" aria-labelledby="headingFive" data-parent="#accordion">
        <div class="card-body">
            <a class="text-decoration-none {{ request()->segment(2) == 'buying-procedure' && !request()->segment(3) ?'':'color-grey' }}" href="{{ url( app()->getLocale())}}/buying-procedure" >{{trans('buyingProcedure.Appointment First')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(3) == 'take-from-shop-or-gia'?'':'color-grey' }}" href="{{ url( app()->getLocale())}}/buying-procedure/take-from-shop-or-gia" >
            {{trans('buyingProcedure.Shop Or GIA Lab')}} </a>
            <br>
            <a class="text-decoration-none {{ request()->segment(3) == 'custom-engagement-rings'?'':'color-grey' }}" href="{{ url( app()->getLocale())}}/buying-procedure/custom-engagement-rings" >
            {{trans('buyingProcedure.Choose Ring Setting')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(3) == 'diamond-inlay-engrave'?'':'color-grey' }}" href="{{ url( app()->getLocale())}}/buying-procedure/diamond-inlay-engrave">
            {{trans('buyingProcedure.Ring Inlay | Engrave')}}</a>
            <br>
            <a class="text-decoration-none {{ request()->segment(3) == 'full-satisfaction'?'':'color-grey' }}" href="{{ url( app()->getLocale())}}/buying-procedure/full-satisfaction" >
            {{trans('buyingProcedure.Pay With Satisfaction')}} </a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingFive">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#engagement-tips" aria-expanded=" {{request()->segment(2) == 'engagement-tips'}}" aria-controls="engagement-tips">
            {{__('customerMoment.Proposal Tips')}}
            <i class="fas fa-chevron-down"></i>
          </button>
        </h5>
      </div>
      <div id="engagement-tips" class="collapse {{request()->segment(2) == 'engagement-tips'?'show':''}}" aria-labelledby="headingFive" data-parent="#accordion">
        <div class="card-body">
            <a class="text-decoration-none color-grey }}" href="{{ url( app()->getLocale())}}/engagement-tips" >{{__('customerMoment.Proposal Methods')}}</a>
            <br>
           
        </div>
      </div>
    </div>
    
  </div>
</div>
