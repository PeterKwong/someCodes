<div class="col-span-2">

    <div class="list-group list-group-flush">
      <a class="block box p-2 bg-gray-500 text-white">{{__('account.My Account')}}</a>

      <a href="{{url( app()->getLocale() . '/account/setting')}}" class="block box p-2 bg-gray-100 hover:bg-gray-300">{{__('account.Account Setting')}}</a>
      <a href="{{url( app()->getLocale() . '/shopping-cart')}}" class="block box p-2 bg-gray-100 hover:bg-gray-300">{{__('account.Shopping Cart')}}</a>
      <a href="{{url( app()->getLocale() . '/account/pending')}}" class="block box p-2 bg-gray-100 hover:bg-gray-300">{{__('account.Orders')}}｜{{__('account.Pending Orders')}}</a>
      <a href="{{url( app()->getLocale() . '/account/invoices')}}" class="block box p-2 bg-gray-100 hover:bg-gray-300">{{__('account.Invoices')}}</a>
    
    
      @if(auth()->user()->current_team_id )
        @include('layouts.account.aside-promoter')
      @endif

      <a class="block btn btn-primary" href="{{ route('logout') }}">{{__('account.Logout')}}</a>


    </div>
            

</div>
