<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'ServiceCategory';

      protected $fillable = [
        'id',
        'name',
        'slug',
        'parent_category_id',
        'description',
        'icon',
        'image',
        'is_emergency',
        'is_active',
        'sort_order',
        'meta_keywords',
        'requires_vehicle',
        'estimated_duration',
    ];



}
