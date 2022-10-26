// Get all products
function getProducts(){
  $.ajax({
    url: 'backend/products.php',
    type: 'POST',
    data: {getProducts: 'value1'}
  })
  .done(function(response){
    data = JSON.parse(response);
    if(data[0].status === "success"){
      var products = data[1].products;
      showProducts(products);
    }
    else{
      $("#pro-display").html("<h1>No Product In Stock Please Check Later</h1>");
    }
  })
  .fail(function() {
    console.log("error");
  })

}
