    <div class="navbar-tabs" v-if="activeTab.includes('about-us') || activeTab.includes('buying-procedure')">
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('about-us')}" href="{{url(app()->getLocale())}}/about-us">{{__('frontHeader.About Us')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('buying-procedure')}" href="{{url(app()->getLocale())}}/buying-procedure">{{__('frontHeader.Buying Procedure')}}</a>
    </div>