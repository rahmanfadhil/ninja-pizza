<!DOCTYPE html>
<html lang="en">

  <?php include "./templates/header.php" ?>

  <div class="container my-5">
    <h4 class="mb-3">Create a Pizza</h4>
    <form action="" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter pizza title">
      </div>
      <div class="form-group">
        <label for="ingredients">Ingredients:</label>
        <input type="text" class="form-control" id="ingredients" name="ingredients" placeholder="Enter pizza title">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <?php include "./templates/footer.php" ?>

</html>
