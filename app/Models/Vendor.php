<?php

namespace App\Models;

use App\Http\services\DefaultModelAttributesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Branch;
use App\Models\Service;
use App\Models\WorksTime;
use App\Models\User;
use App\Models\VendorCategory;

class Vendor extends Model
{
    use DefaultModelAttributesTrait;
    use HasFactory;
    use SoftDeletes;


    protected $guarded = [''];
    protected $appends=['name', 'description'];
    protected $hidden = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function worksTime()
    {
        return $this->hasMany(WorksTime::class);
    }

    public function vendorCategories()
    {
        return $this->hasMany(VendorCategory::class);
    }

    public function sizes(){
        return $this->hasMany(Size::class);
    }
}
