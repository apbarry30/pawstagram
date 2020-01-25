
<?php include("secure.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
    <?php include("includes/navbar.php"); ?>
    <div class="container">
<?php
include("includes/database.php");

$sql = "SELECT * FROM `users` WHERE false = false";

$result = $mysqli->query($sql);
// echo $result->num_rows.' found';
// while($user = $result->fetch_array(MYSQLI_ASSOC)) {
//   echo $user['first_name']." ".$user['last_name']."<br>";
// }
?>
<h1>Your Profile</h1>

<?php
// if(isset($_COOKIE['user']) && ($_COOKIE['user'] != '')) {
//   header("location: ../feed/index.php");
// }
//$sql = "SELECT * FROM `users` WHERE `email` = '". $_COOKIE['user'] ."'";
$sql = "SELECT * FROM `users` JOIN `profile` ON users.id = profile.user_id WHERE `email` = '". $_COOKIE['user'] ."'";
// echo $sql;
$result = $mysqli->query($sql);
// echo $result->num_rows.' found';
//if we have 1 user
if($result->num_rows) {
  ?>


  <?php
  }
  else {
    ?>
    <p>It seems you don't have a profile ...<a href="profile.php">Create Profile</a></p>
    <?php
  }


while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo "<br>".$user['first_name']." ".$user['last_name']."<br><h2>Your Pet:</h2>".$user['pet_name']."<br>"."<br><h3>Pet Age:</h3>".$user['pet_age']."<br>"
  ."<br><h2>Pet gender:</h2>".$user['pet_gender']."<br>"
  ."<br><h2>Pet Birthday:</h2>".$user['pet_birthday']."<br>"
  ."<br><h2>Pet Species:</h2>".$user['pet_species']."<br>";
}

  // ."<br>".$user['id']


//var_dump($result->fetch_array(MYSQLI_ASSOC));

?>


<br>
<a href="profile.php">Edit Profile</a>
<br>
<a href="logout.php">Log out</a>
</div>
<?php include("includes/scripts.php");
include("includes/footer.php"); ?>

</body>
</html>
