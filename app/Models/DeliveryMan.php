<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class DeliveryMan extends Model
{
    use HasFactory;
    use SoftDeletes;

    const PENDING = 0;
    const ACTIVE = 1;
    const INACTIVE = 2;
    const REJECTED = 3;

    protected $guarded=[''];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(DeliveryCompany::class);
    }
}
