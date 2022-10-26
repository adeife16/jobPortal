const date = new Date();
const currentYear = date.getFullYear();

const currentMonth = date.getMonth();

const currentDay = date.getDate();

// get userid fron url
const url = window.location.href;
function getJobId(string){
	var split_string = string.split('?');
	split_string = split_string[1];
	split_string = split_string.split('=');
	return split_string[1];
}

$(document).ready(function(){
	getJob(getJobId(url));
})

function showJob(data){
	$(".job-details").html(`
		<h3>`+data.title+`</h3>
		<p>`+data.type+`</p>
		<p>&#8358;`+data.salary_from+` - &#8358;`+data.salary_to+`</p>
		<p>`+data.state_name+` State</p>
		<p> Created on `+data.date_created+`</p>
		<p> Deadline is `+data.deadline+`</p>
		<hr>
		<p class="mt-2">`+data.description+`</p>
	`);
}

function showApplicants(data){
	$("#applicant-list").html("");
	for(let i=0; i<data.length; i++){
		$("#applicant-list").append(`
			<tr class="text-center">
				<td>
					<img src="assets/images/profile_picture/`+data[i].picture+`" style="width: 200px; height: 200px; border-radius: 10px">
				</td>
				<td>
					<a href="view_profile.php?userId=`+data[i].employee_id+`?userType=employee" target="_blank" class="color-blue"> `+data[i].first_name+` `+data[i].last_name+`</a>
				</td>
				<td>
					<button class="btn color-white blue view-cv" data-toggle="modal" data-target="#cvModal" value="`+data[i].cv+`">View CV</button>
				</td>
				<td>
					<button class="btn btn-success accept" value="`+data[i].employee_id+`"><i class="ion ion-checkmark-round"></i></button>
					<button class="btn btn-danger reject" value="`+data[i].employee_id+`"><i class="ion ion-android-close"></i></button>
				</td>
			</tr>
		`)
	}
}


$(document).on('click', '.view-cv', function(e){
	e.preventDefault();
	showCV($(this).val());
})

$(document).on('click', '.accept', function(e){
	e.preventDefault();
	acceptApplicant($(this).val(), getJobId(url));
});
$(document).on('click', '.reject', function(e){
	e.preventDefault();
	rejectApplicant($(this).val(), getJobId(url));
});

function showCV(cv){
	$("#cv-display").html(`
		<div>
	    	<object data="assets/images/jobs/`+cv+`" type="application/pdf"  height="700" style="width: 100%;">
	        alt : <a href="assets/images/jobs/`+cv+`">cv.pdf</a>
	    	</object>
		</div>
	`);
}