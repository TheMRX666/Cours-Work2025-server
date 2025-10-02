<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Resources\ImageResource;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'product_id' => 'required|exists:products,id'
        ]);

        $file = $request->file('image');
        $path = $file->store('public/images');

        $image = Image::create([
            'product_id' => $request->product_id,
            'path' => $path,
        ]);

        return new ImageResource($image);
    }

    public function showById($id)
    {
        $image = Image::findOrFail($id);
        return new ImageResource($image);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::delete($image->path);
        $image->delete();

        return response()->noContent();
    }
}
