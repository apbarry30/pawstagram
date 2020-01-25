<?php include("secure.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>post</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
    <?php include("includes/navbar.php"); ?>


    <div class="container">
      <!-- Content here -->
      <div class="row">

            <div class="col-6">
              <form action="process/newpost.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="caption">Caption</label>
                  <textarea class="form-control" id="caption" name="caption" placeholder="Caption"></textarea>
                </div>
            <div class="form-group">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </div>


            <!-- <div class="form-group">
              <label for="image">Image</label>
              <input type="text" class="form-control" id="image" name="image" placeholder="Enter Image">
            </div>

            <div class="form-group">
              <label for="caption">Caption</label>
              <textarea class="form-control" id="caption" name="caption" placeholder="Caption"></textarea>
            </div> -->

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

      </div>
    </div>

<?php include("includes/scripts.php");
include("includes/footer.php");
 ?>

  </body>
</html>
