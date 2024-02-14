@extends('backend.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Invoice Item</div><br>

                <div class="card-body">
                    <form method="POST" action="{{ route('backend.profit.update', $profit->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="inventory_id" class="col-md-4 col-form-label text-md-right">Inventory ID</label><br>

                            <div class="col-md-6">
                                <input id="inventory_id" type="text" class="form-control" name="invoice_id" value="{{ $profit->invoice_id }}" required autofocus>
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="invoice_no" class="col-md-4 col-form-label text-md-right">Product name</label>

                            <div class="col-md-6">
                                <input id="invoice_no" type="text" class="form-control" name="product_name" value="{{ $profit->product_name }}" required>
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">Profit</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" name="profit" value="{{ $profit->profit }}" required>
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="unit_price" class="col-md-4 col-form-label text-md-right">Customer ID</label>

                            <div class="col-md-6">
                                <input id="unit_price" type="text" class="form-control" name="customer_id" value="{{ $profit->customer_id }}" required>
                            </div>
                        </div><br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update Profit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
