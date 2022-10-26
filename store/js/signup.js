function validate_phone(phone) {
  if (!phone || typeof phone !== "string") {
      return {
          success: false,
          phone: phone,
          msg: "Invalid argument type"
      }
  }

  // Ensure `phone` length is 11
  if (phone.length !== 11 ) {
      return {
          success: false,
          phone: phone,
          msg: "Phone number must be 11 digits"
      }
  }

  // Remove country code from number
  if (phone.indexOf("+") !== -1) {
      return {
          success: false,
          phone: phone,
          msg: "Remove country code symbol from phone number"
      }
  }

  // Check if all characters in `phone` are valid number types
  let phoneArray = phone.split("")
  let tempPhoneNumber = []

  phoneArray.forEach((currentNumber) => {
      let number = parseInt(currentNumber, 10)
      tempPhoneNumber.push(number)
  })

  tempPhoneNumber = tempPhoneNumber.toString()

  if (tempPhoneNumber.includes("NaN")) {
      return {
          success: false,
          phone: phone,
          msg: "Invalid phone number"
      }
  }

  // We have a clean phone phone here. Prefix with international code
  phone = phone.substr(1, phone.length)
  phone = `+234${phone}`

  return {
      success: true,
      phone: phone,
      msg: "Phone number validated and formated"
  }
}
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var allowed_ext = ['pdf','png','jpg','jpeg'];
    reader.onload = function(e) {
      $('#bar-3').removeClass("hide");
      $('.bar-percentage[data-percentage]').each(function () {
        var progress = $(this);
        var percentage = Math.ceil($(this).attr('data-percentage'));
        $({countNum: 0}).animate({countNum: percentage}, {
          duration: 5000,
          easing:'linear',
          step: function(){
            // What todo on every count
            var pct = Math.ceil(this.countNum) + '%';
            progress.text(pct) && progress.siblings().children().css('width',pct);

            if(pct == '100%'){
              if($.inArray(file_type, allowed_ext) != -1){
                  $('.image-upload-wrap').hide();
                  if(file_type == 'pdf'){
                    $('.file-upload-image').attr('src', 'assets/images/icon/pdf.png');
                  }
                  else{
                  $('.file-upload-image').attr('src', e.target.result);
                  }
                  $(".file-name1").html(input.files[0].name);
                  $(".file-size1").html(Math.ceil(input.files[0].size / 1024)+ "kb");
                  $('.file-upload-content').show();
                  $("#bar-3").addClass("hide");
              }
              else{
                  alert_failure_long("Invalid file type. Only jpg, jpeg, png and pdf files are allowed");
                  $("#file-upload1").val("");
                  $("bar-3").addClass("hide");

              }

            }
          }
        });
      });
    };


    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function readURL2(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var allowed_ext = ['png','jpg','jpeg'];

    reader.onload = function(e) {
      $('#bar-5').removeClass("hide");
      $('.bar-percentage2[data-percentage2]').each(function () {
        var progress = $(this);
        var percentage = Math.ceil($(this).attr('data-percentage2'));
        $({countNum: 0}).animate({countNum: percentage}, {
          duration: 5000,
          easing:'linear',
          step: function(){
            // What todo on every count
            var pct = Math.ceil(this.countNum) + '%';
            progress.text(pct) && progress.siblings().children().css('width',pct);
            if(pct == '100%'){
              if($.inArray(file_type, allowed_ext) != -1){
                $('.image-upload-wrap2').hide();
                $('.file-upload-image2').attr('src', e.target.result);
                $(".file-name2").html(input.files[0].name);
                $(".file-size2").html(Math.ceil(input.files[0].size / 1024)+ "kb");
                $('.file-upload-content2').show();
                $("#bar-5").addClass("hide");
              }
            else{
              alert_failure_long("Invalid file type. Only jpg, jpeg, png and pdf files are allowed");
              $("#file-upload2").val("");
              $("bar-5").addClass("hide");

             }

            }
          }
        });
      });
    };


    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload2();
  }
}

function readURL3(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var allowed_ext = ['png','jpg','jpeg'];

    reader.onload = function(e) {
      $('#bar-6').removeClass("hide");
      $('.bar-percentage3[data-percentage3]').each(function () {
        var progress = $(this);
        var percentage = Math.ceil($(this).attr('data-percentage3'));
        $({countNum: 0}).animate({countNum: percentage}, {
          duration: 5000,
          easing:'linear',
          step: function(){
            // What todo on every count
            var pct = Math.ceil(this.countNum) + '%';
            progress.text(pct) && progress.siblings().children().css('width',pct);
            if(pct == '100%'){
              if($.inArray(file_type, allowed_ext) != -1){
                $('.image-upload-wrap3').hide();
                $('.file-upload-image3').attr('src', e.target.result);
                $(".file-name3").html(input.files[0].name);
                $(".file-size3").html(Math.ceil(input.files[0].size / 1024)+ "kb");
                $('.file-upload-content3').show();
                $("#bar-6").addClass("hide");
              }
            else{
              alert_failure_long("Invalid file type. Only jpg, jpeg, png and pdf files are allowed");
              $("#file-upload3").val("");
              $("bar-6").addClass("hide");

             }

            }
          }
        });
      });
    };


    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload3();
  }
}

function readURL4(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var allowed_ext = ['pdf','png','jpg','jpeg','doc', 'docx'];
    reader.onload = function(e) {
      $('#bar-7').removeClass("hide");
      $('.bar-percentage4[data-percentage4]').each(function () {
        var progress = $(this);
        var percentage = Math.ceil($(this).attr('data-percentage4'));
        $({countNum: 0}).animate({countNum: percentage}, {
          duration: 5000,
          easing:'linear',
          step: function(){
            // What todo on every count
            var pct = Math.ceil(this.countNum) + '%';
            progress.text(pct) && progress.siblings().children().css('width',pct);

            if(pct == '100%'){
              if($.inArray(file_type, allowed_ext) != -1){
                  $('.image-upload-wrap4').hide();
                  if(file_type == 'pdf'){
                    $('.file-upload-image4').attr('src', 'assets/images/icon/pdf.png');
                  }
                  else{
                  $('.file-upload-image4').attr('src', e.target.result);
                  }
                  $(".file-name4").html(input.files[0].name);
                  $(".file-size4").html(Math.ceil(input.files[0].size / 1024)+ "kb");
                  $('.file-upload-content4').show();
                  $("#bar-7").addClass("hide");
              }
              else{
                  alert_failure_long("Invalid file type. Only jpg, jpeg, png and pdf files are allowed");
                  $("#file-upload4").val("");
                  $("bar-7").addClass("hide");
              }
            }
          }
        });
      });
    };


    reader.readAsDataURL(input.files[0]);

  }
  else {
    removeUpload2();
  }
}

function readURL5(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var allowed_ext = ['pdf','png','jpg','jpeg','doc', 'docx'];
    reader.onload = function(e) {
      $('#bar-8').removeClass("hide");
      $('.bar-percentage5[data-percentage5]').each(function () {
        var progress = $(this);
        var percentage = Math.ceil($(this).attr('data-percentage5'));
        $({countNum: 0}).animate({countNum: percentage}, {
          duration: 5000,
          easing:'linear',
          step: function(){
            // What todo on every count
            var pct = Math.ceil(this.countNum) + '%';
            progress.text(pct) && progress.siblings().children().css('width',pct);

            if(pct == '100%'){
              if($.inArray(file_type, allowed_ext) != -1){
                  $('.image-upload-wrap5').hide();
                  if(file_type == 'pdf'){
                    $('.file-upload-image5').attr('src', 'assets/images/icon/pdf.png');
                  }
                  else{
                  $('.file-upload-image5').attr('src', e.target.result);
                  }
                  $(".file-name5").html(input.files[0].name);
                  $(".file-size5").html(Math.ceil(input.files[0].size / 1024)+ "kb");
                  $('.file-upload-content5').show();
                  $("#bar-8").addClass("hide");
              }
              else{
                  alert_failure_long("Invalid file type. Only jpg, jpeg, png and pdf files are allowed");
                  $("#file-upload5").val("");
                  $("bar-8").addClass("hide");

              }


            }
          }
        });
      });
    };


    reader.readAsDataURL(input.files[0]);

  }
  else {
    removeUpload2();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
  $("#file-upload1").val("");

}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
function removeUpload2() {
  $('.file-upload-input2').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content2').hide();
  $('.image-upload-wrap2').show();
  $("#file-upload2").val("");
}
$('.image-upload-wrap2').bind('dragover', function () {
    $('.image-upload-wrap2').addClass('image-dropping');
  });
  $('.image-upload-wrap2').bind('dragleave', function () {
    $('.image-upload-wrap2').removeClass('image-dropping');
});

function removeUpload3() {
  $('.file-upload-input3').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content3').hide();
  $('.image-upload-wrap3').show();
  $("#file-upload3").val("");
}
$('.image-upload-wrap3').bind('dragover', function () {
    $('.image-upload-wrap3').addClass('image-dropping');
  });
  $('.image-upload-wrap3').bind('dragleave', function () {
    $('.image-upload-wrap3').removeClass('image-dropping');
});
function removeUpload3() {
  $('.file-upload-input3').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content3').hide();
  $('.image-upload-wrap3').show();
  $("#file-upload3").val("");
}
$('.image-upload-wrap3').bind('dragover', function () {
    $('.image-upload-wrap3').addClass('image-dropping');
  });
  $('.image-upload-wrap3').bind('dragleave', function () {
    $('.image-upload-wrap3').removeClass('image-dropping');
});

function removeUpload4() {
  $('.file-upload-input4').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content4').hide();
  $('.image-upload-wrap4').show();
  $("#file-upload4").val("");
}
$('.image-upload-wrap4').bind('dragover', function () {
    $('.image-upload-wrap4').addClass('image-dropping');
  });
  $('.image-upload-wrap4').bind('dragleave', function () {
    $('.image-upload-wrap4').removeClass('image-dropping');
});

function removeUpload5() {
  $('.file-upload-input5').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content5').hide();
  $('.image-upload-wrap5').show();
  $("#file-upload5").val("");
}
$('.image-upload-wrap5').bind('dragover', function () {
    $('.image-upload-wrap5').addClass('image-dropping');
  });
  $('.image-upload-wrap5').bind('dragleave', function () {
    $('.image-upload-wrap5').removeClass('image-dropping');
});

function checkPassword() {
  var x = document.getElementById("company_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function checkPassword2() {
  var x = document.getElementById("employee_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// Progress Bar
// function activate_progress_bar(){
// $('.bar-percentage[data-percentage]').each(function () {
//     var progress = $(this);
//     var percentage = Math.ceil($(this).attr('data-percentage'));
//     $({countNum: 0}).animate({countNum: percentage}, {
//       duration: 5000,
//       easing:'linear',
//       step: function() {
//         // What todo on every count
//         var pct = Math.ceil(this.countNum) + '%';
//         progress.text(pct) && progress.siblings().children().css('width',pct);
//       }
//     });
//   });
// }


// Get all states and city

$(document).ready(function(){
      $.ajax({
        type: 'POST',
        url: 'backend/location.php',
        cache: false,
        data:{
          get_states: 'get_states',
        }
    })
      .done(function(response){
        data = JSON.parse(response);
        $('#company_state, #employee_state').html("");
        $("#company_state, #employee_state").append('<option value="">Select State</option>');
        for(var i = 0; i <= data.length; i++){
        $('#company_state, #employee_state').append('<option value='+data[i].id+'>'+data[i].state_name+'</option>');
        }
      });

      $("#company_state, #employee_state").change(function(){

        $.ajax({
          type: 'POST',
          url: 'backend/location.php',
          cache: false,
          data: {
            get_cities: $(this).val(),
          },
          beforeSend: function(){
            $("#company_city, #employee_city").html('<option value="">Please Wait</option>');
          }
        })
        .done(function(response){
          data = JSON.parse(response);
          $("#company_city, #employee_city").html("");
          for(var i = 0; i <= data.length; i++){
            $("#company_city, #employee_city").append('<option value='+data[i].id+'>'+data[i].lga_name+'</option>');
          }
        });

      });
  });

  function recaptchaCallback(){
    $("#company_signup").removeAttr("disabled");
    $("#employee_signup").removeAttr("disabled");
    $("#captcha").val(grecaptcha.getResponse());
  }
//   function CheckPassword(input)
// {
//     var paswd=  /^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9]+$/;
//     if(input.value.match(paswd) && input.length >= 8)
//     {
//     return true;
//     }
//     else
//     {
//     return false;
//     }
// }
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
