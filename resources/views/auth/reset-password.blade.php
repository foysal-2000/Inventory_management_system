<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password Link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">

<style>
    body {
        background-color: #DFF3F6;
    }

    .card {
        background-color: grayscale;
        width: 600px;
        margin: auto; /* Center the card horizontally */
        margin-top: 50px; /* Adjust top margin as needed */
        padding: 20px;
    }

    .form-control {
        width: 100%; /* Full width input */
    }

    .form-label {
        font-size: 20px;
    }
</style>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header"><h3 class="text-center">Welcome to Forget Password Page</h3></div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    Successfully Password Change 
                </div>
            @endif
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <label class="form-label">Your email address which you provided at the time of registration</label>
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" class="form-control"
                           placeholder="Enter Email Address" required autofocus readonly>
                    @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required
                           autocomplete="new-password" placeholder="Enter Password">
                    @error('password')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required
                           autocomplete="new-password" placeholder="Confirm Password">
                    @error('password_confirmation')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
