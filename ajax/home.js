// Get all states
function get_state(){
  $.ajax({
    type: 'POST',
    url: 'backend/location.php',
    cache: false,
    data:{
      'get_states': 'get'
    },
    beforeSend: function(){
    }
  })
  .done(function(response){
    data = JSON.parse(response);
    show_state(data);
  })
}
// get randoms jobs
function getRandomJobs(){
  $.ajax({
    type: 'GET',
    url: 'backend/jobs.php?jobs=all',
    cache: false,
    beforeSend: function(){

    }
  })
  .done(function(res){
    // console.log(res);
    let data = JSON.parse(res);
    if(data.request == "success"){
      console.log(data);
      showJobs(data.data);
    }
  })
}
function getJobPost(id){
  $.ajax({
    type: 'GET',
    url: 'backend/jobs.php?jobs='+id,
    cache: false,
    beforeSend: function(){
        $("#displayjob").html(`
        <div class="loading m-3 p-3 white">
          <div class="description">  
          </div>
          <div class="image mb-10">
          </div>
          <div class="content mt-10">
          </div>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
            <h4 class="mt-10"></h4>
        </div>;
        `)
      }
  })
  .done(function(res){
    let data = JSON.parse(res);
    console.log(data);
    if(data.request == "success"){
      setTimeout(function(){
        showJob(data.data[0]);
      }, 3000)
    }
  })
}

// job application
function applyJob(){
  let form = new FormData(document.getElementById('application'));
  $.ajax({
    type: 'POST',
    url: 'backend/jobs.php',
    data: form,
    processData: false,
    contentType: false,
    cache: false,
    beforeSend: function(){
      $(".apply").attr("disabled");
    }
  })
  .done(function(res){
    let data = JSON.parse(res);
    if(data.request === "success"){
      alert_success("Job application has been sent");
    }
    else{
      console.log(data.request);
    }
  })
}