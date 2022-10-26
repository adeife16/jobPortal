// Get product details
function getPro(id){
  $.ajax({
    url: 'backend/products.php',
    type: 'POST',
    data: {getPro: id}
  })
  .done(function(response) {
    data = JSON.parse(response);
    if(data[0].status === "success"){
      var prod = data[1].product;
      showPro(prod[0]);
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });

}
