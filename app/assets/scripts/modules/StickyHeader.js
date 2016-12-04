import $ from 'jquery';

class StickyHeader {
  constructor() {
    this.window = $(window);
    this.nav = $(".bg-nav");
    this.sticky();
  }

  sticky() {
    this.window.scroll(this.checkWindow.bind(this));
  }

  checkWindow() {
    if (this.window.scrollTop() > 50) {
      this.nav.addClass('bg-nav-scrollStyle')
    } else {
      this.nav.removeClass('bg-nav-scrollStyle')
    }
  }
}

export default StickyHeader;
