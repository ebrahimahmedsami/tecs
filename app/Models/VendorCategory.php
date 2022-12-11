<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Vendor;
use App\Models\Service;
use App\Models\Additions;
use App\Http\services\DefaultModelAttributesTrait;



class VendorCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use DefaultModelAttributesTrait;

    protected $appends=['name', 'description'];
    protected $hidden = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en'
    ];
    protected $guarded = [''];

    protected $folder = 'sub category';
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function sizes(){
        return $this->hasMany(Size::class,'vendor_category_id');
    }

}
