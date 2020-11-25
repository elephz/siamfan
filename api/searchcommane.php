<?php

$base_selectGender = mysqli_query($con, "SELECT * FROM tb_gender") or die('error. ' . mysqli_error($con));
$base_selectprovince = mysqli_query($con, $allprovince) or die('error. ' . mysqli_error($con));
$base_seletarget = mysqli_query($con, "SELECT * FROM tb_target") or die('error. ' . mysqli_error($con));
$title = "";
$data = "";
$typepara = "";
$agearr =[];
$obj = [];
if (isset($_GET['t'])) {
	$typepara = "t";
	$type = $_GET['t'];

	if ($type == "search") {
		$title = "<i class='fas fa-search-plus'></i> ค้นหาเพื่อน";
		$data = "search";
	}
}
if (isset($_GET['target'])) {
	$target = $_GET['target'];
	$typepara = "target";
	$arr_target = [
		'1' => 'หาคู่',
		'2' => 'หาแฟน',
		'3' => 'หากิ๊ก',
		'4' => 'หาที่ปรึกษา',
		'5' => 'หาพี่ชาย',
		'6' => 'พาพี่สาว',
		'7' => 'หาน้องชาย',
		'8' => 'หาน้องสาว',
	];
	foreach ($arr_target as $key => $value) {
		if ($target == $key) {
			$title = "<i class='fas fa-user-friends'></i> " . $value;
			$data = $key;
		}
	}
}
if (isset($_GET['g'])) {
	$typepara = "g";
	$arr_g = [
		'men' => 'ชาย',
		'women' => 'หญิง',
		'gay' => 'เกย์',
		'genall' => 'สาวสอง',
		'less' => 'เลสเบี้ยน',
		'indy' => 'ดี้',
		'tom' => 'ทอม',
	];
	$g = $_GET['g'];
	foreach ($arr_g as $key => $value) {
		if ($g == $key) {
			$title = "<i class='fas fa-user-friends'></i> หาเพื่อน" . $value;
			$data = $key;
		}
	}
}
if (isset($_GET['social'])) {
	$typepara = "social";
	$arr_social = [
		'line' => 'ไลน์',
		'facebook' => 'เฟซบุ๊ก',
		'phone' => 'เบอร์โทรศัพท์',
	];
	$social = $_GET['social'];
	foreach ($arr_social as $key => $value) {
		if ($social == $key) {
			$title = "<i class='fas fa-user-friends'></i> หาเพื่อนที่มี" . $value;
			$data = $key;
		}
	}
}
if (isset($_GET['province'])) {
	$typepara = "province";
	$data = $_GET['province'];
}
if (isset($_GET['age'])) {
	$typepara = "age";
    $agearr[0] = $_GET['f'] ;
    $agearr[1] = $_GET['l'];
    $data = $_GET['age'];
}
if (isset($_POST['form'])) {
	$obj = $_POST;
}
echo '<script type="text/javascript">';
echo "var typepara = '$typepara';";
echo "var data = '$data';";
echo '</script>';
