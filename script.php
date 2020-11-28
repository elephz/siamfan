<?php
include "api/config.php";

exit;
function generateRandomString($length = 10)
{
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
 
 $random = rand(2018,2020)."-".rand(1,11)."-".rand(1,21)." ".rand(0,23).":".rand(1,59).":".rand(1,59);

 

 for ($i = 1; $i <= 50; $i++) {
	$land2 = (rand(1, 50));
	$land1 = (rand(50, 116));
	$random2 = rand(2018,2020)."-".rand(1,11)."-".rand(1,10);
	$rantext =  generateRandomString();
	$sql = mysqli_query($con, "INSERT INTO `tb_report`(`reporter_id`,`reported_id`,report_description,`date`) 
							VALUES ('$land1','$land2','$rantext','$random2')");
}

 // แอเรย์เก็บผลลัพท์ไว้ที่ key
 $datas = array();
 // จำนวนข้อมูลที่ต้องการ
 $count = 116;
 // วนลูป
 while (true) {
	 // สุ่มตัวเลข
	 $r = rand(1, $count * 1);
	 // ตรวจสอบตัวเลขซ้ำ
	 if (!isset($datas[$r])) {
		 // ถ้ายังไม่เคยมีตัวเลขนี้ให้ใส่ลง array เป็น key
		 $datas[$r] = 0;
	 }
	 if (sizeof($datas) == $count) {
		 // ครบจำนวนที่ต้องการให้ออกจากลูป
		 break;
	 }
 }
 // จำนวนข้อมูลที่สุ่มได้
 echo sizeof($datas);
 // แสดงรายการข้อมูลที่สุ่มได้
 echo "<pre>";
 print_r(array_keys($datas));
 echo "</pre>";
 
date_default_timezone_set("Asia/Bangkok");
// echo $random."<br>";
echo date('m/d/Y', 17621576);

$timestamp = 17621576;
$datetimeFormat = 'Y-m-d H:i:s';

$date = new \DateTime();
// If you must have use time zones
// $date = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
$date->setTimestamp($timestamp);
echo $date->format($datetimeFormat);

// $sql = mysqli_query($con, " SELECT User_id FROM `tb_user`");
// while ($row = mysqli_fetch_assoc($sql)) {
// 	$users = $row['User_id'];
// 	mysqli_query($con,"INSERT INTO tb_privacy(User_id) VALUES ('$users')");
// }

for ($i = 1; $i <= 116; $i++) {
	
	$land2 = (rand(1, 116));
	$land1 = (rand(1, 116));
	$random = rand(2018,2020)."-".rand(1,11)."-".rand(1,21)." ".rand(0,23).":".rand(1,59).":".rand(1,59);

	$random2 = rand(2018,2020)."-".rand(1,11)."-".rand(1,10);
// 		$lantext = generateRandomString();
	$sql = mysqli_query($con, "UPDATE tb_user SET lastonline_time = '$random', created_date = '$random2 ' WHERE User_id  = '$i'");
}

// }
if ($sql) {
	echo "ok";
}

$sql = mysqli_query($con, " SELECT * FROM `tb_user` INNER JOIN  WHERE (User_id % 3 = 0) AND line_id IS  NUll ORDER BY `User_id` ASC");

$sql1 = mysqli_query($con, " SELECT User_id FROM `tb_user` WHERE u_Gender_id  = 0");

// $sql2 = mysqli_query($con, " SELECT * FROM `tb_user` WHERE (User_id % 5 = 0) ORDER BY `User_id` ASC");
// echo $sql->num_rows . "<br>";
$arr = [];
$arr1 = [];
// // $arr2 = [];
// echo "-------------------------";
// echo $sql->num_rows . "<br>";
// while ($row = mysqli_fetch_assoc($sql)) {
// 	array_push($arr, $row['User_id']);
// }
echo "-------------------------";
echo $sql1->num_rows . "<br>";
// while ($row1 = mysqli_fetch_assoc($sql1)) {
// 	array_push($arr1, $row1['User_id']);
// }
// echo "-------------------------";
// echo $sql2->num_rows . "<br>";
// while ($row2 = mysqli_fetch_assoc($sql2)) {
// 	array_push($arr2, $row2['User_id']);
// }
$result = array_intersect($arr, $arr1);
// echo "<pre>";
// print_r($result, false);
// echo "</pre>";
// function generateRandomString($length = 10)
// {
// 	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
// 	$charactersLength = strlen($characters);
// 	$randomString = '';
// 	for ($i = 0; $i < $length; $i++) {
// 		$randomString .= $characters[rand(0, $charactersLength - 1)];
// 	}
// 	return $randomString;
// }
// echo generateRandomString();
