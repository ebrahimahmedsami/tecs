<?php

namespace App\Models;

use App\Http\services\DefaultModelAttributesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;
    use SoftDeletes;
    use DefaultModelAttributesTrait;
    protected $appends=['name', 'description'];
    protected $guarded = [''];
    protected $hidden = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en'
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_sizes');
    }

    public function subCategories(){
        return $this->belongsTo(VendorCategory::class,'vendor_category_id');
    }
}
