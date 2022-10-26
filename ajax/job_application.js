function getJob(id){
	$.ajax({
		type: 'GET',
		url: 'backend/job_application.php?getJob='+id,
		cache: false,
		beforeSend: function(){

		}
	})
	.done(function(res){
		let data = JSON.parse(res);
		console.log(data);
		if(data.request === "success"){
			showJob(data.details[0]);
			showApplicants(data.applications)
		}
	})
}

function acceptApplicant(employee, job){
	$.ajax({
		type: 'POST',
		url: 'backend/job_application.php',
		cache: false,
		data: {
			acceptApplicant: employee,
			jobId: job
		},
		beforeSend: function(){

		}
	})
	.done(function(res){
		let data = JSON.parse(res);
		if(data.request === "success"){
			alert_success("Job Application Accepted!");
		}
	})
}

function rejectApplicant(employee, job){
	$.ajax({
		type: 'POST',
		url: 'backend/job_application.php',
		cache: false,
		data: {
			rejectApplicant: employee,
			jobId: job
		},
		beforeSend: function(){

		}
	})
	.done(function(res){
		let data = JSON.parse(res);
		if(data.request === "success"){
			alert_failure("Job Application Rejected!");
		}
	})
}