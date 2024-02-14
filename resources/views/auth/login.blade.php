<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Resetting */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ecf0f3;
        }

        .wrapper {
            max-width: 450px;
            min-height: 500px;
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #ecf0f3;
            border-radius: 15px;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .logo {
            width: 80px;
            margin: auto;
        }

        .logo img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #5f5f5f,
                        0px 0px 0px 5px #ecf0f3,
                        8px 8px 15px #a7aaa7,
                        -8px -8px 15px #fff;
        }

        .wrapper .name {
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 1.3px;
            padding-left: 10px;
            color: #555;
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px;
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
        }

        .wrapper .form-field .fas {
            color: #555;
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #03A9F4;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
                        -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }

        .wrapper .btn:hover {
            background-color: #039BE5;
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #03A9F4;
        }

        .wrapper a:hover {
            color: #039BE5;
        }

        @media(max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px;
            }
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="logo">
        <img src="{{asset('backend')}}/assets/img/employee.png" alt="">
    </div>
    <div class="text-center mt-4 name">
        Inventory Management
    </div>
    @error('username')
    <div id="passwordError" class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{route('login')}}" method="post" class="p-3 mt-3">
        @csrf
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user">&nbsp;<span><b>Username:</b></span></span>
            <input type="text" name="username" value="{{old('username')}}" id="userName" placeholder="">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key">&nbsp;<b>Password:</b></span>
            <input type="password" name="password" value="{{old('password')}}" id="pwd" placeholder="">
            <span class="password-icon" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye"></i>
            </span>
            @error('password')
            <div id="passwordError" class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn mt-3">Login</button>
    </form>
    <div class="text-center fs-6">
        <a href="{{route('password.request')}}">Forget password?</a>  <a href="#" hidden></a>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var pwdInput = document.getElementById("pwd");
        if (pwdInput.type === "password") {
            pwdInput.type = "text";
        } else {
            pwdInput.type = "password";
        }
    }
</script>
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
