<?php
if (isset($_GET['m'])) {
	$id = $_GET['m'];
	echo '<script type="text/javascript">';
	echo "var member_id = '$id';";
	echo "var login = true;";
	echo '</script>';
	$sql_member = "SELECT
                TIMEDIFF(now(), tb_User.lastonline_time) as timediff,
                DATEDIFF(now(), tb_User.lastonline_time) as daydiff,
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
                WHERE tb_User.User_id = $id ";

	$qr_member = mysqli_query($con, $sql_member) or die('error. ' . mysqli_error($con));
	// echo "<pre>";
	// print_r($qr_member, false);
	// echo "</pre>";
	$rowmb = mysqli_fetch_assoc($qr_member);
	$getderid = $rowmb['Gender_id'];


	$dayTH = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];
	$monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
	$monthTH_brev = [null, 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];

	$daydiff = $rowmb['daydiff'];
	$timediff = $rowmb['timediff'];
	$lastonlinetime = $rowmb['lastonline_time'];

	$count555 = mysqli_query($con, "SELECT User_id FROM tb_user WHERE u_Gender_id = $getderid ") or die('error. ' . mysqli_error($con));
	$rowgd1 = $count555->num_rows;
	$ran = rand(0, $rowgd1 - 8);
	$sql_gender_member = "SELECT
                        TIMEDIFF(now(), tb_User.lastonline_time) as timediff,
                        DATEDIFF(now(), tb_User.lastonline_time) as daydiff,
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
                        WHERE tb_User.u_Gender_id = $getderid
                        ORDER BY tb_User.lastonline_time DESC
                        LIMIT $ran,8";

	$qr_gender_member = mysqli_query($con, $sql_gender_member) or die('error. ' . mysqli_error($con));

	$seleceprovince_member = mysqli_query($con, "SELECT tb_province.Province_name , tb_user.u_Province_id , COUNT(tb_user.u_Province_id)
                                            as count  FROM `tb_user`
                                            LEFT JOIN  tb_province on tb_user.u_Province_id = tb_province.Province_id
                                            WHERE tb_user.u_Province_id != 0
                                            AND tb_user.u_Gender_id = '$getderid'
                                            GROUP BY tb_user.u_Province_id");

	$qrage1824 = mysqli_query($con, "SELECT User_id From tb_user WHERE age BETWEEN 18 AND 24 AND u_Gender_id = '$getderid'");
	$qrage2534 = mysqli_query($con, "SELECT User_id From tb_user WHERE age BETWEEN 25 AND 34 AND u_Gender_id = '$getderid'");
	$qrage3544 = mysqli_query($con, "SELECT User_id From tb_user WHERE age BETWEEN 35 AND 44 AND u_Gender_id = '$getderid'");
	$qrage4554 = mysqli_query($con, "SELECT User_id From tb_user WHERE age BETWEEN 45 AND 54 AND u_Gender_id = '$getderid'");
	$qrage5564 = mysqli_query($con, "SELECT User_id From tb_user WHERE age BETWEEN 558 AND 64 AND u_Gender_id = '$getderid'");
	$qrage65up = mysqli_query($con, "SELECT User_id From tb_user WHERE age > 65 AND u_Gender_id = '$getderid'");
// SELECT Gender_id , count(User_id) as count FROM `tb_user` RIGHT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id WHERE tb_user.age BETWEEN 18 AND 24 OR tb_user.age = 0 GROUP BY tb_gender.Gender_id
	$seleceprovince = mysqli_query($con, "SELECT tb_province.Province_name , tb_user.u_Province_id , COUNT(tb_user.u_Province_id) as count  FROM `tb_user` LEFT JOIN  tb_province on tb_user.u_Province_id = tb_province.Province_id  WHERE tb_user.u_Province_id != 0 GROUP BY tb_user.u_Province_id");

	$sl_gender_target = "SELECT count(u_Target_id) as count ,u_Target_id From tb_user WHERE tb_user.u_Gender_id = '$getderid'  AND  tb_user.u_Target_id != '0' GROUP BY u_Target_id";
	$qr_gender_target = mysqli_query($con, $sl_gender_target);
// echo setfunction($qr_gender_target);
	$arr = [];
	$pttarr = ["1" => '0', '2' => '0', '3' => '0', '4' => '0', '5' => '0', '6' => '0', '7' => '0', '8' => '0'];

	while ($r = mysqli_fetch_assoc($qr_gender_target)) {
		$key = $r['u_Target_id'];
		$val = $r['count'];
		$arr[$key] = $val;
	}
	$i = 1;
	for ($i; $i <= 8; $i++) {

		if (empty($arr[$i])) {
			$arr[$i] = '0';
		}
	}
	ksort($arr);
	$aftersort = [];
	foreach ($arr as $x => $x_value) {
		$aftersort[$x] = $x_value;
	}
	$count_ppr_gender = mysqli_query($con, "SELECT User_id FROM tb_User WHERE u_Gender_id = $getderid AND tb_User.view_count > 500");
	$countppr = $count_ppr_gender->num_rows;
	$ranppr = rand(0, $countppr - 6);
	if($ranppr < 0){
		$ranppr = 0;
	}
	$sql_poppular_gender = "SELECT
                            TIMEDIFF(now(), tb_User.lastonline_time) as timediff,
                            DATEDIFF(now(), tb_User.lastonline_time) as daydiff,
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
                            WHERE tb_User.u_Gender_id = $getderid
                            AND tb_User.view_count > 500
                            ORDER BY tb_User.view_count DESC
                            LIMIT $ranppr,6 ";

	$poppula_gender = mysqli_query($con, $sql_poppular_gender);
	function social($facebook, $line, $phone)
	{
		$data = (($facebook == null) ? " " : "<li class='list-inline-item'><img src='assets/image/facebook.png' ></li>");
		$data .= (($line == null) ? " " : "<li class='list-inline-item'><img src='assets/image/line.png' ></li>");
		$data .= (($phone == null) ? " " : "<li class='list-inline-item'><img src='assets/image/phone-call.png' ></li>");
		return $data;
	}
}
