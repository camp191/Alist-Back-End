import $ from 'jquery';

class Modal {
  constructor(){
    this.modal = $('.modal-bg');
    this.modalSignIn = $('.modal-signin');
    this.openModalButton = $('#modal-open');
    this.closeModalButton = $('#modal-close');
    this.passwordBox = $('.passwordSignIn');
    this.forgetPasswordBox = $('.forgetPassword');
    this.forgetPassword = $('#forget');
    this.passwordBox = $('.passwordSignIn');
    this.headerSignIn = $('.header');
    this.signinBtn = $('.signinBtn');
    this.socialSignIn = $('.social');
    this.wantToSignIn = $('.wantToSignIn');
    this.signInLink = $('#signInLink');
    this.eventSignIn();
    this.eventForget();
    this.eventSignInLink();
  }

  // Event click for open and close modal box
  eventSignIn(){
    this.openModalButton.click(this.openModal.bind(this));
    this.closeModalButton.click(this.closeModal.bind(this));
    $(document).keyup(this.keyHandler.bind(this));
  }

  openModal(){
    this.modal.addClass('modal-bg-openModal')
    this.modalSignIn.addClass('modal-signin-openModal');
    this.passwordBox.show();
    this.headerSignIn.text('เข้าสู่ระบบ');
    this.signinBtn.text('เข้าสู่ระบบ');
    this.socialSignIn.show();
    this.forgetPasswordBox.show();
    this.wantToSignIn.hide();
  }

  closeModal(){
    this.modalSignIn.removeClass('modal-signin-openModal');
    this.modal.removeClass('modal-bg-openModal')

    return false;
  }

  keyHandler(e){
    if (e.keyCode == 27){
      this.modalSignIn.removeClass('modal-signin-openModal');
      this.modal.removeClass('modal-bg-openModal')
    }
  }

  // Event click on forget password link
  eventForget(){
    this.forgetPassword.click(this.forgetPass.bind(this));
  }

  forgetPass(){
    this.passwordBox.hide();
    this.headerSignIn.text('ลืมรหัสผ่าน');
    this.signinBtn.text('ลงรหัสผ่านใหม่ไปทางอีเมล์');
    this.socialSignIn.hide();
    this.forgetPasswordBox.hide();
    this.wantToSignIn.show();

    return false;
  }

  // Event click on sign-in link on forget password modal
  eventSignInLink(){
    this.signInLink.click(this.signIn.bind(this));
  }

  signIn(){
    this.passwordBox.show();
    this.headerSignIn.text('เข้าสู่ระบบ');
    this.signinBtn.text('เข้าสู่ระบบ');
    this.socialSignIn.show();
    this.forgetPasswordBox.show();
    this.wantToSignIn.hide();

    return false;
  }
}

export default Modal;
