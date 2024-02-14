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

            <form action="{{ route('backend.institute.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Company Name *</label>
                        <input type="text" class="form-control" name="company_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Company Photo*</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Address *</label>
                        <input type="text" class="form-control" name="address" required>
                    </div><br>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Branch Name *</label>
                        <input type="text" class="form-control" name="branch_name" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Branch Code *</label>
                        <input type="text" class="form-control" name="branch_code" required>
                    </div><br>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-lg btn-primary form-control mt-4">Create Company</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
