// Display state dropdown
function show_state(state){

    var session_var = sessionStorage.getItem("session_type");
    state = state;
    if(state != "" || state != null){
      $("#edit_state","#rider_edit_state").html("");
      if(session_var == "company"){
        for(var i=0; i<=state.length; i++){
          $("#edit_state").append("<option value='"+state[i].id+"'>"+state[i].state_name+"</option>");
      }
    }
      else if(session_var == "rider"){
        for(var i=0; i<=state.length; i++){
          $("#rider_edit_state").append("<option value='"+state[i].id+"'>"+state[i].state_name+"</option>");

      }
    }
}
}
// Display city dropdown
function show_city(city, city_id){
  if(city != "" || city != null){
    $("#edit_city, #rider_edit_city").html("");
    for (var i = 0; i < city.length; i++) {
      $("#edit_city, #rider_edit_city").append("<option value='"+city[i].id+"'>"+city[i].lga_name+"</option>");
      $("#edit_city option[value="+city_id+"],#rider_edit_city option[value="+city_id+"]").attr('selected',true);
    }
  }
}
// Change city dropdown when state is changed
$("#edit_state, #rider_edit_state").change(function(){
  var state = $(this).val();
  get_city(state, null);
})
$("#edit_name, #edit_email").click(function(e){
  e.preventDefault();
  alert_failure("Detail cannot be edited please contact the admin");
})
// On page load
$(document).ready(function() {
  var session_var = sessionStorage.getItem("session_id");
  // Check if Session exists
  if(session_var == "" || session_var == null){
    window.location.replace ('index.php');
  }
  // profile details
  else{
    get_state();
    get_profile(session_var);
  }
})

// Display Profile Details

function show_profile(session_var, data){
  if(data == "" || data == null){
    alert_failure("An error occured while collecting your data");
  }
  // Company
  else{
    if(session_var == "company"){
      $("#profile-edit-company").removeClass("hide");
      $("#rider-div").html('');
      $(".details, #basic_details").html("");
      $("#showImage").html('');
      $("#profile-image").attr('src', 'assets/images/company_logo/'+data[0].logo+'?'+ new Date().getTime() );

        get_city(data[0].state,data[0].city);
      for(var i = 0; i <= data.length; i++){
        $("#basic_details").append('<p><h2>'+data[i].company_name+'</h2></p><p><h4>'+data[i].company_email+'</h4></p><p>&nbsp;<i class="icon ion-ios-location"></i>'+data[i].lga_name+', '+data[i].state_name+' State</p>');

        $(".details").append("<table class='table table-responsive'><tr><td>Name :</td><td>"+ data[i].company_name +"</td></tr><tr><td> Email : </td><td>"+data[i].company_email+"</td></tr><tr><td>Address : </td><td>"+data[i].company_address+"</td></tr><tr><td>State : </td><td>"+data[i].state_name+"</td></tr><tr><td>City : </td><td>"+data[i].lga_name+"</td></tr><tr><td>Phone Number1 : </td><td>"+data[i].company_number+"</td></tr><tr><td>Phone Number2 : </td><td>"+data[i].company_number_optional+"</td></tr><tr><td>Number of Employees : </td><td>"+data[i].employees+"</td></tr></table>");
        data = data[0];
        $("#edit_name").val(data.company_name);
        $("#edit_email").val(data.company_email);
        $("#edit_address").val(data.company_address);
        $("#edit_phone1").val(data.company_number);
        $("#edit_phone2").val(data.company_number_optional);
        $("#edit_employees").val(data.employees);

        $("#edit_state option[value="+data.state+"]").attr('selected','selected');
        // $("#edit_city option[value="+data.city+"]").attr('selected',true);
      }
    }
    // Rider
    else if(session_var == "rider"){
      $("#profile-edit-rider").removeClass('hide');
      // $("#company-div").html('')
      $(".details, #basic_details").html("");
      $("#showImage").html('');
      $("#profile-image").attr('src', 'assets/images/profile_picture/'+data[0].picture+'?'+ new Date().getTime() );
      var state = data[0].state;
      get_state();
      $("#rider_edit_state option[value="+state+"]").attr('selected','selected');


      get_city(data[0].state,data[0].city);
      for(var i = 0; i <= data.length; i++){
        $("#basic_details").append('<p><h2>'+data[i].first_name+' '+data[i].last_name+'</h2></p><p><h4>'+data[i].email+'</h4></p><p>&nbsp;<i class="icon ion-ios-location"></i>'+data[i].lga_name+', '+data[i].state_name+' State</p>');

        $(".details").append("<table class='table table-responsive'><tr><td colspan='2'><h5 class='color-blue'>PROFILE DETAILS</h5></td></tr><tr><td>Name :</td><td>"+ data[i].first_name+' '+data[i].last_name+"</td></tr><tr><td> Email : </td><td>"+data[i].email+"</td></tr><tr><td>Address : </td><td>"+data[i].address+"</td></tr><tr><td>State : </td><td>"+data[i].state_name+"</td></tr><tr><td>City : </td><td>"+data[i].lga_name+"</td></tr><tr><td>Gender : </td><td>"+data[i].gender+"</td></tr><tr><td>Date of Birth : </td><td>"+data[i].dob+"</td></tr><tr><td>Phone Number1 : </td><td>"+data[i].phone+"</td></tr><tr><td>Phone Number2 : </td><td>"+data[i].phone_option+"</td></tr><tr><td>Years of Experience : </td><td>"+data[i].experience+"</td></tr><tr><td>About : </td><td>"+data[i].about+"</td></tr><tr><td colspan='2'><h5 class='color-blue'>PREVIOUS EMPLOYMENT</h5></td></tr><tr><td>Company Name : </td><td>"+data[i].previous_employment+"</td></tr><tr><td>Company Address : </td><td>"+data[i].previous_employment_address+"</td></tr><tr><td>Company Phone Number : </td><td>"+data[i].previous_employment_phone+"</td></tr><tr><td colspan='2'><h5 class='color-blue'>REFERENCE</h5></td></tr><tr><td>Reference Name : </td><td>"+data[i].reference_name+"</td></tr><tr><td>Referernce Address : </td><td>"+data[i].reference_address+"</td></tr></table>");

        data = data[0];

        $("#rider_edit_firstname").val(data.first_name);
        $("#rider_edit_lastname").val(data.last_name);
        $("#rider_edit_email").val(data.email);
        $("#rider_edit_address").val(data.address);
        $("#rider_edit_phone1").val(data.phone);
        $("#rider_edit_phone2").val(data.phone_option);
        $("#rider_edit_dob").val(data.dob);
        $("#rider_edit_experience").val(data.experience);
        $("#rider_edit_about").val(data.about);
        $("#rider_edit_companyname").val(data.previous_employment);
        $("#rider_edit_companyaddress").val(data.previous_employment_address);
        $("#rider_edit_companyphone").val(data.previous_employment_phone);
        $("#edit_state option[value="+data.state+"]").attr('selected','selected');
    }
  }
}
setTimeout(function(){$('#page-loader').toggleClass("hide"); },2000);
}

// Validate Update Form
$("#edit_profile").click(function(e){
  e.preventDefault();

  var address = $("#edit_address").val();
  var phone1 = $("#edit_phone1").val();
  var phone2 = $("#edit_phone2").val();
  var employees = $("#edit_employees").val();

  if(address == "" || phone1 == "" || employees == ""){
    alert_failure("Fill the required fields");
  }
  else{
    update_profile_company();
  }
});

$('#edit_profile_rider').click(function(e){
  e.preventDefault();

  var firstname = $("#rider_edit_firstname").val();
  var lastname = $("#rider_edit_lastname").val();
  var address = $("#rider_edit_address").val();
  var phone1 = $("#rider_edit_phone1").val();
  var phone2 = $("#rider_edit_phone2").val();
  var experience = $("#rider_edit_experience").val();
  var about = $("#rider_edit_about").val();
  var company_name = $("#rider_edit_companyname").val();
  var company_address = $("#rider_edit_companyaddress").val();
  var company_phone = $("#rider_edit_companyphone").val();

  if(firstname == "" || lastname == "" || address == "" || phone1 == "" || experience == "" || about == "" || company_name == "" || company_address == "" || company_phone == ""){
    alert_failure("Fill the required fields");
  }
  else {
    update_profile_rider();
  }
});

// Validate Update Password
$("#update_pass").click(function(e){
  e.preventDefault();

  var old_pass = $("#old_pass").val();
  var new_pass = $("#new_pass").val();

  if(old_pass == "" || new_pass == ""){
    alert_failure("Fill all form fields");
  }
  else{
    update_pass_company();
  }
})
// Validate Update picture
$("#ImageSubmit").click(function(e){
  e.preventDefault();
  var formdata = new FormData(document.getElementById('uploadImageForm'));
  var image = $("#uploadImage").val();

  if(image == "" || image == null){
    $("#photo-warning").html("");
    $("#photo-warning").html("Select a picture to upload");
  }
  else{
    update_picture(formdata);
  }

})
// Picture Update function
function readURL(input) {
  var error = 0;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var file_type =  input.files[0].name.replace(/^.*\./, '');
      var file_size = input.files[0].size;
      var allowed_ext = ['png','jpg','jpeg'];
      reader.onload = function(e) {
                if($.inArray(file_type, allowed_ext) != -1){
                    if(file_size <= 1000000){
                      $("#photo-warning").html("");
                        // $('#profile_pic').attr('src', e.target.result);
                        $('.profile-photo').html('<img src="'+e.target.result+'" class="profile_pic" id="profile_pic"  alt="">');
                    }
                    else{
                        error = 1;
                        $("#photo-warning").html("Picture size exceeds limit of 1Mb");
                        $('.profile-photo').html('');
                }
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
