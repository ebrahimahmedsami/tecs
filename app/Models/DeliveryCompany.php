<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\DeliveryMan;

class DeliveryCompany extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[''];

    public function deliveryMen(){
        return $this->hasMany(DeliveryMan::class);
    }
}
