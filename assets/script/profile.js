

$("body").on("click", ".btn-edit-profile", function (e) {
    $(this).addClass('d-none').removeClass('d-inline-block');
    $(".input-pf").removeClass("noline").addClass('addling');
    $(".btn-back1").removeClass("d-none").addClass('d-inline-block');
    $(".btn-upload").removeClass("d-none").addClass('d-inline-block');
    $(".btn-save-profile").removeClass("d-none").addClass('d-inline-block');
    $(".input-pf").removeAttr("readonly")
    $(".custom-select").removeAttr("disabled")
});

$("body").on("click", ".btn-back1", function (e) {
    $(this).addClass('d-none').removeClass('d-inline-block');
    $(".input-pf").addClass("noline").removeClass('addling');
    $(".btn-edit-profile").addClass("d-inline-block").removeClass('d-none');
    $(".btn-save-profile").addClass("d-none").removeClass('d-inline-block');
    $(".btn-upload").removeClass("d-inline-block").addClass('d-none');
    $(".input-pf").attr("readonly", true)
    $(".custom-select").attr("disabled", true)
});
// });
$("body").on("change", "#cutsomFile", function (e) {
    readURL(this);
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.img-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
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
    let pvc_img = $("#sl-img").val();
    currentjs_id
    data = {
        currentjs_id,
        pvc_line,
        pvc_facebook,
        pvc_phone,
        pvc_email,
        pvc_img,
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

    if (vote) {
        runvoted()
    }
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
$("body").on("submit", ".save-img", function (e) {
    e.preventDefault();
    var fsize = $('#cutsomFile')[0].files[0].size; //get file size
    var ftype = $('#cutsomFile')[0].files[0].type; // get file type
    var fd = new FormData();
    fd.append('image', $('#cutsomFile')[0].files[0]);
    fd.append('action', "uploads-img");
    if (checkfiletypesize(ftype, fsize)) {
        $.ajax({
            url: 'api/api.php',
            type: 'post',
            data: fd,
            dataType: "html",
            contentType: false,
            processData: false,
            success: function (response) {
                let rp = $.parseJSON(response);
                if (rp.status == true) {
                    console.log("ok?");
                    console.log(rp);
                    swal("", "บันทึกสำเร็จ", "success");
                    $("#user_img").attr("src", "");
                    $("#user_img").attr("src", "assets/uploads/" + rp.respond);
                    setTimeout(function () {
                        $('#Upload').modal('hide');
                    }, 500);
                } else {

                }
            }
        })
    } else {
        return
    }




});
function runvoted(currentpage = '1') {
    var monthNamesThai = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    var dayNames = ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์"];
    let gender = { '1': 'women', '2': 'men', '3': 'genall', '4': 'gay', '5': 'indy', '6': 'tom', '7': 'less' }
  

    data = { currentjs_id, action: "voted-uer", currentpage }
    let rows = " "
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            console.log(result);
            let arr = result.respond.arr;
            let total = result.message;
            let arr1 = result.respond.arr2;
            if (Number(total) > 8) {
                writepagi(total);
            }
            if (!isEmpty(arr)) {
                $('#found').html(total)
                let i = 0;
                $.each(arr, function (k, v) {
                    let time;
                    if (v.daydiff == "0") {
                        let bftime = v.timediff;
                        time = bftime.substring(0, 2);
                        if (time == "00") {
                            time = bftime.substring(3, 4);
                            time = time + " นาทีที่แล้ว";
                        } else {
                            time = bftime.substring(0, 2);
                            time = time + " ชั่วโมงที่แล้ว";
                        }

                    } else if (Number(v.daydiff) <= 7) {
                        let less7day = v.lastonline_time;
                        let dayless7 = less7day.substring(0, 11);
                        let timeless7 = less7day.substring(11, 16);
                        var d = new Date(dayless7);
                        time = "วัน" + dayNames[d.getDay()] + " เวลา " + timeless7 + " น.";
                    } else if (Number(v.daydiff) > 7) {
                        var more7day = new Date(v.lastonline_time);
                        time = more7day.getDate() + " " + monthNamesThai[more7day.getMonth()] + " " + (more7day.getFullYear() + 543);
                    }
                    //time
                    //setgender
                    let classgender;
                    $.each(gender, function (k1, v1) {
                        if (k1 == v.u_Gender_id) {
                            classgender = v1;
                        }
                    })
                    rows +=

                        "<div class='col-md-3 col-sm-6 col-6 p-0 votecontend' >" +
                        " <a href='member?m=" + v.User_id + "'>" +
                        "<div class='Usercard2'>" +
                        "<div class='content-user'>" +
                        "<img src='" + img(v.pvc_img, v.img) + "' alt='' >" +
                        "<h5>" + v.Name + "</h5>" +
                        "<div class='gender-age my-1'>" +
                        "<span class='label gender " + classgender + "'>" + v.Gender_name + "</span>" +
                        "<span class='label f8coloe p-1 m-1'>" + v.age + "</span>" +
                        "</div>" +
                        "<div class='userdescription'>" + v.Description + " </div>" +
                        "<div class='province-target text-left my-1'>" +
                        "<i class='fas fa-street-view'></i> " + v.Province_name + " <br>" +
                        "<i class='fas fa-search'></i> " + v.Target_name +
                        "</div>" +
                        "</div>" +
                        "<div class='content-socail '>" +
                        "<ul class='list-inline'>" +
                        "<li class='list-inline-item " + ((v.facebook == null) ? "d-none" : " ") + " '><img src='assets/image/facebook.png' alt=''></li>" +
                        "<li class='list-inline-item " + ((v.line_id == null) ? "d-none" : " ") + " '><img src='assets/image/line.png' alt=''></li>" +
                        " <li class='list-inline-item " + ((v.phone == null) ? "d-none" : " ") + " '><img src='assets/image/phone-call.png' alt=''></li>" +
                        "<li class='list-inline-item " + ((v.e_mail == null) ? "d-none" : " ") + " '><img src='assets/image/email.png' alt=''></li>" +
                        "</ul>" +
                        "</div>" +
                        "<div class='content-viewcount p-1'>" +
                        " <span class='pull-left'><i class='fa fa-bullhorn'></i> " + arr1[i++] + "</span>" +
                        " <span class='float-right'>" + time + "</span>" +
                        "<div class='clearfix'></div>" +
                        "</div>" +
                        " </div>" +
                        "</a>" +
                        "</div>";


                });
            } else if (isEmpty(arr) && total > 0) {
                runvoted()
            }
            if (total == 0) {
                $('#found').html('0');
                rows +=
                    "<div class='col text-center my-3'>" +
                    "<h4>ไม่พบข้อมูล!</h4>" +
                    "</div>";
                $(".pagination-row").hide();
            }
            if (total < 9) {
                $(".pagination-row").hide();
            }
           
                $(".loopcontent").append(rows).fadeIn(500);
          

        }
    });
   
    function writepagi(total) {
        paginationtext = " ";
        $("[page]").empty();
        let page = total / 8;
        page = Math.ceil(page);
        totalpage = page;
        for (let i = 1; i <= page; i++) {
            paginationtext +=
                "<li page='" + i + "' class='page-item " + ((i == currentpage) ? "active" : "") + " ' ><a page='" + i + "' class='page-link btn-pagenumber' href='#'>" + i + "</a></li>";
        }
        $(".previous").after(paginationtext);

    }

}

$("body").on("click", ".btn-control", function (e) {
    e.preventDefault();
    //  Number(currentpage);
    let li = $(this).closest('li');
    let ul = li.closest('ul');
    let active = ul.find('li.active')
    currentpage = active.attr('page');


    let val = $(this).attr("control");
    console.log(val);
    if (val == 'left') { currentpage--; console.log("left"); };
    if (val == 'right') { currentpage++; console.log("right"); };
    console.log(currentpage);
    if (currentpage <= 0) {
        currentpage = 1;
        return
    }
    if (currentpage > totalpage) {
        currentpage = totalpage;
        return
    }
    $(".votecontend").remove();
    runvoted(currentpage)
})
$("body").on("click", ".btn-pagenumber", function (e) {
    e.preventDefault();
    let li = $(this).closest('li');
    li.addClass('active');
    // console.log(sessionStorage.site);
    let page = $(this).attr("page");
    currentpage = page;
    $(".votecontend").remove();
    runvoted(currentpage)
})




function isEmpty(obj) {
    for (var key in obj) {
        if (obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
function checkfiletypesize(ftype, fsize) {
    switch (ftype) {
        case 'image/png':
        case 'image/gif':
        case 'image/jpeg':
        case 'image/pjpeg':
            break;
        default:
            swal("", "ชนิดไฟล์ไม่ถูกต้อง", "error")
            return false
    }

    //Allowed file size is less than 1 MB (1048576)
    if (fsize > 1048576) {
        swal("", "ขนาดไฟล์ภาพต้องไม่เกิน 1 MB", "error")
        return false
    }
    return true
}
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0)
        return '0 Bytes';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
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
            let imgname;
            if (value.img == null) {
                imgname = "assets/image/avatar.png";
            } else {
                imgname = "assets/uploads/" + value.img;
            }
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
            $("#sl-img").val(value.pvc_img);
            $("#user_img").attr("src", imgname);
        }
    });
}