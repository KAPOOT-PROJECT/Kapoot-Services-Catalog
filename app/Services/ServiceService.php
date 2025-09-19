<?php

namespace App\Services;

use App\Models\Service as ServiceModel;
use Cache;
use Illuminate\Support\Facades\Cache as FacadesCache;

class ServiceService
{



    public function create(array $serviceData)
    {
        try {
            $service = ServiceModel::create($serviceData);
            return $service;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function all($request)
    {
        return cache()->remember('all.services', 3600, function () use ($request) {
            $query = ServiceModel::query();
            if ($request->has('filtered_active')) {
                $query->where('is_active', ($request->filtered_active));
            }
            return $query->get();
        });
    }

    public function update(ServiceModel $service, array $data)
    {
        $service->update($data);
        return $service;
    }

    public function delete(ServiceModel $service)
    {
        return $service->delete();
    }
}
