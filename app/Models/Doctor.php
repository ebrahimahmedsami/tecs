<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name_en','name_ar','phone','email'];
    protected $appends = ['name'];


    public function getNameAttribute(){
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }
}
