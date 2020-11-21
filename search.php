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
</head>
<body>
<?php include "compostion/header.php";?>

<div class="container mt-2">
    <div class="row">
        <div class="col text-center">
                <h5><i class="fas fa-search-plus"></i> ค้นหาเพื่อน</h5>
        </div>
    </div>
    <div class="row">
        <form class="form-inline mx-auto w-100">
            <input type="text" class="form-control   mb-2 mr-sm-2 " id="inlineFormInputName2" placeholder="คำค้น">

            <select class="form-control  mb-2 mr-sm-2 " name="" id="">
                <option value="">เลือกเฉพาะ</option>
                <option value="">เพื่อนที่มีไลน์</option>
                <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                <option value="">เพื่อนที่มีเบอร์โทร</option>
            </select>
            <select class="form-control  mb-2 mr-sm-2 " name="" id="">
                <option value="">เพศ</option>
                <option value="">เพื่อนที่มีไลน์</option>
                <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                <option value="">เพื่อนที่มีเบอร์โทร</option>
            </select>
            <select class="form-control  mb-2 mr-sm-2 " name="" id="">
                <option value="">อายุ</option>
                <?php for ($i = 18; $i <= 80; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <label for="">ถึง</label>
            <select class="form-control ml-1  mb-2 mr-sm-2 " name="" id="">
                <option value="">อายุ</option>
                <?php for ($i = 18; $i <= 80; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <select class="form-control  mb-2 mr-sm-2 " name="" id="">
                <option value="">จังหวัด</option>
                <option value="">เพื่อนที่มีไลน์</option>
                <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                <option value="">เพื่อนที่มีเบอร์โทร</option>
            </select>
            <select class="form-control  mb-2 mr-sm-2 " name="" id="">
                <option value="">คนที่ต้องการ</option>
                <option value="">เพื่อนที่มีไลน์</option>
                <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                <option value="">เพื่อนที่มีเบอร์โทร</option>
            </select>
            <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>
        </form>
    </div>
    <div class="row">
    <?php for ($i = 1; $i <= 6; $i++) {?>
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
                            <li class="list-inline-item"><img src="assets/image/email.png" alt=""></li>
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
    <?php }?>
    </div>
</div>

</body>
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
</html>
