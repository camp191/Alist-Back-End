<?php
  include '../connection.php';
  include './../../../../vendor/autoload.php';

  date_default_timezone_set('Asia/Bangkok');
  session_start();

  $Name = $_REQUEST["name"];
  $Email = $_REQUEST["email"];
  $Password = md5($_REQUEST["password"]);
  $RePassword = md5($_REQUEST["re-password"]);
  $SessionID = session_id();

  if ($Password == $RePassword) {
    $sql= "INSERT INTO user(name, email, password, job, birthdate, subStatus, payment, packageID, expDate, SID, activate)
            VALUES ('$Name','$Email','$Password','','','No','','','', '$SessionID' ,'No')";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql" . mysqli_error());

    $uid = mysqli_insert_id($con);
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 3;
    $mail->Debugoutput = 'html';
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "595159090009@dpu.ac.th";
    $mail->Password = "1539900392497";
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('noreply@alist.com', 'Alist');
    $mail->addAddress("$Email", 'Alist');
    $mail->Subject = 'ยืนยันการสมัครสมาชิก Alist.com';
    $mail->msgHTML("http://localhost/alist/app/assets/server/user/user_activate.php?sid=".session_id()."&uid=".$uid."<br>");
    if (!$mail->send()) {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo "Message sent!";
    }

    mysqli_close($con);
    session_destroy();


  }
 ?>
