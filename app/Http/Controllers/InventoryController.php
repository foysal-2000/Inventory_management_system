<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\InvoiceItem;
use App\Models\Profit;
use Illuminate\Support\Facades\DB;
use Exception;
class InventoryController extends Controller
{
    public function create()
    {
        $companys = Institute::all();
        //dd($companys);
        return view('backend.inventory.billing',compact('companys'));
     
    }
    public function inventory()
    {
        $this->authorize('inventory');

        return view('backend.billing.inventory');
    }
 
 
   public function searchProduct(Request $request)
    {
        $search = $request->input('term');

        // Retrieve products with non-zero quantity
        $products = Product::where('product_name', 'like', '%' . $search . '%')
            ->where('quantity', '>', 0)
            ->orWhere('barcode', 'like', '%' . $search . '%')
            ->where('quantity', '>', 0)
            ->orWhere('selling_price', 'like', '%' . $search . '%')
            ->get();
        $suggestions = [];

        foreach ($products as $product) {
            $suggestions[] = [
                'label' => $product->product_name, // Use 'label' for the product name
                'value' => $product->selling_price,
                'barcode' => $product->barcode, // Use 'value' for the product price
                // You can include more fields if needed
            ];
        }

        return response()->json(['products' => $suggestions]);
    }

    public function saveInvoice(Request $request)
    {
        try {
            // Extract the data from the request
            $invoiceData = $request->only([
                'invoiceNo',
                'cashier',
                'phone',
                'subTotal',
                'vat',
                'discount',
                'payable',
                'cashReceived',
                'returnAmount',
                'paymentType',
                'selectedBank'
            ]);
            $invoiceItems = $request->input('invoiceItems');

            // Create a new Invoice model instance
            $invoice = new Inventory($invoiceData);
            $invoice->save();

            // Save individual invoice items
            foreach ($invoiceItems as $item) {
                $invoiceItem = new InvoiceItem([
                    'product_name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['total_price'],
                    'phone' => $item['phone'],
                    'invoice_no' => $invoice->invoiceNo, // Set the invoice_no here
                ]);
                $invoice->items()->save($invoiceItem);
            }

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
   public function getProductDetails(Request $request) 
   {
        $productName = $request->input('product_name');

        // Fetch product details from the database
        $product = Product::where('product_name', $productName)->first();

        if ($product) {
            // Return product details as JSON
            return response()->json([
                'productVAT' => $product->vat_taka,
                'discount' => $product->discount_taka,
                // Add other product details as needed
            ]);
        } else {
            // Return an error if the product is not found
            return response()->json(['error' => 'Product not found'], 404);
        }
    }



    public function index()
    {
        $this->authorize('all');
       
        $inventories = inventory::all();
        return view('backend.inventory.index',compact('inventories'));
    }
    public function edit(Request $request ,$inventory)
    {
        $this->authorize('all');
        $inventory = inventory::find($inventory);
        return view('backend.inventory.edit',compact('inventory'));
    }
    public function update(Request $request ,$inventory)
    {
        $inventories = inventory::all();
        // Find the inventory by ID
        $inventory= inventory::findOrFail($inventory);

        // Update the inventory with the validated data
        $inventory->update($request->all());

        return redirect()->route('backend.inventory.index',compact('inventory','inventories'));
    }

    public function trash()
    {
        $inventories = inventory::onlyTrashed()->get();
        return view('backend.inventory.trash',compact('inventories'));
        
    }
    public function restore($inventory)
    {
        try {
            // Find the trashed order
            $inventory = inventory::withTrashed()->findOrFail($inventory);
    
            // Restore the order
            $inventory->restore();
    
            return redirect()->route('backend.inventory.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.inventory.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $inventory){
        $inventory = inventory::findOrFail($inventory);

        // Soft delete the inventory
        $inventory->delete();

        return redirect()->route('backend.inventory.index');
    }

    public function pdelete($inventory)
    {
        try {
            // Find the order (including trashed)
            $inventory = inventory::withTrashed()->findOrFail($inventory);

            // Permanently delete the order
            $inventory->forceDelete();

            return redirect()->route('backend.inventory.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.inventory.trash')->with('error', 'Order not found');
        }
    }



}





