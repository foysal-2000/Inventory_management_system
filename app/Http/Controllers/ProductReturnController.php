<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\InvoiceItem;
use App\Models\Profit;
use Illuminate\Support\Facades\DB;
class ProductReturnController extends Controller
{
    public function create()
    {
        return view('backend.productReturn.create');
    }

    public function searchInvoice(Request $request)
    {
        // Add validation and error handling as needed
        
        $input = $request->input('CustomerID');
        
        // Fetch invoice data based on either the customer ID or invoice number
        $query = Inventory::query();

        $query->where('phone', $input)
            ->orWhere('invoiceNo', $input);

        $invoiceData = $query->with('items')->first();

        if (!$invoiceData) {
            return response()->json(['success' => false, 'message' => 'No data found for the given input']);
        }

        // Transform the data as needed for the frontend
        $formattedData = [];

        foreach ($invoiceData->items as $item) {
            $formattedData[] = [
                'product_name' => $item->product_name,
                'unit_price' => $item->unit_price,
                'quantity' => $item->quantity,
                'total_price' => $item->total_price,
            ];
        }

        // Include additional fields from the main invoice
        $formattedData[0]['subTotal'] = $invoiceData->subTotal;
        $formattedData[0]['vat'] = $invoiceData->vat;
        $formattedData[0]['discount'] = $invoiceData->discount;
        $formattedData[0]['payable'] = $invoiceData->payable;
        $formattedData[0]['cashReceived'] = $invoiceData->cashReceived;
        $formattedData[0]['returnAmount'] = $invoiceData->returnAmount;
        $formattedData[0]['paymentType'] = $invoiceData->paymentType;
        $formattedData[0]['invoiceNo'] = $invoiceData->invoiceNo;
        return response()->json(['success' => true, 'data' => $formattedData]);
    }
    public function return_Product(Request $request)
    {
        $input = $request->input('CustomerID');
        // Find the invoice based on the provided customer ID or invoice number
        $invoice = Inventory::where('phone', $input)->orWhere('invoiceNo', $input)->first();
        

       

        if (!$invoice) {
            return response()->json(['success' => false, 'message' => 'No data found for the given input']);
        }

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Delete the profit records associated with the invoice
            Profit::where('invoice_id', $invoice->id)->delete();

            // Delete the invoice and its related items
            $invoice->items()->delete();
            $invoice->delete();

            // Commit the transaction if everything is successful
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Invoice, related items, and profits deleted successfully']);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
   }  
}
