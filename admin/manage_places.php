
<?php
include '../db.php';

$success = "";

/* Get Page Type */

$type = "";

if(isset($_GET['type'])){
    $type = $_GET['type'];
}


/* Add Restaurant */

if(isset($_POST['add_restaurant'])){

    $name = $_POST['name'];
    $location = $_POST['location'];
    $cuisine = $_POST['cuisine'];
    $description = $_POST['description'];
    $google_map_link = $_POST['google_map_link'];

    // Image Upload

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name,
    "../images/".$image);

    $sql = "INSERT INTO restaurants
    (name,location,cuisine,description,image,google_map_link)

    VALUES

    ('$name',
     '$location',
     '$cuisine',
     '$description',
     '$image',
     '$google_map_link')";

    if(mysqli_query($conn,$sql)){
        $success = "Restaurant Added Successfully";
    }
}


/* Add Hotel */

if(isset($_POST['add_hotel'])){

    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $google_map_link = $_POST['google_map_link'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name,
    "../images/".$image);

    $sql = "INSERT INTO hotels
(name,location,price,description,image,google_map_link)

VALUES

('$name',
 '$location',
 '$price',
 '$description',
 '$image',
 '$google_map_link')";

    if(mysqli_query($conn,$sql)){
        $success = "Hotel Added Successfully";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Manage Places</title>

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

            background:url('../images/admin-bg.jpg');

            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;

            min-height:100vh;
        }

        body::before{

            content:'';

            position:fixed;

            top:0;
            left:0;

            width:100%;
            height:100%;

            background:rgba(20, 2, 53, 0.7);

            z-index:-1;
        }

        .container{

            width:450px;

            margin:50px auto;

            background:rgba(255,255,255,0.15);

            backdrop-filter:blur(10px);

            padding:35px;

            border-radius:15px;

            box-shadow:0 5px 20px rgba(0,0,0,0.3);

            color:white;
        }

        h1{

            text-align:center;

            margin-bottom:25px;
        }

        .success{

            background:#28a745;

            padding:12px;

            border-radius:6px;

            margin-bottom:20px;

            text-align:center;
        }

        input{

            width:100%;

            padding:12px;

            margin-bottom:15px;

            border:none;

            border-radius:8px;

            outline:none;

            font-size:15px;
        }

        input[type="file"]{

            background:white;
            padding:10px;
        }

        button{

            width:100%;

            padding:14px;

            background:#007bff;

            color:white;

            border:none;

            border-radius:8px;

            cursor:pointer;

            font-size:16px;

            transition:0.3s;
        }

        button:hover{

            background:#0056b3;

            transform:scale(1.02);
        }

        .back-btn{

            display:block;

            text-align:center;

            margin-top:20px;

            text-decoration:none;

            background:#222;

            color:white;

            padding:12px;

            border-radius:8px;
        }

        .back-btn:hover{

            background:#444;
        }

    </style>

</head>

<body>

<div class="container">

    <?php
    if($success != ""){
        echo "<div class='success'>$success</div>";
    }
    ?>

    <!-- Restaurant Form -->

    <?php if($type == "restaurant"){ ?>

        <h1>Add Restaurant</h1>

<form method="POST"
      enctype="multipart/form-data">

    <input type="text"
           name="name"
           placeholder="Restaurant Name"
           required>

    <input type="text"
           name="location"
           placeholder="Exact Location / Building Name"
           required>

    <input type="text"
           name="cuisine"
           placeholder="Cuisine"
           required>

    <input type="text"
           name="description"
           placeholder="Short Description"
           required>

    <input type="text"
           name="google_map_link"
           placeholder="Google Map Link"
           required>

    <input type="file"
           name="image"
           required>

    <button type="submit"
            name="add_restaurant">

            Add Restaurant

    </button>

</form>



    <?php } ?>

    <!-- Hotel Form -->

    <!-- Hotel Form -->

<?php if($type == "hotel"){ ?>

    <h1>Add Hotel</h1>

    <form method="POST"
          enctype="multipart/form-data">

        <input type="text"
               name="name"
               placeholder="Hotel Name"
               required>

        <input type="text"
               name="location"
               placeholder="Exact Location / Building Name"
               required>

        <input type="number"
               name="price"
               placeholder="Price Per Night"
               required>

        <input type="text"
               name="description"
               placeholder="Short Description"
               required>

        <input type="text"
               name="google_map_link"
               placeholder="Google Map Link"
               required>

        <input type="file"
               name="image"
               required>

        <button type="submit"
                name="add_hotel">

                Add Hotel

        </button>

    </form>

<?php } ?>

    <a href="dashboard.php"
       class="back-btn">

       Back to Dashboard

    </a>

</div>

</body>
</html>

