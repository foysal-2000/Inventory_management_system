@extends('backend.master')
@section('content')
<style>
    .card {
        width: 800px;
    }

    .card-header {
        text-align: center;
        background-color: gray;
        color: yellow;
        font-size: 30px;
    }

    .form-control {
        width: 400px;
        height: 50px;
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
</style>
<div class="container">
    <a class='btn btn-lg btn-primary' href="{{route('backend.categories.create')}}">Category List</a><br>
    <div class="card">
      
        <div class="card-header">Category Entry Form </div><br>
        <div class="card-body">
       
            <div class="row justify-content-center">
                @if(session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="form-label">
            <form action="{{route('backend.categories.update',$category->id)}}" method="post">
                @csrf
                        <label class="form-label">Category Name:</label>
                        <input type='text' name='category' value='{{$category->category}}' class='form-control'>
                    </div>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-label">
                        <label class="form-label">Category Creator Name:</label>
                        <input type='text' name='creator_name' value='{{$category->creator_name}}' class='form-control'>
                       
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-label">
                        <label class="form-label">Category Creator Designation:</label>
                        <input type='text' name='creator_designation' value='{{$category->creator_designation}}' class='form-control'>
                    </div>
                </div>
            </div><br>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <button type='submit' class='btn btn-lg btn-primary form-control'>Create Category</button>
                </div>
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
