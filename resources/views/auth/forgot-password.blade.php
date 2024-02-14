<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password Link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>


    <style>
        body {
            background-color: #DFF3F6;
        }

        .card {
            background-color: #ACE5EF;
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
                    A password reset link has been sent to your email address.
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <p class="form-label">Your email address which you given at the time of registration</p>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                           placeholder="Enter Email Address" required autofocus>
                    @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Forget Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function () {
        // Get the password error message element
        var passwordError = document.getElementById("passwordError");

        // If the password error message element exists
        if (passwordError) {
            // Hide the password error message after 5 seconds
            setTimeout(function () {
                passwordError.style.display = "none";
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
</body>
</html>
