@extends('backend.master')
@section('content')
<style>
    .card {
        width: 1200px;
    }

    .form-label {
        font-size: 20px;
        font-weight: bold;
    }

    .form-control {
        width: 500px;
        height: 50px;
    }

    .card-header {
        font-size: 20px;
        font-weight: bold;
        color: Green;
        text-align: center;
    }
    .des{
        width: 1200px;
    }

</style>
<div class="container">
    <div class="card"> 
        <div class="card-header">
            <a href="{{route('backend.supplier.index')}}" class="btn btn-primary">Supplier List</a>
            Supplier Information </div>
        <form action="{{route('backend.supplier.store')}}" method="get">
        <div class="card-body">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col-md-6">
                    <label class="form-label">Supplier Name</label>
                    <input type="text" name="supplier_name" value="" class="form-control" required>

                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="number" name="phone" value="" class="form-control" required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <select name="company" class='form-control' required>
                        <option value=" ">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{$company->company_name}}">{{$company->company_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Supplier Address</label>
                    <textarea type="text" name="supplier_address" value="" class="form-control" required></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Company Address</label>
                    <textarea type="email" name="company_address" value="" class="form-control" required></textarea>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="description" value="" class='form-control' id='des' required></textarea>
                </div><br>

                <div class="col-md-2 mt-4">
                    <button class="btn btn-lg btn-primary form-control" type="submit">Create Supplier</button>
                    
                </div><br>
            </div>
        </form> 
        </div>
    </div>
</div>

<script>
    setTimeout(function () {
        document.getElementById('successMessage').style.display = 'none';
    }, 3000);
</script>
@endsection
