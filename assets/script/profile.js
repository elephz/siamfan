// $(document).ready(function () {
//     getdata();

//     function getgender(id) {
//         id = Number(id);
//         data = { action: "get-gender" }
//         let text = "";
//         $.post("api/api.php", data, function (res) {
//             console.log(res)
//             let ps = $.parseJSON(res);
//             let data = ps.respond;
//             let rows = "";
//             $.each(data, function (k, v) {
//                 rows += " <option value='" + v.Gender_id + "' " + ((id == Number(v.Gender_id)) ? "selected" : "") + ">" + v.Gender_name + "</option></option>"
//             });
//             text = "<select class='form-control' >" + rows + "</select>";
//             //$("#sp_genderid").html(text);
//         });
//     }
//     function getdata() {
//         data = { currentjs_id, action: "get-one-person" }
//         $.post("api/api.php", data, function (res) {
//             let ps = $.parseJSON(res);
//             let rows;
//             let mid;
//             let data = ps.respond;
//             let id = data.User_id;
//             id = Number(id);
//             if (id < 10) {
//                 mid = "M000" + id;
//             } else if (id < 100) {
//                 mid = "M00" + id;
//             } else if (id < 1000) {
//                 mid = "M0" + id;
//             }

//             rows +=
// "<tr>" +
//     "<td class='left-td'>รหัสสมาชิก</td>" +
//     "<td  class='right-td'> " + mid + "</input></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>รูปโปรไฟล์</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + data.img + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>ชื่อ</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + data.Name + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>เพศ</td>" +
//     "<td  class='right-td'> <span id='sp_genderid' gid='" + data.Gender_id + "'></span></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>อายุ</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + data.age + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>แนะนำตัว</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + ((data.Description == null) ? "" : data.Description) + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>จังหวัด</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + data.u_Province_id + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>กำลังมองหา</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + data.u_Target_id + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>เบอร์โทร</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + ((data.phone == null) ? "" : data.phone) + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>อีเมล์</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + ((data.e_mail == null) ? "" : data.e_mail) + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>ไอดีไลน์</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + ((data.line_id == null) ? "" : data.line_id) + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>เฟซบุ๊ค</td>" +
//     "<td  class='right-td'> <input class='input-pf noline' value='" + ((data.facebook == null) ? "" : data.facebook) + "' ></td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>ลิ๊งค์โปรไฟล์</td>" +
//     "<td  class='right-td'> " + data.img + "</td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>เข้าร่วมเมื่อ</td>" +
//     "<td  class='right-td'> " + data.created_date + "</td>" +
//     "</tr>" +
//     "<tr>" +
//     "<td class='left-td'>สถานะบัญชีผู้ใช้</td>" +
//     "<td  class='right-td'> " + data.img + "</td>" +
//     "</tr>";
//             $("#td-profile").html(rows);
//         }).then(() => {
//             let gid = $("#sp_genderid").attr("gid");
//             let aa = getgender(2);
//             $("#sp_genderid").html(aa);
//         });
//     }

$("body").on("click", ".btn-edit-profile", function (e) {
    $(this).addClass('d-none').removeClass('d-inline-block');
    $(".input-pf").removeClass("noline").addClass('addling');
    $(".btn-back").removeClass("d-none").addClass('d-inline-block');
    $(".btn-upload").removeClass("d-none").addClass('d-inline-block');
    $(".btn-save-profile").removeClass("d-none").addClass('d-inline-block');
    $(".input-pf").removeAttr("readonly")
    $(".custom-select").removeAttr("disabled")
});

$("body").on("click", ".btn-back", function (e) {
    $(this).addClass('d-none').removeClass('d-inline-block');
    $(".input-pf").addClass("noline").removeClass('addling');
    $(".btn-edit-profile").addClass("d-inline-block").removeClass('d-none');
    $(".btn-save-profile").addClass("d-none").removeClass('d-inline-block');
    $(".btn-upload").removeClass("d-inline-block").addClass('d-none');
    $(".input-pf").attr("readonly", true)
    $(".custom-select").attr("disabled", true)
});
// });
$("body").on("click", ".btn-edit-password", function (e) {
    e.preventDefault();
    let val1 = $("#ed-password1").val();
    let val2 = $("#ed-password2").val();
    let val3 = $("#ed-password3").val();
    let old = $(this).attr("old");
    if (val1 != old) {
        swal("", "รหัสผ่านปัจจุบันไม่ถูกต้อง", "error");
        val1.focus();
        return
    }
    if (val2 != val3) {
        swal("", "รหัสผ่านใหม่ไม่ถูกต้อง", "error");
        return
    }
    data = { currentjs_id, val2, action: "edit_password" }
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            console.log(result);
            if (result.status) {
                swal("บันทึกสำเร็จ", "", "success");
                setTimeout(function () {
                    $("#edit-password").modal('hide');
                    $('#edit-password').each(function () {
                        this.reset();
                    });
                }, 500);
            }
        }
    });
});
$("body").on("click", ".btn-edit-name", function (e) {
    e.preventDefault();
    let val = $("#input-edit-name").val();
    currentjs_id
    data = { currentjs_id, val, action: "edit_username" }
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            console.log(result);
            if (result.status) {
                swal("บันทึกสำเร็จ", "", "success");
                setTimeout(function () {
                    $("#edit-uname").modal('hide');
                }, 500);
            }
        }
    });
});

$("body").on("click", ".btn-back", function (e) {
    history.go(-1)
})
$("body").on("click", ".btn-pvc", function (e) {
    let pvc_email = $("#sl-email").val();
    let pvc_line = $("#sl-line").val();
    let pvc_facebook = $("#sl-facebook").val();
    let pvc_phone = $("#sl-phone").val();
    currentjs_id
    data = {
        currentjs_id,
        pvc_line,
        pvc_facebook,
        pvc_phone,
        pvc_email,
        action: "edit_pvc"
    }
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            console.log(result);
            if (result.status) {
                swal("บันทึกสำเร็จ", "", "success");
            }
        }
    });
});
$("body").on("click", ".btn-save-profile", function (e) {
    console.log("ddd");
    let id = $(this).attr("uid");
    let name = $("#name").val()
    let sp_genderid = $("#sp_genderid").val()
    let sp_provinceid = $("#sp_provinceid").val()
    let sp_targetid = $("#sp_targetid").val()
    let age = $("#age").val()
    let description = $("#description").val()
    let phone = $("#phone").val()
    let email = $("#email").val()
    let line = $("#line").val()
    let facebook = $("#facebook").val()
    let acc_status = $("#acc_status").val()
    // if (acc_status == '0') {
    //     swal({
    //         title: "ต้องการปิดบัญชีผู้ใช้ใช่หรือไม่?",
    //         text: "",
    //         type: "info",
    //         showCancelButton: true,
    //         closeOnConfirm: false,
    //         showLoaderOnConfirm: true
    //     },
    //         function (isConfirm) {
    //             if (isConfirm) {
    //                 swal("Deleted!", "Your imaginary file has been deleted.", "success");
    //               } else {
    //                 swal("Cancelled", "Your imaginary file is safe :)", "error");
    //               }
    //         }
    //     )
    // }
    data = {
        id, name, sp_genderid, sp_provinceid, sp_targetid, age, description, phone, email, line, facebook, acc_status, action: "edit-profile"
    }
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            console.log(result);
            if (result.status) {
                swal("บันทึกสำเร็จ", "", "success");
                $(".btn-back").click();
            }
        }
    });

});
$(document).ready(function () {
    Set_select();
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

});

var Set_select = function Set_select() {
    var data = { action: "get-gender" };
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            var rows;
            var rows2;
            var rows3;
            $.each(result.gender, function (k, v) {
                rows += " <option value=" + v.Gender_id + ">" + v.Gender_name + "</option>"
            });
            $.each(result.province, function (k, v) {
                rows2 += " <option value=" + v.Province_id + ">" + v.Province_name + "</option>"
            });
            $.each(result.target, function (k, v) {
                rows3 += " <option value=" + v.Target_id + ">" + v.Target_name + "</option>"
            });
            $("#sp_genderid").html(rows);
            $("#sp_provinceid").html(rows2);
            $("#sp_targetid").html(rows3);
            getdata()
        }
    });
}
$("body").on("submit", "#form-uploads-img", function (e) {
    e.preventDefault();
    console.log($('#status'));
    var fd = new FormData();
    fd.append('image', $('#file2')[0].files[0]);
    fd.append('action', "uploads-img");
    console.log(fd);
    $.ajax({
        url: 'api/api.php',
        type: 'post',
        data: fd,
        dataType: "html",
        contentType: false,
        processData: false,
        success: function (response) {
            if (response != 0) {
                $("#img").attr("src", response);
                $(".preview img").show(); // Display image element
            } else {
                alert('file not uploaded');
            }
        },
    })

});
function submitform() {

    $("body").on("submit", "#form-uploads-img", function (e) {
        e.preventDefault();
        var fd = new FormData();
        fd.append('image', $('#file')[0].files[0]);
        fd.append('action', "uploads-img");
        console.log(fd);
        $.ajax({
            url: 'api/api.php',
            type: 'post',
            data: fd,
            dataType: "html",
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    $("#img").attr("src", response);
                    $(".preview img").show(); // Display image element
                } else {
                    alert('file not uploaded');
                }
            },
        })
    });
}
var getdata = function getdata() {
    var monthNamesThai = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษจิกายน", "ธันวาคม"];
    var dayNames = ["อา.", "จ.", "อ.", "พ.", "พฤ", "ศ.", "ส."];
    var data = { currentjs_id, action: "get-one-person" };
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            var value = result.respond;
            var mid;
            if (value.User_id < 10) {
                mid = "M000" + value.User_id;
            } else if (value.User_id < 100) {
                mid = "M00" + value.User_id;
            } else if (value.User_id < 1000) {
                mid = "M0" + value.User_id;
            }
            var d = new Date(value.created_date);
            // Set Data\
            $('#img').attr('src', ((value.img == null) ? "assets/image/avatar.png" : value.img));
            $("#User_id").text(mid)
            $("#name").val(value.Name)
            $("#ed-name").html(value.Name)
            $("#ed-password").val(value.password)
            $("#sp_genderid").val(value.u_Gender_id)
            $("#sp_provinceid").val(value.u_Province_id)
            $("#sp_targetid").val(value.u_Target_id)
            $("#age").val(((value.age == 0) ? "" : value.age))
            $("#description").val(value.Description)
            $("#phone").val(((value.phone == null) ? "" : value.phone))
            $("#email").val(((value.e_mail == null) ? "" : value.e_mail))
            $("#line").val(((value.line_id == null) ? "" : value.line_id))
            $("#facebook").val(((value.facebook == null) ? "" : value.facebook))
            $("#created_date").html(d.getHours() + ":" + d.getMinutes() + " " + dayNames[d.getDay()] + "  " + d.getDate() + " " + monthNamesThai[d.getMonth()] + "  " + (d.getFullYear() + 543))
            $("#acc_status").val(value.acc_status)
            $(".btn-save-profile").attr("uid", value.User_id);
            $("#input-edit-name").val(value.User_name)
            $(".btn-edit-password").attr("old", value.password)
            $("#s-phone").html(((value.phone == null) ? "" : value.phone))
            $("#s-email").html(((value.e_mail == null) ? "" : value.e_mail))
            $("#s-line").html(((value.line_id == null) ? "" : value.line_id))
            $("#s-facebook").html(((value.facebook == null) ? "" : value.facebook))
            $("#sl-email").val(value.pvc_email);
            $("#sl-line").val(value.pvc_line);
            $("#sl-facebook").val(value.pvc_facebook);
            $("#sl-phone").val(value.pvc_phone);
        }
    });
}