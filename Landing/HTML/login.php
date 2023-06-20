<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../favivon.ico" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Poppins:wght@500&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/55e3b1fe05.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <!-- inside div -->
        <div class="form-box">
            <h1 id="title">Sign In</h1>
            <form method="post" action="../PHP/code.php">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope" style="color: #3c00a0;"></i>
                        <input type="email" placeholder="Email" name="email" id="email" oninput="show()">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock" style="color: #3c00a0;"></i>
                        <input type="password" placeholder="Password" name="password" id="password" oninput="show()">
                    </div>
                </div>
                <div class="btn-field">
                    <button type="submit" id="signinbtn" name="SignIn" onmouseover="hide()"> Sign in</button>
                </div>
            </form>
        </div>
    </div>
<script>
    function hide(){
        var email = document.getElementById('email').value;
        console.log(email);
        var password = document.getElementById('password').value;
        if(email == "" || password == ""){
            document.getElementById('signinbtn').style.display = 'none';
        }
    }
    function show(){
        var email = document.getElementById('email').value;
        console.log(email);
        var password = document.getElementById('password').value;
        if(email != "" && password != ""){
            document.getElementById('signinbtn').style.display = 'block';
        }
    }
</script>

</body>

</html>