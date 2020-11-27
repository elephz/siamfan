<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/siamfan/api/config.php");
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");

if ($_POST['action'] == "baned_user") {
    $id = $con->real_escape_string($_POST['id']);
    $sql = "UPDATE  `tb_user` SET `baned_use` = '1' WHERE `User_id` = '$id'";
		$qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
		if ($qr) {
			success();
		} else {
			error();
		}
}else if ($_POST['action'] == "getreport") {
    $limit = 10;
    $start = 0;
    $page = 1;
    $keyword = 'true';
    if(isset($_POST['limit'])){
        $limit = $con->real_escape_string($_POST['limit']);
    }
    if(isset($_POST['currentpage'])){
        $page = $con->real_escape_string($_POST['currentpage']);
    }
    if(isset($_POST['keyword'])){
        $keyword = $con->real_escape_string($_POST['keyword']);
        $keyword = "'%".$keyword."%'";
        $keyword = "tb_user.Name LIKE $keyword";
    }
    $start = ($page - 1) * $limit;
    $sql2 = "SELECT User_id FROM tb_User ";
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
                    tb_User.lastonline_time
                    FROM tb_User
                    INNER JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id
                    LEFT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id
                    LEFT JOIN tb_target ON tb_user.u_Target_id = tb_target.Target_id
                    LEFT JOIN tb_province ON tb_user.u_Province_id = tb_province.Province_id
            WHERE $keyword
            LIMIT $start,$limit";
            
        $qr = mysqli_query($con, $sql) or die('error. ' . mysqli_error($con));
        $arr = [];
        while ($row = mysqli_fetch_assoc($qr)) {
			array_push($arr, $row);
        }
        $data = ["data"=>$arr,"numrow"=>$qr2->num_rows];
        $message = $qr->num_rows;
        if ($qr) {
			success($data,$message);
		} else {
			error();
		}
}else if ($_POST['action'] == "getreport-detail") {
    $id = $con->real_escape_string($_POST['id']);


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

