<div class="row">
    <div class="col py-2">
        <h4 class='d-inline-block mb-2'><i class="fas fa-sign-in-alt"></i> การเข้าสู่ระบบ</h4>
    </div>
</div>
<div class="row p-2">
    <table class='seting-table mx-auto'>
        <tbody id="td-profile">
            <tr>
                <td class='left-td'>ชื่อผู้ใช้</td>
                <td  class='right-td'>
                    <span id="ed-name"></span>
                    <button class='btn-custom1 float-right' data-toggle="modal" data-target="#edit-uname">แก้ไข</button>
                </td>
            </tr>
            <tr>
                <td class='left-td'>รหัสผ่าน</td>
                <td  class='right-td'>
                    <input class='noline ' type='password' id='ed-password' readonly>
                    <button class='btn-custom1 float-right' data-toggle="modal" data-target="#edit-password">แก้ไข</button>
                </td>
            </tr>
        </tbody>
    </table>
<!-- modal -->
<div class="modal fade" id="edit-uname">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขรหัสผ่าน</h4>
            </div>
            <div class="modal-body">
                <form action="" class='w-75 mx-auto'>
                    <h4>ชื่อผู้ใช้</h4>
                    <input type="text" id='input-edit-name' class='form-control my-2' placeholder="ชื่อผู้ใช้งานอย่างน้อย 4 ตัวอักษร" minlength="4" >
                    <button class='btn-custom1 btn-edit-name float-right'>บันทึก</button>
                </form>
            </div>
            </div>
        </div>
    </div>
<!-- modal -->
</div>
<!-- modal -->
<div class="modal fade" id="edit-password">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขชื่อผู้ใช้</h4>
            </div>
            <div class="modal-body">
                <form action="" class='w-75 mx-auto'>
                    <div class="form-group text-left">
                        <label for="pwd">ปัจจุบัน:</label>
                        <input type="password" class="form-control" id='ed-password1' >
                    </div>
                    <div class="form-group text-left">
                        <label for="pwd">รหัสผ่านใหม่:</label>
                        <input type="password" class="form-control" id='ed-password2' minlength="5" >
                    </div>
                    <div class="form-group text-left">
                        <label for="pwd">ยืนยันรหัสผ่าน:</label>
                        <input type="password" class="form-control" id='ed-password3'  minlength="5" >
                    </div>
                    <button class='btn-custom1 btn-edit-password float-right' old=''>บันทึก</button>
                </form>
            </div>
            </div>
        </div>
    </div>
<!-- modal -->
