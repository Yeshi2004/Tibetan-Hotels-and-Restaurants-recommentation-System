<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];

        header("Location: index.php");

    } else {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>

    <style>

        body{
            font-family:Arial, sans-serif;

            background:url('images/admin.jpg');

            background-size:cover;
            background-position:center;
        background-repeat:no-repeat;

        height:100vh;

        display:flex;
        justify-content:center;
        align-items:center;
    }
body::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    z-index:-1;
}


        .login-box{
            width:350px;
            background:lightblue;
            padding:30px;
            border-radius:10px;
            box-shadow:0 2px 15px rgba(0,0,0,0.2);
            position:relative;
            z-index:1;
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
            background:#28a745;
            color:white;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#1e7e34;
        }

        .error{
            background:#f8d7da;
            color:#721c24;
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
            color:#28a745;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2>User Login</h2>

    <?php
    if(isset($error)){
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="POST">

        <input type="email"
               name="email"
               placeholder="Enter Your Email"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit"
                name="login">
                Login
        </button>

    </form>

    <div class="register-link">
        Don't have an account?
        <a href="register.php">Register</a>
    </div>

</div>

</body>
</html>

