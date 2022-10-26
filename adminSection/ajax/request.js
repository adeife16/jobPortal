// get employment request
function getRequest(company,rider){
  $.ajax({
    url: 'backend/request.php',
    type: 'POST',
    cache: false,
    data: {
      getReq: company,
      rider: rider
    }
  })
  .done(function(response) {
    data = JSON.parse(response);
    console.log(data);
    // console.log(data);
    // showAllRequest(data);
  })
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });

}
