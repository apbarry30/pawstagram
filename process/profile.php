<?php
//
// Store the variables from the POST request
$pet_name = $_POST['pet_name'];
$pet_age = $_POST['pet_age'];
$pet_gender = $_POST['pet_gender'];
$pet_species = $_POST['pet_species'];
$pet_birthday = $_POST['pet_birthday'];
$pet_photo = $_POST['pet_photo'];
$user_id = 0;

include("../includes/dbclass.php");

$db = new database();

// $sql = "SELECT * FROM `users` WHERE `email` = '".$_COOKIE['user']."'";

// $result = $mysqli->query($sql);
// echo $result->num_rows.' found';


while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo $user['email']." ".$user['id']."<br>";
  $user_id = $user['id'];
}

// $sql = "SELECT * FROM `users` JOIN `profile` ON users.id = profile.user_id WHERE `email` = '". $_COOKIE['user'] ."'";
//
// $result = $mysqli->query($sql);
// echo $result->num_rows.' found';

            $columns = "user_id";
            $tablename = "profile";
            $filters = ["user_id" => $user_id];
            $result = $db->query($columns, $tablename, $filters);


$sql = "SELECT * FROM `profile` WHERE  `user_id` ='".$user_id."'"
var dump($result->num_rows);
die();

$tablename = `profile`;
$columndata =[
              'pet_name' => $pet_name,
              'pet_age' => $pet_age,
              'pet_gender' => $pet_gender,
              'pet_species' => $pet_species,
              'pet_birthday' => $pet_birthday,
              'pet_photo' => $pet_photo,
              'user_id' => $user_id,
            ];


if(isset($result->num_rows) && ($result->num_rows==0)) {
  //this is going to be an update
  // $sql = "UPDATE `profile` SET `pet_name` = '$pet_name',`pet_age` = '$pet_age', `pet_gender` = '$pet_gender', `pet_species` = '$pet_species',`pet_birthday` = '$pet_birthday', `pet_photo` = '$pet_photo' WHERE `profile`.`id` = $user_id";
  echo "will do insert<br>";
  $result = $db->insert($tablename, $columndata);
  } else {
  echo "will do update<br>";
  $result = $db->update($columndata,$tablename, $filters);
  }
  die();

  $result = $mysqli->query($sql);
  echo $result->num_rows. 'found';
  while($user= $result->fetch_array(MYSQLI_ASSOC)){
  // var_dump($users);
  echo $user['email']." ".$user['id']."<br>";
  $user_id = $user['id'];
}
  /*new record
  /First, we need a query...Paste the query we copied from phpmyadmin and replace the values with our variables*/
  $sql = "INSERT INTO `profile` (`id`, `pet_name`, `pet_age`, `pet_gender`, `pet_species`, `pet_birthday`, `pet_photo`, `user_id`) VALUES (NULL, '$pet_name', '$pet_age', '$pet_gender', '$pet_species', '$pet_birthday', '$pet_photo', '$user_id')";



// Print the sql to debug
    print($sql);

    if ($result= $mysqli->query($sql)){
      echo "we were able to create the record for ". $email;
    }else{
      echo "something went wrong";
      echo $mysqli->error;
    }

    //close connection once finished with queries
    $mysqli->close();
// https://www.php.net/manual/en/mysqli.query.php
/* Select queries return a result. On insert, returns 1 or 0 (TRUE or FALSE)  */
// if ( $result = $mysqli->query($sql) ) {
//  echo " we were able to create the profile for ". $_COOKIE['user'];
//  header("location: ../users.php");
// } else {
//   echo "something went wrong ";
//   echo $mysqli->error;
// }
// // close the connection once we are finished with our queries
// $mysqli->close();
?>
