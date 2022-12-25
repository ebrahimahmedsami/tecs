<?php

namespace App\Models;

use App\Traits\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory,Models;
    protected $fillable = ['name_ar','name_en','age','gender','national_id','phone','address'];
    protected $appends = ['name','gender_text'];

    public function getGenderTextAttribute($key)
    {
        return $this->gender == 1 ? __('dashboard.male') : __('dashboard.female');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class,'patient_id');
    }

    public function clinics(){
        return $this->belongsToMany(Clinic::class, 'clinic_patients', 'patient_id', 'clinic_id');
    }
}
