<?php
$today = date("Y-m-d");
$sqlshoimg = "SELECT tb_user.User_id,Name,img,u_Gender_id,Gender_name,pvc_img,age FROM tb_User LEFT JOIN tb_gender ON tb_User.u_Gender_id = tb_gender.Gender_id INNER JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id WHERE tb_privacy.pvc_img = '1' ORDER BY RAND() LIMIT 60";
$qrshowimg = mysqli_query($con, $sqlshoimg);

$sqlvotetoday = "SELECT 
                TIMEDIFF(now(), tb_User.lastonline_time) as timediff,
                DATEDIFF(now(), tb_User.lastonline_time) as daydiff,
                TIMESTAMPDIFF(MINUTE, lastonline_time,now()) AS diff,
                tb_privacy.*,tb_gender.*,tb_target.*,tb_province.*,
                tb_User.User_id,tb_User.Name,tb_User.line_id,
                tb_User.facebook,tb_User.e_mail,tb_User.phone,
                tb_User.u_Gender_id,tb_User.u_Province_id,
                tb_User.u_Target_id,tb_User.age,
                tb_User.Description,tb_User.view_count,
                tb_User.img,tb_User.acc_status,
                tb_User.created_date,tb_User.last_update,
                tb_User.lastonline_time
                FROM tb_user
                INNER JOIN tb_privacy ON tb_user.User_id = tb_privacy.User_id
                LEFT JOIN tb_gender ON tb_user.u_Gender_id = tb_gender.Gender_id
                LEFT JOIN tb_target ON tb_user.u_Target_id = tb_target.Target_id
                LEFT JOIN tb_vote ON tb_User.User_id = tb_vote.voted_id
                LEFT JOIN tb_province ON tb_user.u_Province_id = tb_province.Province_id 
                WHERE tb_vote.date = '$today'";
                $qrvotetoday = mysqli_query($con, $sqlvotetoday);
    $count_ppr = mysqli_query($con, "SELECT User_id FROM tb_User WHERE  tb_User.view_count > 500");
    $countppr = $count_ppr->num_rows;
    $ranppr = rand(0, $countppr - 8);
    $sql_poppular = "SELECT
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
                            WHERE tb_User.view_count > 500
                            ORDER BY tb_User.view_count DESC
                            LIMIT $ranppr,8 ";
	$poppula = mysqli_query($con, $sql_poppular);

                           