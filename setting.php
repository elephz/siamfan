            <div class="row">
                <div class="col py-2">
                    <h4 class='d-inline-block mb-2'><i class="far fa-address-card"></i> บัญชีผู้ใช้</h4>
                </div>
            </div>
            <div class="row">
               <table class='w-75 mx-auto'>
                   <tbody id="td-profile">
                   <tr>
                        <td class='left-td'>รหัสสมาชิก</td>
                        <td  class='right-td'><span id="User_id"></span></td>
                    </tr>
                    <tr>
                        <td class='left-td'>รูปโปรไฟล์</td>
                        <td  class='right-td'>
                            <div class="cropimg">
                                <?php /* $image = base64_encode(file_get_contents('assets/uploads/1605888988.png')); */?>
                                <!-- <img src="data:image/png;base64,<?php/* echo$image; */?>"> -->
                                <img src="" alt="" id='img' width="100">
                                <div class="btn-upload d-none float-right">
                                <div id="status"></div>
                                    <input readonly type="file" name='image' id='file' class="img-upload-input-bs" editor="#img-upload-panel" target="#image" status="#status" passurl="api/api.php" pshape="circle" w=100 h=100 size="{150,150}"/>
                                    <img src="" alt="" id="image"/>
                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class='left-td'>ชื่อ</td>
                        <td  class='right-td'> <input readonly class='input-pf noline' id="name"></td>
                    </tr>
                    <tr>
                        <td class='left-td'>เพศ</td>
                        <td  class='right-td'><select disabled class="custom-select " id="sp_genderid"></select></td>
                    </tr>
                    <tr>
                        <td class='left-td'>อายุ</td>
                        <td  class='right-td'> <input readonly class='input-pf noline' id="age"></td>
                    </tr>
                    <tr>
                        <td class='left-td'>แนะนำตัว</td>
                        <td  class='right-td'> <input readonly class='input-pf noline' id="description"></td>
                    </tr>
                    <tr>
                        <td class='left-td'>จังหวัด</td>
                        <td  class='right-td'> <select disabled class="custom-select " id="sp_provinceid"></select></td>
                    </tr>
                    <tr>
                        <td class='left-td'>กำลังมองหา</td>
                        <td  class='right-td'> <select disabled class="custom-select " id="sp_targetid"></select></td>
                    </tr>
                    <tr>
                        <td class='left-td'>เบอร์โทร</td>
                        <td  class='right-td'> <input readonly class='input-pf noline' id="phone"></td>
                    </tr>
                    <tr>
                        <td class='left-td'>อีเมล์</td>
                        <td  class='right-td'> <input readonly class='input-pf noline' id="email"></td>
                    </tr>
                    <tr>
                        <td class='left-td'>ไอดีไลน์</td>
                        <td  class='right-td'> <input readonly class='input-pf noline' id="line"></td>
                    </tr>
                    <tr>
                        <td class='left-td'>เฟซบุ๊ค</td>
                        <td  class='right-td'> <input readonly class='input-pf noline' id="facebook"></td>
                    </tr>
                    <tr>
                        <td class='left-td'>ลิ๊งค์โปรไฟล์</td>
                        <td  class='right-td'><span id='link-profile'></span></td>
                    </tr>
                    <tr>
                        <td class='left-td'>เข้าร่วมเมื่อ</td>
                        <td  class='right-td'><span id='created_date'></span></td>
                    </tr>
                    <tr>
                        <td class='left-td'>สถานะบัญชีผู้ใช้</td>
                        <td  class='right-td'>
                        <select class="custom-select " id="acc_status">
                            <option value="0">ปิด</option>
                            <option value="1">สาธารณะ</option>
                            <option value="2">เฉพาะสมาชิก</option>
                            <option value="3">เฉพาะฉัน</option>
                        </select>
                        </td>
                    </tr>
                   </tbody>
               </table>
            </div>
            <div class="row  p-3">
                <div class="col">
                    <button class='btn-custom1 btn-back d-none'><i class="fas fa-cog"></i> ย้อนกลับ</button>
                    <button class='btn-custom1 float-right btn-edit-profile'><i class="fas fa-edit"></i> แก้ไขข้อมูลบัญชี</button>
                    <button class='btn-custom1 float-right btn-save-profile d-none' uid=''>บันทึก</button>
                </div>
            </div>

                <!-- modal -->
    <div class="modal fade" id="img-upload-panel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Profile Photo</h4>
                <button type="button" class="img-remove-btn-bs close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row container">
                <div class="col">
                    <div class="img-edit-container"></div>
                </div>
                </div>
                <div class="row container">
                    <div class="col">
                        <button type="button" class="btn btn-dark img-rotate-left"> <i class="fas fa-undo"></i> Rotate Left</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-dark img-clear-filter">Clear</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-dark img-rotate-right"><i class="fas fa-redo"></i> Rotate Right</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary img-remove-btn-bs">Close</button>
                <button type="button" class="btn btn-primary img-upload-btn-bs">Upload</button>
            </div>
            </div>
        </div>
    </div>
        <!-- modal test -->