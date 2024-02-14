@extends('backend.master')
@section('content')
<style>
    .required::after {
      content: ' *';
      color: red;
    }
    .form-control{
        height: 50px;
    }

</style>
    <div class="card">
        <div class="card-header">
            <h3><b><center>Product Details</center></b></h3>
        </div><br>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Barcode No<span class="required"></span></label>
                    <input type='text' name='barcode' id='barcode' value="{{$product->barcode}}"  class='form-control'>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Product Name<span class="required"></span></label>
                    <input type='text' name='product_name' id='product_name'  value="{{$product->product_name}}" class='form-control'>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Select  Categories<span class="required"></span></label>
                    <select id="cars" name="category_name" id="category_id" class="form-control">
                        <option value="">{{$product->category_name}}</option>
                        <option value="{{$product->category_name}}">{{$product->category_name}}</option>
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Regular Selling Price<span class="required"></span></label>
                    <input type='text' name='selling_price' value="{{$product->selling_price}}"  id='selling_price' class='form-control' >
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Purchase Price<span class="required"></span></label>
                    <input type='text' name='purchase_price' value="{{$product->purchase_price}}"  id='purchase_price' class='form-control'>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Select  Company<span class="required"></span></label>
                    <select id="cars" name="company_name" id="company_id" class="form-control">
                        <option value="">{{$product->company_name}}</option>
                        <option value="{{$product->company_name}}" {{ $product->company_name? 'selected' : '' }}>{{$product->company_name}}</option>
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Discount Amount in (Taka)<span class="required"></span></label>
                    <input type='text' name='discount_taka' value="{{$product->discount_taka}}"  id='discount_taka' class='form-control' placeholder="if no discount then give zero(0)" >
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Discount Amount in (Percentage -%)<span class="required"></span></label>
                    <input type='text' name='discount_percentage'  value="{{$product->discount_percentage}}" id='discount_percentage' class='form-control' placeholder="if no discount then give zero(0)" >
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Select  Supplier <span class="required"></span></label>
                    <select id="cars" name="supplier_name" id="supplier_id" class="form-control"
                        <option value="">{{$product->supplier_name}}</option>
                        <option value="{{$product->supplier_name}}" {{ $product->supplier_name? 'selected' : '' }}>{{$product->supplier_name}}</option>
            
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>VAT Amount in (Percentage -%)<span class="required"></span></label>
                    <input type='text' name='vat_percentage'  value="{{$product->vat_percentage}}" id='vat_percentage' class='form-control' placeholder="if no vat then give zero(0)" >
                </div>
                <div class="col-md-4">
                    <label class='form-label'>VAT Amount in (Taka) <span class="required"></span></label>
                    <input type='text' name='vat_taka' value="{{$product->vat_taka}}"  id='vat_taka' class='form-control' placeholder="if no vat then give zero(0)">
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Discount Any To Taka Convert</label>
                    <input type='text' name='discount_taka' value="{{$product->discount_taka}}"  id='free_items' class='form-control'>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Discount Selling Price<span class="required"></span></label>
                    <input type='text' name='discount_selling_price'  value="{{$product->discount_selling_price}}" id='discount_selling_price' class='form-control' readonly>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Quantity (Stock)<span class="required"></span></label>
                    <input type='text' name='quantity' id='quantity' value="{{$product->quantity}}"  class='form-control' >
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Profit <span class="required"></span></label>
                    <input type='text' name='profit' id='profit'  value="{{$product->profit}}" class='form-control'>
                </div>
            </div>
        </div>
    </div>
    
<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('productForm');

    // Add input event listeners to handle calculations
    form.addEventListener('input', function () {
        handleDiscountInputs();  // Call the discount input handler
        calculateDiscountSellingPrice();
        calculateVATAmount();
        calculateProfit();
        // ... (other calculations)
    });

    function calculateProfit() {
        var regularSellingPrice = parseFloat(document.getElementById('selling_price').value) || 0;
        var purchasePrice = parseFloat(document.getElementById('purchase_price').value) || 0;
        var discountSellingPrice = parseFloat(document.getElementById('discount_selling_price').value) || 0;
        var vatAmount = parseFloat(document.getElementById('vat_taka').value) || 0;

        var profit = vatAmount + (discountSellingPrice - purchasePrice);
        document.getElementById('profit').value = profit.toFixed(2);
    }

    function handleDiscountInputs() {
        var discountTaka = document.getElementById('discount_taka');
        var discountPercentage = document.getElementById('discount_percentage');

        if (discountTaka.value !== '') {
            discountPercentage.disabled = true;
        } else if (discountPercentage.value !== '') {
            discountTaka.disabled = true;
        } else {
            discountTaka.disabled = false;
            discountPercentage.disabled = false;
        }
    }

    function calculateDiscountSellingPrice() {
        var regularSellingPrice = parseFloat(document.getElementById('selling_price').value) || 0;
        var purchasePrice = parseFloat(document.getElementById('purchase_price').value) || 0;
        var discountTaka = parseFloat(document.getElementById('discount_taka').value) || 0;
        var discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;

        var discountSellingPrice = regularSellingPrice - (discountTaka || (regularSellingPrice * discountPercentage / 100));
        document.getElementById('discount_selling_price').value = discountSellingPrice.toFixed(2);
    }

    function calculateVATAmount() {
        var regularSellingPrice = parseFloat(document.getElementById('selling_price').value) || 0;
        var vatPercentage = parseFloat(document.getElementById('vat_percentage').value) || 0;

        var vatAmount = (regularSellingPrice * vatPercentage / 100);
        document.getElementById('vat_taka').value = vatAmount.toFixed(2);
    }

    // ... (other calculation functions)
});

</script>
@endsection
