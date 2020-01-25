<?php include("includes/database.php");
$sql = "DELETE FROM `Posts` WHERE `id` = ".$_GET['post'];
$result = $mysqli->query($sql);
var_dump($result);
header("location: users.php");
?>
