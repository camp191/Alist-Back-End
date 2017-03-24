<?php
    include '../connection.php';
    $email = $_POST['email'];
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        echo "<span class='fa fa-exclamation-circle'></span> อีเมล์นี้มีการใช้ไปแล้ว กรุณาใช้อีเมล์อื่น";
    } else {
        echo "<span style='color:#00CAC5; font-size: 1em'><span class='fa fa-check-circle-o'></span> คุณสามารถใช้อีเมล์นี้สมัครได้</span>";
    }
?>