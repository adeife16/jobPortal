<?php
require_once 'functions.php';
// session_start();
$json = array();
$data = array();

$session_id = $_SESSION['id'];
$session_type = $_SESSION['session_type'];

// Get Profile Details
if(isset($_POST['get_profile']) && $_POST['get_profile'] == $session_id)
{
  if( $session_type == "company")
  {
    $stmt = "SELECT c.*, l.lga_name, s.state_name FROM company c, local_governments l, states s WHERE c.city = l.id AND c.state = s.id AND company_id = ? AND status = 'active'";
    $get_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_stmt,"s", $session_id);
    mysqli_execute($get_stmt);
    $result = mysqli_stmt_get_result($get_stmt);

    if($result)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        unset($row['password']);
        array_push($json, $row);
      }
      print json_encode($json);
    }
    else
    {
      print mysqli_error($con);
    }
  }
  if($session_type == "employee")
  {
    $stmt = "SELECT e.*, l.lga_name, s.state_name FROM employee e, local_governments l, states s WHERE e.city = l.id AND e.state = s.id AND employee_id = ? AND status = 'active'";
    $get_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_stmt,"s", $session_id);
    mysqli_execute($get_stmt);
    $result = mysqli_stmt_get_result($get_stmt);

    if($result)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        unset($row['password']);
        array_push($json, $row);
      }
      print json_encode($json);
    }
    else
    {
      print mysqli_error($con);
    }

  }
}

// Update Profile Details (Company)
if(isset($_POST['update_profile']) && $_POST['update_profile'] == "company")
{
  $address = validate($_POST['address']);
  $phone1 = validate($_POST['phone1']);
  $phone2 = validate($_POST['phone2']);
  $employees = validate($_POST['employees']);
  $state = validate($_POST['state']);
  $city = validate($_POST['city']);

  if($address == "" || $phone1 == "" || $employees == "" || $state == "" || $city == "")
  {

  }
  else
  {
    $stmt = "UPDATE company SET company_address = ?, company_number = ?, company_number_optional = ?, employees = ?, state = ?, city = ? WHERE company_id = '$session_id'";
    $update_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($update_stmt,"sssiii", $address, $phone1, $phone2, $employees, $state, $city);
    if(mysqli_execute($update_stmt))
    {
      print "success";
    }
    else
    {
      // print mysqli_error($con);
      print "error";
    }

  }
}

// Update Profile Details (Rider)
if(isset($_POST['update_profile']) && $_POST['update_profile'] == "employee")
{
  $firstname = validate($_POST['firstname']);
  $lastname = validate($_POST['lastname']);
  $address = validate($_POST['address']);
  $phone1 = validate($_POST['phone1']);
  $about = validate($_POST['about']);
  $state = validate($_POST['state']);
  $city = validate($_POST['city']);

  if($address == "" || $phone1 == "" || $firstname == "" || $lastname == "" || $about == "" || $state == "" || $city == "" )
  {

  }
  else
  {
    $stmt = "UPDATE employee SET address = ?, phone = ?, state = ?, city = ?, first_name = ?, last_name = ?, about = ? WHERE employee_id = '$session_id'";
    $update_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($update_stmt,"ssiisss", $address, $phone1, $state, $city, $firstname, $lastname, $about);
    if(mysqli_execute($update_stmt))
    {
      print "success";
    }
    else
    {
      print mysqli_error($con);
      // print "error";
    }

  }
}

// Update Password (Company)

if(isset($_POST['update_password']) && $_POST['update_password'] == "company")
{
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];

  if($old_pass == "" || $new_pass == "")
  {

  }
  else
  {
    $get_stmt = mysqli_query($con, "SELECT  password FROM company WHERE company_id = '$session_id'");
    $row = mysqli_fetch_assoc($get_stmt);
    $old_password = $row['password'];

    if(password_verify($old_pass, $old_password))
    {
      $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
      $stmt = "UPDATE company SET password = ? WHERE company_id = '$session_id'";
      $update_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($update_stmt, "s", $new_pass);

      if(mysqli_execute($update_stmt))
      {
        print "success";
      }
    }
  }
}
if(isset($_POST['update_password']) && $_POST['update_password'] == "employee")
{
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];

  if($old_pass == "" || $new_pass == "")
  {

  }
  else
  {
    $get_stmt = mysqli_query($con, "SELECT  password FROM employee WHERE employee_id = '$session_id'");
    $row = mysqli_fetch_assoc($get_stmt);
    $old_password = $row['password'];

    if(password_verify($old_pass, $old_password))
    {
      $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
      $stmt = "UPDATE employee SET password = ? WHERE employee_id = '$session_id'";
      $update_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($update_stmt, "s", $new_pass);

      if(mysqli_execute($update_stmt))
      {
        print "success";
      }
    }
  }
}

// Update Profile picture
if(isset($_FILES['uploadImage']['name']) && $_FILES['uploadImage']['name'] != '')
{
  if($session_type == "company")
  {
    $upload = logo_upload('uploadImage', $session_id);

    if($upload == "success")
    {
      $split_name = explode("/", $_FILES['uploadImage']['type']);
      $photo_ext = $split_name[1];
      if($photo_ext == 'jpeg')
      {
        $photo_ext = 'jpg';
      }
      $photo = $session_id.".".$photo_ext;

      $stmt = "UPDATE company SET logo = ? WHERE company_id = '$session_id'";
      $update_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($update_stmt, 's', $photo);
      if(mysqli_execute($update_stmt))
      {
        print "success";
      }
      else
      {
        print "error";
      }
    }
    else
    {
      print "error";
    }
  }
  if($session_type == "employee")
  {
    $upload = profile_upload('uploadImage', $session_id);

    if($upload == "success")
    {
      $split_name = explode("/", $_FILES['uploadImage']['type']);
      $photo_ext = $split_name[1];
      if($photo_ext == 'jpeg')
      {
        $photo_ext = 'jpg';
      }
      $photo = $session_id.".".$photo_ext;

      $stmt = "UPDATE employee SET picture = ? WHERE employee_id = '$session_id'";
      $update_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($update_stmt, 's', $photo);
      if(mysqli_execute($update_stmt))
      {
        print "success";
      }
      else
      {
        print "error";
      }
    }
    else
    {
      print "error";
    }
  }
}
