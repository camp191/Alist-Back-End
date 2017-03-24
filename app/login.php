<?php
    session_start();
    $name = $_SESSION["name"];

    if(isset($name)){
        include './assets/server/connection.php';
        $query = "SELECT * FROM user" or die("Error:" . mysqli_error());
        $result = mysqli_query($con, $query);
        echo "<h1>Hello " . $name . "</h1>";
    } else {
        header("Location: index.php");
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport " content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alist | <?php $name; ?> </title>
</head>
<body>
    <form method="post" onsubmit="return true" action="./assets/server/user/user_logout.php">
        <button type="submit">Log Out</button>
    </form>  
</body>
</html>
