$(document).ready(function() {
  getStates()
  getAllEmployees();
});

// display state dropdown
function show_state(data){
  $("#rider-state").html("")
  for(var i=0; i<data.length; i++){
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

// display riders
function showEmployees(data){
  $("#display-table").html('');
  console.log(data)
  for(var i = 0; i < data.length; i++){
      if(data[i].status === 'active'){
        $("#display-table").append(`
          <tr>
            <td><img class=table-image src=../assets/images/profile_picture/`+data[i].picture+`></td>
            <td>`+data[i].first_name+ ' ' +data[i].last_name+`</td>
            <td>`+data[i].employee_id+`</td>
            <td>`+data[i].status+`</td>
            <td>`+data[i].employment_status+`</td>
            <td><button type="button" id="del-modal" class="btn btn-danger" value="`+data[i].employee_id+`" data-toggle="modal" data-target="#delModal">Delete</button>
            <button type="button"  class="btn btn-warning disable" value="`+data[i].employee_id+`">Disable</button></td>
            </tr>`)
      }
      else{
        $("#display-table").append(`
          <tr>
            <td><img class=table-image src=../assets/images/profile_picture/`+data[i].picture+`></td>
            <td>`+data[i].first_name+ ' ' +data[i].last_name+`</td>
            <td>`+data[i].employee_id+`</td>
            <td>`+data[i].status+`</td>
            <td>`+data[i].employment_status+`</td>
            <td><button type="button" id="del-modal" class="btn btn-danger delete" value="`+data[i].employee_id+`" data-toggle="modal" data-target="#delModal">Delete</button>
            <button type="button" class="btn btn-success enable" value="`+data[i].employee_id+`">Activate</button></td>
          </tr>
          `)

      }
  }
}

// on action button click
$("#action-btn").click(function(e){
  e.preventDefault();
  $('.name-show, .location-show, #name-form, #location-form').toggleClass('hide');

})



// search by name
$(document).on('keydown', "#rider-name",function(e){
  var keyword = $(this).val();
    searchRider(keyword)
})


// on delete button click
$(document).on('click', '#del-modal', function(e){
  var employee_id = $(this).val();
  $("#del-span").html('<button class="btn btn-danger" id="del-btn" value='+employee_id+'>Delete</button>');
})
$(document).on('click', '#del-btn', function(e){
  e.preventDefault();
  var employee_id = $(this).val();
  delRider(employee_id);
})

// on disable button click
$(document).on('click', '.disable', function(e){
  e.preventDefault();
  disable($(this).val());
})

// on activate button click
$(document).on('click', '.enable', function(e){
  e.preventDefault();
  enable($(this).val());
})
