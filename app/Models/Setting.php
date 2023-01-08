<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['header','about','image','logo','facebook_link','twitter_link','instagram_link','about_text_ar','about_text_en'];
    protected $appends = ['about_text'];

    public function getAboutTextAttribute(){
        return app()->getLocale() == 'ar' ? $this->about_text_ar : $this->about_text_en;
    }

}
