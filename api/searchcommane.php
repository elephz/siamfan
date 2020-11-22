<?php 

    $base_selectGender = mysqli_query($con, "SELECT * FROM tb_gender") or die('error. ' . mysqli_error($con));
    $base_selectprovince = mysqli_query($con, $allprovince) or die('error. ' . mysqli_error($con));
    $base_seletarget = mysqli_query($con, "SELECT * FROM tb_target") or die('error. ' . mysqli_error($con));
   
?>