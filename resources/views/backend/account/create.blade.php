@extends('backend.master')
@section('content')
<style>
    .input {
        width: 200px;
        height: 35px;
        border-style: none;
    }

    .inputs {
        width: 500px;
        height: 35px;
    }

    .card {
        width: 1000px;
    }

    .wide-card {
        margin-top: -30px;
        width: 1000px;
        /* Set the width of the card */
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <center>Daily Account Create</center>
        </div>
        <div class="card-body">
            <div class="row mt-2 text-center">
                <div class="col-md-12">
                    <form action="{{route('backend.account.search')}}" method="post">
                        @csrf
                        <label class="form-label">Employee ID</label>
                        <input type='text' class="inputs" name='employee_id' placeholder="search by employee id...">
                        <button type='submit' class="btn btn-primary">Search</button>
                    </form>
                </div>

            </div><br>
            <form action="{{ route('backend.account.store', ['user_id' => $user->id]) }}" method="post">
                @csrf
            <div class="row">
            
                <div class="col-md-4">
                    <label class="form-label">Employee ID</label>
                    <input type='text' class="form-control" name='employee_id' value="{{ $user->employee_id ?? '' }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Employee Name</label>
                    <input type='text' class="form-control" name='employee_name' value="{{ $user->name ?? '' }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Designation</label>
                    <input type='text' class="form-control" name='designation' value="{{ $user->role_name ?? '' }}" readonly>
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label"> Select Date</label>
                    <input type="date" name="date" value="" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label"> Start Cash Amount</label>
                    <input type="number" id="start_cash_amount" name="start_cash_amount" value="" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label"> End With Cash Amount</label>
                    <input type="number" id="end_cash_amount" name="end_cash_amount" value="" class="form-control" oninput="calculateTodaySales()">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label"> Today Sales Amount</label>
                    <input type="number" name="sales_amount" id="sales_amount" value="" class="form-control" readonly>
                </div>
                <div class="col-md-4 mt-4">
                    <button type="submit"  class="btn btn-primary form-control">Create Balance</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    function calculateTodaySales() {
        var startCash = parseFloat(document.getElementById('start_cash_amount').value);
        var endCash = parseFloat(document.getElementById('end_cash_amount').value);
        var todaySales = endCash-startCash;
        document.getElementById('sales_amount').value = todaySales.toFixed(2);
    }
</script>
@endsection
