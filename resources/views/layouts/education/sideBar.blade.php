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
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/carat">{{__('education.Diamond Carat')}}</a>      
            <br>
            
              <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/cut">{{trans('education.Diamond Cut')}}</a> 
              <br>
            
              <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/color">{{trans('education.Diamond Color')}}</a>     
              <br>
            
              <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs/clarity">{{trans('education.Diamond Clarity')}}</a> 
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
          
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Certificate')}}</a>
            <br>
              
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.GIA Report')}}</a>
            <br>
              
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean">{{trans('frontHeader.Eye Clean Diamond')}}</a> 
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
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Shape')}}</a>
            <br>
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows">{{trans('frontHeader.Heards And Arrows')}}</a>
            <br>
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Proportion')}}</a>
            <br>
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Symmetry')}}</a>
            <br>
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Polish')}}</a>
            <br>
            <a class="color-grey text-decoration-none" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence">{{trans('frontHeader.Diamond')}}{{trans('frontHeader.Fluorescence')}}</a>
            <br>
        </div>
      </div>
    </div>
  </div>
</div>
