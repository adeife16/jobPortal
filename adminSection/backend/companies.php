<?php
  require_once 'functions.php';

  $json = array();
  $data = array();

  if(isset($_GET['getCompanies']) && $_GET['getCompanies'] == "all")
  {
    $stmt = "SELECT * FROM company ORDER BY id DESC";
    $companies = mysqli_prepare($con, $stmt);
    mysqli_execute($companies);
    $result = mysqli_stmt_get_result($companies);
    if($result)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
          unset($row['password']);
          array_push($data, $row);
      }
      $json = array("status" => "success", "data" => $data);
    }
    else
    {
      $json = array("status" => "error");
    }
    print json_encode($json);

  }
  if(isset($_POST['search']) && $_POST['search'] != "")
  {
    $keyword = validate($_POST['search']);

    $stmt = "SELECT * FROM employee WHERE first_name LIKE CONCAT('%',?,'%') OR last_name LIKE CONCAT('%',?,'%')";
    $select_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($select_stmt, 'ss', $keyword, $keyword);
    mysqli_execute($select_stmt);
    $result = mysqli_stmt_get_result($select_stmt);
    if($result)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        array_push($json, $row);
      }
      print json_encode($json);
    }
    else
    {
      print mysqli_error($con);
    }
  }

// Delete User
if(isset($_POST['delRider']))
{
  $rider_id = $_POST['delRider'];
  if($rider_id != "")
  {
    $stmt = "DELETE FROM employee WHERE rider_id = ?";
    $del_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($del_stmt,'s',$rider_id);
    if(mysqli_execute($del_stmt))
    {
      print "success";
    }
    else
    {
      // print "error";
      print mysqli_error($con);
    }

  }
}

// disable user
if(isset($_POST['disable']) && $_POST['disable'] != "")
{
  $id = $_POST['disable'];

  $stmt = "UPDATE company SET status = 'disabled' WHERE company_id = ?";
  $disable = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($disable, 's', $id);
  if(mysqli_execute($disable))
  {
    $json = array("status" => "success");
  }
  else
  {
    $json = array("status" => "error");
  }

  print json_encode($json);
}
// enable user
if(isset($_POST['enable']) && $_POST['enable'] != "")
{
  $id = $_POST['enable'];

  $stmt = "UPDATE company SET status = 'active' WHERE company_id = ?";
  $enable = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($enable, 's', $id);
  if(mysqli_execute($enable))
  {
    $json = array("status" => "success");
  }
  else
  {
    $json = array("status" => "error");
  }

  print json_encode($json);
}