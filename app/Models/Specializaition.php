<?php

namespace App\Models;

use App\Traits\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specializaition extends Model
{
    use HasFactory,Models;
    protected $fillable = ['name_ar','name_en'];
    protected $appends = ['name','doctors_name'];

    public function getDoctorsNameAttribute(){
        if ($this->doctors()){
            return $this->doctors()->pluck('name_'.app()->getLocale());
        }
    }

    public function doctors(){
        return $this->belongsToMany(Doctor::class, 'doctor_specilization', 'specializaition_id', 'doctor_id');
    }
}
