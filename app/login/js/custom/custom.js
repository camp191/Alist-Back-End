// read file image
function previewFile() {
  var preview = document.getElementById('previewImg');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

// confirm subscribe modal
$("#submitBtn").click(function(){
  if($('#FLName').val() === '' || $('#cardNumber').val() === '' || $('#CVV').val() === ''){
    $('#formSubmitFail').html(`<div class="alert alert-danger">
                            <i class="fa fa-info-circle"></i> Please fill all inputs for subscribe. :)
                        </div>`);
    $('#confirmSubscribe').hide();
    $('#topicModal').hide();
  } else {
    $('#topicModal').show();
    $('#confirmSubscribe').show();

    if($('#selectPackage').val() === '1') {
      $('#modalPackage').text('Basic - 50 Bath/Month');
    } else if ($('#selectPackage').val() === '2'){
      $('#modalPackage').text('Pro - 80 Bath/Month');
    }

    $('#modalFLName').text($('#FLName').val());
    $('#modalCardNumber').text($('#cardNumber').val());
    $('#modalCVV').text($('#CVV').val());
  }
})

$(".closeSubscribe").click(function(){
  $('#formSubmitFail').html('');
})

$("#confirmSubscribe").click(function(){
  $("#formSubscribe").submit();
})

// delete account modal
$("#confirmDelete").click(function(){
  $("#formDeleteAccount").submit();
});

// contact form reset
$("#resetBtn").click(function(){
  $("#topicContact").val("");
  $("#messageContact").val("");
  $("#typeContact").val($("#typeContact option:first").val());
})

// initial tooltip
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

// Ajax list table order
$('input:radio[name="orderList"]').change(function(){
  if($(this).val() == "dateCreated"){
    $.ajax({
      url:"./server/lists/listDateOrder.php",
      success:function(result){
        $(".change-table").hide().html(result).fadeIn();
        $('.modalEditList').click(function(){
          var listID = $(this).attr('data-editList');
          $.ajax({
            url:"./server/lists/editListPage.php?listID=" + listID,
            success:function(result){
              $(".modalEdit-parent").html(result);
            }
          })
        })

      }
    })
  } else if($(this).val() == "deadline"){
    $.ajax({
      url:"./server/lists/listDeadline.php",
      success:function(result){
        $(".change-table").hide().html(result).fadeIn();
        $('.modalEditList').click(function(){
          var listID = $(this).attr('data-editList');
          $.ajax({
            url:"./server/lists/editListPage.php?listID=" + listID,
            success:function(result){
              $(".modalEdit-parent").html(result);
            }
          })
        })
      }
    })
  } else if ($(this).val() == "important"){
    $.ajax({
      url:"./server/lists/listImportant.php",
      success:function(result){
        $(".change-table").hide().html(result).fadeIn();
        $('.modalEditList').click(function(){
          var listID = $(this).attr('data-editList');
          $.ajax({
            url:"./server/lists/editListPage.php?listID=" + listID,
            success:function(result){
              $(".modalEdit-parent").html(result);
            }
          })
        })
      }
    })
  }
})

// Ajax modal edit list
$('.modalEditList').click(function(){
  var listID = $(this).attr('data-editList');
  $.ajax({
    url:"./server/lists/editListPage.php?listID=" + listID,
    success:function(result){
      $(".modalEdit-parent").html(result);
    }
  })
})

// add project page in add list section
var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var outputDate = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;
var blankList = `<div class="list-blank"><hr>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>List Topic:</label>
                                        <input class="form-control" name="list[topic][]" value="">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>List Description:</label>
                                        <input class="form-control" name="list[description][]" value="">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>End Date:</label>
                                        <input class="form-control" name='list[endDate][]' data-provide="datepicker" data-date-format="yyyy-mm-dd" value="${outputDate}">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>Important:</label>
                                        <select class="form-control" name="list[important][]">
                                            <option>Yes</option>
                                            <option selected>No</option>
                                        </select>          
                                    </div>                                           
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-info move-up"><i class="fa fa-angle-up"></i></button>
                                    <button type="button" class="btn btn-info move-down"><i class="fa fa-angle-down"></i></button>
                                    <button type="button" class="btn btn-danger delete-list"><i class="fa fa-trash"></i> Delete</button>
                                </div></div>`

$('document').ready(function(){
  $('#add-list').click(function(){
    $(blankList).appendTo($('.template-project')).hide().slideDown('slow');
  });

  $('.template-project').on('click','.delete-list', function(e){
    e.preventDefault;
    $(this).parent().parent('div').slideUp("normal", function(){ $(this).remove() });
  })

})

// reset form add project page
$('#resetAddProject').click(function(){
  $('#topicProject').val('');
  $("#typeProject").val($("#typeProject option:first").val());
  $('#descriptionProject').val('');
  $('.list-blank').slideUp("normal", function(){$(this).remove()});
  $("#templateList").val($("#templateList option:first").val());
})

// chage for add template
var travelTemplate = `<div class="list-blank"><hr>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>List Topic:</label>
                                        <input class="form-control" name="list[topic][]" value="วางแผน">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>List Description:</label>
                                        <input class="form-control" name="list[description][]" value="">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>End Date:</label>
                                        <input class="form-control" name='list[endDate][]' data-provide="datepicker" data-date-format="yyyy-mm-dd" value="${outputDate}">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>Important:</label>
                                        <select class="form-control" name="list[important][]">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>          
                                    </div>                                           
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-info move-up"><i class="fa fa-angle-up"></i></button>
                                    <button type="button" class="btn btn-info move-down"><i class="fa fa-angle-down"></i></button>
                                    <button type="button" class="btn btn-danger delete-list"><i class="fa fa-trash"></i> Delete</button>
                                </div></div>
                                

                                <div class="list-blank"><hr>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>List Topic:</label>
                                        <input class="form-control" name="list[topic][]" value="ซื้อตั๋ว">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>List Description:</label>
                                        <input class="form-control" name="list[description][]" value="">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>End Date:</label>
                                        <input class="form-control" name='list[endDate][]' data-provide="datepicker" data-date-format="yyyy-mm-dd" value="${outputDate}">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>Important:</label>
                                        <select class="form-control" name="list[important][]">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>          
                                    </div>                                           
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-info move-up"><i class="fa fa-angle-up"></i></button>
                                    <button type="button" class="btn btn-info move-down"><i class="fa fa-angle-down"></i></button>
                                    <button type="button" class="btn btn-danger delete-list"><i class="fa fa-trash"></i> Delete</button>
                                </div></div>
                                
                                
                                <div class="list-blank"><hr>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>List Topic:</label>
                                        <input class="form-control" name="list[topic][]" value="ซื้อของเตรียมเดินทาง">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>List Description:</label>
                                        <input class="form-control" name="list[description][]" value="">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mleft">
                                    <div class="form-group">
                                        <label>End Date:</label>
                                        <input class="form-control" name='list[endDate][]' data-provide="datepicker" data-date-format="yyyy-mm-dd" value="${outputDate}">
                                    </div>                                           
                                </div>
                                <div class="col-md-6 form-mright">
                                    <div class="form-group">
                                        <label>Important:</label>
                                        <select class="form-control" name="list[important][]">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>          
                                    </div>                                           
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-info move-up"><i class="fa fa-angle-up"></i></button>
                                    <button type="button" class="btn btn-info move-down"><i class="fa fa-angle-down"></i></button>
                                    <button type="button" class="btn btn-danger delete-list"><i class="fa fa-trash"></i> Delete</button>
                                </div></div>`

$("#templateList").on('change', function(){
  if($(this).val()=='travel'){
    $(".list-blank").slideUp("normal", function(){ $(this).remove()});
    $(travelTemplate).appendTo($('.template-project')).hide().slideDown('slow');
  } else if ($(this).val() == 'no'){
    $(".list-blank").slideUp("normal", function(){ $(this).remove()})
    $("").appendTo($('.template-project')).hide().slideDown('slow');
  }
})

// move up and down project list
$('.template-project').on('click','.move-up', function(e){
    e.preventDefault;
    $(this).parent().parent().insertBefore($(this).parent().parent().prev()).fadeIn();
})

$('.template-project').on('click','.move-down', function(e){
    e.preventDefault;
    $(this).parent().parent().insertAfter($(this).parent().parent().next()).fadeIn();
})

// jquery match height
$(function() {
    $('.box').matchHeight();
});