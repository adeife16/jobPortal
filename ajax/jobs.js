// search jobs
function jobSearch(){
  var formData = new FormData(document.getElementById('job-search'));
  $.ajax({
    url: 'backend/jobs.php',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    cache: false
  })
  .done(function(res) {
    data = JSON.parse(res);
    if(data.request === "success"){
      showJobs(data.data)
      console.log(data.data);
    }
  })
  .fail(function() {
    // console.log();
  })


}
