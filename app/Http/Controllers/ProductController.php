<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $this->authorize('products');
        $categories = Category::all();
        $companies = Company::all();
        $suppliers = Supplier::all();
        return view('backend.products.create',compact('categories','companies','suppliers'));
    }
    public function store(Request $request)
    {
        $this->authorize('products');
        $data = $request->all();
        $products = Product::create($data);
        $request->session()->flash('success', ' Product Successfully Created .');
        return redirect()->route('backend.products.create');

    }
    public function index(){
        $this->authorize('products');
        $products = Product::all();
        return view('backend.products.index',compact('products'));
    }
    public function edit(Request $request ,$product){
        $this->authorize('products');
        $product = Product::find($product);
        $products = Product::all();
        return view('backend.products.edit',compact('product','products'));
    }
    public function show(Request $request ,$product){
        $this->authorize('products');
        $product = Product::find($product);
        $products = Product::all();
        return view('backend.products.edit',compact('product','products'));
    }
    public function update(Request $request ,$product)
    {
        $this->authorize('products');
        $products = Product::all();
        $request->validate([
            'barcode' => 'required',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($product);

        // Update the product with the validated data
        $product->update($request->all());


        return redirect()->route('backend.products.index',compact('products'));
    }
    public function trash(){
        $this->authorize('products');
        $products = Product::onlyTrashed()->get();
        return view('backend.products.trash',compact('products'));
        
    }
    public function restore($product)
    {
        $this->authorize('products');
        try {
            // Find the trashed order
            $product = Product::withTrashed()->findOrFail($product);
    
            // Restore the order
            $product->restore();
    
            return redirect()->route('backend.products.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.products.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $product){
        $this->authorize('products');
        $product = Product::findOrFail($product);

        // Soft delete the product
        $product->delete();

        return redirect()->route('backend.products.index');
    }

    public function parmanent_delete($product)
    {
        $this->authorize('products');
        try {
            // Find the order (including trashed)
            $product = Product::withTrashed()->findOrFail($product);

            // Permanently delete the order
            $product->forceDelete();

            return redirect()->route('backend.products.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.products.trash')->with('error', 'Order not found');
        }
    }
   
    public function subtractProductQuantity(Request $request)
    {
        $productName = $request->input('product_name');
        $quantityToSubtract = $request->input('quantity'); // Get the quantity from the request

        // Find the product by name
        $product = Product::where('product_name', $productName)->first();

        if ($product) {
            $product->quantity -= $quantityToSubtract; // Subtract the specified quantity
            $product->save();


            return response()->json(['success' => true, 'message' => 'Product quantity updated successfully']);
        } else {
            return response()->json(['error' => 'Product not found']);
        }
    }


    public function searchLowStockProducts(Request $request)
    {
        $supplier = $request->input('supplier_name');
        $quantity = $request->input('quantity');
        $lowStockProducts = Product::where('supplier_name', $supplier)
            ->where('quantity', '<=', $quantity)
            ->get();
        return view('backend.productorder.index', compact('lowStockProducts'));
    }


}
