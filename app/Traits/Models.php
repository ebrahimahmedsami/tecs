<?php

namespace App\Traits;

trait Models
{
    public function getNameAttribute(){
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }
}
