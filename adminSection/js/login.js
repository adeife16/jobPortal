$(document).ready(function() {

  $("#login-btn").click(function(e){
    e.preventDefault();
    validate();
  })

  $("#pass-reset").click(function(e){
    e.preventDefault();
    passReset();
  })

  $("#verify-pass-reset").click(function(e){
    e.preventDefault();
    verify()
  })
});
// validate login
function validate(){
  var email = $("#email").val();
  var pass = $("#pass").val();

  if(email === null  || pass === null){
    alert_failure("Please fill all form fields!");
  }
  else{
    login(email, pass);
  }
}

// validate pass reset
function passReset(){
  var email = $("#reset-email").val();
  if(email === null || email === ""){
    alert_failure("Invalid email address");
  }
  else{
    reset(email);
  }
}

// validate pass reset vrification
// function verify(){
//   var
// }

// validate new password
function submitPass(){
  var pass = $("#pass").val();
  var passConfirm = $("#pass_confirm").val();

  if(pass === null || pass === ""){
    alert_failure("Please fill all form fields!");
  }
  else if(pass.length < 8){
    alert_failure("Password should be at least 8 characters");
  }
  else if (pass != passConfirm){
    alert_failure("Passwords do not match!");
  }
  else{
    changePass(pass, passConfirm);
  }
}
