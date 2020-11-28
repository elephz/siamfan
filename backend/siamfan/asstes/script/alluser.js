$(document).ready(function () {
    run();
//   console.log(page);
  
});
function run() {
   
    var monthNamesThai = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    let rows = '';
    let limit = 10;
    let total1;
    let currentpage = 1;
    let keyword;
    let gender = 0;
    let ban = 0;
    if(page == 'block'){
        $(".switch2").attr('checked',true);
        $(".switch2").attr('check',"true");
        ban = 1;
        getdata();
      
    }else{
    getdata();
}
    function getdata() {
        rows = '';

        data = { limit,ban, gender,currentpage,keyword, action: "getalluser" }
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
                if(Number(result.message) < Number(result.respond.limit)){
                    $(".pagination-row").hide();
                }else{
                    
                    $(".pagination-row").show();
                }
             
                if (result.status) {
                    let i = 1;
                   
                    $.each(result.respond.data, function (k, v) {
                        let ban = ((v.baned_use == "1") ? "checked" : "");
                    let checkbox = 
                        `<label class='switch'>
                            <input type='checkbox' uid='${v.User_id}' stt='${v.baned_use}' class='switch1' id='${v.User_id}' ${ban}>
                            <span class='slider'></span>
                        </label>`;
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
                            <td>${v.Gender_name}</td>
                            <td>${v.age}</td>
                            <td>${date}</td>
                            <td>${checkbox}</td>
                        </tr>`;
                        i++;
                    });
                }else {
                    rows += `<tr>
                                <td colspan='6'>ไม่พบข้อมูล</td>
                            </tr>`;
                    $(".pagination-row").hide();
                }
                $("#example tbody").html(rows);
            }
        });
    }

   
    $("body").on("change", ".switch2", function (e) {
        let check = $(this).attr('check');
        keyword = '';
        gender = 0;
        $("#search").val('');
        $(".gender").val('0');
       if(check == 'false'){
          ban = 1;
          $(this).attr('check','true');
       } else if(check == 'true'){
            ban = 0;
            $(this).attr('check','false');
       }
        rows = '';
        currentpage = 1;
        limit = 10;
        getdata();
      })
    $("body").on("change", ".limit", function (e) {
        limit = $(this).val();
        rows = '';
        currentpage = 1;
        $("tr.row_td").fadeOut('500');
        getdata();
        writepagi(total1)
    });
    $("body").on("change", ".gender", function (e) {
        gender = $(this).val();
        rows = '';
        currentpage = 1;
        getdata();
       
    });
    $("body").on("keyup", "#search", function (e) {
        keyword  = $(this).val();
        gender = 0;
        getdata();
        currentpage = 1;
    });
    function writepagi(total) {
        paginationtext = " ";
        $("[page]").empty();
        let page = total / limit;
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

$("body").on("click", ".detail", function (e) {
  
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

     }
  });
})

$("body").on("click", ".switch1", function (e) {
    let stt = $(this).attr("stt");
    let id = $(this).attr("uid");
    data = {id,stt,action:"banuser"}
    $.ajax({
      type: "POST",
      url: "command/backendAPI.php",
      data: data,
      dataType: 'json',
      cache: false,
      success: function (result) {
            console.log(result);
       }
    });
  })
  
    
  

  