<?php include "api/command.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siam Fan</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
</head>
<body>
   <?php include "compostion/header.php";?>
   <!-- seconed contend -->
    <div class="container">

        <div class="row my-3">
            <div class="col text-center">
                <span class='warning'>คำเตือน: ห้ามนำข้อมูลส่วนตัวผู้อื่นมาโพสต์โดยเด็ดขาด เพราะทางเว็บไซต์มีการบันทึก IP ผู้โพสต์ในระบบของผู้ดูแล สามารถติดตามตัวผู้กระทำผิดมาลงโทษได้</span>
            </div>
        </div>

        <div class="row ">

            <!-- left -->
            <div class="col-md-3 col-sm-12 p-2">
                <?php include "compostion/left.php";?>
            </div>
            <!-- left -->

            <!-- right -->
            <div class="col-md-9 col-sm-12">

                <div class="row">
                    <div class="col pb-1">
                        <h2 class='d-inline-block mb-0'>หาเพื่อนคุย</h2>
                        <small>เพื่อนทั้งหมด <?php echo $count_all_user; ?> รายการ</small>
                    </div>
                </div>

                <div class="gender-list my-4 ">
                    <div class='hover-effect1'>
                        <ul>
                            <li> <a class='hover-fx men' href="search?g=men"> ชาย </a></li>
                            <li> <a class='hover-fx women' href="search?g=women"> หญิง </a></li>
                            <li> <a class='hover-fx gay' href="search?g=gay"> เกย์ </a></li>
                            <li> <a class='hover-fx genall' href="search?g=genall"> สาว 2 </a></li>
                            <li> <a class='hover-fx tom' href="search?g=tom"> ทอม </a></li>
                            <li> <a class='hover-fx less' href="search?g=less"> เลส </a></li>
                            <li> <a class='hover-fx indy' href="search?g=indy"> ดี้ </a></li>
                        </ul>
                </div>
                </div>

                <div class="row">
                    <div class="col pb-1">
                        <h2 class='d-inline-block mb-2'>รูปภาพโปรไฟล์เพื่อนของเรา</h2>
                        <small>คลิกที่ภาพเพื่อดูข้อมูลโปรไฟล์ของเพื่อนได้เลย</small>
                    </div>
                </div>

                <div class="gallery col-sm-12">
                    <?php for ($i = 1; $i <= 60; $i++) {?>
                        <a href="" title="logo">
                            <img src="assets/image/avatar.png" alt="logo" width="75px">
                        </a>
                    <?php }?>
                </div>

                <div class="row contact my-5 text-center">
                    <div class="col-md-3 col-sm-6">
                        <div class="shadow">
                            <a href="search?social=line">
                                <img class='pb-3' src="assets/image/line.png" alt="" width="75px">
                                <h5>เพื่อนที่มีไลน์</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="shadow">
                            <a href="search?social=facebook">
                                <img class='pb-3' src="assets/image/facebook.png" alt="" width="75px">
                                <h5>เพื่อนที่มีเฟซบุ๊ก</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="shadow">
                            <a href="search?social=phone">
                                <img class='pb-3' src="assets/image/phone-call.png" alt="" width="75px">
                                <h5>เพื่อนที่มีเบอร์โทร</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="shadow">
                            <a href="search?t=search">
                                <img class='pb-3' src="assets/image/search.png" alt="" width="75px">
                                <h5>ค้นหาเพื่อน</h5>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- right -->

        </div>
    </div>
 <!-- seconed contend -->

 <!-- first advertising -->
    <div class="container advertising ">
        <div class="row ">
            <img src="https://images.unsplash.com/photo-1533069027836-fa937181a8ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&h=250&q=80" class="center w-100 p-2">
        </div>
    </div>
<!-- first advertising -->
<!-- current online -->
<div class="container my-3">
    <div class="row dot_bt">
        <div class="col text-center  pb-2">
            <h2 class='d-inline-block mb-0'>เพื่อนที่ออนไลน์</h2>
            <small >อย่ารอช้า เพื่อนรออยู่ แอดไปคุยกันนเลย</small>
        </div>
    </div>
    <div class="row py-3 p-0">
        <div class="col-md-3 col-sm-12">
            <a href="">
                <div class="Carduser">
                    <div class="grid-item-left text-center">
                        <img src="assets/image/avatar.png" alt="" class='w-100'>
                    <p class='online'>
                        <img  src="https://www.siamfans.com/media/img/user_online.gif" alt=""><span>ออนไลน์</span>
                    </p>
                    </div>
                    <div class="grid-item-right">
                        <h5>Lorem ipsum</h5>
                        <div class="userdescription">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, reiciendis.
                        </div>
                        <div class='gender-age my-1'>
                            <span class="label gender men">gender</span>
                            <span class="label">56</span>
                        </div>
                        <div class="province-target">
                            <i class="fas fa-street-view"></i> กรุงเทพมหานคร <br>
                            <i class="fas fa-search"></i> เป้าหมาย
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- current online -->
<!-- vote zone -->
<div class="container my-3">
    <div class="row dot_bt">
        <div class="col text-center  pb-2">
            <h2 class='d-inline-block mb-0'>เพื่อนที่ได้รับการโหวตวันนี้</h2>
            <small >1 สมาชิก/ 1 โหวต/ 1 คน/ 1วัน เท่านั้น !</small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-sm-6 p-0">
            <a href="">
                <div class="Usercard2">
                    <div class="content-user">
                        <img src="assets/image/avatar.png" alt="" >
                        <h5>Lorem ipsum</h5>
                        <div class='gender-age my-1'>
                            <span class="label gender men">gender</span>
                            <span class="label">56</span>
                        </div>
                        <div class="userdescription">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, reiciendis.
                        </div>
                        <div class="province-target text-left my-1">
                            <i class="fas fa-street-view"></i> กรุงเทพมหานคร <br>
                            <i class="fas fa-search"></i> เป้าหมาย
                        </div>
                    </div>
                    <div class="content-socail ">
                        <ul class="list-inline">
                            <li class="list-inline-item"><img src="assets/image/facebook.png" alt=""></li>
                            <li class="list-inline-item"><img src="assets/image/line.png" alt=""></li>
                            <li class="list-inline-item"><img src="assets/image/phone-call.png" alt=""></li>
                        </ul>
                    </div>
                    <div class="content-viewcount p-1">
                        <span class='pull-left'><i class="fa fa-bullhorn"></i> 1</span>
                        <span class='float-right'>11 ชั่วโมงที่แล้ว</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- vote zone -->
<!-- poppular zone -->
<div class="container my-3">
    <div class="row dot_bt">
        <div class="col text-center  pb-2">
            <h2 class='d-inline-block mb-0'>เพื่อนที่กำลังได้รับความนิยม</h2>
            <small >เพื่อนที่ได้รับการเข้าชมโปรไฟล์มากกว่า 1,000 ครั้ง</small>
        </div>
    </div>
    <div class="row py-3 p-0">
        <div class="col-md-3 col-sm-12">
            <a href="">
                <div class="Carduser">
                    <div class="grid-item-left text-center">
                        <img src="assets/image/avatar.png" alt="" class='w-100'>
                    <p class='online'>
                        <i class="fas fa-eye"></i> 500 ครั้ง
                    </p>
                    </div>
                    <div class="grid-item-right">
                        <h5>Lorem ipsum</h5>
                        <div class="userdescription">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, reiciendis.
                        </div>
                        <div class='gender-age my-1'>
                            <span class="label gender men">gender</span>
                            <span class="label">56</span>
                        </div>
                        <div class="province-target">
                            <i class="fas fa-street-view"></i> กรุงเทพมหานคร <br>
                            <i class="fas fa-search"></i> เป้าหมาย
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- poppular zone -->
<!-- fine target -->
<div class="container my-3">
    <div class="row dot_bt">
        <div class="col text-center  pb-2">
            <h2 class='d-inline-block mb-0'>เพื่อนที่กำลังมองหา</h2>
            <small >เลือกเพื่อนที่กำลังมองหาเหมือนคุณ</small>
        </div>
    </div>
    <div class="row py-3 grid-4">
    <?php while ($target = mysqli_fetch_assoc($select_target)) {?>
        <div class="grid4-item">
            <a href='search?target=<?php echo $target['u_Target_id']; ?>' type="button" class="btn btn-custom p-2 p-4"> <h4 class='d-inline f-16'><?php if ($target['u_Target_id'] != 0) {echo $target['Target_name'] . '(' . $target['count'] . ')';} else {echo "";}?></h4> </a>
        </div>
    <?php }?>
    </div>
</div>
<!-- fine target -->
<!-- find all friend zone -->
<div class="container my-3">
    <div class="row dot_bt">
        <div class="col text-center  pb-2">
            <h2 class='d-inline-block mb-0'>อายุเท่าไหร่ก็หาเพื่อนคุยได้</h2>
            <small >หาเพื่อนคุยตามอายุที่คุณต้องการ</small>
        </div>
    </div>
    <div class="row py-3 ">
        <table class='w-100 allgender-age'>
            <thead>
                <tr>
                    <th>อายุ</th>
                    <?php while ($gname = mysqli_fetch_assoc($sql_gendername)) { ?>
                        <th><?php echo $gname['Gender_name']; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>18-24 ปี</td>
                    <?php foreach ($data1824 as $key => $value) {
                     echo "<td>".(($value == "0")? " " :$value)."</td>";
                    }?>
                </tr>
                <tr>
                    <td>25-34 ปี</td>
                     <?php foreach ($data2534 as $key => $value) {
                     echo "<td>".(($value == "0")? " " :$value)."</td>";
                    }?>
                </tr>
                <tr>
                    <td>35-44 ปี</td>
                     <?php foreach ($data3544 as $key => $value) {
                     echo "<td>".(($value == "0")? " " :$value)."</td>";
                    }?>
                </tr>
                <tr>
                    <td>45-54 ปี</td>
                     <?php foreach ($data4554 as $key => $value) {
                     echo "<td>".(($value == "0")? " " :$value)."</td>";
                    }?>
                </tr>
                <tr>
                    <td>55-64 ปี</td>
                     <?php foreach ($data5564 as $key => $value) {
                     echo "<td>".(($value == "0")? " " :$value)."</td>";
                    }?>
                </tr>
                <tr>
                    <td>65 ปีขึ้นไป</td>
                     <?php foreach ($data65up as $key => $value) {
                     echo "<td>".(($value == "0")? " " :$value)."</td>";
                    }?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- find all friend zone -->
<!-- all province zone -->
<div class="container my-3">
    <div class="row dot_bt">
        <div class="col text-center  pb-2">
            <h2 class='d-inline-block mb-0 py-2'>เรามีเพื่อนอยู่ทุกจังหวัด</h2>
            <small >เลือกเพื่อนตามจังหวัดที่คุณต้องการได้เลย</small>
        </div>
    </div>
    <div class="row py-3 ">
    <?php while ($province = mysqli_fetch_assoc($seleceprovince)) {?>
        <div class="col-md-2 col-sm-4 p-3">
            <a class='province-icon' href="<?php echo "#" . $province['u_Province_id']; ?>"><i class="fas fa-street-view"></i> <?php echo $province['Province_name'] . '(' . $province['count'] . ')'; ?> </a>
        </div>
    <?php }?>
    </div>
</div>
<!-- all province zone -->
</body>
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
<script src="assets/script/index.js"></script>
</html>
