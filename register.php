<?php
include 'db.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')";

    if(mysqli_query($conn,$sql)){
        $success = "Registration Successful";
    } else {
        $error = "Something went wrong";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

    <style>

        body{
            margin:0;
            padding:0;
            font-family: Arial, sans-serif;
            background:linear-gradient(to right,#007bff,#00c6ff);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-box{
            width:350px;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 2px 15px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:#333;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:20px;
            border:1px solid #ccc;
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
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#0056b3;
        }

        .success{
            background:#d4edda;
            color:#155724;
            padding:10px;
            border-radius:5px;
            margin-bottom:15px;
            text-align:center;
        }

        .error{
            background:#f8d7da;
            color:#721c24;
            padding:10px;
            border-radius:5px;
            margin-bottom:15px;
            text-align:center;
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

</head>

<body>

<div class="register-box">

    <h2>User Registration</h2>

    <?php
    if(isset($success)){
        echo "<div class='success'>$success</div>";
    }

    if(isset($error)){
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="POST">

        <input type="text"
               name="name"
               placeholder="Enter Your Name"
               required>

        <input type="email"
               name="email"
               placeholder="Enter Your Email"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit"
                name="register">
                Register
        </button>

    </form>

    <div class="login-link">
        Already have an account?
        <a href="login.php">Login</a>
    </div>

</div>

</body>
</html>

