<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('creator')->withoutTrashed();
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }
    
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }
    
        $products = $query->paginate(10)->withQueryString();
        $categories = Product::select('category')->distinct()->pluck('category');

    
        return Inertia::render('Product', [
            'products' => $products,
            'pagination' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'prev_page_url' => $products->previousPageUrl(),
                'next_page_url' => $products->nextPageUrl(),
            ],
            'search' => $request->search,
            'categories' => $categories, 
            'selectedCategory' => $request->category
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }
    
}
