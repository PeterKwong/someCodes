<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function customers(){
      return $this->hasMany(Customer::class);
    }
    public function coupons(){
      return $this->hasMany(Coupon::class);
    }

    public function cartItems(){
      return $this->hasMany(cartItem::class);      
    }
    
    public function isTeamTingDiamond(){
        // dd( $this->teams->first()->id);
        return $this->teams->count()?$this->teams->first()->id == 1:false;
    }
    public function roles(){
        return $this->teams->map->membership->flatten()->pluck('role')->unique();
    } 
    public function isAbility($ability){
        // dd($this->teams->map->membership->flatten()->pluck('role')->unique());
        return $this->teams->first()->membership->ability == $ability;
    } 
}
