<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/grading-certficate') || mutualVar.namepath == '/education-diamond-grading/4cs' }"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/grading-certficate" role="tab" aria-controls="carat" aria-selected="true">{{__('education.Diamond certficate')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/gia-report') }" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report" role="tab" aria-controls="cut" aria-selected="true">{{__('education.Gia Report')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/grading-eye-clean') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/grading-eye-clean" role="tab" aria-controls="color" aria-selected="true">{{__('education.Eye Clean Diamond')}}</a>
  </li>
</ul>


<!-- 
<div class="tabs is-centered">
          <ul>
            <li :class="{'is-active': activedSubTab=='grading-certficate' }" @click="activeSubTab('grading-certficate')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/grading-certficate">{{__('education.Diamond certficate')}}</a></li>
            <li :class="{'is-active': activedSubTab=='gia-report' }" @click="activeSubTab('gia-report')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/gia-report">{{__('education.Gia Report')}} </a></li>
            <li :class="{'is-active': activedSubTab=='grading-eye-clean' }" @click="activeSubTab('grading-eye-clean')"><a href="{{url(app()->getLocale())}}/education-diamond-grading/grading-eye-clean">{{__('education.Eye Clean Diamond')}}</a></li>
            
          </ul>
        </div> -->