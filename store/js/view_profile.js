const date = new Date();
const currentYear = date.getFullYear();

const currentMonth = date.getMonth();

const currentDay = date.getDate();

// get userid fron url
const url = window.location.href;
function getUserId(string){
	var split_string = string.split('?');
	split_string = split_string[1];
	split_string = split_string.split('=');
	return split_string[1];
}
function getUserType(string){
	var split_string = string.split('?');
	split_string = split_string[2];
	split_string = split_string.split('=');
	return split_string[1];
}

$(document).ready(function() {
	var userId = getUserId(url);
	var userType = getUserType(url)
	var sessionId = sessionStorage.getItem("session_id");
	if(userId != null && userId != "" && userType != null && userType != ""){
		getProfile(userId, userType);
		// getRatings()

	}
	else{
		window.location.replace('index.php');
	}
});
// display profile Details

function showProfile(data, employ, session_rating, ratings){
	// get user type
	data = data[0];
	var userType = getUserType(url);
	var session_rating = String(session_rating)


	if(data === "" || data === null){
		window.location.replace('index.php');
	}
	else {
		$(document).ready(function() {
		var totalRating = 0
		var averageRating = 0
		for(var r=0; r<=ratings.length; r++){
		totalRating += ratings[r].rating;
		averageRating = totalRating/ratings.length;
		displayStars(averageRating)
	}
});
// display average rating
function displayStars(data){
	var stars = ''
	for(var j=0; j<=data; j++){
		stars += '<i class="fas fa-star fa-2x color-yellow"></i>';
	}
	$("#stars").html(stars);

}
// console.log(averageRating);


		// view rider profile
		if(userType === 'rider'){
			// calculate rider age
			var age = data.dob.split('-');
			age = age[0];
			var riderAge = currentYear - age;

			$("#profile-image").attr("src", "assets/images/profile_picture/"+data.picture);
			// check employment request
			if(employ.employ_request === "sent"){
				$("#employ").html('<button class="btn color-white purple employ-cancel" id="employ-cancel">CANCEL</button><button class="btn color-white purple hide" id="employ-cancel-loader">SENDING</button>');
			}
			else{
				$("#employ").html('<button class="btn color-white blue employ-btn" id="employ-btn">EMPLOY</button><button class="btn color-white blue hide" id="employ-btn-loader">SENDING</button>');
			}
			// check if rider is employed by current company
			if(employ.employ_status === 'employed'){
				$("#employ").html('<button class="btn color-white blue" id="">This User Is Your Employee</button>');
			}
			// check employment status
			if(data.employment_status === "Unemployed"){
				$("#employment-status").addClass("green");
			}
			else {
				$("#employment-status").addClass("red");
			}
			$("#status").html(data.employment_status);
			$("#basic_details").html('<p><h2>'+data.first_name+' '+data.last_name+'</h2></p>	<p><h4>Bike Rider</h4></p>	<p><i class="icon ion-ios-location"></i>'+data.lga_name+', '+data.state_name+'</p>');
			$("#other-details").html('<div>Gender: '+data.gender+' </div> <div>Age: '+riderAge+' Years</div>             <div>Experience: '+data.experience+' Years</div>  <div>Previous Employment: '+data.previous_employment+'</div> <div>Joined: '+joinDate(data.date_registered)+'</div>');
		}
		// view company profile
		else if(userType === 'company'){
			$("#profile-image").attr("src", "assets/images/company_logo/"+data.logo);
			$("#basic_details").html('<p><h2>'+data.company_name+'</h2></p><p><i class="icon ion-ios-location"></i>'+data.lga_name+', '+data.state_name+'</p>');
			$("#other-details").html('<div>Address: '+data.company_address+' </div>             <div>Employees: '+data.experience+' Employees</div>  <div>Joined: '+joinDate(data.date_registered)+'</div>');

		}
	}
	if(session_rating === "rated")
	{
		$("#rate-btn").addClass("hide");
	}
	setTimeout(function(){$('#page-loader').toggleClass("hide"); },2000);
}




// display Reviews
function showRatings(data){
	var userType = getUserType(url);
	if(data === null)
	{
		$("#review-box").html("<h4>No reviews yet!</h4>");
	}
	else{
		$("#review-box").html("")
		if(userType === "company"){
			var stars = '';
			for(var i=0; i<data.length; i++){
				stars = "";
				for(var j=0; j<=data[i].rating; j++){
					stars += '<i class="fas fa-star fa-md color-yellow"></i>';
				}
				$("#review-box").append(`
					<div class="review-comment-box m-3 p-3">
					<div class="review-header">
					<div class="mr-2">
					<img src="assets/images/profile_picture/`+data[i].picture+`" class="img-fluid review-image rounded-circle pull-xs-left" alt="...">
					</div>
					<div>
					<h5 style="">`+data[i].first_name+` `+data[i].last_name+`</h5>
					</div>
					</div>
					<p><small>`+data[i].date_rated+`</small></p>
					<p>`+stars+`</p>
					<hr>
					<p>`+data[i].comment+`</p>
					</div>`
				)
			}
		}
		else if(userType === "rider"){
			var stars = '';
			for(var i=0; i<data.length; i++){
				stars = "";
				for(var j=0; j<=data[i].rating; j++){
					stars += '<i class="fas fa-star fa-md color-yellow"></i>';
				}
				$("#review-box").append(`
					<div class="review-comment-box m-3 p-3">
					<div class="review-header">
					<div class="mr-2">
					<img src="assets/images/company_logo/`+data[i].logo+`" class="img-fluid review-image rounded-circle pull-xs-left" alt="...">
					</div>
					<div>
					<h5 style="">`+data[i].company_name+`</h5>
					</div>
					</div>
					<p><small>`+data[i].date_rated+`</small></p>
					<p>`+stars+`</p>
					<hr>
					<p>`+data[i].comment+`</p>
					</div>`
				)
			}
		}
	}
}
// get signup year
function joinDate(date){

	var joinDate = date.split('-');
	var year = joinDate[0];
	var month = joinDate[1];
	var day = joinDate[2];
	var dateJoined = currentYear - year;
	// Year
	if( dateJoined == 1){
		return 'Last Year';
	}
	else if(dateJoined > 1){
		return dateJoined+ ' Years Ago';
	}
	// Month
	else if(dateJoined < 1){
		dateJoined = currentMonth - month
		if(dateJoined == 1){
			return 'Last Month';
		}
		else if(dateJoined > 1){
			return dateJoined+ ' Months Ago';
		}
		else if(dateJoined < 1){
			dateJoined = currentDay - day;
			if(dateJoined == 1){
				return 'Yesterday';
			}
			else if(dateJoined > 1){
				return dateJoined+ ' Days Ago';
			}
			else if(dateJoined < 1){
				return 'Today';
			}
		}
	}

}
// click employ button
$(document).on('click', '#employ-btn',function(e){
	e.preventDefault();
	var userId = getUserId(url);
	var sessionId = sessionStorage.getItem("session_id");
	if(userId === null && sessionId === null){

	}
	else {
		employ(userId);
	}
});

// click cancel button
$(document).on('click', '#employ-cancel', function(e){
	e.preventDefault();
	var userId = getUserId(url);
	if(userId === null && sessionId === null){

	}
	else {
		cancelEmploy(userId);
	}

})
