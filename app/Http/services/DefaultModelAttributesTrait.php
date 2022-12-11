<?php

namespace App\Http\services;

use Carbon\Carbon;

trait DefaultModelAttributesTrait
{

    public function getImageAttribute($value){
        return asset('dashboardAssets/images/'.$this->folder.'/'.$value);
    }


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getNameAttribute(){
        if(app()->getLocale()=='ar'){
            return $this->name_ar;
        }
        return $this->name_en;
    }

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->description_ar;
        }
        return $this->description_en;
    }


}
