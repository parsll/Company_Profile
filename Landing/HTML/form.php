<?php
 session_start();
 require("../PHP/db.inc.php");
if(!isset($_SESSION['email'])){
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
    <link rel="icon" href="../../favivon.ico" sizes="32x32" />
    <link rel="stylesheet" href="../CSS/form.css?v=2">
    <title>Add Project</title>
</head>
<body>


  <div class="container">
    <form method="post" action="../PHP/code.php" enctype="multipart/form-data">
      <h1>Add Project</h1>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description"></textarea>

      <label for="image" class="file-upload">
        <span>Choose image</span>
        <input type="file" id="image" name="image" accept="image/*" sty>
      </label>
      <button type="submit" name="addProject" style="float: right;">Add</button>
    </form>
  </div>

</body>
</html>
