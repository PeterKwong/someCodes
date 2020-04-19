<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
                // dd(Coupon::where('code',$_COOKIE['coupon_code'])->first()->id);
        $coupon = false ;
        if (isset($_COOKIE['coupon_code'])) {
            if ($_COOKIE['coupon_code'] !='') {
            $coupon = Coupon::where('code',$_COOKIE['coupon_code'])->first()->id;
            }
        }

        // dd($coupon);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'provider' => isset($data['provider'])?$data['provider']:'email',
            'provider_id' => isset($data['provider_id'])?$data['provider_id']:0,
            'image_url' => isset($data['image_url'])?$data['image_url']:NULL,
            'coupon_id' => $coupon?$coupon:NULL,
            'api_token' => str_random('60'),
            // 'email_token' => str_random('60'),
            'password' => isset($data['password'])?bcrypt($data['password']):NULL,
        ]);

        return $user;
        
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
