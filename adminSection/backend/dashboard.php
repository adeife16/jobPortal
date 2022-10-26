<?php
require 'functions.php';

$json = array();
$data = array();
$riders_array = array();
$rider_employed_array = array();
$companies_array = array();
$request_array = array();

if(isset($_POST['dashboardData']))
{
  $employee = mysqli_query($con,"SELECT * FROM employee");
  $employee_employed = mysqli_query($con,"SELECT * FROM `employee` WHERE employment_status = 'Employed'");
  $companies = mysqli_query($con,"SELECT * FROM company");
  $requests = mysqli_query($con, "SELECT * FROM employment WHERE status = 'pending'");


  if($employee)
  {
    $employee = mysqli_num_rows($employee);
  }
  if($employee_employed)
  {
    $employee_employed = mysqli_num_rows($employee_employed);
  }
  if($companies)
  {
    $companies = mysqli_num_rows($companies);
  }
  if($requests)
  {
    $requests = mysqli_num_rows($requests);
  }
  $json = array("employee" => $employee, "employed" => $employee_employed, "companies" => $companies, "requests" => $requests);
  print json_encode($json);

}


// get all new requests
if(isset($_POST['getRequest']))
{
  $get_req = mysqli_query($con, "SELECT * FROM employment WHERE view = 'no' ORDER BY id DESC LIMIT 5");
  if($get_req)
  {
    while($row = mysqli_fetch_assoc($get_req))
    {
      array_push($json, $row);
    }
    print json_encode($json);
  }
  else
  {
    $get_req = mysqli_query($con, "SELECT * FROM employment WHERE view = 'yes' ORDER BY id DESC LIMIT 5");
    if($get_req)
    {
      while($row = mysqli_fetch_assoc($get_req))
      {
        array_push($json, $row);
      }
      print json_encode($json);
    }
    else
    {

    }
  }
}
