<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, sans-serif;
            background:#f4f4f4;
            display:flex;
        }

        /* Sidebar */

        .sidebar{
            width:250px;
            height:100vh;
            background:#222;
            padding-top:30px;
            position:fixed;
        }

        .sidebar h2{
            color:white;
            text-align:center;
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:white;
            padding:15px 25px;
            text-decoration:none;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#007bff;
        }

        /* Main Content */

        .main-content{
            margin-left:250px;
            padding:30px;
            width:100%;
        }

        .main-content h1{
            margin-bottom:30px;
            color:#333;
        }

        /* Dashboard Cards */

        .card-container{
            display:flex;
            flex-wrap:wrap;
            gap:20px;
        }

        .card{
            background:white;
            width:250px;
            padding:25px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(240, 17, 17, 0.1);
        }

        .card h3{
            color:#007bff;
            margin-bottom:10px;
        }

        .card p{
            color:#555;
            margin-bottom:15px;
        }

        .btn{
            display:inline-block;
            background:#007bff;
            color:white;
            padding:10px 15px;
            text-decoration:none;
            border-radius:5px;
        }

        .btn:hover{
            background:#0056b3;
        }

    </style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

    <h2>Admin Panel</h2>

    <a href="dashboard.php">
        Dashboard
    </a>

    <a href="manage_places.php">
        Manage Places
    </a>


    <a href="../index.php">
        Logout
    </a>

</div>

<!-- Main Content -->

<div class="main-content">

    <h1>Admin Dashboard</h1>

    <div class="card-container">

        <div class="card">

            <h3>Manage Restaurants</h3>

            <p>
                Add, update, or remove restaurant information.
            </p>

        <a href="manage_places.php?type=restaurant"
            class="btn">

        Manage Restaurants

        </a>


        </div>

        <div class="card">

            <h3>Manage Hotels</h3>

            <p>
                Add, update, or remove hotel information.
            </p>

<a href="manage_places.php?type=hotel"
   class="btn">

   Manage Hotels

</a>


        </div>

        <div class="card">


<h3>Edit Website Content</h3>

<p>
    Update homepage banner, About Us,
    Contact details, and website content.
</p>

<a href="manage_content.php"
   class="btn">

   Edit Content

</a>

</div>



    </div>

</div>

</body>
</html>

