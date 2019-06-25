<?php

  $conn = mysqli_connect('127.0.0.1', 'root', '12345', 'ninja_pizza');

  if (!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error() ;
  }