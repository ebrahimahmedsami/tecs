<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,HasRoles;
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

    public function getImageAttribute($value){
//        dd(asset('dashboardAssets/images/'.$this->selecetFolder($this->type).'/'.$value));
        return asset('dashboardAssets/images/users'.$this->selecetFolder($this->type).$value);
    }

    public function type(){
        return $this->morphTo();
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'type_id','id')->withCount(['patients'])
            ->withCount([
                'reservations',
                'reservations as disclosure_count' => function ($query) {
                    $query->where('type', (string)0);
                },'reservations as discovery_count' => function ($query) {
                    $query->where('type', (string)1);
                }])
            ->withCount([
                'today_reservations',
                'today_reservations as disclosure_today_count' => function ($query) {
                    $query->where('type', (string)0);
                },'today_reservations as discovery_today_count' => function ($query) {
                    $query->where('type', (string)1);
                }]);
    }
}
