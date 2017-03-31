<?php
    session_start();
    include "./../../../assets/server/connection.php";

    $id = $_SESSION["id"];
    $topic = $_REQUEST["topicContact"];
    $messageType = $_REQUEST["typeContact"];
    $message = $_REQUEST["messageContact"];
    
    if($topic == '' || $message == ''){
        mysqli_close($con);
        header("Location: ./../../contact.php?contact=notfull");
        exit();
    } else {
        $sqlInsertContact = "INSERT INTO contact(topic,messageType,message,id) VALUES ('$topic','$messageType','$message','$id')";
        $result = mysqli_query($con, $sqlInsertContact);

        if($result){
            mysqli_close($con);
            header("Location: ./../../contact.php?contact=done");
            exit();
        } else {
            mysqli_close($con);
            header("Location: ./../../contact.php?contact=fail");
            exit();
        }
    }
?>