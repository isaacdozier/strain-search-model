<?php

// Declare connection
$con = mysqli_connect("localhost:8012","root","","strain_lib");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>