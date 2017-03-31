<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Alist || The Best To-Do-List in The World </title>
  <link rel="icon" href="./assets/images/logo.png">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./temp/styles/test.css">

  <?php
  session_start();
  if(isset($_SESSION["id"])){
    header("Location: ./login/index.php");
  }
  ?>

</head>
<body>

  <!-- Logo and Menu -->
  <div class="bg-nav">
    <div class="container">
      <div class="row nav-alist">
        <div class="col-xs-4 col-sm-2 col-xs-0">
          <div class="logo-style">
            <p class="name"><img class="pic" src="./assets/images/logo.png"> Alist</p>
          </div>
        </div>
        <div class="col-xs-8 col-sm-10 col-xs-12 text-right">
          <ul class="nav-menu">
            <li class="menu"><a href="index.php">หน้าแรก</a></li>
            <li class="menu"><a href="price.php">ราคาและโปรโมชั่น</a></li>
            <li class="menu"><a href="#">ทดลองใช้งาน</a></li>
            <li class="menu"><a class="signIn" id="modal-open">เข้าสู่ระบบ</a></li>
          </ul>
          <a class="fa fa-bars hamburgerBtn"></a>
        </div>
        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
      </div>
    </div>
  </div>

  <header>
    <!-- Logo and Menu -->
    <div class="jumbotron-section">
      <div class="container head-page">
        <div class="row">
          <div class="col-xs-12">
            <div class="head text-center">ทดลองใช้งาน</div>
            <div class="subHead text-center">ตัวอย่างโปรแกรมทดลองใช้งานบนเว็บไซต์</div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="app-box">
            <div class="header-App text-center">
              <img class="headerImage" src="./assets/images/logo-app.png" alt="App Logo">
              <h3 class="text-center headerText">Alist <span class="version">v. 0.0.1 Beta</span></h3>
            </div>

            <div class="todo-main">
              <div class="todo-box">
                <div class="col-xs-12 todo-Style">
                  <div class="tabBar">
                    <div class="col-xs-6 text-center tabNotDoneBox">
                      <a class="tabNotDone" href="#">รายการที่ยังไม่ได้ทำ <span class="tag" id="tag">3</span></a>
                    </div>
                    <div class="col-xs-6 text-center tabDoneBox">
                      <a class="tabDone" href="#">รายการที่ทำสำเร็จแล้ว</a>
                    </div>
                  </div>

                  <ul class="todo-notdone">
                    <li class="ndList">ออกไปจ่ายตลาด <a href="#" class="fa fa-check checkIcon doneBtn"></a><a href="#" class="fa fa-trash trashIcon deleteBtn"></a></li>
                    <li class="ndList">เคลียร์งาน RWD <a href="#" class="fa fa-check checkIcon doneBtn"></a><a href="#" class="fa fa-trash trashIcon deleteBtn"></a></li>
                    <li class="ndList">ไปกินข้าวกับแม่ <a href="#" class="fa fa-check checkIcon doneBtn"></a><a href="#" class="fa fa-trash trashIcon deleteBtn"></a></li>
                  </ul>

                  <ul class="todo-done">
                    <li class="ndList">อ่านหนังสือสอบ <a href="#" class="fa fa-trash trashIcon deleteBtn"></a></li>
                    <li class="ndList">ทำกับข้าว <a href="#" class="fa fa-trash trashIcon deleteBtn"></a></li>
                  </ul>

                  <div class="done-box text-center">
                    <h2 class="content">รายการที่ยังไม่ได้ทำหมดแล้ว <br />สามารถเพิ่มรายการที่ต้องทำด้านล่างนี้เลย</h2>
                    <h2 class="fa fa-chevron-down content"></h2>
                  </div>
                </div>
              </div>

              <div class="add-form">
                <form  onsubmit="return false">
                  <fieldset class="col-xs-10 fieldsetStyle">
                    <input class="todoInput" id="todoInput" type="text" placeholder="พิมพ์รายการที่ต้องทำที่นี่เลย">
                  </fieldset>
                  <button class="addBtn col-xs-2" id="addBtn">เพิ่ม</button>
                </form>
                <h4 class="cautionAdd col-xs-12" id="cautionAdd"><span class="fa fa-exclamation-circle"></span> กรุณาใส่รายการที่ต้องการทำ</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer-alist">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-push-6 text-right subscribe-alist">
          <h4 class="subscribeTopic">ติดตามข่าวสารต่างๆและโปรโมชั่น</h4>
          <form onsubmit="return false;">
            <input class="formField" type="text" placeholder="อีเมล์" id="email-subscribe">
            <button class="subscribeBtn">ติดตามข่าวสาร</button>
          </form>
        </div>
        <div class="col-sm-6 col-sm-pull-6 contact">
            <div class="logo-style">
              <p class="name"><img class="pic" src="./assets/images/logo.png"> Alist</p>
            </div>
          <ul class="iconSet">
            <li><a class="icon" href="##"><span class="fa fa-facebook-square"></span></a></li>
            <li><a class="icon" href="#"><span class="fa fa-twitter-square"></span></a></li>
            <li><a class="icon" href="#"><span class="fa fa-instagram"></span></a></li>
            <li><a class="icon" href="#"><span class="fa fa-github"></span></a></li>
          </ul>
          <h4 class="copyright">© 2016 All rights reserved. Alist, Inc.</h4>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modal Background -->
  <div class="modal-bg"></div>

  <!-- Modal Sign In Box -->
  <div class="modal-signin">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="form">
            <div class="headerForm" id="headerSignInBox">
              <h3 class="text-center headerSignIn">เข้าสู่ระบบ</h3>
              <a href="#"><span class="fa fa-close closeIcon" id="modal-close"></span></a>
            </div>
            <form class="formMain" onsubmit="return true" action="./assets/server/user/user_login.php" method="post">
              <div class="cautionSignIn-box">
                <h4 class="cautionSignIn" id="cautionSignIn-formFill"><span class="fa fa-exclamation-circle"></span> กรุณาข้อมูลให้ครบทุกช่อง</h4>
                <h4 class="cautionSignIn" id="cautionSignIn-email"><span class="fa fa-exclamation-circle"></span> กรุณาใส่อีเมล์ให้ถูกต้อง</h4>
                <h4 class="cautionSignIn" id="cautionSignIn-password"><span class="fa fa-exclamation-circle"></span> กรุณาใส่รหัสผ่านให้ถูกต้อง ความยาว 4-10 ตัวอักษร</h4>
              </div>
              <fieldset>
                <div class="row">
                  <div class="col-xs-12">
                    <input class="col-xs-12 formField" name="email" id="signin-email" autofocus="autofocus" type="text" placeholder="E-mail">
                  </div>
                </div>
                <div class="row passwordSignIn">
                  <div class="col-xs-12">
                    <input class="col-xs-12 formField" name="password" id="signin-password" type="password" placeholder="รหัสผ่าน">
                  </div>
                </div>
              </fieldset>
              <button class="signinBtn" id="signinBtn">เข้าสู่ระบบ</button>
              <button class="forgetPasswordBtn" id="forgetPasswordBtn">ส่งรหัสผ่านใหม่ไปทางอีเมล์</button>
              <div class="contentBox">
                <p class="forgetPasswordSuccess text-center">ขณะนี้ Alist ได้ส่งรหัสผ่านใหม่ไปยังอีเมล์ <span class="forgetPasswordSuccess" id="forgetPasswordEmailSuccess"></span> เป็นที่เรียบร้อยแล้ว</p>
              </div>
              <h4 class="text-center forgetPassword">ลืมรหัสผ่าน ? <a href="#" id="forget">คลิกที่นี่</a></h4>
              <h4 class="text-center wantToSignIn">ต้องการเข้าสู่ระบบ ? <a href="#" id="signInLink">คลิกที่นี่</a></h4>
              <div class="social">
                <hr>
                <h4 class="text-center signinSocial">เข้าสู่ระบบผ่าน Social Media</h4>
                <button class="fbBtn"><span class="fa fa-facebook-square"></span> เข้าสู่ระบบผ่านระบบ Facebook</button>
                <button class="gplusBtn"><span class="fa fa-google-plus"></span> เข้าสู่ระบบผ่านระบบ Google Plus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Subscribe -->
  <div class="modal-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="subscribeform">
            <div class="headerForm">
              <h3 class="text-center headerSubscribe">Test</h3>
              <a href="#"><span class="fa fa-close closeIcon" id="closeSubscribe"></span></a>
            </div>
            <div class="contentBox">
              <p class="emailSubscribe">อีเมล์ที่ลงทะเบียน : <span id="emailSubscribe"></span></p>
              <p class="contentSubscribe"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="./temp/scripts/test.js"></script>
</body>
</html>
