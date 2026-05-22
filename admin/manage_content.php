<?php
include '../db.php';

$success = "";

/* Fetch Existing Content */

$query = mysqli_query($conn,
"SELECT * FROM website_content LIMIT 1");

$data = mysqli_fetch_assoc($query);


/* Update Content */

if(isset($_POST['update'])){

    $hero_title = $_POST['hero_title'];

    $hero_description =
    $_POST['hero_description'];

    $about_text =
    $_POST['about_text'];

    $contact_location =
    $_POST['contact_location'];

    $contact_email =
    $_POST['contact_email'];

    $contact_phone =
    $_POST['contact_phone'];

    $sql = "UPDATE website_content SET

    hero_title='$hero_title',

    hero_description='$hero_description',

    about_text='$about_text',

    contact_location='$contact_location',

    contact_email='$contact_email',

    contact_phone='$contact_phone'

    WHERE id=1";

    if(mysqli_query($conn,$sql)){

        $success =
        "Website Content Updated Successfully";

        $query = mysqli_query($conn,
        "SELECT * FROM website_content LIMIT 1");

        $data = mysqli_fetch_assoc($query);
    }
}
?>

<!DOCTYPE html>

<html>

<head>

```
<title>Manage Website Content</title>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">
```

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    font-family:Arial,sans-serif;

    background:url('../images/admin-bg.jpg');

    background-size:cover;
    background-position:center;

    min-height:100vh;
}

body::before{

    content:'';

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background:rgba(0,0,0,0.6);

    z-index:-1;
}

.container{

    width:60%;

    margin:40px auto;

    background:rgba(255,255,255,0.15);

    backdrop-filter:blur(10px);

    padding:35px;

    border-radius:15px;

    color:white;

    box-shadow:0 5px 20px rgba(0,0,0,0.3);
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

label{

    display:block;

    margin-bottom:8px;

    font-weight:bold;
}

input,
textarea{

    width:100%;

    padding:12px;

    margin-bottom:20px;

    border:none;

    border-radius:8px;

    outline:none;

    font-size:15px;
}

textarea{

    height:120px;

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

    font-size:16px;

    transition:0.3s;
}

button:hover{

    background:#0056b3;
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

```
<h1>Manage Home Page</h1>

<?php
if($success != ""){
    echo "<div class='success'>$success</div>";
}
?>
```

<form method="POST">

<label>Hero Title</label>

<input type="text"
    name="hero_title"
    value="<?php echo $data['hero_title']; ?>"
    required>

<label>Hero Description</label>

<textarea name="hero_description"
required><?php echo $data['hero_description']; ?></textarea>

<label>About Section</label>

<textarea name="about_text"
required><?php echo $data['about_text']; ?></textarea>

<label>Contact Location</label>

<input type="text"
    name="contact_location"
    value="<?php echo $data['contact_location']; ?>"
    required>

<label>Contact Email</label>

<input type="email"
    name="contact_email"
    value="<?php echo $data['contact_email']; ?>"
    required>

<label>Contact Phone</label>

<input type="text"
    name="contact_phone"
    value="<?php echo $data['contact_phone']; ?>"
    required>

<button type="submit"
     name="update">

```
    Update Content
```

</button>

</form>

<a href="dashboard.php"
class="back-btn">

Back to Dashboard

</a>

</div>

</body>
</html>
