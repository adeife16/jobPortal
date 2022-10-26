$(document).ready(function() {
  // get company and rider id from url
  var url = window.location.href;
  var[link, company, rider] = url.split('?');
  company = getUrlValue(company);
  rider = getUrlValue(rider);
  getRequest(company, rider);
});

function getUrlValue(val){
  val = val.split('=');
  return val[1];
}
