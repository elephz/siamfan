$(document).ready(function () {
    run();
    upviewcount();
});
function run(){

    
    $("body").on("click", ".report", function (e) {
        e.preventDefault();
        $('#report').modal('show');
    });
    $("body").on("click", ".bullhorn", function (e) {
        currentjs_id
       data = {currentjs_id,member_id,action:"vote-user"}
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
            else if(result.status == false && result.respond == "todayvoted"){
                swal("", "1 สมาชิก/1 โหวต/1 คน/วัน เท่านั้น!", "error");
                console.log("erroerr");
            }
        }
    });
    });
    $("body").on("click", ".btn-save-rerpot", function (e) {
        currentjs_id
       let reson = $('input[name="reson"]:checked').val();
       let more = $('#more').val();
       let reportedid = $(this).attr("repotedid");
       data = {currentjs_id,reson,more,reportedid,action:"report-user"}
       $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            if (result.status) {
                swal("บันทึกสำเร็จ", "", "success");
                setTimeout(function () {
                    $("#report").modal('hide');
                    $("#more").val('');
                }, 500);
            }
        }
    });
    });
}

function upviewcount(){
    data = {member_id,action:"upviewcount"}
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            if (result.status) {
               console.log("true");
            }
        }
    });
}