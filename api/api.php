<?php
session_start();
include "config.php";
$today = date("Y-m-d");

if (isset($_POST['action']) || isset($_POST['name'])) {
	if ($_POST['action'] == "register") {
		$username = $con->real_escape_string($_POST['username']);
		$password = $con->real_escape_string($_POST['password']);
		$firstname = $con->real_escape_string($_POST['firstname']);
		$lastname = $con->real_escape_string($_POST['lastname']);
		$name = $firstname . " " . $lastname;
		$sql = "INSERT INTO `tb_user`(`User_name`,`password`,`Name`,`created_date`) VALUES ('$username','$password','$name',now())";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		$last_id = $con->insert_id;
		$sql2 = "INSERT INTO `tb_privacy`(`User_id`) VALUES ('$last_id')";
		$qr2 = mysqli_query($con, $sql2) or die('error. ' . mysqli_error($con));
		if ($qr && $qr2) {
			success();
		} else {
			error();
		}
	} else if ($_POST['action'] == "login") {
		$username = $con->real_escape_string($_POST['username']);
		$password = $con->real_escape_string($_POST['password']);

		$sql = "SELECT `User_name`,`password`,`User_id`,`Name` FROM `tb_user` WHERE `User_name`='$username' AND `password` = '$password'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));

		if ($qr->num_rows >= 1) {
			$row = mysqli_fetch_assoc($qr);
			$_SESSION["User_id"] = $row["User_id"];
			$_SESSION["Name"] = $row["Name"];
			success();
		} else {
			error();
		}
	} else if ($_POST['action'] == "get-one-person") {
		$id = $con->real_escape_string($_POST['currentjs_id']);
		// ความจริงต้องเป็น inner join แต่บางบัญชีก็ไม่มีเพราะไม่ได้สมัครเองทั้งหมด
		$sql = "SELECT * FROM `tb_user` LEFT JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id WHERE tb_user.User_id='$id'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		$row = mysqli_fetch_assoc($qr);

		if ($qr) {
			success($row);
		} else {
			error();
		}
	} else if ($_POST['action'] == "get-gender") {
		$sql = "SELECT * FROM tb_gender";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		$arr = [];
		while ($row = mysqli_fetch_assoc($qr)) {
			array_push($arr, $row);
		}

		$sql2 = "SELECT * FROM tb_province";
		$qr2 = mysqli_query($con, $sql2) or die('error. ' . mysqli_error($con));
		$arr2 = [];
		while ($row2 = mysqli_fetch_assoc($qr2)) {
			array_push($arr2, $row2);
		}

		$sql3 = "SELECT * FROM tb_target";
		$qr3 = mysqli_query($con, $sql3) or die('error. ' . mysqli_error($con));
		$arr3 = [];
		while ($row3 = mysqli_fetch_assoc($qr3)) {
			array_push($arr3, $row3);
		}
		if ($qr) {
			echo json_encode([
				"status" => true,
				"gender" => $arr,
				"province" => $arr2,
				"target" => $arr3,
			]);
		} else {
			error();
		}
	} else if ($_POST['action'] == "edit-profile") {

		$id = $con->real_escape_string($_POST['id']);
		$name = $con->real_escape_string($_POST['name']);
		$sp_genderid = $con->real_escape_string($_POST['sp_genderid']);
		$sp_provinceid = $con->real_escape_string($_POST['sp_provinceid']);
		$sp_targetid = $con->real_escape_string($_POST['sp_targetid']);
		$age = $con->real_escape_string($_POST['age']);
		$description = $con->real_escape_string($_POST['description']);
		$phone = $con->real_escape_string($_POST['phone']);
		$email = $con->real_escape_string($_POST['email']);
		$line = $con->real_escape_string($_POST['line']);
		$facebook = $con->real_escape_string($_POST['facebook']);
		$acc_status = $con->real_escape_string($_POST['acc_status']);
		$sql = "UPDATE  `tb_user` SET
				`Name` = '$name',
				line_id = '$line',
				facebook = '$facebook',
				e_mail = '$email',
				phone = '$phone',
				u_Gender_id = '$sp_genderid',
				u_Province_id = '$sp_provinceid',
				u_Target_id = '$sp_targetid',
				acc_status = '$acc_status',
				`Description` = '$description',
				age = '$age'
				WHERE `User_id` = '$id'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		if ($qr) {
			success();
		} else {
			error();
		}
	} else if (isset($_POST['name']) && isset($_POST['image'])) {
		error_reporting(E_ERROR | E_PARSE);
		$img = $_POST['image'];
		$image_array_1 = explode(";", $img);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = '../assets/uploads/' . time() . '.png';
		file_put_contents($image_name, $data);

		$id = $_SESSION["User_id"];
		$sql = "UPDATE  `tb_user` SET img = '$img' WHERE `User_id`='$id' ";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		$row = mysqli_fetch_assoc($qr);
		if ($qr) {
			echo $image_name;
		} else {
			error();
		}
	} else if ($_POST['action'] == "edit_username") {
		$id = $con->real_escape_string($_POST['currentjs_id']);
		$val = $con->real_escape_string($_POST['val']);
		$sql = "UPDATE  `tb_user` SET `User_name` = '$val' 	WHERE `User_id` = '$id'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		if ($qr) {
			success();
		} else {
			error();
		}
	} else if ($_POST['action'] == "edit_password") {
		$id = $con->real_escape_string($_POST['currentjs_id']);
		$val = $con->real_escape_string($_POST['val2']);
		$sql = "UPDATE  `tb_user` SET `password` = '$val' 	WHERE `User_id` = '$id'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		if ($qr) {
			success();
		} else {
			error();
		}
	} else if ($_POST['action'] == "edit_pvc") {
		$pvc_line = $con->real_escape_string($_POST['pvc_line']);
		$pvc_facebook = $con->real_escape_string($_POST['pvc_facebook']);
		$pvc_email = $con->real_escape_string($_POST['pvc_email']);
		$pvc_phone = $con->real_escape_string($_POST['pvc_phone']);
		$id = $con->real_escape_string($_POST['currentjs_id']);
		$sql = "UPDATE  `tb_privacy` SET
				`pvc_line` = '$pvc_line',
				`pvc_phone` = '$pvc_phone',
				`pvc_email` = '$pvc_email',
				`pvc_facebook` = '$pvc_facebook'
				WHERE `User_id` = '$id'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		if ($qr) {
			success();
		} else {
			error();
		}
	}
}
