<?php

  $conn = mysqli_connect('127.0.0.1', 'root', '12345', 'ninja_pizza');

  if (!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error() ;
  }

  // Write query for all pizzas
  $sql = 'SELECT id, title, ingredients FROM pizzas';

  // Make query & get result
  $result = mysqli_query($conn, $sql);

  // Fetch the result as an array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  print_r($pizzas);
?>

<!DOCTYPE html>
<html lang="en">

  <?php include "./templates/header.php" ?>

  <div class="container my-5">
    <h1>Hello world!</h1>
  </div>

  <?php include "./templates/footer.php" ?>

</html>