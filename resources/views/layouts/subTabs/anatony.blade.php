<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/shape') }"  id="carat-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/shape" role="tab" aria-controls="carat" aria-selected="true">{{__('diamondShape.Diamond Shape')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/hearts-and-arrows') }" id="cut-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/hearts-and-arrows" role="tab" aria-controls="cut" aria-selected="true">{{__('diamondHeartArrow.Hearts And Arrows diamond')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy-proportion') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-proportion" role="tab" aria-controls="color" aria-selected="true">{{__('diamondProportion.Anatomy Proportion')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy-symmetry') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-symmetry" role="tab" aria-controls="color" aria-selected="true">{{__('diamondSymmetry.Anatomy Symmetry')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy-polish') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-polish" role="tab" aria-controls="color" aria-selected="true">{{__('diamondPolish.Anatomy Polish')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class=" {' active show': mutualVar.namepath.includes('/education-diamond-grading/anatomy-fluorescence') }"  id="color-tab" href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-fluorescence" role="tab" aria-controls="color" aria-selected="true">{{__('diamondFluorescence.Anatomy Fluorescence')}}</a>
  </li>
</ul>


<!-- 
<div class="tabs is-centered">
          <ul>
            <li :class="{'is-active': activedSubTab=='shape' }" @click="activeSubTab('shape')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/shape">{{__('diamondShape.Diamond Shape')}}</a></li>
            <li :class="{'is-active': activedSubTab=='hearts-and-arrows' }" @click="activeSubTab('hearts-and-arrows')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/hearts-and-arrows">{{__('diamondHeartArrow.Hearts And Arrows diamond')}}</a></li>
            <li :class="{'is-active': activedSubTab=='anatomy-proportion' }" @click="activeSubTab('anatomy-proportion')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-proportion">{{__('diamondProportion.Anatomy Proportion')}}</a></li>
            <li :class="{'is-active': activedSubTab=='anatomy-symmetry' }" @click="activeSubTab('anatomy-symmetry')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-symmetry">{{__('diamondSymmetry.Anatomy Symmetry')}}</a></li>
            <li :class="{'is-active': activedSubTab=='anatomy-polish' }" @click="activeSubTab('anatomy-polish')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-polish">{{__('diamondPolish.Anatomy Polish')}}</a></li>
            <li :class="{'is-active': activedSubTab=='anatomy-fluorescence' }" @click="activeSubTab('anatomy-fluorescence')" ><a href="{{url(app()->getLocale())}}/education-diamond-grading/anatomy-fluorescence">{{__('diamondFluorescence.Anatomy Fluorescence')}}</a></li>
            
          </ul>
        </div> -->