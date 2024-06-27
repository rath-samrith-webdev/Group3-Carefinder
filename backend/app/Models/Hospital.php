<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'category_id',
        'street_address',
        'village',
        'commune',
        'district',
        'province',
        'latitude',
        'longitude',
    ];
}
