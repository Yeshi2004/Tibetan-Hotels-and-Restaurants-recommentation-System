<?php
include 'db.php';

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$restaurants = mysqli_query($conn,

"SELECT * FROM restaurants

WHERE name LIKE '%$search%'
OR location LIKE '%$search%'
OR cuisine LIKE '%$search%'

ORDER BY rating DESC");
?>



<!DOCTYPE html>
<html>

<head>

    <title>Restaurants</title>

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
        }

        /* Navigation Bar */

        nav{
            background:#222;
            padding:15px 0;
        }

        nav ul{
            list-style:none;
            display:flex;
            justify-content:center;
            flex-wrap:wrap;
        }

        nav ul li{
            margin:0 15px;
        }

        nav ul li a{
            color:white;
            text-decoration:none;
            font-size:16px;
            transition:0.3s;
        }

        nav ul li a:hover{
            color:#28a745;
        }

        /* Header */

        header{
            background:#28a745;
            color:white;
            padding:25px;
            text-align:center;
        }

        header h1{
            margin-bottom:10px;
        }

        /* Container */

        .container{
            width:90%;
            margin:auto;
            padding:30px 0;
        }

        .title{
            margin-bottom:20px;
            color:#333;
        }

        /* Cards */

        .card-container{
            display:flex;
            flex-wrap:wrap;
            gap:20px;
        }

        .card{
            background:white;
            width:300px;
            padding:20px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card h3{
            color:#28a745;
            margin-bottom:10px;
        }

        .card p{
            color:#555;
            margin-bottom:10px;
        }

        .btn{
            display:inline-block;
            padding:10px 15px;
            background:#28a745;
            color:white;
            text-decoration:none;
            border-radius:5px;
            margin-top:10px;
        }

        .btn:hover{
            background:#1e7e34;
        }

        /* Footer */

        footer{
            background:#222;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:40px;
        }

/* Search Bar */

.search-container{

    width:90%;

    margin:25px auto;

    text-align:center;
}

.search-container form{

    display:flex;

    justify-content:center;

    gap:10px;

    flex-wrap:wrap;
}

.search-container input{

    width:350px;

    padding:12px;

    border:none;

    border-radius:5px;

    font-size:15px;

    box-shadow:0 2px 5px rgba(0,0,0,0.1);
}

.search-container button{

    padding:12px 20px;

    border:none;

    background:#28a745;

    color:white;

    border-radius:5px;

    cursor:pointer;

    transition:0.3s;
}

.search-container button:hover{

    background:#1e7e34;
}

/* Card Image */

.card-img{

    width:100%;

    height:200px;

    object-fit:cover;

    border-radius:10px;

    margin-bottom:15px;
}

/* Map Button */

.map-btn{
    background:#dc3545;
    margin-left:10px;
}

.map-btn:hover{
    background:#b52a37;
}



    </style>

</head>

<body>

<!-- Navigation Bar -->

<nav>

    <ul>

        <li>
            <a href="index.php">Home</a>
        </li>

        <li>
            <a href="restaurants.php">Restaurants</a>
        </li>

        <li>
            <a href="hotels.php">Hotels</a>
        </li>


        <li>
            <a href="login.php">Login</a>
        </li>

    </ul>

</nav>

<header>

    <h1>Top Restaurants</h1>

    <p>Find the best restaurants near you</p>

</header>


<!-- Search Bar -->

<div class="search-container">

    <form method="GET">

        <input type="text"
               name="search"
               placeholder="Search restaurants"
               value="<?php echo $search; ?>">

        <button type="submit">

            Search

        </button>

    </form>

</div>


<div class="container">

    <h2 class="title">Available Restaurants</h2>

    <div class="card-container">

        <?php
        while($row = mysqli_fetch_assoc($restaurants)){
        ?>

<div class="card">

    <img src="images/<?php echo $row['image']; ?>"
         alt="Restaurant Image"
         class="card-img">

    <h3>
        <?php echo $row['name']; ?>
    </h3>

    <p>
        <strong>Location:</strong>
        <?php echo $row['location']; ?>
    </p>

    <p>
        <strong>Cuisine:</strong>
        <?php echo $row['cuisine']; ?>
    </p>

    <p>
        <?php echo $row['description']; ?>
    </p>

    <p>
        <strong>Rating:</strong>
        ⭐ <?php echo $row['rating']; ?>
    </p>

    <a href="review.php?id=<?php echo $row['id']; ?>&type=restaurant"
       class="btn">

       Add Review

    </a>

<a href="<?php echo $row['google_map_link']; ?>"
   target="_blank"
   class="btn map-btn">

   View on Map

</a>



</div>



        <?php
        }
        ?>

    </div>

</div>

<footer>

    <p>© 2026 Restaurant Recommendation System</p>

</footer>

</body>
</html>

