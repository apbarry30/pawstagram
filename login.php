<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
  <!-- <?php include("includes/navbar.php"); ?> -->
    <div class="jumbotron">
  <h1 class="display-4">Pawstagram</h1>
  <p class="lead">This app is exclusively for pet posts!
  </p>
  <hr class="my-4">
  <p>Share adorable photos of your pet for the world to see!</p>
  <a class="btn btn-primary btn-lg" href="registration.php" role="button">Sign up today!</a>
</div>
    <div class="container">
      <!-- Content here -->
      <div class="row">

        <?php
        //this message comes from registration
        if(isset($_GET['action'])) {
          if($_GET['action'] == "registrationcomplete") {
            echo "<p class=\"col-12\"><strong>Your registration has been completed. You may login.</strong></p>";
          }
        }
         ?>

        <div class="col-6">
          <form action="process/login.php" method="post">

            <div class="form-group">
              <h2>Login</h2>
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="col-6">
          <h2>Don't have an account?</h2>
          <p><a href="registration.php">Create one!</a> </p>
        </div>
      </div>
    </div>

<?php include("includes/scripts.php"); ?>
  </body>
</html>
