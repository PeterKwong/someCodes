<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AlipayController;
use App\Http\Controllers\Auth\RegisterController;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


            /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {   
        // return request();
        // dd($provider);
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        dd($user);

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);

        // dd(1);

        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {   
        // dd($user);

        $authUser = User::where('provider_id', $user->id)->first();

        // dd($authUser);
        if ($authUser) {
          
            $authUser->name = $user->name;
            $authUser->image_url = isset($user->img)?$user->img:'';
            // $authUser->api_token = Str::random('60');
            $authUser->save();

            return $authUser;
        }

        $user = [
                  'name'     => $user->name,
                  'email'    => $user->email,
                  // 'api_token' => Str::random('60'),
                  'provider' => $provider,
                  'provider_id' => $user->id,
                  'image_url' => isset($user->img)?$user->img:'',
              ];

        $register = new RegisterController();

        $user = $register->create($user);

        return $user;

        // return User::create();

    }

    public function logout(){
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');

    }

    public function wechatQRCode(){

        $authUser = $this->getAccessTokenWechat();

        Auth::login($authUser, true);

        return redirect( $this->redirectTo);

    }

    private function getAccessTokenWechat() {
        
        $envData = ['appid' => config('global.WECHAT_OPEN_PLATFORM_APPID'),
                                'secret' => config('global.WECHAT_OPEN_PLATFORM_SECRET'),
                                ];

          $request = request()->all();
          // dd($request['code']);

          $client = new Client();

          $request = new Request('get','https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $envData['appid'].'&secret=' . $envData['secret'].'&code=' . $request['code']. '&grant_type=authorization_code');

          $data = 0;

          try {
            $response = $client->send($request);

            if ($response->getStatusCode()==200) {
                $data = json_decode($response->getBody());
             } 

            // dd(print_r($data));
            
          } catch (Exception $e) {
            
          }

          // dd($data->access_token);
          if (isset($data->access_token)) {
                $request = new Request('get','https://api.weixin.qq.com/sns/userinfo?access_token=' . $data->access_token . '&openid=' . $data->openid);
          }


          $data1 = 0;

          try {
            $response = $client->send($request);

            if ($response->getStatusCode()==200) {
                $data1 = json_decode($response->getBody());
             } 

            // dd(print_r($data1));
            
          } catch (Exception $e) {
            
          }

          $user = (object) array(
            'name' => isset($data1->nickname)?$data1->nickname:'blanck',
            'email' => null,
            'id' => $data1->openid,
            'img' => isset($data1->headimgurl)?$data1->headimgurl:'',
            );

          // $user = ['name' => $data1->nickname,
          //           'email' => '',use Illuminate\Support\Str;

          //           'user_id' => $data1->openid
          //           ];
          return $this->findOrCreateUser((object)$user,'wechat');

    }

    public function alipayLogin(){
        $user = new AlipayController();
        $user = $user->getAccessTokenAlipay();
        $authUser = $this->findOrCreateUser((object)$user,'alipay');


        Auth::login($authUser, true);

        return redirect( $this->redirectTo);

    }
    public function curl_exec_from_controller($ch){
          $response = curl_exec($ch);
          return $response;
    }
}
