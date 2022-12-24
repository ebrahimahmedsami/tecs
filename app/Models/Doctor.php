<?php

namespace App\Models;

use App\Traits\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory,Models;
    protected $fillable = ['name_en','name_ar','phone','email'];
    protected $appends = ['name','specializations_name'];

    public function getSpecializationsNameAttribute(){
        if ($this->specilizations()){
            return $this->specilizations()->pluck('name_'.app()->getLocale());
        }
    }

    public function specilizations(){
        return $this->belongsToMany(Specializaition::class, 'doctor_specilization', 'doctor_id', 'specializaition_id');
    }

    public function clinics(){
        return $this->hasMany(Clinic::class,'doctor_id');
    }
}
