import $ from 'jquery';

class Menu {
  constructor() {
    this.body = $('body');
    this.menuBtn = $('.hamburgerBtn');
    this.menu = $('.nav-menu');
    this.event();
  }

  event() {
    this.menuBtn.click(this.toggleMenu.bind(this));
  }

  toggleMenu() {
    if (this.menuBtn.hasClass('fa-bars')) {
      this.menuBtn.removeClass('fa-bars');
      this.menuBtn.addClass('fa-close');
      this.menu.addClass('nav-menu-show');
      this.body.css({overflow: 'hidden'})
    } else {
      this.menuBtn.removeClass('fa-close');
      this.menuBtn.addClass('fa-bars');
      this.menu.removeClass('nav-menu-show');
      this.body.css({overflow: 'auto'})
    }
  }
}

export default Menu;
