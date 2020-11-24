<?php
define('DB_NAME', 'siamfan');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
date_default_timezone_set("Asia/Bangkok");
$con->set_charset("utf8");

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

function success($result = [], $message = "success")
{
	$response = array(
		'status' => true,
		'respond' => $result,
		'message' => $message,
	);
	echo json_encode($response);
}
function error($result = [], $message = "error")
{
	$response = array(
		'status' => false,
		'respond' => $result,
		'message' => $message,
	);
	echo json_encode($response);
}
