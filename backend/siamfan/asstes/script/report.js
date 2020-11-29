$(document).ready(function () {
    run();
});
function run() {
    var monthNamesThai = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    let rows = '';
    let total1;
    let currentpage = 1;
 
    getdata();
    function getdata() {
        rows = '';

        data = {  currentpage, action: "getreport" }
        $.ajax({
            type: "POST",
            url: "command/backendAPI.php",
            data: data,
            dataType: 'json',
            cache: false,
            success: function (result) {
                console.log(result);
                total1 = result.respond.numrow;
                Number(result.message) * Number(currentpage)
                // $("#start").html(Number(result.respond.start) - Number(result.message));
                // $("#end").html(result.respond.start);
               $("#total").html(total1);
                    writepagi(total1);
                // if(result.message < limit){
                //     $(".pagination-row").hide();
                // }else{
                //     $(".pagination-row").show();
                // }
             
                if (result.status) {
                    let i = 1;
                    $.each(result.respond.data, function (k, v) {
                        var d = new Date(v.created_date);
                        let date = d.getDate() + " " + monthNamesThai[d.getMonth()] + " " + (d.getFullYear() + 543);
                        var mid;
                        if (v.User_id < 10) {
                            mid = "M000" + v.User_id;
                        } else if (v.User_id < 100) {
                            mid = "M00" + v.User_id;
                        } else if (v.User_id < 1000) {
                            mid = "M0" + v.User_id;
                        }
                        rows += `<tr class='row_td'>
                            <td>${mid}</td>
                            <td>${v.Name}</td>
                            <td>${date}</td>
                            <td>${v.count}</td>
                            <td>
                                <button type='button' uid='${v.User_id}'  class='btn btn-info detail'><i class="fas fa-info-circle"></i></button>
                                <button type='button' uid='${v.User_id}'  class='btn btn-danger delete'><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>`;
                        i++;
                    });
                }else {
                    rows += `<tr>
                                <td colspan='5'>ไม่พบข้อมูล</td>
                            </tr>`;
                    $(".pagination-row").hide();
                }
                $("#example tbody").html(rows);
            }
        });
    }
   
    
    
    function writepagi(total) {
        paginationtext = " ";
        $("[page]").empty();
        let page = total / 10;
        page = Math.ceil(page);
        totalpage = page;
        for (let i = 1; i <= page; i++) {
            paginationtext +=
                "<li page='" + i + "' class='page-item " + ((i == currentpage) ? "active" : "") + " "+((Number(currentpage)+3 < i || Number(currentpage)-3 > i) ? "d-none":"")+" ' ><a page='" + i + "' can='" + ((Number(currentpage)+2 < i || Number(currentpage)-2 > i) ? "flase" : "true" ) + "' class='page-link btn-pagenumber' href='#'>" + ((Number(currentpage)+2 < i || Number(currentpage)-2 > i) ? "...": i ) + "</a></li>";
                // if(Number(currentpage)+2 < i){
                //    $("[page='"+i+"']").addClass("hi");
                //    console.log($("[page='"+i+"']"));
                // }
            }
        $(".previous").after(paginationtext);

        
    }

    $("body").on("click", ".btn-pagenumber", function (e) {
        e.preventDefault();
        let can = $(this).attr('can');
        console.log(can);
        if(can == 'flase'){
            return
        }
        let li = $(this).closest('li');
        li.addClass('active');
        // console.log(sessionStorage.site);
        let page = $(this).attr("page");
        currentpage = page;
        rows = '';
        $(".row_td").fadeOut('500');
        getdata();
    })

    $("body").on("click", ".btn-control", function (e) {
        e.preventDefault();
        currentpage = Number(currentpage);
        let val = $(this).attr("control");
        if (val == 'left') { currentpage--; };
        if (val == 'right') { currentpage++; };
        console.log(currentpage);
        if (currentpage <= 0) {
            currentpage = 1;
            return
        }
        if (currentpage > totalpage) {
            currentpage = totalpage;
            return
        }
        getdata();
    })
}
let rows = '';
$("body").on("click", ".detail", function (e) {
    var monthNamesThai = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    rows = '';
    // $('.content-report').fadeOut(1000);
    $('.content-report').empty();
  $('#report').modal('show');
  let id = $(this).attr("uid");
  data = {id,action:"getreport-detail"}
  $.ajax({
    type: "POST",
    url: "command/backendAPI.php",
    data: data,
    dataType: 'json',
    cache: false,
    success: function (result) {
            let data = result.respond;
            $.each(data, function (k, v) { 
                var d = new Date(v.date);
                let date = d.getDate() + " " + monthNamesThai[d.getMonth()] + " " + (d.getFullYear() + 543);
                rows+=
            ` <div class="col-12 content-report">
                <div class="card w-100" >
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        สาเหตุ : ${v.report_description} 
                        <a class='float-right' data-toggle="collapse" href="#collapseExample${v.report_id}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-bars"></i>
                        </a> 
                     <div class='clear-fix'></div>
                    <li class="collapse" id="collapseExample${v.report_id}"> <span class='m-3'>${v.reason}</span></li>
                    </li>
                    <li class="list-group-item">วันที่ : ${date}</li>
                    <li class="list-group-item">ผู้รายงาน : ${v.Name}</li>
                  </ul>
                </div>
              </div>`;
            });
            $('.row-modal-body').append(rows).fadeIn(1000);
     }
  });
})
$("body").on("click", ".delete", function (e) {
    let id = $(this).attr("uid");
    data = {id,action:"delete-report"}
    let tr = $(this).closest('tr');
    $.ajax({
        type: "POST",
        url: "command/backendAPI.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) { 
        if(result.status){
            tr.fadeOut(1000);
            }else{
           console.log("error");
            }
        }
     });
 });
// $('#example tbody').on( 'click', 'button', function () {
//     let table = $("#example");
//     var data = table.row( $(this).parents('tr') ).data();
//     let id = data[0];
//     let name = data[1];
//     swal({
//             title: "",
//             text: "ต้องการระงับการใช้งานคุณ"+name+"ใช่หรือไม่",
//             type: "info",
//             showCancelButton: true,
//             closeOnConfirm: false,
//             showLoaderOnConfirm: true
//         },
//             function () {
//                 setTimeout(function () {
//                 data={id,action:"baned_user"}
//                 $.ajax({
//                 type: "POST",
//                 url: "command/backendAPI.php",
//                 data: data,
//                 dataType: 'json',
//                 cache: false,
//                 success: function (result) {
//                 console.log(result);
//                 if (result.status) {
//                     swal("บันทึกสำเร็จ", "", "success");
//                 }
//             }
//         }, 500);
//         });
//             }
//         );
//     } );