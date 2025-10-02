<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    public function index()
    {
        return BrandResource::collection(Brand::all());
    }

    public function showById(Brand $brand)
    {
        return new BrandResource($brand);
    }

    public function store(Request $request)
    {
        $brand = Brand::create($request->all());
        return new BrandResource($brand);
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());
        return new BrandResource($brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->noContent();
    }
}
