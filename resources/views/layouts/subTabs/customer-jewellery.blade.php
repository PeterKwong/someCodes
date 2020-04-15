
    <div class="navbar-tabs" v-if="activeTab.includes('customer-jewellery') || activeTab.includes('customer-moments') || activeTab.includes('engagement-tips')">
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('customer-jewellery')}" href="{{url(app()->getLocale())}}/customer-jewellery">{{__('frontHeader.Customer Jewellery')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('customer-moments')}" href="{{url(app()->getLocale())}}/customer-moments">{{__('frontHeader.Customer Moments')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('engagement-tips')}" href="{{url(app()->getLocale())}}/engagement-tips">{{__('frontHeader.Engagement Tips')}}</a>
    </div>