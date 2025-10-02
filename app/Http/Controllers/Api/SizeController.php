<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Resources\SizeResource;

class SizeController extends Controller
{
    public function index()
    {
        return SizeResource::collection(Size::all());
    }

    public function show(Size $size)
    {
        return new SizeResource($size);
    }

    public function store(Request $request)
    {
        $size = Size::create($request->all());
        return new SizeResource($size);
    }

    public function update(Request $request, Size $size)
    {
        $size->update($request->all());
        return new SizeResource($size);
    }

    public function destroy(Size $size)
    {
        $size->delete();
        return response()->noContent();
    }
}
