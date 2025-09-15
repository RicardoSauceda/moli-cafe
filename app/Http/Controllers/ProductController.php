<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $q = request('q');
        $categoryId = request('category_id');
        $availability = request('availability'); // '1', '0' o null

        $query = Product::query()->with('category');

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('product_name', 'like', "%$q%")
                    ->orWhere('description', 'like', "%$q%");
            });
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($availability !== null && $availability !== '') {
            $query->where('available', (bool) $availability);
        }

        $products = $query->latest()->paginate(15)->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('products.index', compact('products', 'categories', 'q', 'categoryId', 'availability'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'price' => ['required','numeric','min:0'],
            'category_id' => ['required','integer','exists:categories,id'],
            'available' => ['nullable','boolean'],
            'image_path' => ['nullable','string','max:1024'],
        ]);

        $data['available'] = (bool)($data['available'] ?? false);

    Product::create($data);

        return redirect()->route('products.index')->with('status', 'Producto creado');
    }

    public function uploadImage(Request $request)
    {
        // Valida archivo tipo imagen hasta 2MB
        $request->validate([
            'file' => ['required','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        $path = $request->file('file')->store('products', 'public');
    $url = asset('storage/' . $path);

        return response()->json([
            'path' => $path,
            'url' => $url,
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'price' => ['required','numeric','min:0'],
            'category_id' => ['required','integer','exists:categories,id'],
            'available' => ['nullable','boolean'],
            'image_path' => ['nullable','string','max:1024'],
        ]);

        $data['available'] = (bool)($data['available'] ?? false);

        // Si cambia la imagen, eliminar la anterior del storage público
        if (!empty($data['image_path']) && $product->image_path && $product->image_path !== $data['image_path']) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->update($data);

        return redirect()->route('products.index')->with('status', 'Producto actualizado');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Producto eliminado');
    }
}
