<?php
require_once 'functions.php';
// $json = array();
$data = array();
$rating = array();
$session_rating = array();

$session_id = $_SESSION['id'];
$session_type = $_SESSION['session_type'];

// get all new notifications
if(isset($_GET['notice']) && $_GET['notice'] == "new"){

	if ($session_type == "company")
	{
		$stmt = "SELECT e.*, u.first_name, u.last_name, j.title, j.id AS job_id FROM employment e, employee u, job_post j WHERE e.user_id = u.employee_id AND e.job_id = j.id AND e.company_id = ? AND e.view = 'no' AND e.status = 'pending' ORDER BY e.id DESC";
	}
	else if($session_type == "employee")
	{
		$stmt = "SELECT e.*, j.title FROM employment e, job_post j WHERE e.job_id = j.id AND e.user_id = ? AND status != 'pending' AND user_view = 'no' ORDER BY e.id DESC";
	}
	$notice = mysqli_prepare($con, $stmt);
	mysqli_stmt_bind_param($notice,'s', $session_id);
	mysqli_execute($notice);
	$result = mysqli_stmt_get_result($notice);
	// print_r($result);
	if($result)
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			array_push($data, $row);
		}
		$json = array("request" => "success", "data" => $data);
	}
	else
	{
		$json = array("request" => "error");
	}
	print json_encode($json);

}