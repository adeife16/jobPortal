var userId = getUserId(url);
var userType = getUserType(url);
var ratedStar = -1;

$(".rating-star").on('click',function(){
  ratedStar = parseInt($(this).data('index'));
})
$(".rating-star").mouseover(function(){
  resetRating()
  var currentRate = parseInt($(this).data('index'))
  for(var i=0; i<= currentRate; i++){
    $('.rating-star:eq('+i+')').css('color', 'yellow');
  }
})

$(".rating-star").mouseleave(function(){
  resetRating()
  if(ratedStar != -1){
    for(var i=0; i<= ratedStar; i++){
      $('.rating-star:eq('+i+')').css('color', 'yellow');
    }
  }
})

function resetRating(){
  $(".rating-star").css('color', '#6d7588')
}
// submit rating
$("#rider-review-submit").click(function(e){
  e.preventDefault();
  var review = $("#rider-review").val();
  if(review === ""){
    alert_failure("Please leave a comment");
  }
  else{
    giveRating(ratedStar, review, userId, userType);
  }
})
