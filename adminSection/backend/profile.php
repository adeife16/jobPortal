<?php
  require 'functions.php';
  $json = array();
  $data = array();

  $session_id = $_SESSION['id'];

// Get profile details
  if(isset($_POST['getProfile']))
  {
    $stmt = "SELECT * FROM admin WHERE admin_id = ?";
    $get_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_stmt, 's', $session_id);
    mysqli_execute($get_stmt);
    $result = mysqli_stmt_get_result($get_stmt);
    if($result)
    {
      if(mysqli_num_rows($result) == 1)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          array_push($data, $row);
        }
        $json = array("request" => "success", "details" => $data);
      }
      else
      {
        $json = array("request" => "error");
      }
    }
    else
    {
      $json = array("request" => "error");
    }
    print json_encode($json);
  }
?>
