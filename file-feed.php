<?php include("secure.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <?php include("includes/navbar.php") ?>
  <?php include("includes/head.php") ?>

    <div class="container">

      <h2>Pet Documents</h2>
      <?php include("includes/database.php") ?>

      <?php $sql = "SELECT * FROM `users` JOIN `files` ON users.id = files.user_id WHERE `email` = '". $_COOKIE['user'] ."'";
      // echo $sql;
      $result = $mysqli->query($sql); ?>

      <?php
      while($post = $result -> fetch_array(MYSQLI_ASSOC)){
          echo "<br>".$post['form_name']."<br>";

          echo '<img width="200px" src="uploads/'.$post['form_file'].'"/>';
          // .$post['id'];
          // echo '<a href="deletepost.php?post='.$post['id'].'">Delete</a>'."<br>";

        }
      ?>

    <?php include("includes/scripts.php");
    include("includes/footer.php");  ?>
    </div>
  </body>
</html>
