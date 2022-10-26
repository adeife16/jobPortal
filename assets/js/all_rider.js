$('#pagination').val(0);
$(document).ready(function() {
  var session_var = sessionStorage.getItem("session_id");
  var currentPage = $("#pagination").val();
  // check if session exist
  if(session_var == "" || session_var == null){
    window.location.replace('index.php');
  }
  // get all states
  else{
    getStates();
    getAllRiders(0);
  }
});

// display state dropdown
function show_state(data){
  $("#rider-state").html("")
  for(var i=0; i<=data.length; i++){
    $("#rider-state").append("<option value="+data[i].id+">"+data[i].state_name+"</option>");
  }
}
// get city on state change
$("#rider-state").change(function(e){
  e.preventDefault();
  var state = $(this).val();
  get_city(state);
})

// display city dropdown
function load_city(data){
  $("#rider-city").html("");
  for(var i=0; i<=data.length; i++){
    $("#rider-city").append("<option value="+data[i].id+">"+data[i].lga_name+"</option>");

  }
}

// display all riders
function showAllRiders(data){
  var page = $('#pagination').val()
  page = parseInt(page);
  $("#pagination").val(page+1);
  if(data != "" || data != null)
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
      $("#display-div").append
      (`
        <div class="col-lg-3 col-sm-6">
          <a href="view_profile.php?userId=`+data[i].rider_id+`?userType=rider" target="blank">
            <div class="single_ads_card mt-30">
            <div class="ads_card_image">
              <img src="assets/images/profile_picture/`+data[i].picture+`" alt="rider image">
            </div>
            <div class="ads_card_content">
            <div class="meta d-flex justify-content-between">
              <p>Bike Rider</p>
              <a class="like" href="#">`+stars+`</a>
            </div>
            <h4 class="title">
              <a href="view_profile.php?userId=`+data[i].rider_id+`?userType=rider" target="blank">`+data[i].first_name+` `+data[i].last_name+`</a>
            </h4>
            <p>
              <i class="icon ion-ios-location"></i>`+data[i].lga_name+`,`+data[i].state_name+`
            </p>
            <div class="ads_price_date d-flex justify-content-between">
              <span class="price">`+data[i].experience+` years experience</span>
            </div>
          </div>
        </div>
      </a>
    </div>`);
      $("#load-more").html('<button class="btn color-white blue loadAllRider" id="loadAllRider">LOAD MORE</button>');
      var page = $('#pagination').val();

    }
    }
}

// display riders
function showRiders(data){
  var page = $('#pagination').val()
  page = parseInt(page);
  $("#pagination").val(page+1);
  // $('#page-loader').addClass("hide");

  if(data != "" || data != null || data.length === 0)
  {
    var stars = '';
    for(var i=0; i<=data.length; i++){
      stars = '';
      if(data[i].avg_rating >= 0){
        for(var j=0; j<=data[i].avg_rating; j++ ){
          stars += '<i class="fas fa-star fa-md color-yellow"></i>';
        }
      }
      $("#display-div").append('<div class="col-lg-3 col-sm-6"><a href="view_profile.php?userId='+data[i].rider_id+'?userType=rider" target="blank"><div class="single_ads_card mt-30"><div class="ads_card_image"><img src="assets/images/profile_picture/'+data[i].picture+'" alt="rider image"></div><div class="ads_card_content"><div class="meta d-flex justify-content-between"><p>Bike Rider</p><a class="like" href="#">'+stars+'</a></div><h4 class="title"><a href="view_profile.php?userId='+data[i].rider_id+'?userType=rider" target="blank">'+data[i].first_name+' '+data[i].last_name+'</a></h4><p><i class="icon ion-ios-location"></i>'+data[i].lga_name+','+data[i].state_name+'</p><div class="ads_price_date d-flex justify-content-between"><span class="price">'+data[i].experience+' years experience</span><span class="date">25 Jan, 2023</span></div></div></div></a></div>');
      $('#load-more').html('<button class="btn color-white blue loadRider" id="loadMoreSearch">LOAD MORE</button>');
    }
  }
  else{
  }
}

// search button click
$("#search").click(function(e){
  e.preventDefault();
  var state = $("#rider-state").val();
  var city = $("#rider-city").val();
  if(city === "" || city === null){
    alert_failure("Select Preferred City!");
  }
  else {
    $("#display-div, #load-more").html('');
    $("#pagination").val(0);
    var page = $("#pagination").val();
    getRider(page, state, city);
  }
})
// load more content

$(document).on('click','#loadAllRider', function(e){
  $(this).addClass('hide');
  var page = $("#pagination").val();
  page = parseInt(page);
  getAllRiders(page)
})
// load more search content

$(document).on('click','#loadMoreSearch', function(e){
  e.preventDefault();
  $(this).addClass('hide');
  var state = $("#rider-state").val();
  var city = $("#rider-city").val();
  var page = $("#pagination").val();
  page = parseInt(page);

  getRider(page, state, city);
})

$(document).on('click','#loadRider', function(e){
  e.preventDefault();
  var page = $("#pagination").val();
  getMoreRiders()
})
