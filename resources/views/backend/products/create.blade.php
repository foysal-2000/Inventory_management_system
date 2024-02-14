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
    #successMessage {
        width: 600px;
        margin: 0 auto; /* Centers the element horizontally */
        text-align: center auto;
        font-size: 15px auto;
    }
    .card-header {
        background-color: gray;
        color: yellow ;
        font-size: 20px auto;
    }
    .card{
        margin-top:-30px;
    }
    .p{
        margin-top:-30px;
        margin-left:700px;
        font-size: 20px;
    }
</style>
    
    <div class="card">
        <div class="card-header">
        @if(session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
            <a href="{{route('backend.products.index')}}" class="btn btn-md btn-primary">Products List</a><p class="p">Product Entry Form</p>
        </div><br>
        <div class="card-body">
        <form action="{{route('backend.products.store')}}" method='post' id="productForm">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Barcode No<span class="required"></span></label>
                    <input type='text' name='barcode' id='barcode' class='form-control'required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Product Name<span class="required"></span></label>
                    <input type='text' name='product_name' id='product_name' class='form-control'required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Select  Categories<span class="required"></span></label>
                    <select id="cars" name="category_name" id="category_id" class="form-control"required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category }}">{{ $category->category }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Regular Selling Price<span class="required"></span></label>
                    <input type='number' name='selling_price' id='selling_price' class='form-control' required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Purchase Price<span class="required"></span></label>
                    <input type='number' name='purchase_price' id='purchase_price' class='form-control' required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Select  Company<span class="required"></span></label>
                    <select id="cars" name="company_name" id="company_id" class="form-control"required>
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->company_name}}">{{$company->company_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Discount Amount in (Taka)<span class="required"></span></label>
                    <input type='number' name='discount_in_taka' id='discount_taka' class='form-control' placeholder="if no discount then give zero(0)" required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Discount Amount in (Percentage -%)<span class="required"></span></label>
                    <input type='text' name='discount_percentage' id='discount_percentage' class='form-control' placeholder="if no discount then give zero(0)" required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Select  Supplier <span class="required"></span></label>
                    <select id="cars" name="supplier_name" id="supplier_id" class="form-control"required>
                        <option value="">Select Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_name }}">{{ $supplier->supplier_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>VAT Amount in (Percentage -%)<span class="required"></span></label>
                    <input type='number' name='vat_percentage' id='vat_percentage' class='form-control' placeholder="if no vat then give zero(0)" required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>VAT Amount in (Taka) <span class="required"></span></label>
                    <input type='text' name='vat_taka' id='vat_taka' class='form-control' placeholder="if no vat then give zero(0)" readonly>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Discount Any To Taka Convert</label>
                    <input type='text' name='discount_taka' id='discount_taka_convert' class='form-control' readonly>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class='form-label'>Discount Selling Price<span class="required"></span></label>
                    <input type='number' name='discount_selling_price' id='discount_selling_price' class='form-control' readonly>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Quantity (Stock)<span class="required"></span></label>
                    <input type='number' name='quantity' id='quantity' class='form-control' required>
                </div>
                <div class="col-md-4">
                    <label class='form-label'>Profit <span class="required"></span></label>
                    <input type='number' name='profit' id='profit' class='form-control' readonly>
                </div>
            </div><br>
            <button class="btn btn-lg btn-primary form-control" > ADD Product</button>
        </form>
        </div>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000);
    </script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('productForm');

    // Add input event listeners to handle calculations
    form.addEventListener('input', function () {
        handleDiscountInputs();  // Call the discount input handler
        calculateDiscountSellingPrice();
        calculateVATAmount();
        calculateProfit();
        calculateDiscountTakaConvert();
    });
    function calculateDiscountTakaConvert() {
        var discountTaka = parseFloat(document.getElementById('discount_taka').value) || 0;
        var discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;

        var discountTakaConvert = discountTaka || (discountPercentage / 100) * parseFloat(document.getElementById('selling_price').value);

        document.getElementById('discount_taka_convert').value = discountTakaConvert.toFixed(2);
    }

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
