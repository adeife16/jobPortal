<?php
require 'functions.php';

$json = array();
$data = array();

$session_id = $_SESSION['id'];
$session_type = $_SESSION['session_type'];

// Get all job posts
if(isset($_POST['getJobPosts']))
{
  $stmt = "SELECT * FROM job_post WHERE company_id = ?";
  $get_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($get_stmt, 's', $session_id);
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
      $json = array('status' => 'success', 'jobs' => $data);
    }
    else
    {
      $json = array('status' => 'success', 'jobs' => null);
    }
  }
  else
  {
    $json = array('status' => 'error', 'jobs' => null);
  }
  print json_encode($json);
}

// save job post
if(isset($_POST['title']))
{
  $title = $_POST['title'];
  $type = $_POST['type'];
  $salary_from = $_POST['salary-from'];
  $salary_to = $_POST['salary-to'];
  $state = $_POST['state'];
  $desc = $_POST['desc'];
  $deadline = $_POST['deadline'];
  if(isset($_POST['period']))
  {
    $period = $_POST['period'];
  }
  else
  {
    $period = null;
  }
  if($type == "full-time" || $type == "part-time")
  {
    $period = null;
  }

  if($title == "" || $type == "" || $desc == "")
  {

  }
  else
  {
    $stmt = "INSERT INTO job_post(company_id, title, type, period, salary_from, salary_to, state, description, deadline, date_created, date_updated) VALUES(?,?,?,?,?,?,?,?,?,NOW(),NOW())";
    $insert_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($insert_stmt, 'sssiiiiss', $session_id, $title, $type, $period, $salary_from, $salary_to, $state, $desc, $deadline);
    if(mysqli_execute($insert_stmt))
    {
      $json = array("status" => "success");
    }
    else
    {
      $json = array("status" => mysqli_error($con));
    }
    // array_push($json, $data);
    print json_encode($json);
  }
}

// get post details
if(isset($_POST['editPost']) && $_POST['editPost'] != "")
{
  $post_id = $_POST['editPost'];
  $stmt = "SELECT * FROM job_post WHERE id = ?";
  $get_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($get_stmt, "i", $post_id);
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
      $get_states = mysqli_query($con, "SELECT * FROM states");
      $states = array();
        if($get_states)
        {
            while($row = mysqli_fetch_array($get_states))
            {
                array_push($states, $row);
            }
        }
      $json = array("request" => "success", "details" => $data, "states" => $states);
    }
    else
    {
      $json = array("request" => "error", "details" => null);
    }
  }
  else
  {
    $json = array("request" => "error", "details" => null);
  }
  print json_encode($json);
}

// Update job post
if(isset($_POST['edit-title']) && $_POST['edit-title'] != "")
{
  $title = $_POST['edit-title'];
  $type = $_POST['edit-type'];
  $salary_from = $_POST['salary-from'];
  $salary_to = $_POST['salary-to'];
  $state = $_POST['state'];
  $desc = $_POST['edit-desc'];
  $deadline = $_POST['deadline'];
  $id = $_POST['post-id'];
  if(isset($_POST['edit-period']))
  {
    $period = $_POST['edit-period'];
  }
  else
  {
    $period = null;
  }

  if($title == "" || $type == "" || $desc == "" || $id == "")
  {

  }
  else
  {
    $stmt = "UPDATE job_post SET title = ?, type = ?, description = ?, salary_from = ?, salary_to = ?, state = ?, deadline = ?, period = ?, date_updated = NOW() WHERE company_id = '$session_id' AND id = '$id' ";
    $update_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($update_stmt, 'sssiiisi', $title, $type, $desc, $salary_from, $salary_to, $state, $deadline, $period);
    if(mysqli_execute($update_stmt))
    {
      $json = array("request" => "success");
    }
    else
    {
      $json = array("request" => mysqli_error($con));
    }
    print json_encode($json);
  }
}

// delete job post
if(isset($_POST['deletePost']) && $_POST['deletePost'] != "")
{
  $post_id = $_POST['deletePost'];
  $stmt = "DELETE FROM job_post WHERE id = ?";
  $delete_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($delete_stmt, 'i', $post_id);
  if(mysqli_execute($delete_stmt))
  {
    $json = array("request" => "success");
  }
  else
  {
    $json = array("request" => "error");
  }
  print json_encode($json);
}
