@extends('backend.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            @if(session('success'))
                <div id="successMessage" class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById("successMessage").style.display = "none";
                    }, 3000); // 3000 milliseconds = 3 seconds
                </script>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.institute.update',$company->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Company Name *</label>
                        <input type="text" class="form-control" name="company_name" value="{{$company->company_name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Company Photo*</label>
                        <input type="file" class="form-control" name="image" value="{{$company->image}}">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Address *</label>
                        <input type="text" class="form-control" name="address" value="{{$company->address}}">
                    </div><br>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Branch Name *</label>
                        <input type="text" class="form-control" name="branch_name" value="{{$company->branch_name}}">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Branch Code *</label>
                        <input type="text" class="form-control" name="branch_code" value="{{$company->branch_code}}">
                    </div><br>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-lg btn-primary form-control mt-4">Update Company</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
