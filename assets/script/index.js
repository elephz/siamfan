$(document).ready(function () {
    $("body").on("click", "#btn-login", function (e) {
        window.location.assign('login');
    });

    $("body").on("submit", "#register-form", function (e) {
        e.preventDefault();
        let psw = $("#psw").val();
        let cfpsw = $("#cfpsw").val();
        let username = $("#regis-us").val();
        if (psw != cfpsw) {
            swal("รหัสผ่านไม่ตรงกัน", "", "error");
            $("#psw").val("");
            $("#cfpsw").val("");
            $("#psw").focus();
            return
        }
        let data = $(this).serialize();
        $.post("api/api.php", data, function (res) {
            let ps = $.parseJSON(res);
            if (ps.status) {
                $('#register-form').each(function () {
                    this.reset();
                });
                $("#username").val(username);
                $("#password").val(psw);
                setTimeout(function () {
                    $('#modal_register').modal('hide');
                }, 700);
            } else {
                swal("บันทึกไม่สำเร็จ", "", "error");
            }
        });
    });

    $("body").on("click", ".btn-f-login", function (e) {
        e.preventDefault();
        let username = $("#username").val();
        let password = $("#password").val();
        let action = 'login';
        data = { username, password, action }
        $.post("api/api.php", data, function (res) {
            let ps = $.parseJSON(res);
            if (ps.status) {
                swal("เข้าสู่ระบบสำเร็จ", "", "success");
                setTimeout(function () {
                    window.location.href = "index.php"
                }, 700);
            } else {
                swal("ไม่พบบัญชีผู้ใช้งาน", "", "error");
            }
        });
    });
    $("body").on("click", ".logout", function (e) {
        e.preventDefault();
        console.log("ddd");
        swal({
            title: "ต้องการออกจากระบบ?",
            text: "",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
            function () {
                setTimeout(function () {
                    window.location.href = 'logout.php';
                }, 500);
            }
        );
    });
});