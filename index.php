<?php

  $conn = mysqli_connect('127.0.0.1', 'root', '12345', 'ninja_pizza');

  if (!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error() ;
  }

  // Write query for all pizzas
  $sql = 'SELECT id, title, ingredients FROM pizzas ORDER BY created_at';

  // Make query & get result
  $result = mysqli_query($conn, $sql);

  // Fetch the result as an array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Free result from memory
  mysqli_free_result($result);

  // Close connection
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

  <?php include "./templates/header.php" ?>

  <div class="container my-5">
    <h1 class="mb-3">Pizzas</h1>
    <div class="row">
      <?php foreach ($pizzas as $pizza) : ?>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($pizza['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($pizza['ingredients']) ?></p>
              <a href="#" class="btn btn-primary">More info</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>

  <?php include "./templates/footer.php" ?>

</html>