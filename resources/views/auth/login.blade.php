<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial, sans-serif;
    }

    body{
        background:#f4f6f9;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .container{
        width:400px;
        background:white;
        padding:30px;
        border-radius:10px;
        box-shadow:0 0 15px rgba(0,0,0,0.1);
    }

    h2{
        text-align:center;
        margin-bottom:25px;
        color:#333;
    }

    input{
        width:100%;
        padding:12px;
        margin-bottom:15px;
        border:1px solid #ddd;
        border-radius:5px;
        font-size:15px;
    }

    button{
        width:100%;
        padding:12px;
        background:#007bff;
        color:white;
        border:none;
        border-radius:5px;
        cursor:pointer;
        font-size:16px;
    }

    button:hover{
        background:#0056b3;
    }

    .error{
        background:#ffe5e5;
        color:red;
        padding:10px;
        border-radius:5px;
        margin-bottom:15px;
        text-align:center;
    }

    .success{
        background:#e7ffe7;
        color:green;
        padding:10px;
        border-radius:5px;
        margin-bottom:15px;
        text-align:center;
    }

    .register-link{
        text-align:center;
        margin-top:15px;
    }

    .register-link a{
        text-decoration:none;
        color:#007bff;
    }

    .register-link a:hover{
        text-decoration:underline;
    }
</style>


</head>
<body>

<div class="container">


<h2>Book Management Login</h2>

@if(session('error'))
    <div class="error">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<form action="/login" method="POST">
    @csrf

    <input type="email"
           name="email"
           placeholder="Enter Email"
           required
           value="{{ old('email') }}">

    <input type="password"
           name="password"
           placeholder="Enter Password"
           required>

    <button type="submit">
        Login
    </button>
</form>

<div class="register-link">
    Don't have an account?
    <a href="/register">Register</a>
</div>


</div>

</body>
</html>
