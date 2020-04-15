    <div class="navbar-tabs" v-if="activeTab.includes('/engagement-rings')">
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('solitaire-ring-setting')}"  href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting">{{__('frontHeader.Solitaire Ring')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('side-stones-setting')}"  href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting">{{__('frontHeader.Side-stone Ring')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('halo-setting')}"  href="{{url(app()->getLocale())}}/engagement-rings/halo-setting">{{__('frontHeader.Halo Ring')}}</a>
    </div>
