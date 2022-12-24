<?php

namespace App\Models;

use App\Traits\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory,Models;
    public const UN_BLOCKED = 0;
    public const BLOCKED = 1;
    protected $fillable = ['user_id','doctor_id','name_ar','name_en','phone','address','email','disclosure_price','rediscovery_price',
        'today_capacity','time_form','time_to','is_blocked'];
    protected $appends = ['name','blocked_text'];

    public function getBlockedTextAttribute($key)
    {
        return $this->is_blocked ? __('dashboard.yes') : __('dashboard.no');
    }

    public function scopeOfUnBlocked($query,$value){
        $query->where('is_blocked',(string)$value);
    }

    public function user(){
        return $this->morphOne(User::class,'type')->whereMorphedTo('type',Clinic::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class,'clinic_id');
    }
}
