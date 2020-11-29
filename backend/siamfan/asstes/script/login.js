$(document).ready(function () { 
    console.log('tag', '')

    $("body").on("submit", "#register-form", function (e) {
        e.preventDefault();
        let psw = $("#psw").val();
        let cfpsw = $("#cfpsw").val();
        let name = $("#name").val();
        let email = $("#Email").val();
        if (psw != cfpsw) {
            swal("รหัสผ่านไม่ตรงกัน", "", "error");
            $("#psw").val("");
            $("#cfpsw").val("");
            $("#psw").focus();
            return
        }
        let data = {name,email,psw,action:'register'};
        $.ajax({
            type: "POST",
            url: "command/backendAPI.php",
            data: data,
            dataType: 'json',
            cache: false,
            success: function (result) {
               if(result.status){
                swal("", "บันทึกสำเร็จ", "success");
                $('#register-form').each(function () {
                    this.reset();
                });
               }else{
                swal("", "บันทึกไม่สำเร็จ", "error");
               }
            }
        });
        // $.post("api/api.php", data, function (res) {
        //     let ps = $.parseJSON(res);
        //     if (ps.status) {
        //         $('#register-form').each(function () {
        //             this.reset();
        //         });
        //         $("#username").val(username);
        //         $("#password").val(psw);
        //         setTimeout(function () {
        //             $('#modal_register').modal('hide');
        //         }, 700);
        //     } else {
        //         swal("บันทึกไม่สำเร็จ", "", "error");
        //     }
        // });
    });


    $("body").on("click", ".btn-f-login", function (e) {
        e.preventDefault();
        let username = $("#login-email").val();
        let password = $("#login-password").val();
        if(username == ""){
            swal("","กรุณาใส่ข้อมูลให้ครบถ้วน","error");
            return
        }
        let action = 'login';
        data = { username, password, action }
        $.ajax({
            type: "POST",
            url: "command/backendAPI.php",
            data: data,
            dataType: 'json',
            cache: false,
            success: function (result) {
               if(result.status){
                swal("", "เข้าสู่ระบบสำเร็จ", "success");
                setTimeout(function () {
                    window.location.href = "index.php"
                }, 700);
               }else if(result.status == false && result.respond == 'wait'){
                swal("", "รอการอนุมัติ", "error");
                return;
               }
               else{
                swal("", "ไม่พบบัญชีผู้ใช้งาน", "error");
               }
            }
        });
       
    });
});