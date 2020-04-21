<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/gia-report/grading-certficate') || mutualVar.namepath == '/education-diamond-grading/4cs' }"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-certficate" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond certficate')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/gia-report') && !mutualVar.namepath.includes('/education-diamond-grading/gia-report/') }" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Gia Report')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/gia-report/grading-eye-clean') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report/grading-eye-clean" role="tab" aria-controls="color" aria-selected="true">{{__('education.Eye Clean Diamond')}}</a>
  </li>
</ul>


