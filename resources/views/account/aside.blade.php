<div class="col-2">

    <div class="list-group list-group-flush">
      <a class="list-group-item list-group-item-action list-group-item-dark">{{__('account.My Account')}}</a>

      <a href="{{url( app()->getLocale() . '/account/setting')}}" class="list-group-item list-group-item-action list-group-item-light">{{__('account.Account Setting')}}</a>
      <a href="{{url( app()->getLocale() . '/shopping-cart')}}" class="list-group-item list-group-item-action list-group-item-light">{{__('account.Shopping Cart')}}</a>
      <a href="{{url( app()->getLocale() . '/account/pending')}}" class="list-group-item list-group-item-action list-group-item-light">{{__('account.Orders')}}｜{{__('account.Pending Orders')}}</a>
      <a href="{{url( app()->getLocale() . '/account/invoices')}}" class="list-group-item list-group-item-action list-group-item-light">{{__('account.Invoices')}}</a>
    
    
      @if(auth()->user()->roles()->get()->filter( function($data){ return $data['name'] == 'promoter' ; })->map(function($data){ return $data['name'];})->first())
      @include('account.asidePromoter')
      @endif

      <a class="btn btn-primary" href="{{ route('logout') }}">{{__('account.Logout')}}</a>


    </div>
            

</div>
