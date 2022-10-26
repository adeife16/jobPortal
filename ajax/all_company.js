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
      $('#search-loader').toggleClass("hide");
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
        $("#company-city").html("Loading...");
      }
    })
    .done(function(response){
      data = JSON.parse(response);
      load_city(data);
    })
  }
}

// Get all random companys
function getAllCompanies(page){
  var state = $("#company-state").val();
  var city = $("#company-city").val();
  $.ajax({
    type: 'POST',
    url: 'backend/company.php',
    cache: false,
    data: {
      "get_all_company": page
    },
    beforeSend: function(){
      $('#search-loader').removeClass("hide");

    }
  })
  .done(function(response){
    data = JSON.parse(response);
    data = data[0];
    if(data.companies.length === 0)
    {
      $("#pagination").val(0);
    }
    if(data.status === 'success'){
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
    setTimeout(function(){showAllCompanys(data.companies);},2000);

  }
  else{
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
    alert_failure('An error occured when getting companies');
  }
  })
}

// search company
function getCompany(page, state, city){
  $.ajax({
    type: 'POST',
    url: 'backend/company.php',
    cache: false,
    data: {
      getCompany: state,
      city: city,
      page: page
    },
    beforeSend: function(){
      $('#search-loader').toggleClass("hide");
    }
  })
  .done(function(response){
    var page = $("#pagination").val();
    if(response === 'empty' && page == 0){
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
    setTimeout(function(){$("#display-div").html("<h3 class='blue color-white p-2 m-2' >NO COMPANY AVAILABLE IN THE CHOOSEN AREA!</h3> ");},2000);
    }
    else if(response === 'empty'){
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
    }
    else if(response === 'error'){

    }
    else{
      data = JSON.parse(response);
      setTimeout(function(){$('#search-loader').toggleClass("hide"); },2000);
      setTimeout(function(){showCompanys(data);},2000);

    }
  })
}
