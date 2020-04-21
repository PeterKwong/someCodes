<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy/shape') }"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/shape" role="tab" aria-controls="carat" aria-selected="true">{{__('diamondShape.Diamond Shape')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy/hearts-and-arrows') }" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/hearts-and-arrows" role="tab" aria-controls="cut" aria-selected="true">{{__('diamondHeartArrow.Hearts And Arrows diamond')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy/proportion') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/proportion" role="tab" aria-controls="color" aria-selected="true">{{__('diamondProportion.Anatomy Proportion')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy/symmetry') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/symmetry" role="tab" aria-controls="color" aria-selected="true">{{__('diamondSymmetry.Anatomy Symmetry')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy/polish') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/polish" role="tab" aria-controls="color" aria-selected="true">{{__('diamondPolish.Anatomy Polish')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy/fluorescence') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy/fluorescence" role="tab" aria-controls="color" aria-selected="true">{{__('diamondFluorescence.Anatomy Fluorescence')}}</a>
  </li>
</ul>

