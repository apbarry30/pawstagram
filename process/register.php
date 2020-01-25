<?php
//
// Store the variables from the POST request
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

include("../includes/dbclass.php");

if($firstName==""){
  die("name must be specified!");
}
 // include("../includes/dbclass.php");

$tablename = "users";
$columndata =['id' => "NULL",
              'first_name' => $firstName,
              'last_name' => $lastName,
              'email' => $email,
              'password' => $password,
              'created_date' => "CURRENT_TIMESTAMP"];
 //insert our parameters
 $db= new database();
 $result = $db->insert($tablename, $columndata);
// CREATE a new record


// First, we need a query...Paste the query we copied from phpmyadmin and replace the values with our variables
// $sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_date`) VALUES (NULL, '$firstName', '$lastName', '$email', '$password', CURRENT_TIMESTAMP)";
// Print the sql to debug

//die();
// https://www.php.net/manual/en/mysqli.query.php
/* Select queries return a result. On insert, returns 1 or 0 (TRUE or FALSE)  */

if ($result) {
 echo " we were able to create the record for ". $email;
 //here we can also do some additional logic.
 //for example, send them to the login page and display a message
    header("location: ../login.php?action=registrationcomplete");
} else {
  var_dump ($db->errors);
  echo "something went wrong ";
  // echo $mysqli->error;
  header("location: ../registration.php?action=registrationerror&error".$mysqli->error);
}
// close the connection once we are finished with our queries
// $mysqli->close();
?>
