<?php
  require 'functions.php';

  $json = array();
  $data = array();

  $session_id = $_SESSION['id'];
  $session_type = $_SESSION['session_type'];


  // get random jobs
  if(isset($_GET['jobs']) && $_GET['jobs'] == "all")
  {

    $stmt = mysqli_query($con, "SELECT c.company_name, j.*, s.state_name, r.rating FROM company c, job_post j, states s, rating r WHERE c.company_id = j.company_id AND j.state = s.id AND r.user_id = c.company_id ORDER BY id DESC");

      if($stmt)
      {
        if(mysqli_num_rows($stmt) > 0)
        {
          while($row = mysqli_fetch_assoc($stmt))
          {
            array_push($data, $row);
          }
          $json = array("request" => "success", "data" => $data);

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

    // $stmt = mysqli_query($con, "SELECT c.company_name,c.logo, j.* FROM company c, job_post j WHERE c.company_id = j.company_id ORDER BY id DESC");
  }
  
  if(isset($_GET['jobs']) && $_GET['jobs'] != "all")
  {
    $id = $_GET['jobs'];
    $stmt = mysqli_query($con, "SELECT c.company_name, c.logo, j.*, s.state_name, r.rating FROM company c, job_post j, states s, rating r WHERE c.company_id = j.company_id AND j.state = s.id AND j.id = '$id' AND r.user_id = c.company_id");

      if($stmt)
      {
        if(mysqli_num_rows($stmt) > 0 )
        {
          while($row = mysqli_fetch_assoc($stmt))
          {
            array_push($data, $row);
          }
          $json = array("request" => "success", "data" => $data);

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
  
  // search job post
  if(isset($_POST['job-type']) && isset($_POST['job-cat']))
  {
    $type = $_POST['job-type'];
    $cat = $_POST['job-cat'];
    if($type == "" && $cat == "")
    {
    }
    elseif($type == "")
    {
      $stmt = "SELECT c.company_name, c.logo, j.* FROM company c, job_post j WHERE c.company_id = j.company_id AND category = ?";
      $get_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($get_stmt, 's', $cat);
      mysqli_execute($get_stmt);
      $result = mysqli_stmt_get_result($get_stmt);
      if($result)
      {
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            array_push($data, $row);
          }
          $json = array("request" => "success", "data" => $data);

        }
        else
        {
          $json = array("request" => "error");
        }
      }
    }
    elseif($cat == "")
    {
      $stmt = "SELECT c.company_name, c.logo, j.* FROM company c, job_post j WHERE c.company_id = j.company_id AND type = ?";
      $get_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($get_stmt, 's', $type);
      mysqli_execute($get_stmt);
      $result = mysqli_stmt_get_result($get_stmt);
      if($result)
      {
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            array_push($data, $row);
          }
          $json = array("request" => "success", "data" => $data);

        }
        else
        {
          $json = array("request" => "error");
        }
      }
    }
    print json_encode($json);
  }
  // job application
  if(isset($_POST['jobId']) && $_POST['jobId'] != "")
  {
    $id = strval($_POST['jobId']);
    $cv_id = str_shuffle(substr(md5(time().mt_rand().time()), 0,8));

    $get_details = mysqli_query($con, "SELECT * FROM job_post WHERE id='$id'");
    
    if(mysqli_num_rows($get_details) > 0)
    {
      $row = mysqli_fetch_assoc($get_details);
      $company_id = $row['company_id'];

    if(isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != "")
      {
        $upload = cv_upload2('logo', $cv_id);
        if($upload == "success")
        {
          $tmp = explode('/',$_FILES['logo']['type']);
          $ext = strtolower(end($tmp));
          if($ext == "jpeg")
          {
            $ext = "jpg";
          }
          $cv = strval($cv_id) . '.' . $ext;
          $stmt = "INSERT INTO employment(job_id,user_id,company_id,cv, date_issued) VALUES(?,?,?,?,NOW())";
          $insert_stmt = mysqli_prepare($con, $stmt);
          mysqli_stmt_bind_param($insert_stmt, "isss", $id, $session_id, $company_id,$cv);
          if(mysqli_execute($insert_stmt))
          {
            $json = array("request" => "success");
          }
          else
          {
            $json = array("request" => mysqli_error($con)); 
          }
          print json_encode($json);
        }
        else
        {
          // print $_FILES['logo']['error'];
          print 'error';
        }
      }
    }

  }
function cv_upload2($filename, $cv_id)
{
  $allowed_ext = ["pdf"]; // These will be the only file extensions allowed
  $uploadDirectory = "../assets/images/jobs/";
  $fileName = $_FILES[$filename]['name'];
  $fileSize =$_FILES[$filename]['size'];
  $fileTmpName =$_FILES[$filename]['tmp_name'];
  $file_type=$_FILES[$filename]['type'];
  $error = $_FILES[$filename]['error'];
  $tmp = explode('.',$fileName);
  $fileExtension=strtolower(end($tmp));
  $newName = $cv_id . "." . $fileExtension;
  $uploadPath = $uploadDirectory  . $newName;
  if ($fileSize > 1000000)
  {

    return "large";

  }

  elseif (!in_array($fileExtension, $allowed_ext))
  {
    return "invalid";
  }
  else
  {
    if ($error == 0)
    {

      if (move_uploaded_file($fileTmpName , $uploadPath))
      {
        return "success";
      }
      else
      {
        return $error ;
      }
    }
    else
    {
      return $error;
    }

  }

}
// 