$(document).ready(function() {
  getProfile();
});
function showProfile(data){
  console.log(data[0].picture);
  var imgSrc = "img/"+data[0].picture;
  $("#display-picture").attr("src", imgSrc);
  $("#details-table").html("");
  for(var i=0; i<=data.length; i++){
    $("#details-div").append
    (`
      <div><h1 class="color-dark text-center">`+data[i].first_name+` `+data[i].last_name+`</h1></div>
      <div><h3 class="color-dark text-center">`+data[i].email+`</h3></div>
      `)
  }
}
