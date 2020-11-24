
<?php if ($login) {?>
    <?php 
    $sqlimg = mysqli_query($con,"SELECT img FROM tb_User WHERE User_id = '$current_id'");
		$row = mysqli_fetch_assoc($sqlimg); ?>
                <div class="card mx-auto cardshadow">
                    <div class="card-header card-underline">
                        <img src="<?php if($row['img'] == null) echo "assets/image/avatar.png"; else{echo "assets/uploads/".$row['img'] ;} ?>" width="80">
                        <span><?php echo $current_Name; ?> </span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <a class='left-a' href="profile?p=setting"> ข้อมูลบัญชี </a></li>
                        <li class="list-group-item"> <a class='left-a' href="profile?p=security"> การเข้าสู่ระบบ </a></li>
                        <li class="list-group-item"> <a class='left-a' href="profile?p=privacy"> ความเป็นส่วนตัว </a></li>
                        <li class="list-group-item"> <a class='left-a' href=""> เพื่อนที่โหวตให้เรา </a></li>
                        <li class="list-group-item"> <a class='left-a' href="search"> ค้นหาเพื่อน </a></li>
                        <li class="list-group-item "> <a class='left-a logout' href=""> ออกจากระบบ </a></li>
                    </ul>
                </div>
                <?php } else {?>

                    <div class="card mx-auto cardshadow">
                        <div class="card-header">
                            <span>โพสต์หาเพื่อน</span>
                            <button type='button' id='btn-login' class='btn-custom1 my-2'><i class="fas fa-user"></i> เข้าสู่ระบบ หรือ สมัครสมาชิก</button>
                        </div>
                    </div>

                    <div class="card mx-auto cardshadow mt-2 ">
                        <div class="card-header">
                            <span>ค้นหาเพื่อน</span>
                                <form class="form-inline mx-auto w-100">
                                    <input type="text" class="form-control w-100   mb-2  " id="inlineFormInputName2" placeholder="คำค้น">

                                    <select class="form-control   mb-2  w-100 " name="" id="">
                                        <option value="">เลือกเฉพาะ</option>
                                        <option value="">เพื่อนที่มีไลน์</option>
                                        <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                                        <option value="">เพื่อนที่มีเบอร์โทร</option>
                                    </select>
                                    <select class="form-control   mb-2  w-100 " name="" id="">
                                        <option value="">เพศ</option>
                                        <option value="">เพื่อนที่มีไลน์</option>
                                        <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                                        <option value="">เพื่อนที่มีเบอร์โทร</option>
                                    </select>
                                    <select class="form-control  mb-2  mr-auto " name="" id="">
                                        <option value="">อายุ</option>
                                        <?php for ($i = 18; $i <= 80; $i++) {?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php }?>
                                    </select>
                                    <label for="" class='mx-auto'>ถึง</label>
                                    <select class="form-control ml-1  mb-2  ml-auto " name="" id="">
                                        <option value="">อายุ</option>
                                        <?php for ($i = 18; $i <= 80; $i++) {?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php }?>
                                    </select>
                                    <select class="form-control  mb-2  w-100" name="" id="">
                                        <option value="">จังหวัด</option>
                                        <option value="">เพื่อนที่มีไลน์</option>
                                        <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                                        <option value="">เพื่อนที่มีเบอร์โทร</option>
                                    </select>
                                    <select class="form-control  mb-2  w-100" name="" id="">
                                        <option value="">คนที่ต้องการ</option>
                                        <option value="">เพื่อนที่มีไลน์</option>
                                        <option value="">เพื่อนที่มีเฟซบุ๊ก</option>
                                        <option value="">เพื่อนที่มีเบอร์โทร</option>
                                    </select>
                                    <button type="submit" class="btn-custom1 btn-block mb-2">ค้นหา</button>
                                </form>
                        </div>
                    </div>

                <?php }?>
                <div class="card mx-auto mt-3 cardshadow d-sm-none d-md-block">
                    <div class="card-header">
                        <span>เพื่อนที่โพสต์ </span>
                    </div>
                    <ul class="list-group list-group-flush">
                    <?php while ($row2 = mysqli_fetch_assoc($select_gender2)) {?>
                        <li class="list-group-item"> <a class='left-a' href=""> <?php if ($row2['u_Gender_id'] != 0) {echo "เพื่อน" . $row2['Gender_name'] . '(' . $row2['count'] . ')';} else {echo "";}?> </a></li>
                    <?php }?>
                    </ul>
                </div>