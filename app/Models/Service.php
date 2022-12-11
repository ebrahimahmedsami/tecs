<?php

namespace App\Models;

use App\Http\services\DefaultModelAttributesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\VendorCategory;
use App\Models\Vendor;

class Service extends Model
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

    public function vendorCategory()
    {
        return $this->belongsTo(VendorCategory::class);
    }

    public function sizes(){
        return $this->belongsToMany(Sizes::class,'service_sizes');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'branch_services');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

}
