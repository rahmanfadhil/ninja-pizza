<?php

  include './config/db_connect.php';

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
    <div class="row mb-3">
      <?php foreach ($pizzas as $pizza) : ?>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                <?= htmlspecialchars($pizza['title']) ?>
              </h5>
              <p class="card-text">
                <?php foreach (explode(',', $pizza['ingredients']) as $ingredient) : ?>
                  <li><?= htmlspecialchars($ingredient) ?></li>
                <?php endforeach ?>
              </p>
              <a href="details.php?id=<?= $pizza['id'] ?>" class="btn btn-primary">
                More info
              </a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

    <?php if (count($pizzas) >= 3): ?>
      <p>There are 3 or more pizzas</p>
    <?php else: ?>
      <p>There are less than 3 pizzas</p>
    <?php endif ?>
  </div>

  <?php include "./templates/footer.php" ?>

</html>