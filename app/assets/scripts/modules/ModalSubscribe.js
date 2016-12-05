import $ from 'jquery';

class ModalSubscribe {
  constructor() {
    this.emailBox = $("#email-subscribe");
    this.subscribeBtn = $(".subscribeBtn");
    this.modal = $(".modal-bg");
    this.subscribeModal = $(".modal-subscribe");
    this.header = $(".headerForm");
    this.headerForm = $(".headerSubscribe");
    this.closeBtn = $("#closeSubscribe");
    this.emailSubscribe = $(".emailSubscribe");
    this.emailSubscribeSuccess = $("#emailSubscribe");
    this.content = $(".contentSubscribe");
    this.event();
  }

  event(){
    this.subscribeBtn.click(this.modalSubscribe.bind(this));
    this.closeBtn.click(this.closeModal.bind(this));
    $(document).keyup(this.keyHandler.bind(this));
  }

  checkEmail(email) {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
  }

  modalSubscribe(){
    this.modal.addClass("modal-bg-openModal");
    this.subscribeModal.addClass("modal-subscribe-openModal");

    if(this.checkEmail(this.emailBox.val())) {
      this.header.addClass("headerForm-success");
      this.headerForm.text("ลงทะเบียนติดตามข่าวสารสำเร็จ");
      this.emailSubscribe.show();
      this.emailSubscribeSuccess.text(this.emailBox.val());
      this.content.text("ขอบคุณที่ติดตามข่าวสารและโปรโมชั่นกับ Alist สามารถตรวสอบข่าวสารและโปรโมชั่นที่น่าสนใจทุกเดือนได้ที่อีเมล์ของท่าน");
    } else if(!this.checkEmail(this.emailBox.val())) {
      this.header.addClass("headerForm-fail");
      this.emailSubscribe.hide();
      this.headerForm.text("พบข้อผิดพลาด");
      this.content.text("พบข้อผิดพลาด กรุณาตรวจสอบอีเมล์ของท่านให้ดีว่าพิมพ์ถูกต้องจากนั้น กดติดตามข่าวสารใหม่");
    }
  }

  // Close subscribe modal
  closeModal(){
    this.subscribeModal.removeClass('modal-subscribe-openModal');
    this.modal.removeClass('modal-bg-openModal');
    this.header.removeClass("headerForm-fail");
    this.header.removeClass("headerForm-success");
    return false;
  }

  keyHandler(e){
    if (e.keyCode == 27){
      this.subscribeModal.removeClass('modal-subscribe-openModal');
      this.modal.removeClass('modal-bg-openModal');
      this.header.removeClass("headerForm-fail");
      this.header.removeClass("headerForm-success");
    }
  }

}

export default ModalSubscribe;
