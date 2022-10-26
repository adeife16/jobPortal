// Get profile details
function getProfile(){
  $.ajax({
    url: 'backend/profile.php',
    type: 'POST',
    cache: false,
    data: {getProfile: 'value1'}
  })
  .done(function(response) {
    data = JSON.parse(response);
    console.log(data);
    if(data.request === "success"){
      showProfile(data.details);
    }
  })
  .fail(function() {
    console.log("error");
  })
  // .always(function() {
  //   console.log("complete");
  // });

}
