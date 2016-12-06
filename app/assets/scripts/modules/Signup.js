import $ from 'jquery';

class Signup {
  constructor(){
    this.modal = $(".modal-bg");
    this.modalSignUpBox = $('.modal-signup');
    this.emailSignUp = $('#emailSignup');
    this.nameSignUp = $('#nameSignUpDone');
    this.closeBtn = $('#closeSignup');
    this.formName = $('#signup-name');
    this.formEmail = $('#signup-email');
    this.formPassword = $('#signup-password');
    this.formRePassword = $('#signup-rePassword');
    this.formFill = $('#cautionSignUp-formFill');
    this.cautionName = $('#cautionSignUp-name');
    this.cautionEmail = $('#cautionSignUp-email');
    this.cautionPassword = $('#cautionSignUp-password');
    this.cautionRePassword = $('#cautionSignUp-rePassword');
    this.signupBtn = $('#signupBtn');
    this.event();
  }


  event(){
    this.formName.blur(this.checkName.bind(this));
    this.formEmail.blur(this.checkEmail.bind(this));
    this.formPassword.blur(this.checkPassword.bind(this));
    this.formRePassword.blur(this.checkRePassword.bind(this));
    this.signupBtn.click(this.modalSignUp.bind(this));
    this.closeBtn.click(this.closeModal.bind(this));
  }

  formNoFill(){
    if(this.formName.val() === '' || this.formEmail.val() === '' || this.formPassword.val() === '' || this.formRePassword.val() === '' ){
      return false;
    } else {
      this.formFill.fadeOut();
      return true;
    }
  }

  checkName(){
    let regexName = /^[a-zA-z ก-๙]+$/;

    if(regexName.test(this.formName.val()) || this.formName.val() === '') {
      this.cautionName.fadeOut();
      return true;
    } else {
      this.cautionName.fadeIn();
      return false;
    }
  }

  checkEmail(){
    let regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(regexEmail.test(this.formEmail.val()) || this.formEmail.val() === '') {
      this.cautionEmail.fadeOut();
      return true;
    } else {
      this.cautionEmail.fadeIn();
      return false;
    }
  }

  checkPassword(){
    let regexPassword = /^[a-zA-z0-9]+$/;

    if((regexPassword.test(this.formPassword.val()) && this.formPassword.val().length >= 4 && this.formPassword.val().length <= 10) || this.formPassword.val() === '') {
      this.cautionPassword.fadeOut();
      return true;
    } else {
      this.cautionPassword.fadeIn();
      return false;
    }
  }

  checkRePassword(){
    if(this.formPassword.val() === this.formRePassword.val() || this.formRePassword.val() === '') {
      this.cautionRePassword.fadeOut();
      return true;
    } else {
      this.cautionRePassword.fadeIn();
      return false;
    }
  }

  modalSignUp(){
    if(this.checkName() && this.checkEmail() && this.checkPassword() && this.checkRePassword() && this.formNoFill()) {
      this.formFill.fadeOut();
      this.modal.addClass("modal-bg-openModal");
      this.modalSignUpBox.addClass("modal-signup-openModal");
      this.emailSignUp.text(this.formEmail.val());
      this.nameSignUp.text(this.formName.val());
    } else {
      this.formFill.fadeIn();
    }
  }

  closeModal(){
    this.modal.removeClass("modal-bg-openModal");
    this.modalSignUpBox.removeClass("modal-signup-openModal");
  }

}

export default Signup;
