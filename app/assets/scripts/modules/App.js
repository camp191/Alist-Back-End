import $ from 'jquery';

class App {
  constructor(){
    this.tabNotDone = $('.tabNotDone');
    this.tabDone = $('.tabDone');
    this.tabNotDoneBox = $('.tabNotDoneBox');
    this.tabDoneBox = $('.tabDoneBox');
    this.todoNotDone = $('.todo-notdone');
    this.todoDone = $('.todo-done');
    this.addBtn = $('#addBtn');
    this.todoInput = $('#todoInput');
    this.tabTag = $('#tag');
    this.cautionAdd = $('#cautionAdd');
    this.deleteBtn = $('.deleteBtn');
    this.eventTab();
    this.eventAddRemove();
    this.deleteTask();
    this.doneTask();
  }

  eventTab(){
    this.tabDone.click(this.tabDoneActive.bind(this));
    this.tabNotDone.click(this.tabNotDoneActive.bind(this));
  }

  eventAddRemove(){
    this.addBtn.click(this.addTask.bind(this));
  }

  // change tab function

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


  // Add Task function
  addTask(){
    if(this.todoInput.val() === ''){
      this.cautionAdd.show();
      this.todoInput.addClass('todoInput-fail');
    } else {
      let TaskCount = this.todoNotDone.children().length + 1;
      let createTask = '<li class="ndList">' + this.todoInput.val() + '<a href="#" class="fa fa-check checkIcon doneBtn"></a><a href="#" class="fa fa-trash trashIcon deleteBtn"></a></li>'
      $(createTask).appendTo(this.todoNotDone).hide().fadeIn();
      this.todoInput.val('');
      this.tabTag.text(TaskCount);
      this.cautionAdd.hide();
      this.todoInput.removeClass('todoInput-fail');
    }
  }

  // Delete Task function
  deleteTask(){
      $(document).on('click', 'a.deleteBtn', function() {
        $(this).parent().fadeOut(function(){
          $(this).remove();
          $('#tag').text($('.todo-notdone').children().length)
        })
        return false;
      });
  }

  doneTask(){
    $(document).on('click', 'a.doneBtn', function() {
      var createDone = '<li class="ndList">'+ $(this).parent().text() +'<a href="#" class="fa fa-trash trashIcon deleteBtn"></a></li>'
      $(createDone).appendTo($('.todo-done'));
      $(this).parent().fadeOut(function(){
        $(this).remove();
        $('#tag').text($('.todo-notdone').children().length)
      })
      return false;
    });
  }


}

export default App;
