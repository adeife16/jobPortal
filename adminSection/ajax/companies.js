// get states
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

// search rider
function searchRider(key){
  $.ajax({
    url: 'backend/rider.php',
    type: 'POST',
    cache: false,
    data: {
      search: key
    },
    beforeSend: function(){

    }
  })
  .done(function(response) {
    data = JSON.parse(response)
    // console.log(data);
    showRiders(data);
  })
  .fail(function() {
    console.log("error");
  })
  // .always(function() {
  //   console.log("complete");
  // });

}

function delRider(rider_id){
  $.ajax({
    url: 'backend/rider.php',
    type: 'POST',
    data: {
      delRider: rider_id
    }
  })
  .done(function(response) {
    if(response === "success"){
      alert_success("Rider deleted successfully!");
    }
  })
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });

}

function getAllCompanies(){
  $.ajax({
    type: 'GET',
    url: 'backend/companies.php?getCompanies=all',
    cache: false,
    beforeSend: function(){

    }
  })
  .done(function(res){
    let data = JSON.parse(res);
    console.log(data);
    if(data.status === "success"){
      showCompanies(data.data);
    }
  })
}

// disable user

function disable(id){
  $.ajax({
    type: 'POST',
    url: 'backend/companies.php',
    data: {
      disable: id
    },
    cache: false
  })
  .done(function(res){
    let data = JSON.parse(res);
    if(data.status === "success"){
      getAllCompanies();
      alert_success("User Disabled")
    }
  })
}
// enable user

function enable(id){
  $.ajax({
    type: 'POST',
    url: 'backend/companies.php',
    data: {
      enable: id
    },
    cache: false
  })
  .done(function(res){
    let data = JSON.parse(res);
    if(data.status === "success"){
      getAllCompanies();
      alert_success("User Activated")
    }
  })
}