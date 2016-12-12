import $ from 'jquery';

class App {
  constructor(){
    this.tabNotDone = $('.tabNotDone');
    this.tabDone = $('.tabDone');
    this.tabNotDoneBox = $('.tabNotDoneBox');
    this.tabDoneBox = $('.tabDoneBox');
    this.todoNotDone = $('.todo-notdone');
    this.todoDone = $('.todo-done');
    this.eventTab()
  }

  eventTab(){
    this.tabDone.click(this.tabDoneActive.bind(this));
    this.tabNotDone.click(this.tabNotDoneActive.bind(this));
  }

  tabDoneActive(){
    this.tabNotDoneBox.addClass('tabNotDoneBox-inactive');
    this.tabDoneBox.addClass('tabDoneBox-active');
    this.todoNotDone.fadeOut();
    this.todoNotDone.promise().done(function(){
      $('.todo-done').fadeIn();
    });
    return false;
  }

  tabNotDoneActive(){
    this.tabNotDoneBox.removeClass('tabNotDoneBox-inactive');
    this.tabDoneBox.removeClass('tabDoneBox-active');
    this.todoDone.fadeOut();
    this.todoDone.promise().done(function(){
      $('.todo-notdone').fadeIn();
    })

    return false;
  }
}

export default App;
