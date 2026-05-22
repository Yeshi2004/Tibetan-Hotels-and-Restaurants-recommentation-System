<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Recommendation System</title>

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
            align-items:center;
        }

        nav ul li{
            margin:0 20px;
        }

        nav ul li a{
            color:white;
            text-decoration:none;
            font-size:16px;
            transition:0.3s;
        }

        nav ul li a:hover{
            color:#00c6ff;
        }

        /* Header */

        header{
            background:#007bff;
            color:white;
            padding:25px;
            text-align:center;
        }

        header h1{
            margin-bottom:10px;
        }

        /* Main Container */

        .container{
            width:90%;
            margin:auto;
            padding:30px 0;
        }

        .section-title{
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
            color:#007bff;
            margin-bottom:10px;
        }

        .card p{
            margin-bottom:10px;
            color:#555;
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

        /* Footer */

        footer{
            background:#222;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:40px;
        }

        /* Hero Section */

        .hero{
            width:90%;
            margin:30px auto;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            background:white;
        }

        .hero img{
            width:100%;
            height:450px;
            object-fit:cover;
        }

        .hero-text{
            padding:25px;
            text-align:center;
        }

        .hero-text h2{
            color:#007bff;
            margin-bottom:15px;
        }

        .hero-text p{
            color:#555;
            line-height:1.6;
            font-size:17px;
        }

        /* About Section */

        .about-section{
            background:white;
            padding:60px 20px;
            margin-top:40px;
        }

        .about-container{
            width:80%;
            margin:auto;
            text-align:center;
        }

        .about-container h2{
            color:#007bff;
            margin-bottom:20px;
            font-size:32px;
        }

        .about-container p{
            color:#555;
            line-height:1.8;
            font-size:18px;
        }

        /* Contact Section */

        .contact-section{
            background:#f9f9f9;
            padding:60px 20px;
        }

        .contact-container{
            width:80%;
            margin:auto;
            text-align:center;
        }

        .contact-container h2{
            color:#007bff;
            margin-bottom:20px;
            font-size:32px;
        }

        .contact-container p{
            color:#555;
            font-size:18px;
            margin-bottom:15px;
        }

        .contact-info{
            margin-top:20px;
            line-height:2;
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
            <a href="#about">About Us</a>
        </li>

        <li>
            <a href="#contact">Contact Us</a>
        </li>

<?php
if(isset($_SESSION['user_id'])){
?>

<li>
    <a href="logout.php">

        Logout

    </a>
</li>

<?php
} else {
?>

<li>
    <a href="login.php">Login</a>
</li>

<?php
}
?>



    </ul>

</nav>

<!-- Header -->

<header>

    <h1>Tibetan Restaurants & Hotels</h1>

    <p>Find the best places near you</p>

</header>

<!-- Hero Section -->

<div class="hero">

    <img src="images/banner2.png"
         alt="Restaurant and Hotel Banner">

    <div class="hero-text">

        <h2>Discover Amazing Restaurants & Hotels</h2>

        <p>
            Our recommendation system helps users find
            the best restaurants and hotels based on
            location, ratings, reviews, and user preferences.
            Explore top-rated places near you quickly and easily.
        </p>

    </div>

</div>

<!-- About Section -->

<section id="about" class="about-section">

    <div class="about-container">

        <h2>About Our Website</h2>

        <p>
            Welcome to our Restaurant and Hotel Recommendation System.
            This website helps users discover the best restaurants and
            hotels based on their location, ratings, and reviews.

            Users can explore nearby places, read customer reviews,
            give ratings, and find comfortable hotels and delicious
            restaurants quickly and easily.

            Our goal is to provide a simple and user-friendly platform
            that improves travel and dining experiences for everyone.
        </p>

    </div>

</section>

<!-- Contact Section -->

<section id="contact" class="contact-section">

    <div class="contact-container">

        <h2>Contact Us</h2>

        <p>
            Have questions or suggestions?
            Feel free to contact us anytime.
        </p>

        <div class="contact-info">

            <p>
                📍 Location: Bangalore, India
            </p>

            <p>
                📧 Email: support@example.com
            </p>

            <p>
                📞 Phone: +91 9876543210
            </p>

        </div>

    </div>

</section>

<script>

navigator.geolocation.getCurrentPosition(function(position){

    let latitude = position.coords.latitude;
    let longitude = position.coords.longitude;

    console.log("Latitude: " + latitude);
    console.log("Longitude: " + longitude);

});

</script>

<!-- Footer -->

<footer>

    <p>© 2026 Recommendation System</p>

</footer>

</body>
</html>