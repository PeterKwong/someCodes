
    <div class="navbar-tabs" v-if="activeTab.includes('/jewellery')">
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/rings')}" href="{{url(app()->getLocale())}}/jewellery/rings">{{__('frontHeader.Rings')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/diamond-rings')}" href="{{url(app()->getLocale())}}/jewellery/diamond-rings">{{__('frontHeader.Diamond Rings')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/fancy-diamond-rings')}" href="{{url(app()->getLocale())}}/jewellery/fancy-diamond-rings">{{__('frontHeader.Fancy Diamond Rings')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/necklaces')}" href="{{url(app()->getLocale())}}/jewellery/necklaces">{{__('frontHeader.Necklaces')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/bracelets')}" href="{{url(app()->getLocale())}}/jewellery/bracelets">{{__('frontHeader.Bracelets')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/earrings')}" href="{{url(app()->getLocale())}}/jewellery/earrings">{{__('frontHeader.Earrings')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/pendants')}" href="{{url(app()->getLocale())}}/jewellery/pendants">{{__('frontHeader.Pendants')}}</a>
    </div>
