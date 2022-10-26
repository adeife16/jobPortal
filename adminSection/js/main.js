$(document).ready(function() {
  getSession();
  getNewRequest();
});

// get session details from backend
function getSession(){
  $.ajax({
    url: 'backend/session.php',
    type: 'POST',
    cache: false,
    data: {getSession: ''}
  })
  .done(function(response) {
    // if response status is success, create session variables
    data = JSON.parse(response);
    if(data[0].status == "success"){
      var session_details = data[1];
      setSession(session_details);
    }
    else{
      sessionStorage.clear();
      window.location.replace ('logout.php');
    }
    });
    // .fail(function() {
    //   console.log("error");
    // })
    // .always(function() {
    //   console.log("complete");
    // });

  }

  function setSession(session_details){
    if(session_details === null){
      window.location.replace ('logout.php');
    }
    else{
      for(var index in session_details) {
        sessionStorage.setItem(index, session_details[index]);
      }
    }
    var sessionId = sessionStorage.getItem("session_id");
    var sessionType = sessionStorage.getItem("session_type");
    if(sessionId == "" || sessionId === null){

      window.location.replace ('logout.php');

    }
    else{
      // user dtails in header
      $("#session-name").html(sessionStorage.getItem("session_name"))
      $("#session-image").attr("src", "img/"+sessionStorage.getItem("session_picture"))
    }
  }

  function getNewRequest(){
    $.ajax({
      url: 'backend/dashboard.php',
      type: 'POST',
      cache: false,
      data: {getRequest: 'value1'}
    })
    .done(function(response) {
      data = JSON.parse(response);
      showNewRequest(data);
    })
    // .fail(function() {
    //   console.log("error");
    // })
    // .always(function() {
    //   console.log("complete");
    // });

  }

  // display request notification
  function showNewRequest(data){
    if(data.length < 10){
      $("#request-alert").html(data.length);
    }
    else{
      $("#request-alert").html('9+');
    }

      for(var req in data){
        $("#alert-list").append('<a class="dropdown-item d-flex align-items-center" href="request.php?companyid='+data[req].company_id+'?rideid='+data[req].rider_id+'"><div><div class="small text-gray-500">'+data[req].date_issued+'</div><span class="font-weight-bold"> '+data[req].company_name+' has requested to employ '+data[req].rider_name+'</span></div></a>');

      }
  }
