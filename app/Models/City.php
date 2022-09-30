<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'latitude', 'longitude', 'state_name', 'state_code', 'country_code', 'timezone'];
    use HasFactory;
}
