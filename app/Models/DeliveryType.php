<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Branch;

class DeliveryType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [''];

    public function branches(){
        return $this->belongsToMany(Branch::class,'branch_delivery')->wherePivot('active',1);
    }
}
