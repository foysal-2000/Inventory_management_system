<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceItem;
use Exception;
class InvoiceItemController extends Controller
{
    public function index()
    {
        $invoiceitems = InvoiceItem::all();
        return view('backend.invoiceitem.index',compact('invoiceitems'));
    }
    public function edit(Request $request ,$invoiceitem)
    {
        $invoiceitem = InvoiceItem::find($invoiceitem);
        return view('backend.invoiceitem.edit',compact('invoiceitem'));
    }
    public function update(Request $request ,$invoiceitem)
    {
        $invoiceitems = InvoiceItem::all();
        // Find the invoiceitem by ID
        $invoiceitem= InvoiceItem::findOrFail($invoiceitem);

        // Update the invoiceitem with the validated data
        $invoiceitem->update($request->all());

        return redirect()->route('backend.invoiceitem.index',compact('invoiceitem','invoiceitems'));
    }

    public function trash()
    {
        $invoiceitems = InvoiceItem::onlyTrashed()->get();
        return view('backend.invoiceitem.trash',compact('invoiceitems'));
        
    }
    public function restore($invoiceitem)
    {
        try {
            // Find the trashed order
            $invoiceitem = InvoiceItem::withTrashed()->findOrFail($invoiceitem);
    
            // Restore the order
            $invoiceitem->restore();
    
            return redirect()->route('backend.invoiceitem.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.invoiceitem.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $invoiceitem){
        $invoiceitem = InvoiceItem::findOrFail($invoiceitem);

        // Soft delete the invoiceitem
        $invoiceitem->delete();

        return redirect()->route('backend.invoiceitem.index');
    }

    public function pdelete($invoiceitem)
    {
        try {
            // Find the order (including trashed)
            $invoiceitem = InvoiceItem::withTrashed()->findOrFail($invoiceitem);

            // Permanently delete the order
            $invoiceitem->forceDelete();

            return redirect()->route('backend.invoiceitem.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.invoiceitem.trash')->with('error', 'Order not found');
        }
    }

}
