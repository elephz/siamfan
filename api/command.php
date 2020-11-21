<?php
session_start();
include "config.php";
$allgender = "SELECT * FROM tb_gender";
$sql_gender = "SELECT count(u_Gender_id) as count , u_Gender_id,Gender_name
                FROM tb_user LEFT JOIN tb_Gender ON tb_user.u_Gender_id = tb_Gender.Gender_id
                WHERE u_Gender_id != 0
                GROUP BY u_Gender_id";
$sql_Target = "SELECT count(u_Target_id) as count , u_Target_id,Target_name
                FROM tb_user LEFT JOIN tb_target ON tb_user.u_Target_id = tb_target.Target_id
                WHERE u_Target_id != 0
                GROUP BY u_Target_id";
$select_gender2 = mysqli_query($con, $sql_gender) or die('error. ' . mysqli_error($con));

$select_gender = mysqli_query($con, $allgender) or die('error. ' . mysqli_error($con));

$count_all_user = mysqli_query($con, "SELECT count(User_id) as count FROM tb_user") or die('error. ' . mysqli_error($con));
$count_all_user = mysqli_fetch_assoc($count_all_user);
$count_all_user = $count_all_user['count'];

$select_target = mysqli_query($con, $sql_Target) or die('error. ' . mysqli_error($con));

$qrage1824 = mysqli_query($con, "SELECT count(User_id) as count , u_Gender_id FROM `tb_user` WHERE age BETWEEN 18 AND 24 AND u_Gender_id != 0 GROUP BY u_Gender_id");
$qrage2534 = mysqli_query($con, "SELECT count(User_id) as count , u_Gender_id FROM `tb_user` WHERE age BETWEEN 25 AND 34 AND u_Gender_id != 0 GROUP BY u_Gender_id");
$qrage3544 = mysqli_query($con, "SELECT count(User_id) as count , u_Gender_id FROM `tb_user` WHERE age BETWEEN 35 AND 44 AND u_Gender_id != 0 GROUP BY u_Gender_id");
$qrage4554 = mysqli_query($con, "SELECT count(User_id) as count , u_Gender_id FROM `tb_user` WHERE age BETWEEN 45 AND 54 AND u_Gender_id != 0 GROUP BY u_Gender_id");
$qrage5564 = mysqli_query($con, "SELECT count(User_id) as count , u_Gender_id FROM `tb_user` WHERE age BETWEEN 55 AND 64 AND u_Gender_id != 0 GROUP BY u_Gender_id");
$qrage65up = mysqli_query($con, "SELECT count(User_id) as count , u_Gender_id FROM `tb_user` WHERE age > 65 AND u_Gender_id != 0 GROUP BY u_Gender_id");
// SELECT Gender_id , count(User_id) as count FROM `tb_user` RIGHT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id WHERE tb_user.age BETWEEN 18 AND 24 OR tb_user.age = 0 GROUP BY tb_gender.Gender_id
$seleceprovince = mysqli_query($con , "SELECT tb_province.Province_name , tb_user.u_Province_id , COUNT(tb_user.u_Province_id) as count  FROM `tb_user` LEFT JOIN  tb_province on tb_user.u_Province_id = tb_province.Province_id  WHERE tb_user.u_Province_id != 0 GROUP BY tb_user.u_Province_id");
// echo "<pre>";
// print_r($qrage1824, false);
// echo "</pre>";

// while ($r = mysqli_fetch_assoc($qrage1824)) {
// 	echo $r['u_Gender_id'] . "<br>";
// }
