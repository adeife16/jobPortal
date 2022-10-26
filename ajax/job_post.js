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
// Get all job posts
function getJobPosts(){
  $.ajax({
    url: 'backend/job_post.php',
    type: 'POST',
    data: {getJobPosts: 'value1'},
    cache: false,
    beforeSend: function(){

    }
  })
  .done(function(response){
    data = JSON.parse(response);

    if(data.status === "success"){
      showJobPosts(data.jobs);
    }
  })
  .fail(function() {
    console.log("error");
  })

}

// submit job post
function submitJobPost(){
  var formData = new FormData(document.getElementById("job-post-form"));
  $.ajax({
    url: 'backend/job_post.php',
    type: 'POST',
    processData: false,
    contentType: false,
    cache: false,
    data: formData,
  })
  .done(function(response){
    data = JSON.parse(response);
    console.log(data);
    if(data.status === "success"){
      alert_success("Job Post Created!");
      getJobPosts();
      // reset form
    }
    else{
      alert_failure("Error creating job post");
    }
  })
  .fail(function() {
    console.log("error");
  })
  // .always(function() {
  //   console.log("complete");
  // });

}
// edit job post
function editPost(val){
  $.ajax({
    url: 'backend/job_post.php',
    type: 'POST',
    cache: false,
    data: {editPost: val}
  })
  .done(function(response) {

    data = JSON.parse(response)
    console.log(data);
    if(data.request === "success"){

      displayEdit(data.details, data.states);
    }
  })
}

// Update job post
function updatePost(){
  var formData = new FormData(document.getElementById("post-edit-form"));
  $.ajax({
    url: 'backend/job_post.php',
    type: 'POST',
    processData: false,
    contentType: false,
    cache: false,
    data: formData
  })
  .done(function(response) {
    $('#edit-job-post').removeAttr("disabled");
    data = JSON.parse(response);
    if(data.request === "success"){
      alert_success("Job Post Update Successfully!");
      $("#edit-job-post").removeAttr("disabled", "disabled");
      getJobPosts();
    }
    else{
      alert_failure("Error occurred while updating job post!")
    }
  })
  .fail(function() {
    console.log("error");
  })

}

// delete job post
function deletePost(val){
  $.ajax({
    url: 'backend/jobs.php',
    type: 'POST',
    cache: false,
    data: {deletePost: val}
  })
  .done(function(response) {
    data = JSON.parse(response)
    console.log(data);
    if(data.request === "success"){
      alert_success("Job Post Deleted!");
      getJobPosts();
    }
    else{
      alert("An error has occured!");
    }
  })
}
