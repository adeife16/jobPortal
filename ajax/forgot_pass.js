// reset password
function reset_pass(email){

  $.ajax({
    type: 'POST',
    url: 'backend/pass_reset.php',
    cache: false,
    data: {
      "reset_pass": email
    },
    beforeSend: function(){
      $("#pass-form-submit").toggleClass("hide");
      $("#pass-form-btn").toggleClass("hide");
    }
  })
  .done(function(response){

    $("#pass-form-submit").toggleClass("hide");
    $("#pass-form-btn").toggleClass("hide");
    if(response == "success"){
      alert_success("Email sent successfully!")
      verify_display();
    }
    else if(response == "invalid"){
      alert_failure("Email address does not exist!");
    }
    else if(response == "error"){
      alert_failure("An error has occured please try again!");
    }
    else{

      alert_failure("An error has occured please try again!");
    }
  })
}

// submit passcode

function submit_code(passcode){


  $.ajax({
    type: 'POST',
    url: 'backend/pass_reset.php',
    cache: false,
    data: {
      'passcode': passcode
    },
    beforeSend: function(){
      $("#passcode-submit").toggleClass("hide");
      $("#pass-form-btn").toggleClass("hide");
    }
  })
  .done(function(response){
    if(response == "success"){
      $("#passcode-submit").toggleClass("hide");
      $("#pass-form-btn").toggleClass("hide");
      password_display();
    }
    else{
      $("#passcode-submit").toggleClass("hide");
      $("#pass-form-btn").toggleClass("hide");
      alert_failure("Invalid recovery code!");
    }
  })
}

// change password
function change_pass(pass, confirmPass){

  $.ajax({
    type: 'POST',
    url: 'backend/pass_reset.php',
    cache: false,
    data: {
      'pass': pass,
      'confirmPass': confirmPass
    },
    beforeSend: function(){
      $("#password-submit").toggleClass("hide");
      $("#pass-form-btn").toggleClass("hide");
    }
  })
  .done(function(response){
    $("#password-submit").toggleClass("hide");
    $("#pass-form-btn").toggleClass("hide");

    if(response == "success"){
      alert_success("Password updated successfully!");
      setTimeout(function(){window.location.href = 'login.php'},3000);
    }
    else{
      alert_failure("An error has occured please try later");
    }
  })
}
