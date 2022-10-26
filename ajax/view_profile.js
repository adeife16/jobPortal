// Get profile details
function getProfile(id, type){
    $.ajax({
    type: 'POST',
    url: 'backend/view_profile.php',
    cache: false,
    data: {
      getProfile: id,
      userType: type
    },
    beforeSend: function(){
      $('#page-loader').toggleClass("hide");
    }
  })
  .done(function(response) {
    data = JSON.parse(response);
    console.log(data)
    if(type != "employee"){
      showProfile(data[0].user_details, data[1], data[3].session_rating, data[2].ratings);
      showRatings(data[2].ratings);
    }
    else{

      showProfile(data.user_details, null, null, null);
    }
  });
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });

}
// send employment request
function employ(user){
  $.ajax({
    url: 'backend/view_profile.php',
    type: 'POST',
    cache: false,
    data: {
      employRequest: user,
    },
    beforeSend: function(){
      $("#employ-btn, #employ-btn-loader").toggleClass("hide");
    }
  })
  .done(function(response) {
    console.log(response);
    if(response === "success"){
      $("#employ-btn, #employ-btn-loader").addClass("hide");
      alert_success("Employment request sent successfully. Feedback will be sent to your inbox!");
      // if request sent, create cancel button
      $("#employ").html('<button class="btn color-white purple employ-cancel" id="employ-cancel">CANCEL</button><button class="btn color-white purple hide" id="employ-cancel-loader">SENDING</button>');
    }
    else{
      $("#employ-btn, #employ-btn-loader").toggleClass("hide");
      alert_failure("An error has occured!");
    }
    // console.log("success");
  })
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });
}

// cancel employment request
function cancelEmploy(user){
  $.ajax({
    url: 'backend/view_profile.php',
    type: 'POST',
    cache: false,
    data: {
      cancelRequest: user,
    },
    beforeSend: function(){
      $("#employ-cancel, #employ-cancel-loader").toggleClass("hide");
    }
  })
  .done(function(response) {
    console.log(response);
    if(response === "success"){
      alert_success("Employment request cancel successfully!");
      // if request canceled, create employ button
	     $("#employ").html('<button class="btn color-white blue employ-btn" id="employ-btn">EMPLOY</button><button class="btn color-white blue hide" id="employ-btn-loader">SENDING</button>');
    }
    else{
      $("#employ-cancel, #employ-cancel-loader").toggleClass("hide");
      alert_failure("An error has occured!");
    }
    // console.log("success");
  })
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });
}

// rate rider
function giveRating(rating, review, user, type){
  $.ajax({
    url: 'backend/rating.php',
    type: 'POST',
    cache: false,
    data: {
      rate: rating,
      review: review,
      userId: user,
      type: type
    },
    beforeSend: function(){
      $("#rider-review-submit, #rider-review-btn").toggleClass("hide");
    }
  })
  .done(function(response) {
    console.log(response);
    if(response === "success"){
      $("#rider-review-submit, #rider-review-btn").toggleClass("hide");
      alert_success("Ratings submitted Successfully");
      setTimeout(function(){ window.location.reload() },1000);
    }
    else{
      $("#rider-review-submit, #rider-review-btn").toggleClass("hide");
      alert_failure("Error submitting rating please try again later");
    }
  })
  .fail(function() {
    console.log("error");
  })
}
