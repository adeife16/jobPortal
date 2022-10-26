<?php
require_once 'functions.php';
// $json = array();
$data = array();
$data2 = array();
$rating = array();
$session_rating = array();

$session_id = $_SESSION['id'];
$session_type = $_SESSION['session_type'];


if(isset($_GET['getJob']) && $_GET['getJob'] != "")
{
	$job_id = $_GET['getJob'];

	$stmt = "SELECT j.*, s.state_name FROM job_post j, states s WHERE j.state = s.id AND j.id = ?";
	$get_details = mysqli_prepare($con, $stmt);
	mysqli_stmt_bind_param($get_details, 'i', $job_id);
	mysqli_execute($get_details);
	$result = mysqli_stmt_get_result($get_details);
	if($result)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($data, $row);
		}
		$stmt2 = "SELECT e.cv, em.employee_id, em.first_name, em.last_name, em.picture FROM employment e, employee em WHERE e.user_id = em.employee_id AND e.job_id = ?";
		$get_application = mysqli_prepare($con, $stmt2);
		mysqli_stmt_bind_param($get_application, 'i', $job_id);
		mysqli_execute($get_application);
		$result = mysqli_stmt_get_result($get_application);
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				array_push($data2, $row);
			}
			$json = array("request" => "success", "details" => $data, "applications" => $data2);
		}
		else
		{
			$json = array("request" => mysqli_error($con));
		}
	}
	else
	{
		$json = array("request" => mysqli_error($con));
	}
	print json_encode($json);
}

if(isset($_POST['acceptApplicant']) && $_POST['jobId'] != "")
{
	$employee_id = $_POST['acceptApplicant'];
	$job_id = $_POST['jobId'];

	$stmt = "UPDATE employment SET status = 'employed' WHERE user_id = ? AND job_id = ?";
	$stmt2 = "UPDATE employee SET employment_status = 'Employed' WHERE employee_id = ?";
	$employ2 = mysqli_prepare($con, $stmt2);
	mysqli_stmt_bind_param($employ2, 's', $employee_id);
	if(mysqli_execute($employ2))
	{
		$employ = mysqli_prepare($con, $stmt);
		mysqli_stmt_bind_param($employ, 'si', $employee_id, $job_id);
		if(mysqli_execute($employ))
		{
			$json = array("request" => "success");
		}
	}
	else
	{
		$json = array("request" => "error");
	}
	print json_encode($json);
}
if(isset($_POST['rejectApplicant']) && $_POST['jobId'] != "")
{
	$employee_id = $_POST['rejectApplicant'];
	$job_id = $_POST['jobId'];

	$stmt = "UPDATE employment SET status = 'reject' WHERE user_id = ? AND job_id = ?";
	$employ = mysqli_prepare($con, $stmt);
	mysqli_stmt_bind_param($employ, 'si', $employee_id, $job_id);
	if(mysqli_execute($employ))
	{
		$json = array("request" => "success");
	}
	else
	{
		$json = array("request" => "error");
	}
	print json_encode($json);

}