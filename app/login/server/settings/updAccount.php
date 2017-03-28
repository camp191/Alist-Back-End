<?php
    session_start();
    $id = $_SESSION["id"];
    $FSName = $_REQUEST["FSName"];
    $Sex = $_REQUEST["Sex"];
    $Job = $_REQUEST["Job"];
    $Bdate = $_REQUEST["date"];
    $Picture = $_FILES["Picture"]["name"];
    echo "<script>";
    echo "alert('$Picture')";
    echo "</script>";

    include "./../../../assets/server/connection.php";

    if($Picture == ''){
        $updSQL = "UPDATE user SET name='$FSName', sex='$Sex', job='$Job', birthdate='$Bdate' WHERE id='$id'";
    }

    if($Picture != ''){
        $pictureName = $_FILES["Picture"]["name"];
	    $picture_basename = substr($pictureName, 0, strripos($pictureName, '.')); 
	    $picture_ext = substr($pictureName, strripos($pictureName, '.'));

        // Rename file
		$newfilename = $id . $picture_ext;
        $targetFile = "./../../upload/images/" . $newfilename;
		$check = move_uploaded_file($_FILES["Picture"]["tmp_name"], $targetFile );
        echo "<script>";
        echo "alert('Update Success');";
        echo "</script>";

        $updSQL = "UPDATE user SET name='$FSName', sex='$Sex', job='$Job', birthdate='$Bdate', picture='$newfilename' WHERE id='$id'";	
    } else {
        $check=true;
    }

    $result = mysqli_query($con, $updSQL);

    
    if($result && $check){
        mysqli_close($con);
        header("Location: ./../../setting.php?stage=done");
    }






?>