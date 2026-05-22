<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

$place_id = $_GET['id'];
$place_type = $_GET['type'];

if(isset($_POST['submit_review'])){

    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO reviews
            (user_id, place_id, place_type, rating, comment)

            VALUES

            ('$user_id',
             '$place_id',
             '$place_type',
             '$rating',
             '$comment')";

    if(mysqli_query($conn,$sql)){

        $avg_query = mysqli_query($conn,

        "SELECT AVG(rating) AS average_rating
         FROM reviews
         WHERE place_id='$place_id'
         AND place_type='$place_type'");

        $avg_data = mysqli_fetch_assoc($avg_query);

        $average_rating = round($avg_data['average_rating'],1);

        if($place_type == "restaurant"){

            mysqli_query($conn,

            "UPDATE restaurants
             SET rating='$average_rating'
             WHERE id='$place_id'");
        }

        if($place_type == "hotel"){

            mysqli_query($conn,

            "UPDATE hotels
             SET rating='$average_rating'
             WHERE id='$place_id'");
        }

        $success = "Review Added Successfully";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Review</title>

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

            background:url('images/review-bg.jpg');

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

            background:rgba(9, 6, 196, 0.5);

            z-index:-1;
        }

        .review-box{

            width:420px;

            background:rgba(255,255,255,0.15);

            backdrop-filter:blur(12px);

            padding:35px;

            border-radius:15px;

            box-shadow:0 5px 20px rgba(0,0,0,0.3);

            color:white;
        }

        h2{

            text-align:center;

            margin-bottom:25px;

            font-size:30px;
        }

        label{

            display:block;

            margin-bottom:8px;

            font-size:16px;
        }

        input,
        textarea{

            width:100%;

            padding:12px;

            margin-bottom:18px;

            border:none;

            border-radius:8px;

            outline:none;

            font-size:15px;
        }

        textarea{

            resize:none;
        }

        button{

            width:100%;

            padding:14px;

            background:#007bff;

            color:white;

            border:none;

            border-radius:8px;

            cursor:pointer;

            font-size:17px;

            transition:0.3s;
        }

        button:hover{

            background:#0056b3;

            transform:scale(1.02);
        }

        .success{

            background:#28a745;

            color:white;

            padding:12px;

            margin-bottom:18px;

            border-radius:8px;

            text-align:center;
        }

        .rating-text{

            text-align:center;

            margin-bottom:15px;

            font-size:18px;
        }

    </style>

</head>

<body>

<div class="review-box">

    <h2>Add Your Review</h2>

    <?php
    if(isset($success)){
        echo "<div class='success'>$success</div>";
    }
    ?>

    <div class="rating-text">
         Share Your Experience 
    </div>

    <form method="POST">

        <label>Rating (1-5)</label>

        <input type="number"
               name="rating"
               min="1"
               max="5"
               placeholder="Enter Rating"
               required>

        <label>Comment</label>

        <textarea name="comment"
                  rows="5"
                  placeholder="Write your review..."
                  required></textarea>

        <button type="submit"
                name="submit_review">

                Submit Review

        </button>

    </form>

</div>

</body>
</html>
