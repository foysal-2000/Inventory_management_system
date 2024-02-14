<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Order;

class ProductOrderController extends Controller
{
    public function create()
    {
        $suppliers = Supplier::all();
        $lowStockProducts=[];
        return view('backend.productorder.create',compact('suppliers','lowStockProducts'));
    }
    public function search()
    {
        $products= [];
        return view('backend.productorder.search',compact('products'));
    }
    public function products_show()
    {
        $products = Product_Order::all();
        return view('backend.productorder.show-order',compact('products','product'));
    }
    public function index()
    {

        $suppliers =[];
        $lowStockProducts = [];
        return view('backend.productorder.index', compact('lowStockProducts','suppliers'));
    }
   /* 
    public function store(Request $request)
    {
        $data = $request->input('data');
        $quantity = $request->input('quantity');
        $uniqueId = $this->generateUniqueNumericId(5);
        foreach ($data as $item) {
            $productOrder = new Product_Order();
            $productOrder->order_id = $uniqueId;
            $productOrder->product_name = $item['product_name'];
            $productOrder->purchase_price = $item['purchase_price'];
            $productOrder->quantity = $item['quantity'];
            $productOrder->supplier_name = $item['supplier_name'];
            $productOrder->save();
        }
        return redirect()->route('backend.productorder.show-order'); 
    }
    
    */
    public function store(Request $request)
    {
        $data = $request->input('data');
        $quantity = $request->input('quantity');
        $uniqueId = $this->generateUniqueNumericId(5);
        $existingProducts = Product_Order::pluck('product_name')->toArray();
        
        foreach ($data as $item) {
            // Check if the product already exists
            if (in_array($item['product_name'], $existingProducts)) {
                // If the product already exists, inform the user
                return redirect()->back()->with('error', 'Product ' . $item['product_name'] . ' already exists.');
            } else {
                // If the product does not exist, save it
                $productOrder = new Product_Order();
                $productOrder->order_id = $uniqueId;
                $productOrder->product_name = $item['product_name'];
                $productOrder->purchase_price = $item['purchase_price'];
                $productOrder->quantity = $item['quantity'];
                $productOrder->supplier_name = $item['supplier_name'];
                $productOrder->save();
            }
        }
        return redirect()->route('backend.productorder.show-order'); 
    }

    private function generateUniqueNumericId($length)
    {
        do {
            $uniqueId = mt_rand(pow(10, $length - 1), pow(10, $length) - 1);
        } while (DB::table('product_orders')->where('order_id', $uniqueId)->exists());
    
        return $uniqueId;
    }
    public function searchByUniqueId(Request $request)
    {
        $uniqueId = $request->input('order_id');

        // Check if the order ID is provided
        if ($uniqueId) {
            // Retrieve products with the specified unique ID
            $products = Product_Order::where('order_id', $uniqueId)->get();
            
            // Pass the products to the view
            return view('backend.productorder.search', ['products' => $products ,'searchedOrderId' => $uniqueId]);
        } else {
            // If no order ID is provided, redirect back to the search form
            return redirect()->route('backend.productorder.search')->with('message', 'Please enter a valid Order ID.');
        }
    }


    public function edit($product)
    {
        
        $product = Product_Order::find($product);
        return view('backend.productorder.edit',compact('product'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string',
            'purchase_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'supplier_name' => 'required|string',
            // Add validation rules for other product attributes here
        ]);

        // Find the product order by ID
        $product = Product_Order::findOrFail($id);

        // Update the product order with the new data
        $product->update([
            'product_name' => $request->input('product_name'),
            'purchase_price' => $request->input('purchase_price'),
            'quantity' => $request->input('quantity'),
            'supplier_name' => $request->input('supplier_name'),
            // Update other product attributes here
        ]);

        // Redirect the user back to the product order list or any other desired page
        return redirect()->route('backend.productorder.show-order',compact('product'));
    }



    public function delete(Request $request, $product){
        
        $product = Product_Order::findOrFail($product);

        // Soft delete the customer
        $product->delete();

        return redirect()->route('backend.productorder.show-order');
    }

   public function show_order()
   {
    $products =Product_Order::all();
     return view('backend.productorder.show-order',compact('products'));
   }


   public function pdf(Request $request)
    {
        $orderId = $request->input('order_id');

        // Check if the order ID is provided
        if ($orderId) {
            // Retrieve products with the specified order ID
            $products = Product_Order::where('order_id', $orderId)->get();
           
            // Pass the products to the PDF view
          $pdf = PDF::loadView('backend.productorder.pdf', compact('products', 'orderId'));
           return $pdf->download('order_invoice.pdf');
        } else {
            // If no order ID is provided, redirect back to the search form
            return redirect()->route('backend.productorder.search')->with('message', 'Please enter a valid Order ID.');
        }
    }

}

