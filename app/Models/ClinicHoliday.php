<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicHoliday extends Model
{
    use HasFactory;
    protected $fillable = ['clinic_id','day'];

}
