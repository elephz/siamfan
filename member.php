<?php include "api/command.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siam Fan</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/member.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/previewimg/ImgUploader/croppie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
</head>
<body>
<?php include "compostion/header.php";?>
<?php include "api/membercommand.php";?>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-12 p-2">
            <?php include "compostion/left.php";?>
        </div>
        <div class="col-md-9 col-sm-12 ">
           <div class="row">
               <div class="col">
                   <span><?php echo $rowmb["Description"]; ?></span>
               </div>
           </div>
                <div class="Usercard2">
                    <div class="content-user"> 
                        <img src="<?php echo image($rowmb["pvc_img"], $rowmb["img"]); ?>" alt="" >
                        <h4><?php echo $rowmb["Name"]; ?></h4>
                        <div class='gender-age my-1'>
                            <span class="label gender <?php echo classgener($getderid); ?>"><?php echo $rowmb["Gender_name"]; ?></span>
                            <span class="label"><?php echo $rowmb["age"]; ?></span>
                            <a class="ml-1 bullhorn"><i class="fas fa-bullhorn"></i> +1 </a>
                        </div>
                    </div>
                    <table class='mx-auto seting-table  '>
                        <tbody id="td-profile">
                            <tr>
                                <td class='left-td'>กำลังมองหา</td>
                                <td  class='right-td'><span><?php echo $rowmb['Target_name']; ?></span></td>
                            </tr>
                            <tr>
                                <td class='left-td'>จังหวัด</td>
                                <td  class='right-td'><span><?php echo $rowmb['Province_name']; ?></span></td>
                            </tr>
                            <tr>
                                <td class='left-td'>เบอร์โทร</td>
                                <td  class='right-td'><span><?php echo privacy($rowmb['pvc_phone'],$rowmb['phone']); ?></span></td>
                            </tr>
                            <tr>
                                <td class='left-td'>อีเมล์</td>
                                <td  class='right-td'><span><?php echo privacy($rowmb['pvc_email'],$rowmb['e_mail']); ?></span></td>
                            </tr>
                            <tr>
                                <td class='left-td'>ไอดีไลน์</td>
                                <td  class='right-td'><span><?php echo privacy($rowmb['pvc_line'],$rowmb['line_id']); ?></span></td>
                            </tr>
                            <tr>
                                <td class='left-td'>เฟซบุ๊ก</td>
                                <td  class='right-td'><span><?php echo privacy($rowmb['pvc_facebook'],$rowmb['facebook']); ?></span></td>
                            </tr>
                            <tr>
                                <td class='left-td'>อัปเดตล่าสุด</td>
                                <td  class='right-td'><span><i class="far fa-clock"></i> <?php echo onlinetime($daydiff, $timediff, $lastonlinetime) ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row my-2">
                        <div class="col text-center">
                            <span class='warning'><b>คำเตือน: โปรดระวังมิจฉาชีพหลอกโอนเงินโดยการโพสต์ขายวิวหรือบริการอื่นๆ ทางเว็บไซต์ไม่สนับสนุนการกระทำที่ผิดต่อกฏหมายทุกชนิด</b></span>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <div class='float-left d-inline-block eyes'><i class="far fa-eye"></i> <?php echo $rowmb['view_count']; ?></div>
                            <div class='float-right d-inline-block'>
                                <a href="" class='report'>
                                    <b><i class="fas fa-times"></i> แจ้งลบ</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row my-4 ">
                <h4>แนะนำเพื่อนคุย</h4>
            </div>

            <div class="row">

                <?php
while ($rowgd = mysqli_fetch_assoc($qr_gender_member)) {
	$gdid = $rowgd["User_id"];
	$bullhorn = mysqli_query($con, "SELECT voted_id FROM `tb_vote` WHERE voted_id = '$gdid'") or die('error. ' . mysqli_error($con));
	$bullhorncount = $bullhorn->num_rows;
	?>
                <div class="col-md-3 col-sm-6 col-6 p-0">
                    <a href="member?m=<?php echo $rowgd['User_id'] ; ?>">
                        <div class="Usercard2">
                            <div class="content-user">
                                <img src="<?php echo image($rowgd["pvc_img"], $rowgd["img"]); ?>" alt="" >
                                <h5><?php echo $rowgd["Name"]; ?></h5>
                                <div class='gender-age my-1'>
                                    <span class="label gender <?php echo classgener($rowgd["Gender_id"]); ?>"><?php echo $rowgd["Gender_name"]; ?></span>
                                    <span class="label"><?php echo $rowgd["age"]; ?></span>
                                </div>
                                <div class="userdescription">
                                    <?php echo $rowgd["Description"]; ?>
                                </div>
                                <div class="province-target text-left my-1">
                                    <i class="fas fa-street-view"></i> <?php echo $rowgd["Province_name"]; ?> <br>
                                    <i class="fas fa-search"></i> <?php echo $rowgd["Target_name"]; ?>
                                </div>
                            </div>
                            <div class="content-socail ">
                                <ul class="list-inline">
                                   <?php echo social($rowgd["facebook"], $rowgd["line_id"], $rowgd["phone"]); ?>
                                </ul>
                            </div>
                            <div class="content-viewcount p-1">
                                <span class='pull-left'><i class="fa fa-bullhorn"></i> <?php echo $bullhorncount; ?></span>
                                <span class='float-right'><?php echo onlinetime($rowgd['daydiff'], $rowgd['timediff'], $rowgd['lastonline_time']); ?></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>

                </div>
                <?php }?>
            </div>
            <div class="row my-4">
                <h4>หาเพื่อน<?php echo $rowmb["Gender_name"]; ?>ตามอายุ</h4>
            </div>
            <div class="row p-2">
               <table class='w-100'>
                   <thead>
                        <tr>
                            <th>  18-24 ปี  </th>
                            <th>  25-34 ปี  </th>
                            <th>  35-44 ปี  </th>
                            <th>  45-54 ปี  </th>
                            <th>  55-64 ปี  </th>
                            <th>  65 ปีขึ้นไป  </th>
                        </tr>
                   </thead>
                   <tbody>
                        <tr>
                            <td><a href=""><?php echo $qrage1824->num_rows; ?></a></td>
                            <td><a href=""><?php echo $qrage2534->num_rows; ?></a></td>
                            <td><a href=""><?php echo $qrage3544->num_rows; ?></a></td>
                            <td><a href=""><?php echo $qrage4554->num_rows; ?></a></td>
                            <td><a href=""><?php echo $qrage5564->num_rows; ?></a></td>
                            <td><a href=""><?php echo $qrage65up->num_rows; ?></a></td>
                        </tr>
                   </tbody>
               </table>
            </div>
            <div class="row my-4 ">
                <h4>หาเพื่อน<?php echo $rowmb["Gender_name"]; ?>ตามจังหวัด</h4>
            </div>
            <div class="row">
            <?php while ($province = mysqli_fetch_assoc($seleceprovince_member)) {?>
                <div class="col-md-2 col-sm-4 col-6 p-1">
                    <a class='province-icon ' href="<?php echo "#" . $province['u_Province_id']; ?>"><i class="fas fa-street-view"></i> <?php echo $province['Province_name'] . '(' . $province['count'] . ')'; ?> </a>
                </div>
            <?php }?>
            </div>
            <div class="row my-4 ">
                <h4>หาเพื่อน<?php echo $rowmb["Gender_name"]; ?>ที่กำลังมองหา</h4>
            </div>
            <div class="row p-2">
                <table class='w-100'>
                   <thead>
                        <tr>
                            <th> หาคู่</th>
                            <th> หาแฟน</th>
                            <th> หากิ๊ก</th>
                            <th> หาที่ปรึกษา</th>
                            <th> หาพี่ชาย</th>
                            <th> หาพี่สาว</th>
                            <th> หาน้องชาย</th>
                            <th> หาน้องสาว</th>
                        </tr>
                   </thead>
                   <tbody>
                        <tr>
                            <?php
foreach ($aftersort as $key => $val) {?>
                                <td><a href="#"><?php echo $val; ?></a></td>
                           <?php }?>
                        </tr>
                   </tbody>
                </table>
            </div>
            <div class="row my-4 ">
                <h4>หาเพื่อน<?php echo $rowmb["Gender_name"]; ?>ที่กำลังได้รับความนิยม</h4>
            </div>
            <div class="row p-0">
                <?php while ($rowppr = mysqli_fetch_assoc($poppula_gender)) {?>
                <div class="col-md-4 col-sm-6 col-6 p-1">
                    <a href="member?m=<?php echo $rowppr['User_id'] ?>">
                        <div class="Carduser">
                            <div class="grid-item-left text-center">
                                <img src="<?php echo image($rowppr["pvc_img"], $rowppr["img"]); ?>" alt="" class='w-100'>
                            <p class='online'>
                                <i class="far fa-eye"></i> <?php echo $rowppr['view_count']; ?>
                            </p>
                            </div>
                            <div class="grid-item-right">
                                <h5><?php echo $rowppr['Name']; ?></h5>
                                <div class="userdescription">
                                <?php echo $rowppr['Description']; ?>
                                </div>
                                <div class='gender-age my-1'>
                                    <span class="label gender <?php echo classgener($rowppr['Gender_id']); ?>"><?php echo $rowppr['Gender_name'] ?></span>
                                    <span class="label"><?php echo $rowppr['age'] ?></span>
                                </div>
                                <div class="province-target">
                                    <i class="fas fa-street-view"></i> <?php echo $rowppr['Province_name'] ?> <br>
                                    <i class="fas fa-search"></i> <?php echo $rowppr['Target_name'] ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
        <!-- modal -->
    <div class="modal fade" id="report">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">แจ้งลบ</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col text-center p-5">


                            <div class="content-user">
                                <img src="<?php echo image($rowmb["pvc_img"], $rowmb["img"]); ?>" alt="" >
                                <h4><?php echo $rowmb["Name"]; ?></h4>
                                <div class='gender-age my-1'>
                                    <span class="label gender <?php echo $classgender; ?>"><?php echo $rowmb["Gender_name"]; ?></span>
                                    <span class="label"><?php echo $rowmb["age"]; ?></span><br>
                                    <span class="label"><?php echo $rowmb["Target_name"]; ?></span>
                                </div>
                            </div>
                            <table class='w-100 mx-auto  '>
                                <tbody id="td-profile">
                                    <tr>
                                        <td class='left-td'>สาเหตุการแจ้งลบ</td>
                                        <td  class='right-td'>
                                            <div class="form-check">
                                                <input class="form-check-input reson" type="radio" name="reson" id="exampleRadios2" value="เบอร์โทร/ไลน์/เฟสบุ๊ค ติดต่อไม่ได้">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    เบอร์โทร/ไลน์/เฟสบุ๊ค ติดต่อไม่ได้
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input reson" type="radio" name="reson" id="exampleRadios2" value="เจ้าของโปรไฟล์แจ้งลบเอง">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    เจ้าของโปรไฟล์แจ้งลบเอง <span class='warning'> * หากเป็นสมาชิกสามารถลบเองได้ในระบบสมาชิก </span>
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input reson" type="radio" name="reson" id="exampleRadios2" value="เอาข้อมูลผู้อื่นมาโพสต์">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    เอาข้อมูลผู้อื่นมาโพสต์
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input reson" type="radio" name="reson" id="exampleRadios2" value="หาดพิงผู้อื่นให้ได้รับความเสียหาย">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    หาดพิงผู้อื่นให้ได้รับความเสียหาย
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input reson" type="radio" name="reson" id="exampleRadios2" value="โกหก หลอกลวง หลอกให้เสียทรัพย์">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    โกหก หลอกลวง หลอกให้เสียทรัพย์
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input reson" type="radio" name="reson" id="exampleRadios2" value="เกี่ยวข้องกับสิ่งผิดกฎหมาย">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    เกี่ยวข้องกับสิ่งผิดกฎหมาย
                                                </label>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='left-td'>เพิ่มเติม</td>
                                        <td  class='right-td'>
                                            <textarea type='text' id='more' class="form-control w-100"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="mocal-footer">
                    <div class="d-inline-block float-left">
                        Your IP: <?php echo $_SERVER['REMOTE_ADDR']; ?>
                    </div>
                    <div class="d-inline-block float-right">
                       <button class="btn-custom1 py-2 px-3 btn-save-rerpot" repotedid="<?php echo $rowmb['User_id']; ?>">
                           บันทึก
                       </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- modal -->
</div>
                </div>
<?php include 'footer.php';?>
</body>
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
<script src="assets/script/member.js"></script>
<script src="assets/script/checkonline.js"></script>
</html>