$(document).ready(function(){
	get_state();
	getRandomJobs();
})

function show_state(data){
	$("#location").html("");
	$("#location").append("<option value='all'>All States</option>");
	for(let i=0; i<data.length; i++){
		$("#location").append(`
				<option value="`+data[i].id+`">`+data[i].state_name+`</option>
			`);
	}

}

function showJobs(data){
	for(let i=0; i<data.length; i++){
		let stars = "";
		for(let j=0; j<=data[i].rating; j++){
		stars += '<i class="fas fa-star color-yellow"></i>';
		}
		$("#joblist").append(`
				<div class="jobdiv p-3 mt-30 mb-30" id="`+data[i].id+`">
					<h2>`+data[i].title+`</h2>
					<h4>`+data[i].company_name+`</h4>
					<p>`+stars+`</p>
					<p>`+data[i].state_name+` State</p>
					<span><i class="icon fa-md ion-cash"></i> Between &#8358;50000 and &#8358;100000</span>
					<p>
						<p class="cut-text">
						`+data[i].description+`
						</p>
					</p>
					<p style="text-align: right;" class="mt-10">
						Uploaded `+calcDate(data[i].date_created)+`
					</p>
				</div>	
		`)

	}
}
function calcDate(day){
	let daySplit = day.split('-');
	let year = daySplit[0];
	let month = daySplit[1];
	let date = daySplit[2];
	day = new Date(year, month, date);
	let today = Date.now();

  let days = Math.round((day-today)/( 24 * 60 * 60 * 1000));
  // var days = Math.round(Math.abs(date2InMillis - date1InMillis) / oneDay);
  if(days == 1){
  	return "Today";
  }
  else{
  	return days+' days ago';
  }
}

$(document).on("click",".jobdiv", function(){
	let id = $(this).prop("id");
	console.log(id);

	if(id != ""){
		getJobPost(id);
	}
});
function displayStars(data){
	var stars = ''
	for(var j=0; j<=data; j++){
		stars += '<i class="fas fa-star fa-2x color-yellow"></i>';
	}
	$("#stars").html(stars);

}
function showJob(data){
	$("#displayjob").html(`
		<div class="displaydiv p-3">
			<div class="displayheader">
				<div class"headleft">
					<img src="assets/images/company_logo/`+data.logo+`" class="displaylogo">
				</div>
				<div class="headright">
					<h2>`+data.title+`</h2>
					>br>
					<h4><a href="view_profile.php?userId=`+data.company_id+`?userType=company" target="blank" class="color-blue">`+data.company_name+`</a></h4>
					<br>
					<p id="stars"></p>
					<br>
					<p>`+data.state_name+` State</p>
				</div>
			</div>
				<br>
			<button class="btn color-white blue apply" data-toggle="modal" data-target="#applyModal"  type="button" value="`+data.id+`">Apply Now</button>
			<hr>
			<div class="details mt-20">
				<h4>Job Details</h4>
				<h5>Salary Range</h5>
				<p>&#8358;`+data.salary_from+` - &#8358;`+data.salary_to+`</p>
				<br>
				<h5>Job Type</h5>
				<p>`+data.type+`</p>
				<hr>
				<br>
				<h4> Full Job Description</h4>
				<p>`+data.description+`</p>

			</div>
		</div>

	`)
	displayStars(data.rating);
}

// job application
$(document).on("click", ".apply", function(){
	let id = $(this).val();
	if(id != ""){
		$("#jobId").val(id);
		$("#file-upload2").val("");
	}
})

function readURL2(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    var file_type =  input.files[0].name.replace(/^.*\./, '');
    var allowed_ext = ['pdf'];

    reader.onload = function(e) {
      $('#bar-5').removeClass("hide");
      $('.bar-percentage2[data-percentage2]').each(function () {
        var progress = $(this);
        var percentage = Math.ceil($(this).attr('data-percentage2'));
        $({countNum: 0}).animate({countNum: percentage}, {
          duration: 5000,
          easing:'linear',
          step: function(){
            // What todo on every count
            var pct = Math.ceil(this.countNum) + '%';
            progress.text(pct) && progress.siblings().children().css('width',pct);
            if(pct == '100%'){
              if($.inArray(file_type, allowed_ext) != -1){
                $('.image-upload-wrap2').hide();
                $('.file-upload-image2').attr('src', 'assets/images/icon/pdf.png');
                // $('.file-upload-image2').attr('src', e.target.result);
                $(".file-name2").html(input.files[0].name);
                $(".file-size2").html(Math.ceil(input.files[0].size / 1024)+ "kb");
                $('.file-upload-content2').show();
                $("#bar-5").addClass("hide");
              }
            else{
              alert_failure_long("Invalid file type. Only pdf files are allowed");
              $("#file-upload2").val("");
              $("bar-5").addClass("hide");

             }

            }
          }
        });
      });
    };


    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload2();
  }
}
function removeUpload2() {
  $('.file-upload-input2').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content2').hide();
  $('.image-upload-wrap2').show();
  $("#file-upload2").val("");
}
$('.image-upload-wrap2').bind('dragover', function () {
    $('.image-upload-wrap2').addClass('image-dropping');
  });
  $('.image-upload-wrap2').bind('dragleave', function () {
    $('.image-upload-wrap2').removeClass('image-dropping');
});

$("#submit").click(function(e){
	e.preventDefault();
	applyJob();
})