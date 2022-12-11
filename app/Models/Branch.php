<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Vendor;
use App\Models\DeliveryType;
use App\Models\Order;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [''];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class,'branch_services')->wherePivot('available', 1);
    }

    public function deliveryTypes()
    {
        return $this->belongsToMany(DeliveryType::class, 'branch_delivery')->wherePivot('active', 1);
    }

}
