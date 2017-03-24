<?php
    session_start();
    $email = $_REQUEST["email"];
    $password = MD5($_REQUEST["password"]);

    include '../connection.php';

    $query = "SELECT * FROM user WHERE email='$email' and password='$password'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) == 0){
      echo "<script>";
      echo "alert('Hello')";
      echo "</script>";
    } else {
      $row = mysqli_fetch_array($result);
      $_SESSION["name"] = $row["name"];
      header("Location: ./../../../login.php");
      exit();
    }
    mysqli_close($con);

?>