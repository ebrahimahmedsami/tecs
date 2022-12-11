<?php

namespace App\Models;

use App\Http\services\DefaultModelAttributesTrait;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Vendor;
use App\Models\DeliveryMan;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,HasRoles;
    use DefaultModelAttributesTrait;
    const ADMIN = 1;
    const USER = 2;
    const VENDOR = 3;
    const BRANCH_MANAGER = 4;
    const DELIVERY_MAN = 5;
    protected $folder='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [''];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branch()
    {
        return $this->hasOne(Branch::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function coupons(){
        return $this->belongsToMany(Coupon::class, 'coupons_users');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function vendor()
    {
        return $this->hasOne(Vendor::class)->where('active',1);
    }

    public function deliveryMan()
    {
        return $this->hasOne(DeliveryMan::class);
    }

    public function selecetFolder($type){
        switch ($type){
            case $type == self::ADMIN:
                return '/admins/';
                break;
            case $type == self::BRANCH_MANAGER:
                return '/branchManager/';
                break;
            case $type == self::VENDOR:
                return '/vendors/';
            case $type == self::DELIVERY_MAN:
                return '/deliveryMan/';
            default:
                return '/users/';
        }
    }

    public function getImageAttribute($value){
//        dd(asset('dashboardAssets/images/'.$this->selecetFolder($this->type).'/'.$value));
        return asset('dashboardAssets/images/users'.$this->selecetFolder($this->type).$value);
    }
}
