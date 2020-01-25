<?php include("secure.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include("includes/head.php") ?>
  </head>
  <body>
    <?php include("includes/navbar.php") ?>


    <div class="container">
      <h2>Pawstagram</h2>
      <?php include("includes/database.php");
 ?>

      <?php $sql = "SELECT * FROM `users` JOIN `Posts` ON users.id = Posts.user_id WHERE `email` = '". $_COOKIE['user'] ."'";
      // echo $sql;
      $result = $mysqli->query($sql); ?>

      <?php
      while($post = $result -> fetch_array(MYSQLI_ASSOC)){
        echo "<br>".$post['caption']."<br>";

        echo '<img width="200px" src="uploads/'.$post['image'].'"/>';
          // echo "<br>".$post['caption']."<br>
          // ".$post['image']."<br>";
          // // .$post['id'];
          echo '<a href="deletepost.php?post='.$post['id'].'">Delete</a>'."<br>";


        }
      ?>

    <?php include("includes/scripts.php");
      include("includes/footer.php"); ?>
    </div>
  </body>
</html>
