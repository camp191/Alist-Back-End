<?php
  include '../connection.php';

  $sql = "SELECT * FROM user WHERE SID = '" . trim($_GET['sid']) . "' AND id = '" . trim($_GET['uid'])."'";
  $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

  $fetchResult = mysqli_fetch_array($result);

  if(!$fetchResult) {
    echo "Activate Invalid !";
  } else {
    $updateSQL = "UPDATE user SET activate = 'Yes'  WHERE SID = '" . trim($_GET['sid']) . "' AND id = '" . trim($_GET['uid']) . "'";
    $upQuery = mysqli_query($con ,$updateSQL);
    echo "Activate Successfully !";
  }
?>
