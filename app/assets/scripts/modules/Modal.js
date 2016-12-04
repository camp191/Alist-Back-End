import $ from 'jquery';

class Modal {
  constructor(){
    this.modal = $('.modal-bg');
    this.modalSignIn = $('.modal-signin');
    this.openModalButton = $('#modal-open');
    this.closeModalButton = $('#modal-close');
    this.forgotPassword = $('#forget');
    this.passwordBox = $('.password');
    this.eventSignIn();
    this.eventForget();
  }

  // Event click for open and close modal box
  eventSignIn(){
    this.openModalButton.click(this.openModal.bind(this));
    this.closeModalButton.click(this.closeModal.bind(this));
    $(document).keyup(this.keyHandler.bind(this));
  }

  openModal(){
    this.passwordBox.show();
    this.modal.addClass('modal-bg-openModal')
    this.modalSignIn.addClass('modal-signin-openModal');
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
    this.forgotPassword.click(this.forgetPass.bind(this));
  }

  forgetPass(){
    this.passwordBox.fadeOut();
  }

}

export default Modal;
