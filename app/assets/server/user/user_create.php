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

  $sqlEmail = "SELECT * FROM user WHERE email='$Email'";
  $result = mysqli_query($con, $sqlEmail);

  if ($Password == $RePassword && mysqli_num_rows($result) == 0) {
    $sqlInsertUser= "INSERT INTO user(name, email, password, sex, job,picture, birthdate, namePay, cardNumber, packageID, expDate, SID, activate)
            VALUES ('$Name','$Email','$Password','-','','','','','','0','', '$SessionID' ,'No')";
    $result = mysqli_query($con, $sqlInsertUser) or die ("Error in query: $sqlInsertUser" . mysqli_error());

    $uid = mysqli_insert_id($con);
    $Message = "
    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
    <!-- If you delete this meta tag, Half Life 3 will never be released. -->
    <meta name='viewport' content='width=device-width' />

    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>ZURBemails</title>

    <style media='screen'>
      /* -------------------------------------
          GLOBAL
      ------------------------------------- */
      * {
        margin:0;
        padding:0;
      }
      * { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

      img {
        max-width: 100%;
      }
      .collapse {
        margin:0;
        padding:0;
      }
      body {
        -webkit-font-smoothing:antialiased;
        -webkit-text-size-adjust:none;
        width: 100%!important;
        height: 100%;
      }


      /* -------------------------------------
          ELEMENTS
      ------------------------------------- */
      a { color: #2BA6CB;}

      .btn {
        text-decoration:none;
        color: #FFF;
        background-color: #666;
        padding:10px 16px;
        font-weight:bold;
        margin-right:10px;
        text-align:center;
        cursor:pointer;
        display: inline-block;
      }

      p.callout {
        padding:15px;
        background-color:#ECF8FF;
        margin-bottom: 15px;
      }
      .callout a {
        font-weight:bold;
        color: #2BA6CB;
      }

      table.social {
      /* 	padding:15px; */
        background-color: #ebebeb;

      }
      .social .soc-btn {
        padding: 3px 7px;
        font-size:12px;
        margin-bottom:10px;
        text-decoration:none;
        color: #FFF;font-weight:bold;
        display:block;
        text-align:center;
      }
      a.fb { background-color: #3B5998!important; }
      a.tw { background-color: #1daced!important; }
      a.gp { background-color: #DB4A39!important; }
      a.ms { background-color: #000!important; }

      .sidebar .soc-btn {
        display:block;
        width:100%;
      }

      /* -------------------------------------
          HEADER
      ------------------------------------- */
      table.head-wrap { width: 100%;}

      .header.container table td.logo { padding: 15px; }
      .header.container table td.label { padding: 15px; padding-left:0px;}


      /* -------------------------------------
          BODY
      ------------------------------------- */
      table.body-wrap { width: 100%;}


      /* -------------------------------------
          FOOTER
      ------------------------------------- */
      table.footer-wrap { width: 100%;	clear:both!important;
      }
      .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
      .footer-wrap .container td.content p {
        font-size:10px;
        font-weight: bold;

      }


      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,h2,h3,h4,h5,h6 {
      font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
      }
      h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

      h1 { font-weight:200; font-size: 44px;}
      h2 { font-weight:200; font-size: 37px;}
      h3 { font-weight:500; font-size: 27px;}
      h4 { font-weight:500; font-size: 23px;}
      h5 { font-weight:900; font-size: 17px;}
      h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

      .collapse { margin:0!important;}

      p, ul {
        margin-bottom: 10px;
        font-weight: normal;
        font-size:14px;
        line-height:1.6;
      }
      p.lead { font-size:17px; }
      p.last { margin-bottom:0px;}

      ul li {
        margin-left:5px;
        list-style-position: inside;
      }

      /* -------------------------------------
          SIDEBAR
      ------------------------------------- */
      ul.sidebar {
        background:#ebebeb;
        display:block;
        list-style-type: none;
      }
      ul.sidebar li { display: block; margin:0;}
      ul.sidebar li a {
        text-decoration:none;
        color: #666;
        padding:10px 16px;
      /* 	font-weight:bold; */
        margin-right:10px;
      /* 	text-align:center; */
        cursor:pointer;
        border-bottom: 1px solid #777777;
        border-top: 1px solid #FFFFFF;
        display:block;
        margin:0;
      }
      ul.sidebar li a.last { border-bottom-width:0px;}
      ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



      /* ---------------------------------------------------
          RESPONSIVENESS
          Nuke it from orbit. It's the only way to be sure.
      ------------------------------------------------------ */

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display:block!important;
        max-width:600px!important;
        margin:0 auto!important; /* makes it centered */
        clear:both!important;
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        padding:15px;
        max-width:600px;
        margin:0 auto;
        display:block;
      }

      /* Let's make sure tables in the content area are 100% wide */
      .content table { width: 100%; }


      /* Odds and ends */
      .column {
        width: 300px;
        float:left;
      }
      .column tr td { padding: 15px; }
      .column-wrap {
        padding:0!important;
        margin:0 auto;
        max-width:600px!important;
      }
      .column table { width:100%;}
      .social .column {
        width: 280px;
        min-width: 279px;
        float:left;
      }

      /* Be sure to place a .clear element after each set of columns, just to be safe */
      .clear { display: block; clear: both; }


      /* -------------------------------------------
          PHONE
          For clients that support media queries.
          Nothing fancy.
      -------------------------------------------- */
      @media only screen and (max-width: 600px) {

        a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

        div[class='column'] { width: auto!important; float:none!important;}

        table.social div[class='column'] {
          width:auto!important;
        }

      }
    </style>

    </head>

    <body bgcolor='#FFFFFF'>

    <!-- HEADER -->
    <table class='head-wrap' bgcolor='#2c3e50'>
      <tr>
        <td></td>
        <td class='header container' >

            <div class='content'>
            <table bgcolor='#2c3e50'>
              <tr>
              <td><div style='text-align: center;'><img src='https://www.img.in.th/images/580f6d955bd1a30263dd17f2786218ea.jpg' /></div></td>
              </tr>
            </table>
            </div>

        </td>
        <td></td>
      </tr>
    </table><!-- /HEADER -->


    <!-- BODY -->
    <table class='body-wrap'>
      <tr>
        <td></td>
        <td class='container' bgcolor='#FFFFFF'>

          <div class='content'>
          <table>
            <tr>
              <td>
                <h3>สวัสดี, $Name</h3>
                <p class='lead'>ขอบคุณ, คุณ $Name ที่เลือกใช้ Alist todolist ที่ดีที่สุดในโลก</p>
                <p>Alist นั้นมีแพคเกจในการใช้งานอยู่ 2 รูปแบบคือ Basic และ Pro คุณสามารถเลือกใช้งานเพื่อให้เหมาะกับการใช้งานของคุณได้ <a href='http://localhost/alist/app/price.html' target='_blank'>ดูรายละเอียดเพิ่มเติม</a></p>
                <!-- Callout Panel -->
                <p class='callout'>
                  การยืนยันการสมัครสมาชิก สามารถยืนยันได้โดยการคลิกลิงก์ที่แนบมาข้างๆ ขอให้มีความสุขกับการใช้ Alist <a href='http://localhost/alist/app/assets/server/user/user_activate.php?sid=" . session_id() . "&uid=" . $uid . "' target='_blank'>ยืนยันการสมัครสมาชิก &raquo;</a>
                </p><!-- /Callout Panel -->

              </td>
            </tr>
          </table>
          </div><!-- /content -->

        </td>
        <td></td>
      </tr>
    </table><!-- /BODY -->

    <!-- FOOTER -->
    <table class='footer-wrap'>
      <tr>
        <td></td>
        <td class='container'>

            <!-- content -->
            <div class='content'>
            <table>
            <tr>
              <td align='center'>
                <p>
                  <a href='#'>Terms</a> |
                  <a href='#'>Privacy</a> |
                  <a href='#'><unsubscribe>Unsubscribe</unsubscribe></a>
                </p>
              </td>
            </tr>
          </table>
            </div><!-- /content -->

        </td>
        <td></td>
      </tr>
    </table><!-- /FOOTER -->

    </body>
    </html>
    ";

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
    $mail->msgHTML("$Message");
    if (!$mail->send()) {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo "Message sent!";
    }

    mysqli_close($con);
    session_destroy();


  }
 ?>
