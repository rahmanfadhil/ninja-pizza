<?php

  include './config/db_connect.php';

  if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
      header('Location: index.php');
    } else {
      echo 'Query Error: ' . mysqli_error($conn);
    }
  }

  // Check get request id parameter
  if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // Get query result
    $result = mysqli_query($conn, $sql);

    // Fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html lang="en">

  <?php include "./templates/header.php" ?>

  <div class="container my-5">
    <?php if ($pizza): ?>
      <h1><?= htmlspecialchars($pizza['title']) ?></h4>
      <p>Created by: <?= htmlspecialchars($pizza['email']) ?></p>
      <p>Created at: <?= htmlspecialchars($pizza['created_at']) ?></p>
      <h5>Ingredients: <?= htmlspecialchars($pizza['ingredients']) ?></h5>

      <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?= $pizza['id'] ?>">
        <input type="submit" name="delete" class="btn btn-danger" value="Delete">
      </form>
    <?php else: ?>
      <h1>No such pizza exist!</h1>
    <?php endif ?>
  </div>

  <?php include "./templates/footer.php" ?>

</html>