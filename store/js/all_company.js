$('#pagination').val(0);
$(document).ready(function() {
  var session_var = sessionStorage.getItem("session_id");
  // check if session exist
  if(session_var == "" || session_var == null){
    window.location.replace('index.php');
  }
  // get all states
  else{
    getStates();
    getAllCompanies();
  }
});

// display state dropdown
function show_state(data){
  $("#company-state").html("")
  for(var i=0; i<=data.length; i++){
    $("#company-state").append("<option value="+data[i].id+">"+data[i].state_name+"</option>");
  }
}
// get city on state change
$("#company-state").change(function(e){
  e.preventDefault();
  var state = $(this).val();
  get_city(state);
})

// display city dropdown
function load_city(data){
  $("#company-city").html("");
  for(var i=0; i<=data.length; i++){
    $("#company-city").append("<option value="+data[i].id+">"+data[i].lga_name+"</option>");

  }
}

// display companys
function showAllCompanys(data){
  if(data != "" && data != null)
  {
    stars = '';
    for(var i=0; i<=data.length; i++){
      stars = '';
      if(data[i].avg_rating >= 0){
        for(var j=0; j<=data[i].avg_rating; j++ ){
          stars += '<i class="fas fa-star fa-md color-yellow"></i>';
        }
      }
      $("#display-div").append('<div class="col-lg-3 col-sm-6"><a href="view_profile.php?userId='+data[i].company_id+'?userType=company" target="blank"><div class="single_ads_card mt-30"><div class="ads_card_image"><img src="assets/images/company_logo/'+data[i].logo+'" alt="company image"></div><div class="ads_card_content"><div class="stars">'+stars+'</div><h4 class="title"><a href="view_profile.php?userId='+data[i].company_id+'?userType=company" target="blank">'+data[i].company_name+'</a></h4><p><i class="icon ion-ios-location"></i>'+data[i].lga_name+','+data[i].state_name+'</p></div></div></a></div>');
      $("#load-more").html('<button class="btn color-white blue loadAllCompanys" id="loadAllCompanys">LOAD MORE</button>');
      var page = $('#pagination').val();

    }
  }
}
// display search
function showCompanys(data){
  var page = $('#pagination').val()
  page = parseInt(page);
  $("#pagination").val(page+1);
  if(data != "" && data != null)
  {

    stars = '';
    // $("#display-div").html('');
    for(var i=0; i<=data.length; i++){
      stars = '';
      if(data[i].avg_rating >= 0){
        for(var j=0; j<=data[i].avg_rating; j++ ){
          stars += '<i class="fas fa-star fa-md color-yellow"></i>';
        }
      }
      $("#display-div").append('<div class="col-lg-3 col-sm-6"><a href="view_profile.php?userId='+data[i].company_id+'?userType=company" target="blank"><div class="single_ads_card mt-30"><div class="ads_card_image"><img src="assets/images/company_logo/'+data[i].logo+'" alt="company image"></div><div class="ads_card_content"><div class="stars">'+stars+'</div><h4 class="title"><a href="view_profile.php?userId='+data[i].company_id+'?userType=company" target="blank">'+data[i].company_name+'</a></h4><p><i class="icon ion-ios-location"></i>'+data[i].lga_name+','+data[i].state_name+'</p></div></div></a></div>');
      $("#load-more").html('<button class="btn color-white blue loadAllCompanys" id="loadMoreSearch">LOAD MORE</button>');
      var page = $('#pagination').val();

    }
  }
}
//
$(document).on('click', '#loadAllCompanys', function(e){
  e.preventDefault();
  $(this).addClass('hide');
  getAllCompanies();

});

$("#search").click(function(e){
  e.preventDefault();
  var state = $("#company-state").val();
  var city = $("#company-city").val();
  if(city === "" || city === null){
    alert_failure("Select Preferred City");
  }
  else{
    $("#display-div, #load-more").html('');
    getCompany(0, state, city);
  }

})
// load more search content

$(document).on('click','#loadMoreSearch', function(e){
  e.preventDefault();
  $(this).addClass('hide')
  var state = $("#company-state").val();
  var city = $("#company-city").val();
  var page = $("#pagination").val();
  page = parseInt(page);
  getCompany(page, state, city);
})
