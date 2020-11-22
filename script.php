<?php
include "api/config.php";
exit;
$sql = mysqli_query($con, " SELECT User_id FROM `tb_user`");
while ($row = mysqli_fetch_assoc($sql)) {
	$users = $row['User_id'];
	mysqli_query($con,"INSERT INTO tb_privacy(User_id) VALUES ('$users')");
}

for ($i = 1; $i <= 120; $i++) {
	$land = (rand(1, 77));
	$land2 = (rand(1, 120));
// 		$lantext = generateRandomString();
	$a = "%" . $i;
	$sql = mysqli_query($con, "UPDATE tb_user SET u_Province_id = '$land' WHERE User_id  = '$land2'");

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
// echo generateRandomString();
