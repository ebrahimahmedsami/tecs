<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Vendor;
use Carbon\Carbon;
use App\Http\services\DefaultModelAttributesTrait;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use DefaultModelAttributesTrait;
    protected $appends=['name', 'description'];
    protected $guarded = [''];
    protected $folder='categories';
    protected $hidden = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en'
    ];

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }




}
