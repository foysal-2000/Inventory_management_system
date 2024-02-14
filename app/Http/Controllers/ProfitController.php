<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\make;
use Illuminate\Http\Request;
use App\Models\Product; 
use Exception;

class ProfitController extends Controller
{
    public function getPurchasePrice(Request $request)
    {
        try {
            $product = Product::where('product_name', $request->product_name)->first();

            if ($product) {
                return response()->json(['purchasePrice' => $product->purchase_price]);
            } else {
                return response()->json(['error' => 'Product not found'], 404);
            }
        } catch (Exception $e) {
            // Log the error for debugging purposes
            \Log::error($e);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function insertProfit(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'product_name' => 'required|string',
            'profit' => 'required|numeric',
        ]);
    
        try {
            $profit = new Profit();
            $profit->invoice_id = $request->invoice_id;
            $profit->product_name = $request->product_name;
            $profit->profit = $request->profit;
            $profit->customer_id =$request->customer_id;
            $profit->save();
    
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            // Handle the exception and return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function deleteProfitsByInvoiceId(Request $request)
    {
        try {
            $invoiceId = $request->input('invoice_id');
            
            // Find and delete profits associated with the given invoice_id and customer_id
            Profit::where('invoice_id', $invoiceId)->delete();

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function index()
    {
        try {
            // Get all profits
            $profits = Profit::all();
            // Pass profits data to the view
            return view('backend.profit.index', compact('profits'));
        } catch (Exception $e) {
            // Handle the exception and return an error response or log the error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function edit($profit)
    {
        $profit  = Profit:: find($profit);
        return view('backend.profit.edit',compact('profit'));
    }

    public function update(Request $request, $profit)
    {
        try {
            // Find the invoice item
            $profit = Profit::findOrFail($profit);

            // Update the item
            $profit->update($request->all());

            return redirect()->route('backend.profit.index')->with('success', 'Item updated successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.profit.edit')->with('error', 'Error updating item');
        }
    }


    public function delete($profit)
    {
        try {
            // Find the trashed order
            $profit = Profit::findOrFail($profit);
    
            // Restore the order
            $profit->Delete();
    
            return redirect()->route('backend.profit.index')->with('success', 'invoice move to trash delete successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.profit.index')->with('error', 'invoice not found in trash');
        }
    }

    public function trash()
    {
        $profits = Profit::onlyTrashed()->get();
        return view('backend.profit.trash', compact('profits'));

    }
    public function restore($profit)
    {
        try {
            // Find the trashed order
            $profit = Profit::withTrashed()->findOrFail($profit);
    
            // Restore the order
            $profit->restore();
    
            return redirect()->route('backend.profit.index')->with('success', 'profit restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.profit.trash')->with('error', 'profit is not restored');
        }

    }

    public function pdelete($profit)
    {
        try {
            // Find the trashed order
            $profit = Profit::withTrashed()->findOrFail($profit);
    
            // Restore the order
            $profit->forceDelete();
    
            return redirect()->route('backend.profit.trash')->with('success', 'profit Delete successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.profit.trash')->with('error', 'profit is not found in trash');
        }

    }





}
