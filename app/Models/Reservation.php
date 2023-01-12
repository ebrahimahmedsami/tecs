<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id','clinic_id','date','type','specialization_id','status','note'];
    protected $appends = ['type_text','specialization','status_text'];

    public function  getTypeTextAttribute(){
        return $this->type == 0 ? __('dashboard.reserve_type_select') :  __('dashboard.discovery_type_select');
    }
    public function  getStatusTextAttribute(){
        if ($this->status || $this->status == 0)
            return reservation_status()[$this->status];
    }
    public function getSpecializationAttribute(){
        return Specializaition::where('id',$this->specialization_id)->first()->name;
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

    public function scopeOfStatus(Builder $builder,$value){
        $value = is_array($value) ? $value : [$value];
        $builder->whereIn('status',$value);
    }

    public function scopeOfType(Builder $builder,$value){
        if ($value ==  NULL && $value != 0){
            return $builder;
        }

        $value = $value ?? ["0","1"];
        $value = is_array($value) ? $value : [$value];
        $builder->whereIn('type',$value);
    }

    public function scopeOfPatient(Builder $builder,$value){
        if (empty($value)){
            return $builder;
        }
        $builder->whereHas('patient',function (Builder $builder) use ($value){
            $builder->where('name_en', 'like', '%' . $value . '%')
            ->orWhere('name_ar', 'like', '%' . $value . '%');
        });
    }
}
