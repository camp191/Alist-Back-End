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