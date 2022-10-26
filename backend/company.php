<?php
require_once "functions.php";

$json = array();
$data = array();


// Get all companies randomly
if(isset($_POST['get_all_company']))
{
  $page = 20 * $_POST['get_all_company'];

  $get_company = mysqli_query($con, "SELECT e.*, s.state_name, c.lga_name FROM company e, states s, local_governments c WHERE e.state = s.id AND e.city = c.id ORDER BY e.id DESC LIMIT $page,20 ");

  if($get_company)
  {
    if(mysqli_num_rows($get_company) > 0)
    {
      while($row = mysqli_fetch_assoc($get_company))
      {
        unset($row['password']);
        array_push($data, $row);
      }
    }
    shuffle($data);
    $data = array("status" => "success", "companies" => $data);
    array_push($json, $data);
    print json_encode($json);
  }
  else
  {
    print mysqli_error($con);
  }


}

// get all company form search
if(isset($_POST['getCompany']))
{
  $state = $_POST['getCompany'];
  $city = $_POST['city'];
  $page = $_POST['page'];
  if($state == "" || $city == "")
  {

  }
  else
  {
    $result = company_search($page, $state, $city);
    if($result == 'error' || $result == 'empty')
    {
      print $result;
    }
    else
    {
      print json_encode($result);

    }
  }
}
