// Get all dashboard data
function getDashboardData(){
  $.ajax({
    url: 'backend/dashboard.php',
    type: 'POST',
    cache: false,
    data: {dashboardData: 'value1'},
    beforeSend: function(){

    }
  })
  .done(function(response) {
    data = JSON.parse(response);
    console.log(data);
    var employee = data.employee;
    var employed = data.employed;
    var companies = data.companies;
    var request = data.requests;
    showEmployee(employee);
    showEmployed(employed);
    showCompanies(companies);
    showRequest(request)
  })
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });

}

// Get new Requests
//
// function getNewRequest(){
//   $.ajax({
//     url: 'backend/dashboard.php',
//     type: 'POST',
//     cache: false,
//     data: {getRequest: 'value1'}
//   })
//   .done(function(response) {
//     data = JSON.parse(response);
//     console.log(data);
//     showNewRequest(data);
//   })
//   // .fail(function() {
//   //   console.log("error");
//   // })
//   // .always(function() {
//   //   console.log("complete");
//   // });
//
// }
