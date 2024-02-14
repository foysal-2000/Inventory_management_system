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
            <form action="{{route('backend.account.update',$account->id)}}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Employee ID</label>
                    <input type='text' class="form-control" name='employee_id' value='{{ $account->employee_id}}' readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Employee Name</label>
                    <input type='text' class="form-control" name='employee_name' value='{{ $account->employee_name}}' readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Designation</label>
                    <input type='text' class="form-control" name='designation' value='{{ $account->designation}}' readonly>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label"> Select Date</label>
                    <input type="date" name="date" value="{{ $account->date}}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label"> Start Cash Amount</label>
                    <input type="number" id="start_cash_amount" name="start_cash_amount" value="{{ $account->start_cash_amount}}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label"> End With Cash Amount</label>
                    <input type="number" id="end_cash_amount" name="end_cash_amount" value="{{ $account->end_cash_amount}}" class="form-control" oninput="calculateTodaySales()">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label"> Today Sales Amount</label>
                    <input type="number" name="sales_amount" id="sales_amount" value="{{ $account->sales_amount}}" class="form-control" readonly>
                </div>
                <div class="col-md-4 mt-4">
                    <button type="submit"  class="btn btn-primary form-control">Update Balance</button>
                </div>
            </div>
        </div>
    </div>
        </form>
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
