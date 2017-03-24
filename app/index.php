<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Alist || The Best To-Do-List in The World </title>
  <link rel="icon" href="./assets/images/logo.png">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./temp/styles/index.css">
  <?php
  session_start();
  if(isset($_SESSION["name"])){
    header("Location: login.php");
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
            <li class="menu"><a href="index.html">หน้าแรก</a></li>
            <li class="menu"><a href="price.html">ราคาและโปรโมชั่น</a></li>
            <li class="menu"><a href="test.html">ทดลองใช้งาน</a></li>
            <li class="menu"><a class="signIn" id="modal-open">เข้าสู่ระบบ</a></li>
          </ul>
          <a class="fa fa-bars hamburgerBtn"></a>
        </div>
        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
      </div>
    </div>
  </div>

  <!-- Large Hero -->
  <header>
    <div class="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 topic">
            <h1 class="headerTopic">To-Do-List ที่จะช่วยคุณกันลืมที่สามารถใช้ได้ทุก Platforms</h1>
            <h4 class="subTopic">Alist คือ แอปพลิเคชั่น To-Do-List ที่ช่วยแจ้งเตือนหรือเขียนบันทึกกันลืมเพื่อให้คุณไม่พลาดสิ่งสำคัญที่ต้องทำอีกต่อไป </h4>
          </div>
          <div class="col-md-6">
            <div class="form-box">
              <div class="headerForm">
                <h3 class="text-center header">ลงทะเบียน</h3>
              </div>

              <form method="post" class="formMain" onsubmit="return false" action="./assets/server/user/user_create.php" target="iframe_target">
                <div class="cautionSignUp-box">
                  <h4 class="cautionSignUp checkEmail"></h4>
                  <h4 class="cautionSignUp" id="cautionSignUp-formFill"><span class="fa fa-exclamation-circle"></span> กรุณาข้อมูลให้ครบทุกช่อง</h4>
                  <h4 class="cautionSignUp" id="cautionSignUp-name"><span class="fa fa-exclamation-circle"></span> กรุณาใส่ชื่อและนามสกุลด้วยภาษาอังกฤษหรือไทยเท่านั้น</h4>
                  <h4 class="cautionSignUp" id="cautionSignUp-email"><span class="fa fa-exclamation-circle"></span> กรุณาใส่อีเมล์ให้ถูกต้อง</h4>
                  <h4 class="cautionSignUp" id="cautionSignUp-password"><span class="fa fa-exclamation-circle"></span> กรุณาใส่รหัสผ่านด้วย A-Z, a-z หรือตัวเลขจำนวน 4-10 ตัวอักษร</h4>
                  <h4 class="cautionSignUp" id="cautionSignUp-rePassword"><span class="fa fa-exclamation-circle"></span> รหัสผ่านกับรหัสผ่านที่ยืนยันไม่ตรงกัน</h4>
                </div>
                <fieldset>
                  <div class="row">
                    <div class="col-sm-6">
                      <label class="col-xs-12 formTopic" for="">ชื่อ-นามสกุล</label>
                      <input class="col-xs-12 formField" id="signup-name" autofocus="autofocus" type="text" name="name">
                    </div>
                    <div class="col-sm-6">
                      <label class="col-xs-12 formTopic" for="">E-mail</label>
                      <input class="col-xs-12 formField" id="signup-email" type="text" name="email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <label class="col-xs-12 formTopic" for="">รหัสผ่าน</label>
                      <input class="col-xs-12 formField" id="signup-password" type="password" name="password">
                    </div>
                    <div class="col-sm-6">
                      <label class="col-xs-12 formTopic" for="">ยืนยันรหัสผ่าน</label>
                      <input class="col-xs-12 formField" id="signup-rePassword" type="password" name="re-password">
                    </div>
                  </div>
                </fieldset>

                <button class="regisBtn" id="signupBtn">ลงทะเบียนใช้งานฟรี 30 วัน !!!</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section>
    <!-- What is Alist -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 what-alist">
          <h1 class="text-center headerTopic">Alist คืออะไร</h1>
          <h4 class="text-center subTopic">ทำไมใครหลายๆคนถึงเลือกใช้ Alist เพื่อช่วยเตือน</h4>

          <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 offsetContent">
            <p class="text-center content">Alist คือโปรแกรมและแอปพลิเคชั่น To-do-List ที่จะช่วยแจ้งเตือนสิ่งต่างๆที่คุณได้บันทึกไว้ให้แจ้งเตือนตามระยะเวลาที่กำหนดโดยที่คุณสามารถใช้สำหรับคนเดียวหรือใช้สำหรับการใช้งานเป็นกลุ่มได้ โดยที่ Alist นั้น มีผู้ใช้ปัจจุบันมากกว่า 500000 คน และได้รางวัลแอปพลิเคชั่นยอดเยี่ยมประจำปี 2016</p>
          </div>
          <div class="text-center">
            <picture>
              <source class="pic" media="(max-width: 768px)" srcset="./assets/images/iphoneWhat.jpg">
              <img class="pic" src="./assets/images/WhatAlist.jpg">
            </picture>
          </div>
        </div>
      </div>
    </div>

    <!-- Features -->
    <div class="container features-alist">
      <div class="row">
        <h1 class="text-center headerTopic">จุดเด่นของ Alist</h1>
        <h4 class="text-center subTopic">Alist มีจุดเด่นที่สามารถช่วยคุณได้อย่างไรบ้าง</h4>
      </div>
      <div class="row feature">
        <div class="col-sm-5 col-sm-offset-1 text-center picBox">
          <img class="pic" src="./assets/images/FeatureEasyUse.jpg" alt="credit:Freepik.com">
        </div>
        <div class="col-sm-5">
          <h2 class="text-right headerFeature">โปรแกรมใช้งานง่ายมาก</h2>
          <p class="text-right contentFeature">Alist นั้นถูกออกแบบมาสำหรับทุกคน เพื่อให้ใช้งานได้อย่างสะดวกที่สุด โดยทดลองใช้งานไม่กี่ครั้งก็สามารถใช้งานได้ โดยที่สามารถใช้โปรแกรมจัดการได้ตั้งแต่เตือนง่ายๆจนตั้งเตือนแบบซับซ้อน</p>
        </div>
      </div>
      <div class="row feature">
        <div class="col-sm-5 text-center col-sm-push-6">
          <img class="pic" src="./assets/images/FeatureManyDevice.jpg" alt="credit:Freepik.com">
        </div>
        <div class="col-sm-5 col-sm-offset-1 col-sm-pull-5">
          <h2 class="text-left headerFeature">ใช้งานได้หลากหลายอุปกรณ์</h2>
          <p class="text-left contentFeature">คุณสามารถใช้ Alist Sync ได้กับหลากหลายอุปกรณ์ไม่ว่าจะเป็นบนคอมพิวเตอร์ที่ระบบปฏิบัติการ Windows,OSX, Linux หรือจะบนโทรศัพท์ระบบปฏิบัติการ iOS และ Android</p>
        </div>

      </div>
      <div class="row feature">
        <div class="col-sm-5 col-sm-offset-1 text-center">
          <img class="pic" src="./assets/images/FeatureShareDevice.jpg" alt="credit:Freepik.com">
        </div>
        <div class="col-sm-5">
          <h2 class="text-right headerFeature">สามารถใช้งานร่วมกันหลายคน</h2>
          <p class="text-right contentFeature">นอกจากคุณจะสามารถใช้ Alist ที่จัดการ List ของคุณเพียงคนเดียวแล้ว Alist นั้นถูกออกแบบมาเพื่อให้สามารถสร้างทีมขึ้นมาแล้วแจ้งเตือนเรื่องต่างๆ ร่วมกันเป็นกลุ่มได้อีกด้วย</p>
        </div>
      </div>
    </div>

    <!-- Testimonial -->
    <div class="testimonial-alist">
      <div class="container">
        <div class="row">
          <h1 class="text-center headerTopic">เสียงตอบรับจากผู้ใช้จริง</h1>
          <h4 class="text-center subTopic">ผู้ใช้ Alist รู้สึกอย่างไรบ้างเมื่อได้ใช้งานจริง</h4>
        </div>
        <div class="row testimonial">
          <div class="col-sm-4 col-xs-12">
            <p class="text-center content">“ Alist เป็นอะไรที่ดีงามมาก ใช้งานง่ายสุดๆ แม่ของผมมาลองใช้นิดหน่อยใช้เป็นแล้ว โปรแกรมเสถียรสุดๆ แต่ที่เด็ดอยู่ตรงที่ข้อมูล sync ข้าม platform ได้  “</p>
            <div class="people">
              <div class="col-md-4 col-xs-12 text-center">
                <img src="./assets/images/picManLeft.png" alt="credit: unsplash.com">
              </div>
              <div class="col-md-8 col-xs-12 nameBox">
                <p>นายไก่กา อาราเร่</p>
                <p>นักศึกษา</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <p class="text-center content">“ เห็นน้องที่บริษัทใช้แล้วบอกว่าดีเลยลองมาใช้บ้าง หน้าตาโปรแกรมสวยงาม ใช้ง่ายไม่ซับซ้อน พอใช้ไปซักพักแล้วรู้สึกโอเคมาก 10/10 เลยครับ  “</p>
            <div class="people">
              <div class="col-md-4 col-xs-12 text-center">
                <img src="./assets/images/picManMiddle.png" alt="credit: unsplash.com">
              </div>
              <div class="col-md-8 col-xs-12 nameBox">
                <p>นายหิวข้าว จริงๆนะ</p>
                <p>พนักงานบริษัท</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <p class="text-center content">“ ดิฉันลองใช้เนื่องจากเห็นว่าสามารถใช้ทำงานหลายคนได้ เมื่อใช้จริงพบว่าโอเคมาก ทำให้งานเสร็จได้ตรงเวลา ตอนนี้คนรอบข้างแนะนำให้ใช้ทุกคนเลยค่ะ  “</p>
            <div class="people">
              <div class="col-md-4 col-xs-12 text-center">
                <img src="./assets/images/picManRight.png" alt="credit: unsplash.com">
              </div>
              <div class="col-md-8 col-xs-12 nameBox">
                <p>นางสาวณัฐวดี สดใส</p>
                <p>CEO บริษัท ABC</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Test Program -->
    <div class="container test-alist">
      <div class="row">
        <h1 class="text-center headerTopic">โปรแกรมน่าสนใจขนาดนี้มาทดลองใช้กันดีกว่า !!</h1>
        <div class="text-center">
          <form action="test.html">
            <button class="testBtn">ทดลองใช้งาน</button>
          </form>
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
            <form class="formMain" id="formMain" onsubmit="return true" action="./assets/server/user/user_login.php" method="post">
              <div class="cautionSignIn-box">
                <h4 class="cautionSignIn" id="cautionSignIn-formFill"><span class="fa fa-exclamation-circle"></span> กรุณาข้อมูลให้ครบทุกช่อง</h4>
                <h4 class="cautionSignIn" id="cautionSignIn-email"><span class="fa fa-exclamation-circle"></span> กรุณาใส่อีเมล์ให้ถูกต้อง</h4>
                <h4 class="cautionSignIn" id="cautionSignIn-password"><span class="fa fa-exclamation-circle"></span> กรุณาใส่รหัสผ่านให้ถูกต้อง ความยาว 4-10 ตัวอักษร</h4>
                <h4 class="cautionSignIn" id="cautionSignIn-login"><span class="fa fa-exclamation-circle"></span> กรุณาใส่อีเมล์และรหัสผ่านให้ถูกต้อง</h4>
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
              <button class="signinBtn" name="signinBtn" id="signinBtn">เข้าสู่ระบบ</button>
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

  <!-- Modal SignUp -->
  <div class="modal-signup">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="signUpForm">
            <div class="headerSignUpForm">
              <h3 class="text-center headerSignUp">ลงทะเบียนสำเร็จ</h3>
              <a href="#"><span class="fa fa-close closeIcon" id="closeSignup"></span></a>
            </div>
            <div class="contentBox">
              <p class="emailSignup">อีเมล์ที่ลงทะเบียน : <span class="emailSignup" id="emailSignup"></span></p>
              <p class="contentSignup">ขอบคุณ คุณ <span class="contentSignup" id="nameSignUpDone"></span> ที่ลงทะเบียนใช้งาน Alist โดยอีเมล์ยืนยันการลงทะเบียนจะถูกส่งไปที่อีเมล์ที่ได้ลงทะเบียนไว้ข้างต้น</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="./temp/scripts/index.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
    $('document').ready(function(){
        $('#signup-email').blur(function(){
        var jqxhr = $.ajax({
          url: "./assets/server/user/checkEmail.php",
          data: "email=" + $("#signup-email").val(),
          method: "POST",
          async: false
        })
        .done(function(data,status) {$(".checkEmail").show().html(data);})
        .fail(function(xhr, status, exception) {alert(status);})
      })
    })
  </script>
</body>
</html>
