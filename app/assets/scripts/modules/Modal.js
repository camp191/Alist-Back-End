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
    this.forgetPasswordBtn = $('#forgetPasswordBtn');
    this.forgetEmailSucess = $('#forgetPasswordEmailSuccess');
    this.forgetEmailContent = $('.forgetPasswordSuccess');
    this.passwordBox = $('.passwordSignIn');
    this.headerSignInBox = $('#headerSignInBox');
    this.headerSignIn = $('.headerSignIn');
    this.signinBtn = $('.signinBtn');
    this.socialSignIn = $('.social');
    this.wantToSignIn = $('.wantToSignIn');
    this.signInLink = $('#signInLink');
    this.signInEmailForm = $('#signin-email');
    this.signInPasswordForm = $('#signin-password');
    this.cautionFormFill = $('#cautionSignIn-formFill');
    this.cautionEmail = $('#cautionSignIn-email');
    this.cautionPassword = $('#cautionSignIn-password');
    this.signInBtn = $('#signinBtn');
    this.eventSignIn();
    this.eventForget();
    this.eventSignInLink();
  }

  // Event click for open and close modal box
  eventSignIn(){
    this.openModalButton.click(this.openModal.bind(this));
    this.closeModalButton.click(this.closeModal.bind(this));
    this.signInEmailForm.blur(this.checkEmail.bind(this));
    this.signInPasswordForm.blur(this.checkPassword.bind(this));
    this.signInBtn.click(this.checkSignIn.bind(this));
    $(document).keyup(this.keyHandler.bind(this));
  }

  openModal(){
    this.modal.addClass('modal-bg-openModal')
    this.modalSignIn.addClass('modal-signin-openModal');
    this.passwordBox.show();
    this.headerSignIn.text('เข้าสู่ระบบ');
    this.forgetPasswordBtn.hide();
    this.signinBtn.show();
    this.socialSignIn.show();
    this.forgetPasswordBox.show();
    this.wantToSignIn.hide();
    this.signInEmailForm.val('');
    this.signInPasswordForm.val('');
    this.forgetEmailContent.hide();
    this.signInEmailForm.show();
    this.headerSignInBox.removeClass('headerForm-success');
    this.cautionFormFill.hide();
    this.cautionEmail.hide();
    this.cautionPassword.hide();
    this.signInPasswordForm.removeClass('formField-fail');
    this.signInEmailForm.removeClass('formField-fail');
  }

  closeModal(){
    this.modalSignIn.removeClass('modal-signin-openModal');
    this.modal.removeClass('modal-bg-openModal');
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
    this.forgetPasswordBtn.click(this.forgetPasswordModal.bind(this));
  }

  forgetPass(){
    this.passwordBox.hide();
    this.headerSignIn.text('ลืมรหัสผ่าน');
    this.signinBtn.hide();
    this.forgetPasswordBtn.show();
    this.socialSignIn.hide();
    this.forgetPasswordBox.hide();
    this.wantToSignIn.show();
    this.signInEmailForm.val('');
    this.cautionFormFill.hide();
    this.cautionEmail.hide();
    this.cautionPassword.hide();
    this.signInEmailForm.removeClass('formField-fail');
    this.signInPasswordForm.removeClass('formField-fail');
    return false;
  }

  forgetPasswordModal(){
    if (this.signInEmailForm.val() === '') {
      this.cautionEmail.show();
      this.signInEmailForm.addClass('formField-fail');
      return false
    } else if(this.checkEmail()) {
      this.headerSignInBox.addClass('headerForm-success');
      this.headerSignIn.text('ส่งรหัสผ่านใหม่สำเร็จ');
      this.forgetEmailSucess.text(this.signInEmailForm.val());
      this.signInEmailForm.hide();
      this.forgetPasswordBtn.hide();
      this.wantToSignIn.hide();
      this.forgetEmailContent.show();
    }

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
    this.forgetPasswordBtn.hide();
    this.signinBtn.show();
    this.signInEmailForm.val('');
    this.cautionEmail.hide();
    this.signInEmailForm.removeClass('formField-fail');

    return false;
  }

  // Event check email and password sign in
  checkEmail(){
    let regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(regexEmail.test(this.signInEmailForm.val()) || this.signInEmailForm.val() === '') {
      this.cautionEmail.fadeOut();
      this.signInEmailForm.removeClass('formField-fail');
      return true;
    } else {
      this.cautionEmail.fadeIn();
      this.signInEmailForm.addClass('formField-fail');
      return false;
    }
  }

  checkPassword(){
    let regexPassword = /^[a-zA-z0-9]+$/;

    if((regexPassword.test(this.signInPasswordForm.val()) && this.signInPasswordForm.val().length >= 4 && this.signInPasswordForm.val().length <= 10) || this.signInPasswordForm.val() === '') {
      this.cautionPassword.fadeOut();
      this.signInPasswordForm.removeClass('formField-fail');
      return true;
    } else {
      this.cautionPassword.fadeIn();
      this.signInPasswordForm.addClass('formField-fail');
      return false;
    }
  }

  checkSignIn(){
    if(this.signInEmailForm.val() == '' || this.signInPasswordForm.val() == ''){
      this.cautionFormFill.fadeIn();
      this.signInEmailForm.addClass('formField-fail');
      this.signInPasswordForm.addClass('formField-fail');
    } else {
      this.cautionFormFill.fadeOut();
      this.signInEmailForm.removeClass('formField-fail');
      this.signInPasswordForm.removeClass('formField-fail');
    }
  }
}

export default Modal;
