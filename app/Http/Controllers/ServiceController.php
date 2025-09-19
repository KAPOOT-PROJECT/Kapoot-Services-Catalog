<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Services\ServiceService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

class ServiceController extends Controller
{

    public function __construct(private readonly ServiceService $serviceService) {}
    /**
     * Display a listing of the resource.
     */
    public function index (Request $request)
    {
        $services = $this->serviceService->all($request);
        return self::success(ServiceResource::collection($services), 'لیست سرویس‌ها');
    }

    use ResponseTrait;
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        try {
            $service = $this->serviceService->create($request->validated());
            return self::success(new ServiceResource($service), 'سرویس با موفقیت ثبت شد', 201);
        } catch (\Throwable $th) {
            return self::error(['error' => 'storing service faild', 'message' => $th->getMessage()], 'خطا در ثبت سرویس', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return self::success(new ServiceResource($service), 'سرویس با موفقیت دریافت شد');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            $service = $this->serviceService->update($service, $request->validated());
            return self::success(new ServiceResource($service), 'سرویس با موفقیت بروزرسانی شد');
        } catch (\Throwable $th) {
            return self::error(['error' => 'updating service faild', 'message' => $th->getMessage()], 'خطا در بروزرسانی سرویس', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $this->serviceService->delete($service);
            return self::success(null, 'سرویس با موفقیت حذف شد');
        } catch (\Throwable $th) {
            return self::error(['error' => 'deleting service faild', 'message' => $th->getMessage()], 'خطا در حذف سرویس', 500);
        }
    }
}
