<?php
session_start();
require('db.inc.php');


//contact form
if (isset($_POST['submit'])) {
    $name = strip_tags(mysqli_real_escape_string($conn, $_POST['name']));
    $email = strip_tags(mysqli_real_escape_string($conn, $_POST['email']));
    $subject = strip_tags(mysqli_real_escape_string($conn, $_POST['subject']));
    $message = strip_tags(mysqli_real_escape_string($conn, $_POST['message']));
    $contact_id = bin2hex(random_bytes(20));
    include('smtp/PHPMailerAutoload.php');
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "parsllinternet@gmail.com";
        $mail->Password = "ctrzfpasipmdrewc";
        $mail->SetFrom("parsllinternet@gmail.com");
        $mail->addAddress("parsllinternet@gmail.com");

        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "You have a new email on PARSLL";
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));

        $send = $mail->send();
        if ($send) {
            mysqli_query($conn, "insert into contact(Contact_id, Name, Email, Subject, Message) values('$contact_id','$name','$email','$subject','$message')");

            echo '
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Poppins:wght@500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/55e3b1fe05.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/tick.css">
</head>
<body>
    <div class="container-tick">
<div class="pop-up" id="popup">
    <img src="../../assets/images/success.png" alt="sucess">
    <h2>Thank you !</h2>
    <p>We will contact you as soon as possible</p>
    <a href="../HTML/index.php"><button type="button" onclick="">Ok</button></a>
</div>
    </div>
</body>
</html>
            ';
        }
    } catch (phpmailerException $e) {
        // echo "<script>alert('Connection error');</script>";
        echo '
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Poppins:wght@500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/55e3b1fe05.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/tick.css">
</head>
<body>
    <div class="container-tick">
<div class="pop-up" id="popup">
    <img src="../../assets/images/warning.png" alt="sucess">
    <h2>Sorry !</h2>
    <p> Something went wrong !</p>
    <a href="../HTML/index.php"><button type="button" onclick="" style = "background-color: red;">Ok</button></a>
</div>
    </div>
</body>
</html>';
    }
}

//contact form end

// login start

if (isset($_POST['SignIn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $selectQury = "SELECT * FROM `admin` WHERE `email` = '$email'";
    $select = mysqli_query($conn, $selectQury);
    $num = mysqli_num_rows($select);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($select)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                echo "<script>
                    window.location.href = '../HTML/dashboard.php';
                    </script>";
            } else {
                echo "<script>
                    alert('Invalid password');
                    window.history.back();
                    </script>";
            }
        }
    }else{
        echo "<script>
                    alert('Login is only for admins');
                    window.history.back();
                    </script>";
    }
}

// login end

// Add Project

if (isset($_POST['addProject'])) {
    $project_id = bin2hex(random_bytes(20));
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $_FILES['image'];

    $filename = $image['name'];
    $tempname = $image['tmp_name'];
    $size = $image['size'];
    $type = $image['type'];

    $file_ext = explode('.', $filename);
    $last_ext = strtolower(end($file_ext));
    $ext_arr = array('png', 'jpg', 'jpeg');

    if (in_array($last_ext, $ext_arr)) {
        if ($size < 500000) {
            $location = 'upload/' . $filename;
            move_uploaded_file($tempname, $location);
            $sql = "INSERT INTO `projects` (`project_id`,`title`, `description`, `image`) VALUES ('$project_id','$title', '$description', '$location')";
            $re = mysqli_query($conn, $sql);
            if ($re) {

                echo "<script>alert('Project Added successfully');
                history.back();
                </script>";
            }
        } else {
            echo "<script>alert('file size must be less than 5mb');
              history.back();
             </script>";
        }
    } else {
        echo "<script>alert('File extension not valid. Enter png, jpg or jpeg file !!');
         history.back();
         </script>";
    }
}
// Add Project endo

// delete Project start

if (isset($_GET['id'])) {
    $projectId = mysqli_real_escape_string($conn, $_GET['id']);
    $selectProject = mysqli_query($conn, "SELECT * FROM `projects` WHERE `project_id` = '$projectId'");
    while ($row = mysqli_fetch_assoc($selectProject)){
        $image = $row['image'];
    }
    $delete = mysqli_query($conn, "DELETE FROM `projects` WHERE `project_id` = '$projectId'");
    if ($delete) {
        unlink($image);
        echo "<script>alert('Project deleted');
        window.location.href = '../HTML/dashboard.php';
        </script>";
    }
}
// Delete Project end

// update password start

if(isset($_POST['update'])){
    $email = $_SESSION['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "UPDATE `admin` SET `password` = '$pass' WHERE `email` = '$email'");
    if($result){
        echo "<script>alert('Password updated');
        window.location.href = '../HTML/logout.php';
        </script>";
    }
}
// update password end

?>