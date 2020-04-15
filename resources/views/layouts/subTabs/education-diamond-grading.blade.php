
    <div class="navbar-tabs" v-if="activeTab.includes('/education-diamond-grading')">
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('gia-report')}" href="{{url(app()->getLocale())}}/education-diamond-grading/4cs">{{__('frontHeader.Diamond Grading')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('grading-certficate')}" href="{{url(app()->getLocale())}}/education-diamond-grading/grading-certficate">{{__('frontHeader.Diamond Certificate')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('shape')}" href="{{url(app()->getLocale())}}/education-diamond-grading/shape">{{__('frontHeader.Diamond Anatomy')}}</a>
      <a class="navbar-item is-tab " >{{__('frontHeader.Fancy Color Diamond')}}</a>
    </div>