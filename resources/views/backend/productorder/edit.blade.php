@extends('backend.master')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Product Order</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.productorder.update', $product->id) }}" method="POST">
            @csrf
           

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}" required>
            </div>

            <div class="form-group">
                <label for="purchase_price">Purchase Price</label>
                <input type="number" name="purchase_price" id="purchase_price" class="form-control" value="{{ $product->purchase_price }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
            </div>

            <div class="form-group">
                <label for="supplier_name">Supplier Name</label>
                <input type="text" name="supplier_name" id="supplier_name" class="form-control" value="{{ $product->supplier_name }}" required>
            </div>

            <!-- Add more form fields for other product attributes -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
