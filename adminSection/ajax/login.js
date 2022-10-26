// login function
function login(email, pass){
  $.ajax({
    url: 'backend/login.php',
    type: 'POST',
    cache: false,
    data: {
      email: email,
      pass: pass
    },
    beforeSend: function(){

    }
  })
  .done(function(response) {
      console.log(response);
    data = JSON.parse(response);
    var resStatus = data[0].status;
    if(resStatus === "success"){
      // alert_success("Logged In!")
      window.location.replace("dashboard.php");
    }
    else if(resStatus === "invalid"){
      alert_failure("Email or Password is incorrect!");
    }
  })
  .fail(function() {
    console.log("error");

  })
  // .always(function() {
  //   console.log("complete");
  // });

}

// reset password

function reset(email){
  $.ajax({
    url: 'backend/login.php',
    type: 'POST',
    cache: false,
    data: {passReset: email},
    beforeSend: function(){

    }
  })
  .done(function(response) {
    data = JSON.parse(response);
    var resStatus = data[0].status;
    console.log(resStatus);
    if(resStatus === "success"){
      // changePass()
      $("#content-display").html
      (`
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-2">Enter verification code</h1>
        </div>
        <form class="user" >
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="code" name="code" placeholder="Enter verification code">
          </div>

          <button id="verify-pass-reset" class="btn btn-primary btn-user btn-block">
            Verify
          </button>
        </form>
        `);
    }
    else {
      alert_failure("Couldn't reset password please try again");
    }
  })
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });
}

// change password
function changePass(pass, passConfirm){
  $.ajax({
    url: 'backend/login.php',
    type: 'POST',
    cache: false,
    data: {
      changePass: pass,
      passConfirm: passConfirm
    }
  })
  .done(function(response) {
    console.log(response);
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}
