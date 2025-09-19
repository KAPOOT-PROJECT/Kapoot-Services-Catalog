<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
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


    public function services()
    {
        return $this->hasbloMany(Service::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function children()
    {
        return $this->hasMany(self::class);
    }


    public function activeServices()
    {
        return $this->services()->where('is_active', True);
    }


    #[Scope]
    public function emergency(Builder $query): void
    {
        $query->where('is_emergency', True);
    }

    #[Scope]
    public function active(Builder $query): void
    {
        $query->where('is_active', True);
    }


    public function isRoot()
    {
        return $this->parent_category_id !== null;
    }

}
