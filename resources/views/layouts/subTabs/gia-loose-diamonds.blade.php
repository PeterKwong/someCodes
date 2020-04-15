<div class="navbar-tabs " v-if="activeTab.includes('gia-loose-diamonds') ">
      <div class="level-item">
          <a href=""><img src="/front_end/diamond_shapes/RD.png" width="15">
          </a>
      </div>
      <a class="navbar-item is-tab" :class="{'is-active':activeTab.includes('round-cut')}" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut">{{__('frontHeader.Round Diamonds')}}</a>
      <a class="navbar-item is-tab" :class="{'is-active':activeTab.includes('fancy-cut-diamond')}" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-cut-diamond">{{__('frontHeader.Fancy Cut Diamonds')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('fancy-color')}" href="{{url(app()->getLocale())}}/gia-loose-diamonds/fancy-color">{{__('frontHeader.Fancy Color Diamonds')}}</a>

      <div class="level-item">
          
          <a href=""><strong>|</strong> <img src="/front_end/jewellery/Ring.png" width="15">
          </a>
      </div>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/diamond-rings')}" href="{{url(app()->getLocale())}}/jewellery/diamond-rings">{{__('frontHeader.Diamond Rings')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('jewellery/fancy-diamond-rings')}" href="{{url(app()->getLocale())}}/jewellery/fancy-diamond-rings">{{__('frontHeader.Fancy Diamond Rings')}}</a>
    </div>
    <div class="navbar-tabs" v-if="activeTab.includes('/engagement-rings')">
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('solitaire-ring-setting')}"  href="{{url(app()->getLocale())}}/engagement-rings/solitaire-ring-setting">{{__('frontHeader.Solitaire Ring')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('side-stones-setting')}"  href="{{url(app()->getLocale())}}/engagement-rings/side-stones-setting">{{__('frontHeader.Side-stone Ring')}}</a>
      <a class="navbar-item is-tab " :class="{'is-active':activeTab.includes('halo-setting')}"  href="{{url(app()->getLocale())}}/engagement-rings/halo-setting">{{__('frontHeader.Halo Ring')}}</a>
    </div>