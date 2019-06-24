<?php

  // if (isset($_POST['submit'])) {
  //   echo $_POST['email'];
  //   echo $_POST['title'];
  //   echo $_POST['ingredients'];
  // }

  if (isset($_POST['submit'])) {
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);

    // Check email
    if (empty($_POST['email'])) {
      echo 'Email is required! <br />';
    } else {
      $email = $_POST['email'];

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Email not valid! <br />';
      }
    }

    // Check title
    if (empty($_POST['title'])) {
      echo 'Title is required! <br />';
    } else {
      $title = $_POST['title'];

      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        echo 'Title must be letters and spaces only <br />';
      }
    }

    // Check ingredients
    if (empty($_POST['ingredients'])) {
      echo 'At least one ingredient is required! <br />';
    } else {
      $ingredients = $_POST['ingredients'];

      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        echo 'Ingredients must be a comma seperated list <br />';
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

  <?php include "./templates/header.php" ?>

  <div class="container my-5">
    <h4 class="mb-3">Create a Pizza</h4>
    <form action="add.php" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter pizza title">
      </div>
      <div class="form-group">
        <label for="ingredients">Ingredients:</label>
        <input type="text" class="form-control" id="ingredients" name="ingredients" placeholder="Enter pizza title">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <?php include "./templates/footer.php" ?>

</html>
