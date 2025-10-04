<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()->with('category', 'brand');

        if ($request->filled('brand_id')) {
            $products->where('brand_id', $request->brand_id);
        }

        if ($request->filled('category_id')) {
            $products->where('category_id', $request->category_id);
        }

        if ($request->filled('price_min')) {
            $products->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $products->where('price', '<=', $request->price_max);
        }

        if ($sortBy = $request->query('sort_by')) {
            switch ($sortBy) {
                case 'price_asc':
                    $products->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $products->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $products->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $products->orderBy('created_at', 'asc');
                    break;
                case 'name_asc':
                    $products->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $products->orderBy('name', 'desc');
                    break;
                default:
                    $products->latest();
            }
        } else {
            $products->latest();
        }

        $products->with(['images' => function($query) {
            $query->orderBy('sort_order');
        }]);

        $paginated = $products->paginate(12)->withQueryString();

        return ProductResource::collection($paginated);
    }


    public function showBySlug(Product $product)
    {
        $product->load(['category', 'sizes', 'images']);
        return new ProductResource($product);
    }

    public function showById($id)
    {
        $product = Product::where('id', $id)
            ->where('is_published', true)
            ->with(['category', 'sizes', 'images'])
            ->firstOrFail();

        return new ProductResource($product);
    }
}
