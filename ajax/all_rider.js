// get all states
function getStates(){
  $.ajax({
    type: 'POST',
    url: 'backend/location.php',
    cache: false,
    data:{
      "get_states": "get"
    },
    beforeSend: function(){

    }
  })
  .done(function(response){
    data = JSON.parse(response);
    show_state(data);
  })
}
// get all city
function get_city(state){
  if(state != "" || state != null){
    $.ajax({
      type: 'POST',
      url: 'backend/location.php',
      cache: false,
      data: {
        "get_cities": state
      },
      beforeSend: function(){
        $("#rider-city").html("Loading...");
      }
    })
    .done(function(response){
      data = JSON.parse(response);
      load_city(data);
    })
  }
}

// Get all random riders
function getAllRiders(page){
  $.ajax({
    type: 'POST',
    url: 'backend/rider.php',
    cache: false,
    data: {
      "get_all_rider": page,
    },
    beforeSend: function(){
      $('#search-loader').toggleClass("hide");
    }
  })
  .done(function(response){
    data = JSON.parse(response);
    data = data[0];

    if(data.status === 'success'){
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
      if(data.riders.length === 0){
        $("#pagination").val(0);
      }
    setTimeout(function(){showAllRiders(data.riders);},2000);
  }
  else{
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
    alert_failure('An error occured when getting riders');
  }
  })
}

// Get riders
function getRider(page, state, city){
  $.ajax({
    url: 'backend/rider.php',
    type: 'POST',
    cache: false,
    data: {
      getRider: state,
      city: city,
      page: page
    },
    beforeSend: function(){
      $('#search-loader').toggleClass("hide");
    }
  })
  .done(function(response) {
    if(response === 'empty' && page == 0){
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
    setTimeout(function(){$("#display-div").html("<h3 class='blue color-white p-2 m-2' >NO RIDER AVAILABLE IN THE CHOOSEN AREA!</h3> ");},2000);
    }
    else if(response === 'empty'){
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
    }
    else if(response === 'error'){

    }
    else{
      data = JSON.parse(response);
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
      setTimeout(function(){showRiders(data);},2000);

    }
  })
  .fail(function() {
    console.log("error");
  })
  // .always(function() {
  //   console.log("complete");
  // });

}
