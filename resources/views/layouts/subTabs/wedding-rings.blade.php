    <div class="navbar-tabs" v-if="activeTab.includes('/wedding-rings')">
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('classic')}" href="{{url(app()->getLocale())}}/wedding-rings/classic">{{__('frontHeader.Classic Ring')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('japanese')}" href="{{url(app()->getLocale())}}/wedding-rings/japanese">{{__('frontHeader.Japanese Ring')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('vintage')}" href="{{url(app()->getLocale())}}/wedding-rings/vintage">{{__('frontHeader.Vintage Ring')}}</a>
    </div>