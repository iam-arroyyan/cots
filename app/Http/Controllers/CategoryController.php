<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:categories']);
        Category::create($request->all());
        return back();
    }

    public function show(Category $category) {
        $products = $category->products;
        return view('categories.show', compact('category', 'products'));
    }
}

?>