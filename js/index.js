$(document).on('keydown', function (e) {
  if (e.keyCode === 16) {
    $('#gen-template-frame').contents().find('[contenteditable]').css('background-color', 'rgba(255, 100, 58, 0.43)');
    $('.upload-avatar').addClass('show');
  }
});

$(document).on('keyup', function (e) {
  $('#gen-template-frame').contents().find('[contenteditable]').css('background-color', 'transparent');
  $('.upload-avatar').removeClass('show');
});


   function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
         console.log(reader.result);
           //preview.src = reader.result;
           $('#gen-template-frame').contents().find('.logo img').attr('src', reader.result);
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }


function change() {
  var sel = $('#gen-select-template option:selected').text();
  var frame = $('#gen-template-frame');
  var frame_back = $('#gen-template-back-frame');
  frame.attr('src', 'templates/' + sel + '.html');
  frame_back.attr('src', 'templates/back/' + sel + '.html');
}

$(document).ready(function () {
  $('#gen-card-button').click(function () {
    var template_html = $("#gen-template-frame").contents().find('html').html();
    var template_back_html = $("#gen-template-back-frame").contents().find('html').html();
    $('#gen-html-textarea').val(template_html);
    $('#gen-html-back-textarea').val(template_back_html);
    $('#gen-create-form').submit();
  });
});
