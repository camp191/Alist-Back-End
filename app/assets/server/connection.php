<?php

$con = mysqli_connect("localhost","root","123","alistdb") or die("Error: " . mysqli_error($con));
$encode = mysqli_query($con, "SET NAMES UTF8");

 ?>
