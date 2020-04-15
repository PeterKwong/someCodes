  <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
      <nav class="tabs is-boxed is-fullwidth" >
        <div class="container">
          <ul>
            <li :class="{'is-active': activeTab.includes('account') }"><a href=" {{url(app()->getLocale())}}/account">{{trans('frontHeader.Account Details')}}</a>
            </li>
            <li :class="{'is-active': activeTab.includes('engagement-rings') }"><a href=" {{url(app()->getLocale())}}/engagement-rings">{{trans('frontHeader.My Orders')}}</a></li>
            <li :class="{'is-active': activeTab.includes('wedding-rings') }"><a href=" {{url(app()->getLocale())}}/wedding-rings">{{trans('frontHeader.Wedding Rings')}}</a></li>
            <li :class="{'is-active': activeTab.includes('jewellery') && !activeTab.includes('customer-jewellery')}"><a href=" {{url(app()->getLocale())}}/jewellery">{{trans('frontHeader.Jewellery')}}</a></li>
            <li :class="{'is-active': activeTab.includes('education-diamond-grading') }"><a href=" {{url(app()->getLocale())}}/education-diamond-grading">{{trans('frontHeader.Education')}}</a></li>
            <li :class="{'is-active': activeTab.includes('customer-jewellery')|| activeTab.includes('customer-moments') || activeTab.includes('engagement-tips') }"><a href=" {{url(app()->getLocale())}}/customer-jewellery">{{trans('frontHeader.Customer Moments')}}</a></li>
            <li :class="{'is-active': activeTab.includes('about-us') }"><a href=" {{url(app()->getLocale())}}/about-us">{{trans('frontHeader.About Us')}}</a></li>
          </ul>
        </div>
      </nav>
    </div>