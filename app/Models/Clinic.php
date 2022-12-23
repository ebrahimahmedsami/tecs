<?php

namespace App\Models;

use App\Traits\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory,Models;
    protected $fillable = ['user_id','doctor_id','name_ar','name_en','phone','address','email','disclosure_price','rediscovery_price',
        'today_capacity','time_form','time_to','is_blocked'];
    protected $appends = ['name','blocked_text'];

    public function getBlockedTextAttribute($key)
    {
        return $this->is_blocked ? __('dashboard.yes') : __('dashboard.no');
    }
}
