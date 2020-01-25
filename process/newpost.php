<?php
//
// Store the variables from the POST request

$caption = $_POST['caption'];
$user_id = 0;

include("../includes/database.php");


$target_dir = "../uploads/";
//this is where the photos are going to go. this directory must EXIST and must be writable
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$tmpFilename =  microtime().".".$imageFileType;
$target_file = $target_dir .$tmpFilename;

$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// // Check if file already exists- we dont need this- ppl might have same filename and they will overwrite eacho other

// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



//
$sql = "SELECT * FROM `users` WHERE `email` = '".$_COOKIE['user']."'";

$result = $mysqli->query($sql);
echo $result->num_rows.' found';

while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo $user['email']." ".$user['id']."<br>";
  $user_id = $user['id'];
}
//assign the value to our variable

//perform the query
$sql = "INSERT INTO `Posts` (`id`, `image`, `caption`, `user_id`, `created_date`) VALUES (NULL, '$tmpFilename', '$caption', '$user_id', current_timestamp())";


// Print the sql to debug
print($sql);
//die();
// https://www.php.net/manual/en/mysqli.query.php
/* Select queries return a result. On insert, returns 1 or 0 (TRUE or FALSE)  */

if ( $result = $mysqli->query($sql) ) {
 echo " we were able to create a post for ". $_COOKIE['user'];
header("location: ../feed.php");
} else {
  echo "something went wrong ";
  echo $mysqli->error;

}
// close the connection once we are finished with our queries
$mysqli->close();
?>
