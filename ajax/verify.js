$('.preloader').removeClass("hide");
$(document).ready(function() {
  var url = window.location.href;
  url = url.split('=');
  var type = url[2];
  url = url[1];
  url = url.split("?");
  url = url[0];
  if(url != ""){
    if(type == "company"){

      $.ajax({
        type: 'POST',
        url: 'backend/company_signup.php',
        data: {
          company_verify: url
        },
        beforeSend: function(){
        }
      })
      .done(function(response){
        console.log(response);
        if(response == "success"){
          $('.preloader').addClass("hide");
          $('.message').html('VERIFICATION SUCCESSFUL!')
          setTimeout(function(){window.location.href = 'login.php'},3000);
        }
        else{
          $('.preloader').addClass("hide");
          $('.message').html('VERIFICATION FAILED PLEASE TRY AGAIN!')
          setTimeout(function(){window.location.href = 'index.php'},3000);

        }
      })
    }
    else{
      $.ajax({
        type: 'POST',
        url: 'backend/employee_signup.php',
        data: {
          employee_verify: url
        },
        beforeSend: function(){
          // $('.preloader').fadeIn();
        }
      })
      .done(function(response){

        if(response == "success"){
          $('.preloader').addClass("hide");
          $('.message').html('CONGRATULATIONS! YOUR ACCOUNT HAS BEEN ACTIVATED YOU ARE BEING REDIRECTED TO THE LOGIN PAGE.')
          setTimeout(function(){window.location.href = 'login.php'},3000);
        }
        else{
          $('.preloader').addClass("hide");
          $('.message').html('VERIFICATION FAILED PLEASE TRY AGAIN!')
          setTimeout(function(){window.location.href = 'index.php'},3000);

        }
      })

    }
  }
});
