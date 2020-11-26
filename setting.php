            <div class="row">
                <div class="col py-2">
                    <h4 class='d-inline-block mb-2'><i class="far fa-address-card"></i> บัญชีผู้ใช้</h4>
                </div>
            </div>
            <div class="row p-2 ">
               <table class='mx-auto seting-table'>
                   <tbody id="td-profile">
                   <tr>
                        <td class='left-td'>รหัสสมาชิก</td>
                        <td  class='right-td'><span id="User_id"></span></td>
                    </tr>
                    <tr>
                        <td class='left-td'>รูปโปรไฟล์</td>
                        <td  class='right-td'>
                            <div class="cropimg">
                                <img  id='user_img' alt="" class='w-100'>
                            </div>
                            <button class="btn-custom1 float-right  btn-upload d-none" data-toggle="modal" data-target="#Upload" >อัปเดต</button>
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
                    <button class='btn-custom1 btn-back1 d-none'><i class="fas fa-cog"></i> ย้อนกลับ</button>
                    <button class='btn-custom1 float-right btn-edit-profile'><i class="fas fa-edit"></i> แก้ไขข้อมูลบัญชี</button>
                    <button class='btn-custom1 float-right btn-save-profile d-none' uid=''>บันทึก</button>
                </div>
            </div>

                <!-- modal -->
    <div class="modal fade" id="Upload">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Profile Photo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col text-center p-5">
                            <img src='assets/image/avatar.png' alt="" class='img-preview my-3 border' width="200px">
                            <form action="" class='save-img' enctype="multipart/form-data">
                                <input type="file" name='fileupload' id='cutsomFile'></div>
                                <button type='submit' class="btn-custom1  float-right py-2 px-3">บันทึก</button>
                            </form>
                        </div>
                        <div class="col">
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- modal -->