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
  <link rel="stylesheet" href="../CSS/dashboard.css?v=2">
  <title>Parsll Dashboard</title>
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body>
  <h1>All Projects</h1>
  <a href="logout.php" class="edit-btn" style="float: right;">Logout</a>
  <a href="updatePassword.php" class="edit-btn" style="float: right;">Update Password</a>
  <a href="form.php" class="edit-btn" style="float: right;">Add Project</a>
  <a href="#contactDetails" class="edit-btn" style="float: right;">Contact Details</a>
  <table>
    <thead>
      <tr>
        <th>sn</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $selectProjects = "SELECT * FROM `projects`";
      $result = mysqli_query($conn, $selectProjects);
      $i = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['project_id'];
        $title = $row['title'];
        $description = $row['description'];
        $image = $row['image'];
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $title; ?></td>
          <td><?php echo $description; ?></td>
          <td><img src="../PHP/<?php echo $image; ?>" alt="Post Image"></td>
          <td>
            <a href="#" class="edit-btn">Edit</a>
            <a href='../PHP/code.php?id=<?php echo $id; ?>' class="delete-btn" name="deleteProject">Delete</a>
          </td>
        </tr>
      <?php
        $i++;
      }
      ?>

    </tbody>
  </table>
  <div id="contactDetails">
    <h1>Contact details</h1>
    <table>
      <thead>
        <tr>
          <th>S.N</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $selectContact = "SELECT * FROM `contact` ORDER BY `date` DESC";
        $result = mysqli_query($conn, $selectContact);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['Contact_id'];
            $name = $row['Name'];
            $email = $row['Email'];
            $subject = $row['Subject'];
            $message = $row['Message'];
            $date = $row['Date'];
        ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo $subject; ?></td>
              <td><?php echo $message; ?></td>
              <td><?php echo $date; ?></td>
            </tr>
        <?php
          $i++;
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>