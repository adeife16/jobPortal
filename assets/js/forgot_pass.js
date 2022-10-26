//
$("#pass-form-submit").click(function(e){
  e.preventDefault();

  var email = $("#email").val();

  if(email === "" || email === null){
    alert_failure("Enter your email address!");
  }
  else {
    reset_pass(email);
  }
})
// display verification message and form
function verify_display(){
  $("#pass-form").html("");
  $("#pass-form-message").html('<div class="recovery-message><p class=""><h4 class="color-white blue p-3 text-center">An email containing a verification code has been sent to you. Enter the verification code below</h4></p></div>');
  $("#pass-form").append('<div class="form-group"><label for="passcode">Verification Code</label><input type="text" name="passcode" class="form-control" id="passcode" placeholder="Enter your verification code"></div><div class="form-group"><button type="button" class="btn color-white blue"  id="passcode-submit">SUBMIT</button><button type="button" class="btn color-white blue hide" id="pass-form-btn" disabled>VERIFYING...</button></div>');
}
//
$(document).on('click', "#passcode-submit", function(e){
  e.preventDefault();

  var passcode = $("#passcode").val();
  if(passcode != "" ||passcode != null){
    submit_code(passcode);

  }
})

// display password form
function password_display(){
  $("#pass-form").html("");
  $("#pass-form-message").html('<div class="recovery-message><p class=""><h4 class="color-white blue p-3 text-center">Your account has been recovered successfully. Enter your new password below</h4></p></div>');
  $("#pass-form").append('<div class="form-group"><label for="password">Password</label><input type="password" name="password" class="form-control" id="password" placeholder="Enter your new password"><small class="color-red">Password should be at least 8 characters long</small></div><div class="form-group"><label for="confirm-password">Confirm Password</label><input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm Password"></div><div class="form-group"><button type="button" class="btn color-white blue"  id="password-submit">SUBMIT</button><button type="button" class="btn color-white blue hide" id="pass-form-btn" disabled>SENDING...</button></div>');

}
//
$(document).on('click',"#password-submit", function(e){
  e.preventDefault();
  var password = $("#password").val();
  var confirmPassword = $("#confirm-password").val();

if(passValidate(password) === false){
  alert_failure("Please fill all form fields!");
}
else if(password != confirmPassword){
  alert_failure("Passwords do not match!");
}
else if(password.length < 8){
  alert_failure("Password too short!");

}
else{
  change_pass(password, confirmPassword);
}

})
