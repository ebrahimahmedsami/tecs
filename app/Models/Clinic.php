<?php

namespace App\Models;

use App\Traits\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory,Models;
    public const ANNOUNCE_YES = 1;
    public const ANNOUNCE_NO = 0;
    public const UN_BLOCKED = 0;
    public const BLOCKED = 1;
    protected $fillable = ['user_id','doctor_id','name_ar','name_en','phone','address','email','disclosure_price','rediscovery_price',
        'today_capacity','time_form','time_to','is_blocked','announce'];
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

    public function today_reservations(){
        $today = Carbon::today()->format('Y-m-d');
        return $this->hasMany(Reservation::class,'clinic_id')->ofGetReservationsToday($today);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }


    public function patients(){
        return $this->belongsToMany(Patient::class, 'clinic_patients', 'clinic_id', 'patient_id');
    }

    public function holidays(){
        return $this->hasMany(ClinicHoliday::class,'clinic_id');
    }


    public function scopeOfStats(){
        return $this->withCount(['patients'])
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
