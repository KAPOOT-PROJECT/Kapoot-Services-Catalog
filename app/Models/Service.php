<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Service extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'service';

    protected $fillable = [
        'id',
        'provider_id',
        'category_id',
        'name',
        'description',
        'price_type',
        'base_price',
        'minimum_charge',
        'is_mobile_available',
        'mobile_surcharge',
        'photos',
        'videos',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
