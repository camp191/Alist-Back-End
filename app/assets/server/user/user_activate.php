<?php
  include '../connection.php';

  $sql = "SELECT * FROM user WHERE SID = '" . trim($_GET['sid']) . "' AND id = '" . trim($_GET['uid'])."'";
  $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

  $fetchResult = mysqli_fetch_array($result);

  if(!$fetchResult) {
    header('Location: http://localhost/alist/app/activate_notdone.html');
  } else {
    $updateSQL = "UPDATE user SET activate = 'Yes'  WHERE SID = '" . trim($_GET['sid']) . "' AND id = '" . trim($_GET['uid']) . "'";
    $upQuery = mysqli_query($con ,$updateSQL);
    header('Location: http://localhost/alist/app/activate_done.html');
  }
?>
