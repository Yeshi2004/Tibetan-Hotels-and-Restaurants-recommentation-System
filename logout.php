<?php
session_start();

/* Destroy Session */

session_destroy();

/* Redirect to Home Page */

header("Location: index.php");
exit();
?>