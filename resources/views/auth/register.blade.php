<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

```
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial,sans-serif;
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
        margin-bottom:20px;
    }

    input{
        width:100%;
        padding:12px;
        margin-bottom:15px;
        border:1px solid #ddd;
        border-radius:5px;
    }

    button{
        width:100%;
        padding:12px;
        background:#28a745;
        color:white;
        border:none;
        border-radius:5px;
        cursor:pointer;
    }

    button:hover{
        background:#218838;
    }

    .login-link{
        text-align:center;
        margin-top:15px;
    }

    .login-link a{
        text-decoration:none;
        color:#007bff;
    }
</style>
```

</head>
<body>

<div class="container">

```
<h2>Create Account</h2>

<form action="/register" method="POST">
    @csrf

    <input type="text"
           name="name"
           placeholder="Enter Name"
           required>

    <input type="email"
           name="email"
           placeholder="Enter Email"
           required>

    <input type="password"
           name="password"
           placeholder="Enter Password"
           required>

    <button type="submit">
        Register
    </button>
</form>

<div class="login-link">
    Already have an account?
    <a href="/login">Login</a>
</div>
```

</div>

</body>
</html>
