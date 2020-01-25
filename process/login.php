<?php
//
// Store the variables from the POST request
$email = $_POST['email'];
$password = $_POST['password'];

include("../includes/dbclass.php");

// CREATE a new record

// First, we need a query...Paste the query we copied from phpmyadmin and replace the values with our variables
$sql = "SELECT *  FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";// Print the sql to debug
//print($sql);
//die();
// https://www.php.net/manual/en/mysqli.query.php
/* Select queries return a result. On insert, returns 1 or 0 (TRUE or FALSE)  */
//using the new class
$db = new database(); //initialize the class

//initialize variables
$columns="*";
$tableName="users";
$filters=["email" => $email, "password" => $password];
$result = $db->query($columns, $tableName, $filters);


//if ( $result = $mysqli->query($sql) ) {

  if($result->num_rows == 1) {
    setcookie("user", $email, time()+3600, '/');
    header("location: ../users.php");
  } else {
    echo "user not found. check your password and try again.!!!!!";
  }

// } else {
//   echo "lost connection ";
//   echo $mysqli->error;}

// close the connection once we are finished with our queries
// $mysqli->close();
?>
