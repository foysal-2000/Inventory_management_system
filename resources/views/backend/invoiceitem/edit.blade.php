@extends('backend.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Invoice Item</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('backend.invoiceitem.update', $invoiceitem->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="inventory_id" class="col-md-4 col-form-label text-md-right">Inventory ID</label>

                            <div class="col-md-6">
                                <input id="inventory_id" type="text" class="form-control" name="inventory_id" value="{{ $invoiceitem->inventory_id }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="invoice_no" class="col-md-4 col-form-label text-md-right">Invoice Number</label>

                            <div class="col-md-6">
                                <input id="invoice_no" type="text" class="form-control" name="invoice_no" value="{{ $invoiceitem->invoice_no }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" name="product_name" value="{{ $invoiceitem->product_name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit_price" class="col-md-4 col-form-label text-md-right">Unit Price</label>

                            <div class="col-md-6">
                                <input id="unit_price" type="text" class="form-control" name="unit_price" value="{{ $invoiceitem->unit_price }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" value="{{ $invoiceitem->quantity }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">Total Price</label>

                            <div class="col-md-6">
                                <input id="total_price" type="text" class="form-control" name="total_price" value="{{ $invoiceitem->total_price }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $invoiceitem->phone }}" required>
                            </div>
                        </div>

                        <!-- Hidden field for invoice_id -->
                        <input type="hidden" name="invoice_id" value="{{ $invoiceitem->invoice_id }}">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Invoice Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

