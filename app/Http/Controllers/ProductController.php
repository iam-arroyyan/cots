<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        if($request->has('search')){
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        $products = $query->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required', 
            'description' => 'nullable'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk Dihapus');
    }
}

?>