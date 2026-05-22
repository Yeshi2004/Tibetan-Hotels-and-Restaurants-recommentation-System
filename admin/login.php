
<?php
session_start();

include '../db.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple Admin Login

    if($username == "Tenjung" && $password == "54321" || $username == "Kush" && $password == "54321"){

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");

    }else{

        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Login</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

       
    body{
    font-family:Arial, sans-serif;

    background:url('../images/admin.jpg');

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
            box-shadow:0 2px 10px rgba(0,0,0,0.2);
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
            background:#f8d7da;
            color:#721c24;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;
            text-align:center;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2>Admin Login</h2>

    <?php
    if(isset($error)){
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="POST">

        <input type="text"
               name="username"
               placeholder="Admin Username"
               required>

        <input type="password"
               name="password"
               placeholder="Admin Password"
               required>

        <button type="submit"
                name="login">

                Login

        </button>

    </form>

</div>

</body>
</html>

