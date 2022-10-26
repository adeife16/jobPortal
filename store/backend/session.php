<?php
require_once 'functions.php';
// session_start();
$json = array();
$data = array();

if(isset($_POST['getSession']))
{
  if(!isset($_SESSION['id']))
  {
    $request = array('status' =>  'invalid');
    array_push($json, $request);

    print json_encode($json);
  }
  else
  {
    $request = array("status" => "success");
    array_push($json, $request);

    $session = array("session_id" => $_SESSION['id'], "session_name" => $_SESSION['name'], "session_email" => $_SESSION['email'], "session_status" => $_SESSION['status'], "session_type" => $_SESSION['session_type']);

    array_push($json, $session);
    print json_encode($json);
  }
}
