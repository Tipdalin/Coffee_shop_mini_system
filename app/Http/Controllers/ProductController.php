<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
// Use Laravel's built-in Storage facade for better file handling instead of File
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest; // Best practice: Use this for complex validation (Keep in mind if you use this, you'll remove the inline $request->validate() calls)

class ProductController extends Controller
{
    /**
     * Display a listing of the resource. (Index)
     */
    public function index()
    {
        // Eager load the category relationship to prevent the N+1 problem
        $products = Product::with('category')->paginate(15); 
        $categories = Category::all();

        return view('dashboard.products.index', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage. (Create)
     * Renamed from addProduct to the RESTful 'store'.
     */
    public function store(Request $request)
    {
        // 1. Validation: Use 'stock' to match migration, and Storage for files
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // Assuming description can be nullable
            'price' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0', // <--- CHANGED FROM 'qty' to 'stock'
            'category_id' => 'required|integer|exists:categories,id', 
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // 2. Best Practice: Store file in 'storage/app/public' (or S3, etc.)
            // The 'public' disk is configured to link to the public folder.
            $imagePath = $request->file('image')->store('product_images', 'public');
        }
        
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'image' => $imagePath,
            'category_id' => $validated['category_id'],
            'stock' => $validated['stock'], // <--- CHANGED FROM 'qty' to 'stock'
        ]);

        if($product){
            return redirect()->route('products.index')->with('success', 'Product added successfully! 🎉');
        } else {
            return back()->with('error', 'Failed to add product. Please try again. 😞');
        }
    }

    // ---
    
    /**
     * Remove the specified resource from storage. (Delete)
     * Renamed from 'delete' to the RESTful 'destroy'.
     */
    public function destroy(Product $product) // Use Route Model Binding for cleaner code
    {
        // 3. Secure File Deletion: Use Storage facade
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully! 🗑️');
    }

    // ---

    /**
     * Update the specified resource in storage. (Update)
     * Renamed from 'edit' to the RESTful 'update'.
     */
    public function update(Request $request, Product $product) // Use Route Model Binding
    {
        // 4. Validation for Update
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0', // <--- CHANGED FROM 'qty' to 'stock'
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Image is optional when editing
        ]);

        // Update non-image fields
        $product->fill($validated);

        if ($request->hasFile('image')) {
            // 5. Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            // Upload new image
            $product->image = $request->file('image')->store('product_images', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully! ✏️');
    }
}