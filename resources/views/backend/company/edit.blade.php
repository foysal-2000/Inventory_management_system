@extends('backend.master')
@section('content')
<style>
    .card {
        width: 1200px;
    }

    .card-header {
        text-align: center;
        background-color: gray;
        color: yellow;
        font-size: 30px;
    }

    .form-control {
        width: 450px;
        height: 45px;
        font-size: 20px;
    }

    .form-label {
        font-size: 20px;
    }
    #successMessage {
        width: 400px;
        margin: 0 auto; /* Centers the element horizontally */
        text-align: center;
        font-size: 25px;
    }
    #des{
        width: 1000px;
        height: 65px;
        align:center;
    }
</style>
<div class="container">
    <a class='btn btn-lg btn-primary' href="{{route('backend.company.index')}}">Company List</a><br>
    <div class="card">
        <div class="card-header">Category Entry Form </div><br>
        <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif
        <form action="{{route('backend.company.update',$company->id)}}" method="POST">
            @csrf
            <div class="row">
                
                <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input type='text' name='company_name' value='{{$company->company_name}}' class='form-control'>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Company Email</label>
                    <input type='email' name='email' value='{{$company->email}}' class='form-control'>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type='number' name='phone' value='{{$company->phone}}' class='form-control'>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Company Address</label>
                    <input type='number' name='address' value='{{$company->address}}' class='form-control'>
                </div>
            </div><br>
            <div class="row ">
                <div class="col-md-6">  
                    <label class="form-label">Company Description</label>
                    <textarea type='text' name='description'  id="des" value='' class='form-control'>{{$company->description}}</textarea>
                </div>
               
            </div><br>
                <center><button type='submit' class='btn btn-lg btn-primary form-control'>Create Category</button></center>
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
