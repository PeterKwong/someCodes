<div class="row justify-content-center">
  @foreach( config('global.company.staffs') as $staff )
    <div class="col-sm-4">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-4">
            <img src="{{ '/images/front-end/contact/wechat/' . $staff['name'] . '.png' }}" class="card-img" alt="...">
          </div>
          <div class="col-8">
            <div class="card-body">
              <h5 class="card-title">{{ $staff['name'] }}</h5>
              <p class="card-text">{{__('aboutUs.@Wechat')}}</p>
              <p class="card-text">
                <small class="text-muted">
                  {{__('aboutUs.or contact her via')}}
                    <a href="{{ '/links/whatsapp/852' .  $staff['number'] }}">whatsapp
                      <img width="28" src="/images/front-end/aboutUs/whatsapp.jpg">
                    </a>
                </small>
              </p>
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
