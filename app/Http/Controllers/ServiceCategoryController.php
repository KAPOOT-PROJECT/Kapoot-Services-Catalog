<?php

namespace App\Http\Controllers;

use App\Services\ServiceCategoryService;
use App\Http\Resources\ServiceCategoryResource;
use App\Models\ServiceCategory;
use App\Http\Requests\StoreServiceCategoryRequest;
use App\Http\Requests\UpdateServiceCategoryRequest;

class ServiceCategoryController extends Controller
{

    public function __construct(private readonly ServiceCategoryService $serviceCategoryService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->serviceCategoryService->all();
        return response()->json(ServiceCategoryResource::collection($categories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceCategoryRequest $request)
    {
        $category = $this->serviceCategoryService->create($request->validated());
        return response()->json(new ServiceCategoryResource($category), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $serviceCategory)
    {
        return response()->json(new ServiceCategoryResource($serviceCategory));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        $category = $this->serviceCategoryService->update($serviceCategory, $request->validated());
        return response()->json(new ServiceCategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        $this->serviceCategoryService->delete($serviceCategory);
        return response()->json(null, 204);
    }
}
