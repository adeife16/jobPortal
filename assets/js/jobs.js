// display random job post
$(document).ready(function() {
   // Stuff to do as soon as the DOM is ready
});


// search button click
$("#search").click(function(e){
  e.preventDefault();
  jobSearch()
})

function showJobs(data){
  console.log(data);
  $("#display-div").html("");
  for(var i = 0; i <= data.length; i++){
    $("#display-div").append(`
      <div class="col-lg-3 col-sm-6">
        <a href="view_post.php?postId=`+data[i].post_id+`" target="blank" class="color-dark">
          <div class="single_ads_card mt-30">
            <div class="ads_card_image">
              <img src="assets/images/company_logo/`+data[i].logo+`" alt="company logo">
            </div>
            <div class="ads_card_content text-center">
              <p><h5>`+data[i].title+`</h5></p>
              <p>`+data[i].type+`</p>
              <p>`+data[i].category+`</p>
              <p class="color-blue">`+data[i].company_name+`</p>
            </div>
          </div>
        </a>
      </div>
    `);
  }
}
