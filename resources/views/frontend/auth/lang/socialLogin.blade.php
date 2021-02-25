

<form class="sm:px-1" role="form" method="POST" action="{{ url('/login') }}" style="background-color: white;">
    @if(!strpos( url()->current() , 'cn6'))

    <div class="field is-grounded rounded border py-4 sm:p-8">

        <div class="form-ground">
            <center>
              <a href="{{ url('/auth/google') }}" class="btn btn-primary "><i class="fab fa-google"></i> google</a>
              <a href="{{ url('/auth/facebook') }}" class="btn btn-primary "><i class="fab fa-facebook"></i> Facebook</a>
              <a href="{{ url('/auth/twitter') }}" class="btn btn-primary "><i class="fab fa-twitter"></i> Twitter</a>
            </center>
        </div>


    </div>

    @endif

    <div class="field is-grounded rounded border py-4 sm:p-8">

       <div class="form-ground">
            <center>
              <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wx37cf6a202a727207&scope=snsapi_login&redirect_uri=https%3A%2F%2Ftingdiamond.com%2Fwechatqrnext&state=&login_type=jssdk&self_redirect=true&style=black" class="btn btn-primary"><i class="fab fa-weixin"></i> {{__('login.Wechat')}}</a>
               <a href="https://auth.alipay.com/login/index.htm?goto=https%3A%2F%2Fopenauth.alipay.com%3A443%2Foauth2%2FpublicAppAuthorize.htm%3Fapp_id%3D2018081161022086%26scope%3Dauth_user%26redirect_uri%3Dhttps%253A%252F%252Ftingdiamond.com%252Falipay%26state%3Dinit" class="btn btn-primary"><i class="fab fa-alipay"></i> {{__('login.Alipay')}}</a>
            </center>
        </div>
    </div>
    

    
</form>