$(document).ready(function() {

  $("#login").click(function(e){
    var error = 0;
    var email = $("#login-email").val();
    var pass = $("#login-password").val();
    e.preventDefault();
    $("#login-form").find(":text, :password").each(function(){
      if($(this).val() == ""){
        $(this).addClass("red-border");
        error = 1;
      }
    });

    if(error == 0){
      $.ajax({
        type: "POST",
        url: "backend/login.php",
        cache: false,
        data: {
          email: email,
          pass: pass
        },
        beforeSend: function(){
          $("#login").addClass("hide");
          $("#login-loader").removeClass("hide");
        }
      })
      .done(function(response){
        data = JSON.parse(response);
        // if response status is success, create session variables
        if(data[0].status == "success"){
          $("#login").removeClass("hide");
          $("#login-loader").addClass("hide");

          var session_details = data[1];
          // console.log(session_details);
          sessionStorage.clear();
          for(var index in session_details) {
            console.log( index + " : " + session_details[index]);
            sessionStorage.setItem(index, session_details[index]);
          }
          window.location.replace ('index.php');
        }
        else if(data[0].status == "invalid"){
          alert_failure_long("Username or Password is Incorrect!");
          $("#login").removeClass("hide");
          $("#login-loader").addClass("hide");
        }
        else{
          $("#login").removeClass("hide");
          $("#login-loader").addClass("hide");

        }
      })
      .fail(function(xhr, textStatus, errorThrown){
        console.log(xhr.responseText);
      })
    }

  })
});
