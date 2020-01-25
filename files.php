<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>files</title>
    <?php include("includes/head.php"); ?>
    <?php
    $form_name = "";
    $form_file = "";




    include("includes/dbclass.php");
    include("includes/navbar.php");

    // echo $result->num_rows.' found';

    ?>
  </head>
  <body>
    <div class="container">
      <h1>Upload Your Pet's Documents</h1>
      <p>Upload anything from vet bills to vaccination documents!</p>
      <div class="row">

        <div class="col-6">
          <form action="process/files.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="form_name">Form Name</label>
              <input type="text" class="form-control" id="form_name" name="form_name" placeholder="Enter Form Name" value="<?php echo $form_name; ?>">
            </div>

    <div class="form-group">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </div>



            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

<?php include("includes/scripts.php");
include("includes/footer.php"); ?>
  </body>
</html>
