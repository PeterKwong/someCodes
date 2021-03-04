<div class="grid grid-cols-12 gap-6">
  @foreach( config('global.company.staffs') as $staff )
    <div class="col-span-12 sm:col-span-6 box mx-4">
      <div class="card " style="max-width: 540px;">
        <div class="flex justify-center">
          <div class="p-2">
            @if(app()->getLocale() != 'cn')
            <div class="w-24 h-24">
              <img src="{{ '/images/front-end/contact/' . $staff['name'] . '.png' }}" class="w-24 h-24 rounded-full flex items-center justify-center" alt="...">
            </div>
            @endif

            @if(app()->getLocale() == 'cn')
            <div class="w-24 h-24">
              <img src="{{ '/images/front-end/contact/wechat/' . $staff['name'] . '.png' }}" class="" alt="...">
            </div>
            @endif

          </div>
          <div class="">
            <div class="card-body">
              <h5 class="pt-2 text-2xl text-gray-600">{{ $staff['name'] }}</h5>
              @if(app()->getLocale() != 'cn')
                <p class="pt-2 card-text">
                  <small class="pt-2 text-muted">
                      <a class="text-blue-600" href="{{ '/links/whatsapp/852' .  $staff['number'] }}">
                        {{__('aboutUs.or contact her via')}}
                        whatsapp

                        <img width="28" src="/images/front-end/aboutUs/whatsapp.jpg">
                      </a>
                  </small>
                </p>
              @endif
              @if(app()->getLocale() == 'cn')
                <p class="pt-2 card-text">{{__('aboutUs.@Wechat')}}</p>
              @endif
            </div>
          </div>
        </div>
      </div>                    
    </div>
  @endforeach


<!--   <div class="col-sm-4">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-4">
          <img src="/images/front-end/contact/wechat/winnie.png" class="card-img" alt="...">
        </div>
        <div class="col-8">
          <div class="card-body">
            <h5 class="card-title">Winnie</h5>
            <p class="card-text">{{__('aboutUs.@Wechat')}}</p>
            <p class="card-text">
              <small class="text-muted">
                {{__('aboutUs.or contact her via')}}
                  <a href="/links/whatsapp/85254844533">whatsapp
                    <img width="28" src="/images/front-end/aboutUs/whatsapp.jpg">
                  </a>
              </small>
            </p>
          </div>
        </div>
      </div>
    </div>                    
  </div>
 -->


</div>
