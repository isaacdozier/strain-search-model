<?php

define('ROOT', __DIR__ .'/');

$con = mysqli_connect("localhost","root","","strain_lib");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>