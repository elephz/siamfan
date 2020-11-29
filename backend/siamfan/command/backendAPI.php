<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/siamfan/api/config.php";
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");

if ($_POST['action'] == "banuser") {
    $id = $con->real_escape_string($_POST['id']);
    $stt = $con->real_escape_string($_POST['stt']);
    if($stt == '0'){
        $stt = '1';
    }else if($stt == '1'){
        $stt = '0';
    }
	$sql = "UPDATE  `tb_user` SET `baned_use` = '$stt' WHERE `User_id` = '$id'";
	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	if ($qr) {
		success();
	} else {
		error();
	}
} else if ($_POST['action'] == "getalluser") {
	$limit = 10;
	$start = 0;
	$page = 1;
	$keyword = 'true';
    $gender = 'true';
    $ban = "tb_user.baned_use = '0'";
	if (isset($_POST['limit'])) {
		$limit = $con->real_escape_string($_POST['limit']);
	}
	if (isset($_POST['currentpage'])) {
		$page = $con->real_escape_string($_POST['currentpage']);
	}
	if (isset($_POST['keyword'])) {
		$keyword = $con->real_escape_string($_POST['keyword']);
		$keyword = "'%" . $keyword . "%'";
		$keyword = "tb_user.Name LIKE $keyword";
    }
    if (isset($_POST['ban'])) {
        $ban_stt = $con->real_escape_string($_POST['ban']);
        $ban = "tb_user.baned_use = '$ban_stt'";
	}
	if (isset($_POST['gender'])) {
		$gender = $con->real_escape_string($_POST['gender']);
		if ($gender == 0) {
			$gender = 'true';
		} else {
			$gender = "tb_user.u_Gender_id = '$gender'";
		}

	}
	$start = ($page - 1) * $limit;
	$sql2 = "SELECT User_id FROM tb_User  WHERE $keyword AND  $gender AND $ban";
	$qr2 = mysqli_query($con, $sql2) or die('error. ' . mysqli_error($con));
	//  if($limit == 100){
	//      if($limit < $qr2->num_rows){
	//          $limit = $qr2->num_rows;
	//      }
	//  }
	$sql = "SELECT
                    tb_privacy.*,tb_gender.*,tb_target.*,tb_province.*,
                    tb_User.User_id,tb_User.Name,tb_User.line_id,
                    tb_User.facebook,tb_User.e_mail,tb_User.phone,
                    tb_User.u_Gender_id,tb_User.u_Province_id,
                    tb_User.u_Target_id,tb_User.age,
                    tb_User.Description,tb_User.view_count,
                    tb_User.img,tb_User.acc_status,
                    tb_User.created_date,tb_User.last_update,
                    tb_User.lastonline_time,tb_User.baned_use
                    FROM tb_User
                    INNER JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id
                    LEFT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id
                    LEFT JOIN tb_target ON tb_user.u_Target_id = tb_target.Target_id
                    LEFT JOIN tb_province ON tb_user.u_Province_id = tb_province.Province_id
            WHERE $keyword AND  $gender AND $ban
            LIMIT $start,$limit";
	// echo $sql;
	// exit;
	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	$arr = [];
	while ($row = mysqli_fetch_assoc($qr)) {
		array_push($arr, $row);
	}
	$data = ["data" => $arr, "numrow" => $qr2->num_rows, "start" => $start, "limit" => $limit];
	$message = $qr->num_rows;
	if ($qr) {
		success($data, $message);
	} else {
		error();
	}
} else if ($_POST['action'] == "getreport-detail") {
	$id = $con->real_escape_string($_POST['id']);
	$qr = mysqli_query($con, "SELECT tb_user.Name,tb_report.* FROM `tb_report`LEFT JOIN tb_user on tb_report.reporter_id = tb_user.User_id WHERE reported_id = '$id'") or die('error. ' . mysqli_error($con));
	$arr = [];
	while ($row = mysqli_fetch_assoc($qr)) {
		array_push($arr, $row);
	}
	if ($qr) {
		success($arr);
	} else {
		error();
	}
} else if ($_POST['action'] == "getreport") {
	$limit = 10;
	$start = 0;
	$page = 1;

	if (isset($_POST['currentpage'])) {
		$page = $con->real_escape_string($_POST['currentpage']);
	}

	$start = ($page - 1) * $limit;
	$sql2 = "SELECT reported_id FROM tb_report  GROUP BY reported_id";
	$qr2 = mysqli_query($con, $sql2) or die('error. ' . mysqli_error($con));

	$sql = "SELECT tb_user.Name,tb_user.User_id,tb_user.created_date,COUNT(tb_user.User_id) as count
            FROM tb_report
            LEFT JOIN tb_user on tb_report.reported_id = tb_user.User_id
            GROUP BY tb_report.reported_id
            ORDER BY count DESC
            LIMIT $start,$limit";

	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	$arr = [];
	while ($row = mysqli_fetch_assoc($qr)) {
		array_push($arr, $row);
	}
	$data = ["data" => $arr, "numrow" => $qr2->num_rows, "start" => $start, "limit" => $limit];
	$message = $qr->num_rows;
	if ($qr) {
		success($data, $message);
	} else {
		error();
	}
}else if ($_POST['action'] == "graph") {

    $qr = mysqli_query($con, "SELECT DAYOFWEEK(lastonline_time) as day,lastonline_time,count(user_id) as count FROM tb_user WHERE DATE(lastonline_time) BETWEEN ((curdate()-INTERVAL 1 WEEK)+INTERVAL 1 DAY) AND curdate() OR DATE(lastonline_time) = curdate() GROUP BY day ORDER BY `tb_user`.`lastonline_time` asc") or die('error. ' . mysqli_error($con));
    $arr = [];

	while ($row = mysqli_fetch_assoc($qr)) {
        $arr[$row['day']] = $row['count'];
    }
    for($i= 1; $i<=7 ; $i++){
        if(!isset($arr[$i])){
            $arr[$i] = 0;
        }
    }
    ksort($arr);

    foreach($arr as $x=>$x_value) {
        $aftersort[$x] = $x_value;
        }
	if ($qr) {
		success($aftersort);
	} else {
		error();
	}

 }else if ($_POST['action'] == "register") { 
	$name = $con->real_escape_string($_POST['name']);
	$email = $con->real_escape_string($_POST['email']);
	$psw = $con->real_escape_string($_POST['psw']);
	$sql = "INSERT INTO `tb_admin`(`name`,`e_mail`,`password`,`created_date`) VALUES ('$name','$email','$psw',now())";
	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	if ($qr) {
		success();
	} else {
		error();
	}
  }
  else if ($_POST['action'] == "login") {
	$username = $con->real_escape_string($_POST['username']);
	$password = $con->real_escape_string($_POST['password']);

	$sql = "SELECT admin_id,`name`,`e_mail`,`password`,`status` FROM `tb_admin` WHERE `e_mail`='$username' AND `password` = '$password'";
	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	$row = mysqli_fetch_assoc($qr);
	if ($qr->num_rows >= 1 && $row['status'] == '1') {
		$_SESSION["admin_id"] = $row["admin_id"];
		$_SESSION["admin_name"] = $row["name"];
		$adminid = $row["admin_id"];
		$qr2 = mysqli_query($con, "UPDATE tb_admin SET lastes_login = now() WHERE admin_id = '$adminid'") or die('error. ' . mysqli_error($con));

		if($qr2){
			success();
		}
	}else if($qr->num_rows >= 1 && $row['status'] == '0' ){
		error('wait');
		exit;
	} else {
		error();
	}
}else if ($_POST['action'] == "judadmin") { 
	$id = $con->real_escape_string($_POST['id']);
	$jud = $con->real_escape_string($_POST['jud']);
	$sql = "";
	if($jud == 'no'){
		$sql = "DELETE FROM tb_admin WHERE admin_id = '$id'";
	}else if($jud == 'yes'){
		$sql = "UPDATE tb_admin SET status = '1' WHERE admin_id = '$id'";
	}
	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	if ($qr) {
		success();
	} else {
		error();
	}
  }else if ($_POST['action'] == "delete-report") { 
	$id = $con->real_escape_string($_POST['id']);
	$sql = "DELETE FROM tb_report WHERE reported_id = '$id'";
	$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
	if ($qr) {
		success();
	} else {
		error();
	}
  } 
// $query = '';
// $output = array();
// $query = "SELECT * FROM tb_User
//             LEFT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id
//             LEFT JOIN tb_target ON tb_user.u_Target_id = tb_target.Target_id
//             LEFT JOIN tb_province ON tb_user.u_Province_id = tb_province.Province_id ";

// if(isset($_POST["search"]["value"]))
// {
//     $query .= 'WHERE Name LIKE "%'.$_POST["search"]["value"].'%" ';
// }

// if(isset($_POST["order"]))
// {
//     $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
// }
// else
// {
//     $query .= 'ORDER BY tb_User.User_id ASC ';
// }

// if($_POST["length"] != -1)
// {
//     $query .= 'LIMIT ' .$_POST['start']. ', ' .$_POST['length'];
// }
// $qr = mysqli_query($con,$query) or die('error. ' . mysqli_error($con));
// while ($row = mysqli_fetch_assoc($qr)) {
//     $sub_array = array();

//     $sub_array[] = $row['User_id'];
//     $sub_array[] = $row['Name'];
//     $sub_array[] = $row['facebook'];
//     $sub_array[] = "<button type='button'>button<button>";
//     $sub_array[] = "<button type='button'>button<button>";
//     $data[] = $sub_array;
// }
// $output = array(
//     "draw" => intval($_POST['draw']),
//     "recordsTotal" => $qr->num_rows,
//     "recordsFiltered" => $qr->num_rows,
//     "data" => $data
// );
// echo json_encode($output);
