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
		$sql = "SELECT * FROM `tb_user` INNER JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id WHERE tb_user.User_id='$id'";
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
	} 
	// else if (isset($_POST['name']) && isset($_POST['image'])) {
	// 	error_reporting(E_ERROR | E_PARSE);
	// 	$img = $_POST['image'];
	// 	$image_array_1 = explode(";", $img);
	// 	$image_array_2 = explode(",", $image_array_1[1]);
	// 	$data = base64_decode($image_array_2[1]);
	// 	$image_name = '../assets/uploads/' . time() . '.png';
	// 	file_put_contents($image_name, $data);

	// 	$id = $_SESSION["User_id"];
	// 	$sql = "UPDATE  `tb_user` SET img = '$img' WHERE `User_id`='$id' ";
	// 	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	// 	$row = mysqli_fetch_assoc($qr);
	// 	if ($qr) {
	// 		echo $image_name;
	// 	} else {
	// 		error();
	// 	}
	// } 
	else if ($_POST['action'] == "edit_username") {
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
		$pvc_img = $con->real_escape_string($_POST['pvc_img']);
		$sql = "UPDATE  `tb_privacy` SET
				`pvc_line` = '$pvc_line',
				`pvc_phone` = '$pvc_phone',
				`pvc_email` = '$pvc_email',
				`pvc_facebook` = '$pvc_facebook',
				`pvc_img` = '$pvc_img'
				WHERE `User_id` = '$id'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		if ($qr) {
			success();
		} else {
			error();
		}
	}else if ($_POST['action'] == "uploads-img") {
		$id = $_SESSION["User_id"];
		$sqlimg = mysqli_query($con,"SELECT img FROM tb_User WHERE User_id = '$id'");
		$row = mysqli_fetch_assoc($sqlimg);

		if($row['img'] != null){
			$imgname = $row['img'];
			$part = '../assets/uploads/'.$imgname;
			unlink($part);
		}
	
		$upload = $_FILES['image'];
		if($upload <> ''){
			$path = '../assets/uploads/';
			$type = strrchr($_FILES['image']['name'],".");
			$file_tmp = $_FILES['image']['tmp_name'];
			$newname = time().rand(1,99).$type;
			$parth_comy = $path.$newname;
			if(move_uploaded_file($file_tmp,$parth_comy)){
				$sql = "UPDATE  `tb_user` SET img = '$newname' WHERE `User_id`='$id' ";
				$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
				if ($qr) {
					success($newname);
				} else {
					error();
				}
			}

		}else{
			error("nohaveimg");
		}
	}else if ($_POST['action'] == "select-all-user") {
		$filter = " ";
		$page = 1;
		if(isset($_POST['fil'])){
			$fil = $_POST['fil'];
			
			$text = $con->real_escape_string($fil['text']);
			$socail = $con->real_escape_string($fil['socail']);
			$gender = $con->real_escape_string($fil['gender']);
			$age_f = $con->real_escape_string($fil['age_first']);
			$age_l = $con->real_escape_string($fil['age_last']);
			$province = $con->real_escape_string($fil['province']);
			$target = $con->real_escape_string($fil['target']);
			$getpage = $con->real_escape_string($fil['currentpage']);
			$text = "%".$text."%";
			$newsocial;
			$page = end($fil);
			array_pop($fil); 
		
			$arrsocial = ['facebook' => 'facebook' ,'phone' => 'phone' ,'line' => 'line_id'  ];
			//set social
			foreach($arrsocial as $key => $val){
				if($socail == $key){
					$newsocial = "tb_User.".$val;
				}
			}
		
			$filtered_get = array_filter($fil);  //filter null value
			// echo "<pre>";
			// 	print_r($filtered_get,false);
			// echo "</pre>";
			// echo $end ;
			// exit;
			if(empty($filtered_get)){     //set if empty value fillter = true
				$filter = " true ";
			}
			$i = 1;
			$amount = count($filtered_get);
			
			
			foreach($filtered_get as $key => $val){				//loop plush string to condition query
				if($key == 'text'){ $val = "%".$val."%" ; $filter .="tb_User.Name LIKE '$val'" ;}
				if($key == 'socail'){ $filter .="$newsocial IS NOT NULL" ;}
				if($key == 'age_first'){ $filter .="tb_User.age > '$val'" ;}
				if($key == 'age_last'){ $filter .="tb_User.age < '$val'" ;}
				if($key == 'province'){ $filter .="tb_User.u_Province_id = '$val'" ;}
				if($key == 'target'){ $filter .="tb_User.u_Target_id = '$val'" ;}
				if($key == 'gender'){ $filter .="tb_User.u_Gender_id = '$val'" ;}
				if ( $amount != $i) { 
					$filter .= " AND ";
				 }
			 $i++;
			}
		}else{
			$filter = " true ";
		}
	
		//set limit
		$start = 0;
		$limit = 30;
			$start = ($page - 1) * $limit;
			// ORDER BY RAND ()
		
		$oneuser = "SELECT * FROM tb_User 
						INNER JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id 
						LEFT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id 
						LEFT JOIN tb_target ON tb_user.u_Target_id = tb_target.Target_id 
						LEFT JOIN tb_province ON tb_user.u_Province_id = tb_province.Province_id 
						WHERE $filter
						ORDER BY tb_User.User_id
					 	LIMIT $start,$limit";
		$oneuser1 = "SELECT * FROM tb_User 
						INNER JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id 
						LEFT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id 
						LEFT JOIN tb_target ON tb_user.u_Target_id = tb_target.Target_id 
						LEFT JOIN tb_province ON tb_user.u_Province_id = tb_province.Province_id 
						WHERE $filter ";
					
	$count = mysqli_query($con,$oneuser1) or die('error. ' . mysqli_error($con));
	$amount = $count->num_rows;
		$sql = mysqli_query($con,$oneuser)or die('error. ' . mysqli_error($con));;  
		$arr = [];
	
		while ($row = mysqli_fetch_assoc($sql)) {
			array_push($arr, $row);
		}
		$data = ['data'=>$arr,'amount'=>$amount];
		if($count && $sql){
			success($data);
		}else{
			error();
		}
	}
}
