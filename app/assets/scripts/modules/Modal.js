import $ from 'jquery';

class Modal {
  constructor(){
    this.modal = $('.modal-signin');
    this.openModalButton = $('#modal-open');
    this.closeModalButton = $('#modal-close');
    this.event();
  }

  event(){
    this.openModalButton.click(this.openModal.bind(this));
    this.closeModalButton.click(this.closeModal.bind(this));
    $(document).keyup(this.keyHandler.bind(this));
  }

  openModal(){
    this.modal.addClass('modal-signin-openModal');
  }

  closeModal(){
    this.modal.removeClass('modal-signin-openModal');

    return false;
  }

  keyHandler(e){
    if (e = 27){
      this.modal.removeClass('modal-signin-openModal');
    }
  }

}

export default Modal;
