<?php

  $email = $title = $ingredients = '';

  $errors = [
    'email' => '',
    'title' => '',
    'ingredients' => ''
  ];

  if (isset($_POST['submit'])) {
    // Check email
    if (empty($_POST['email'])) {
      $errors['email'] = 'Email is required!';
    } else {
      $email = $_POST['email'];

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email not valid!';
      }
    }

    // Check title
    if (empty($_POST['title'])) {
      $errors['title'] = 'Title is required!';
    } else {
      $title = $_POST['title'];

      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Title must be letters and spaces only!';
      }
    }

    // Check ingredients
    if (empty($_POST['ingredients'])) {
      $errors['ingredients'] = 'At least one ingredient is required!';
    } else {
      $ingredients = $_POST['ingredients'];

      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $errors['ingredients'] = 'Ingredients must be a comma seperated list!';
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
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo htmlspecialchars($email) ?>">
        <small class="form-text text-danger"><?php echo $errors['email']; ?></small>
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter pizza title" value="<?php echo htmlspecialchars($title) ?>">
        <small class="form-text text-danger"><?php echo $errors['title']; ?></small>
      </div>
      <div class="form-group">
        <label for="ingredients">Ingredients:</label>
        <input type="text" class="form-control" id="ingredients" name="ingredients" placeholder="Enter pizza title" value="<?php echo htmlspecialchars($ingredients) ?>">
        <small class="form-text text-danger"><?php echo $errors['ingredients']; ?></small>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <?php include "./templates/footer.php" ?>

</html>
