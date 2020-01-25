<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <?php include("includes/head.php"); ?>
    <?php
    $pet_name = "";
    $pet_age = "";
    $pet_gender = "";
    $pet_species = "";
    $pet_birthday = "";
    $pet_photo = "";



    include("includes/database.php");
    include("includes/navbar.php");

    $sql = "SELECT * FROM `users` JOIN `profile` ON users.id = profile.user_id WHERE `email` = '". $_COOKIE['user'] ."'";

    $result = $mysqli->query($sql);
    // echo $result->num_rows.' found';

    ?>
  </head>
  <body>
    <div class="container">
      <h1>Your Pet's Information</h1>
      <div class="row">

        <div class="col-6">
          <form action="process/profile.php" method="post">
            <div class="form-group">
              <label for="pet_name">Pet Name</label>
              <input type="text" class="form-control" id="pet_name" name="pet_name" placeholder="Enter Pet Name" value="<?php echo $pet_name; ?>">
            </div>

            <div class="form-group">
              <label for="pet_age">Pet Age</label>
              <input type="text" class="form-control" id="pet_age" name="pet_age" placeholder="Enter Pet Age"  value="<?php echo $pet_age; ?>">
            </div>

            <div>
            <label for="pet_gender">Pet Gender</label><br>
            <input type="checkbox" name="pet_gender" value="<?php echo "$pet_gender"; ?>" checked>Male<br>
            <input type="checkbox" name="pet_gender" value="<?php echo $pet_gender; ?>">Female<br>
            </div>
            <br>

            <div class="form-group">
              <label for="state">Pet Species</label>
              <input type="text" class="form-control" id="pet_species" name="pet_species" placeholder="Pet Species"  value="<?php echo $pet_species; ?>">
            </div>

            <div class="form-group">
              <label for="state">Pet Birthday</label>
              <input type="text" class="form-control" id="pet_birthday" name="pet_birthday" placeholder="5/30"  value="<?php echo $pet_birthday; ?>">
            </div>

            <div class="form-group">
              <label for="state">Pet Photo</label>
              <input type="text" class="form-control" id="pet_photo" name="pet_photo" placeholder="Pet Photo"  value="<?php echo $pet_photo; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

<?php include("includes/scripts.php");
include("includes/footer.php");  ?>
  </body>
</html>
