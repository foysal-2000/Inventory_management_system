
@extends('backend.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Inventory Entry</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('backend.inventory.update', $inventory->id) }}">
                        @csrf
                       

                        <div class="form-group row">
                            <label for="invoiceNo" class="col-md-4 col-form-label text-md-right">Invoice Number</label>

                            <div class="col-md-6">
                                <input id="invoiceNo" type="text" class="form-control" name="invoiceNo" value="{{ $inventory->invoiceNo }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Customer ID</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $inventory->phone }}" required>
                            </div>
                        </div>
                        <!-- Add other fields similarly -->
                        <div class="form-group row">
                            <label for="cashier" class="col-md-4 col-form-label text-md-right">Cashier Name</label>
                            <div class="col-md-6">
                                <input id="cashier" type="text" class="form-control" name="cashier" value="{{ $inventory->cashier }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subTotal" class="col-md-4 col-form-label text-md-right">Sub Total</label>
                            <div class="col-md-6">
                                <input id="subTotal" type="text" class="form-control" name="subTotal" value="{{ $inventory->subTotal }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">VAT</label>
                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control" name="vat" value="{{ $inventory->vat }}" required>
                            </div>
                        </div>

                        <!-- Add other fields similarly -->
                        <div class="form-group row">
                            <label for="cashier" class="col-md-4 col-form-label text-md-right">Cashier Name</label>
                            <div class="col-md-6">
                                <input id="cashier" type="text" class="form-control" name="discount" value="{{ $inventory->discount }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subTotal" class="col-md-4 col-form-label text-md-right">Sub Total</label>
                            <div class="col-md-6">
                                <input id="subTotal" type="text" class="form-control" name="payable" value="{{ $inventory->payable }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">VAT</label>
                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control" name="cashReceived" value="{{ $inventory->cashReceived }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cashier" class="col-md-4 col-form-label text-md-right">Cashier Name</label>
                            <div class="col-md-6">
                                <input id="cashier" type="text" class="form-control" name="returnAmount" value="{{ $inventory->returnAmount }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subTotal" class="col-md-4 col-form-label text-md-right">Sub Total</label>
                            <div class="col-md-6">
                                <input id="subTotal" type="text" class="form-control" name="payable" value="{{ $inventory->paymentType }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">VAT</label>
                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control" name="cashReceived" value="{{ $inventory->selectedBank }}" required>
                            </div>
                        </div>

<!-- Add more fields as needed -->



<!-- Add more fields as needed -->



                        <!-- Add other fields similarly -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Inventory
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
