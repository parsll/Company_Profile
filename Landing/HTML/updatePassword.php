<?php
session_start();
require("../PHP/db.inc.php");
if (!isset($_SESSION['email'])) {
  echo "<script>
        window.location.href = 'index.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Poppins:wght@500&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/55e3b1fe05.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Update Password</title>
</head>

<body>
<div class="container">
        <!-- inside div -->
        <div class="form-box">
            <h1 id="title">Update Password</h1>
            <form method="post" action="../PHP/code.php">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-lock" style="color: #3c00a0;"></i>
                        <input type="password" placeholder="Password" name="password" id="password">
                    </div>
                </div>
                <div class="btn-field">
                    <button type="submit" id="signinbtn" name="update"> Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>