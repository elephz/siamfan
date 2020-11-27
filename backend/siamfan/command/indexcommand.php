<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/siamfan/api/config.php");
$today = date("Y-m-d");
$totaluser = mysqli_query($con, "SELECT count(User_id) as countuser FROM tb_user");
$alluse = mysqli_fetch_assoc($totaluser);

$newuser = mysqli_query($con, "SELECT count(User_id) as countuser FROM tb_user WHERE created_date = '$today'");
$newuse = mysqli_fetch_assoc($newuser);

$banuser = mysqli_query($con, "SELECT count(User_id) as countuser FROM tb_user WHERE baned_use = '1'");
$banuse = mysqli_fetch_assoc($banuser);


$reportuser = mysqli_query($con, "SELECT count(reported_id) as countuser FROM `tb_report` GROUP BY reported_id");
