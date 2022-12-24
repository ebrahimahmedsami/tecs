<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id','clinic_id','date','type'];
    protected $appends = ['type_text'];

    public function  getTypeTextAttribute(){
        return $this->type == 0 ? __('dashboard.reserve_type_select') :  __('dashboard.discovery_type_select');
    }

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }

    public function scopeOfGetReservationsToday(Builder $builder,$value){

        if (empty($value)){
            return $builder;
        }
        $builder->whereDate('date',$value);
    }
}
