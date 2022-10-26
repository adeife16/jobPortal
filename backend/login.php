<?php
  require_once 'functions.php';
  // session_start();
  $json = array();
  $data = array();

  if(isset($_POST['email']) && $_POST['email'] != "")
  {
    $email = validate($_POST['email']);
    $password = $_POST['pass'];

    if($email == "" && $password == "")
    {
      $request = array('status' =>  'empty');
      array_push($json, $request);

      print json_encode($json);
    }
    // Check if account exist in company table
    else
    {
      $stmt = "SELECT * FROM company WHERE company_email = ?";
      $get_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($get_stmt, "s", $email);
      mysqli_stmt_execute($get_stmt);
      $result = mysqli_stmt_get_result($get_stmt);

      // if account exist create session variables
      if(mysqli_num_rows($result) == 1)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          $password_hash = $row['password'];
          $company_id = $row['company_id'];
          $company_name = $row['company_name'];
          $company_email = $row['company_email'];
          $status = $row['status'];


        }
        if(password_verify($password, $password_hash))
        {

          $_SESSION['id'] = $company_id;
          $_SESSION['name'] = $company_name;
          $_SESSION['email'] = $company_email;
          $_SESSION['status'] = $status;
          $_SESSION['session_type'] = "company";

          $request = array("status" => "success");
          array_push($json, $request);

          $session = array("session_id" => $_SESSION['id'], "session_name" => $_SESSION['name'], "session_email" => $_SESSION['email'], "session_status" => $_SESSION['status'], "session_type" => $_SESSION['session_type']);

          array_push($json, $session);
          print json_encode($json);
        }
        // if password is wrong send status:invalid
        else
        {
          $request = array('status' =>  'invalid');
          array_push($json, $request);

          print json_encode($json);
        }
      }
      // if account not exist in company table, check rider table
      else
      {
        $stmt = "SELECT * FROM employee  WHERE email = ?";
        $get_stmt = mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($get_stmt, "s", $email);
        mysqli_stmt_execute($get_stmt);
        $result = mysqli_stmt_get_result($get_stmt);

        // if account exist create session variables
        if(mysqli_num_rows($result) == 1)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            $password_hash = $row['password'];
            $employee_id = $row['employee_id'];
            $employee_name = $row['first_name'].' '.$row['last_name'];
            $employee_email = $row['email'];
            $employee_status = $row['status'];
          }
          if(password_verify($password, $password_hash))
          {
            $_SESSION['id'] = $employee_id;
            $_SESSION['name'] = $employee_name;
            $_SESSION['email'] = $employee_email;
            $_SESSION['status'] = $employee_status;
            $_SESSION['session_type'] = "employee";

            $request = array("status" => "success");
            array_push($json, $request);

            $session = array("session_id" => $_SESSION['id'], "session_name" => $_SESSION['name'], "session_email" => $_SESSION['email'], "session_status" => $_SESSION['status'], "session_type" => $_SESSION['session_type']);

            array_push($json, $session);
            print json_encode($json);
          }
          else
          {
            $request = array('status' =>  'invalid');
            array_push($json, $request);

            print json_encode($json);
          }
        }
        // if account not exist, return status:invalid
        else
        {
          $request = array('status' =>  'invalid');
          array_push($json, $request);

          print json_encode($json);
        }
      }
    }
  }
