
<?php if ($login) {?>
    <?php
$sqlimg = mysqli_query($con, "SELECT img FROM tb_User WHERE User_id = '$current_id'");
	$row = mysqli_fetch_assoc($sqlimg);

    ?>
    

    
                <div class="card mx-auto cardshadow">
                    <div class="card-header card-underline">
                        <img src="<?php if ($row['img'] == null) {
                                echo "assets/image/avatar.png";
                            } else {echo "assets/uploads/" . $row['img'];}?>" width="80">
                        <span><?php echo $current_Name; ?> </span>
                            <h1 class='d-inline-block float-right btn_burger2' >
                                <a class='btn_burger2'  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
                                    <i class="fas fa-bars"></i>
                                </a>
                            </h1>
                            <!-- <div class="clearfix"> -->

                            <!-- </div> -->
                    </div>
                    <div class="ul-burger2" id="collapseExample">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a class='left-a' href="profile?p=setting"> ข้อมูลบัญชี </a></li>
                            <li class="list-group-item"> <a class='left-a' href="profile?p=security"> การเข้าสู่ระบบ </a></li>
                            <li class="list-group-item"> <a class='left-a' href="profile?p=privacy"> ความเป็นส่วนตัว </a></li>
                            <li class="list-group-item"> <a class='left-a' href="profile?p=voted"> เพื่อนที่โหวตให้เรา </a></li>
                            <li class="list-group-item"> <a class='left-a' href="search?t=search"> ค้นหาเพื่อน </a></li>
                            <li class="list-group-item "> <a class='left-a logout' href=""> ออกจากระบบ </a></li>
                        </ul>
                    </div>
                </div>
                <?php } else {?>
<?php
$sql_leftgender = mysqli_query($con, "SELECT * FROM tb_gender ");
	$sql_leftprovince = mysqli_query($con, "SELECT * FROM tb_province ");
	$sql_lefttarget = mysqli_query($con, "SELECT * FROM tb_target ");
	?>
                    <div class="card mx-auto cardshadow">
                        <div class="card-header">
                            <span>โพสต์หาเพื่อน</span>
                            <button type='button' id='btn-login' class='btn-custom1 my-2'><i class="fas fa-user"></i> เข้าสู่ระบบ หรือ สมัครสมาชิก</button>
                        </div>
                    </div>

                    <div class="card mx-auto cardshadow mt-2 ">
                        <div class="card-header">
                            <span>ค้นหาเพื่อน</span>
                                <form class="form-inline mx-auto w-100" action='search' method='post'>
                                    <input type="hidden" name='form' value='form'>
                                    <input type="text" class="form-control w-100   mb-2  " name='text' id="inlineFormInputName2" placeholder="คำค้น">
                                    <select class="form-control   mb-2  w-100 " name="social" >
                                        <option value="">เลือกเฉพาะ</option>
                                        <option value="line">เพื่อนที่มีไลน์</option>
                                        <option value="facebook">เพื่อนที่มีเฟซบุ๊ก</option>
                                        <option value="phone">เพื่อนที่มีเบอร์โทร</option>
                                    </select>
                                    <select class="form-control   mb-2  w-100 " name="gender" >
                                        <option value="">เพศ</option>
                                        <?php while ($row_left_gender = mysqli_fetch_assoc($sql_leftgender)) {?>
                                        <option value="<?php echo $row_left_gender['Gender_id']; ?>"><?php echo $row_left_gender['Gender_name']; ?></option>
                                        <?php }?>

                                    </select>
                                    <select class="form-control  mb-2  mr-auto " name="age-f" >
                                        <option value="">อายุ</option>
                                        <?php for ($i = 18; $i <= 80; $i++) {?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php }?>
                                    </select>
                                    <label for="" class='mx-auto'>ถึง</label>
                                    <select class="form-control ml-1  mb-2  ml-auto " name="age-l" >
                                        <option value="">อายุ</option>
                                        <?php for ($i = 18; $i <= 80; $i++) {?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php }?>
                                    </select>
                                    <select class="form-control  mb-2  w-100" name="province" >
                                        <option value="">จังหวัด</option>
                                        <?php while ($row_left_province = mysqli_fetch_assoc($sql_leftprovince)) {?>
                                        <option value="<?php echo $row_left_province['Province_id']; ?>"><?php echo $row_left_province['Province_name']; ?></option>
                                        <?php }?>
                                    </select>
                                    <select class="form-control  mb-2  w-100" name="target" id="">
                                        <option value="">คนที่ต้องการ</option>
                                        <?php while ($row_left_target = mysqli_fetch_assoc($sql_lefttarget)) {?>
                                        <option value="<?php echo $row_left_target['Target_id']; ?>"><?php echo $row_left_target['Target_name']; ?></option>
                                        <?php }?>
                                    </select>
                                    <button type="submit" class="btn-custom1 btn-block mb-2">ค้นหา</button>
                                </form>
                        </div>
                    </div>

                <?php }?>
                <div class="card mx-auto mt-3 cardshadow d-none  d-sm-none d-md-block">
                    <div class="card-header">
                        <span>เพื่อนที่โพสต์ </span>
                    </div>
                    <ul class="list-group list-group-flush">
                    <?php
                        $arr_left_gender = array('women', 'men', 'genall', 'gay', 'indy', 'tom', 'less');
                        $i = 0;
                        while ($row2 = mysqli_fetch_assoc($select_gender2)) {?>
                            <li class="list-group-item"> <a class='left-a' href="search?g=<?php echo $arr_left_gender[$i]; ?>"> <?php if ($row2['u_Gender_id'] != 0) {echo "เพื่อน" . $row2['Gender_name'] . '(' . $row2['count'] . ')';} else {echo "";}?> </a></li>
                        <?php
                            $i++;
                        }
                        ?>
                    </ul>
                </div>

