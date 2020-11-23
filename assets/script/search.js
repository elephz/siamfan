$(document).ready(function () {
    console.log("type ="+typepara);
    console.log("data ="+data);
    console.log("loginstatus ="+login);
    run();
});


function run(){
    var monthNamesThai = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    var dayNames = ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์"];
    let all = {}
    let outdata = {}
    let rows = " "
    let paginationtext = " ";
    let currentpage = 1;
    let order ;
    let totalpage ;
    search();

$("body").on("submit", ".fillter", function (e) {
    e.preventDefault();
  let text = $(".f-sl-text").val();
  let socail = $(".f-sl-socail").val();
  let gender = $(".f-sl-gender").val();
  let age_first = $(".f-sl-age_first").val();
  let age_last = $(".f-sl-age_last").val();
  let province = $(".f-sl-province").val();
  let target = $(".f-sl-target").val();
   all = {order,text,socail,gender,age_first,age_last,province,target,currentpage}
//   let page = $("[active]").attr("page");
//   sessionStorage.site = all;
$(".loopcontent").html('');
paginationtext = " ";
     search(all);
});

$("body").on("change", "#order", function (e) {
        let val = $(this).val();
        order = val;
        currentpage = 1;
        $(".fillter").submit();
});


$("body").on("click", ".btn-pagenumber", function (e) {
    e.preventDefault();
    let li = $(this).closest('li');
    li.addClass('active');
    // console.log(sessionStorage.site);
    let page = $(this).attr("page");
    currentpage = page;
    $(".fillter").submit();
})
$("body").on("click", ".btn-control", function (e) {
    
    e.preventDefault();
    currentpage =  Number(currentpage);
  console.log(totalpage);
    let val = $(this).attr("control");
    console.log(val);
    if(val == 'left'){currentpage --; console.log("left");};
    if(val == 'right'){ currentpage++ ;    console.log("right");};
    console.log(currentpage);
    if(currentpage <= 0){
        currentpage = 1;
        return
    }
    if(currentpage > totalpage){
        currentpage = totalpage;
        return
    }
    $(".fillter").submit();
})
function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
  }
   function search(fil = {}){
     rows = "";
     paginationtext = "" ;
     $(".pagination-row").show();
    console.log("call seracth");
     data = { fil, action: "select-all-user" }
     $.ajax({
         type: "POST",
         url: "api/api.php",
         data: data,
         dataType: 'json',
         cache: false,
         success: function (result) {
             console.log(result);
            
             let arr = result.respond.data;
             let total = result.respond.amount;
          
             if(!isEmpty(arr)){
              
                $('#found').html(total)
                writepagi(total); //pagination
               
                // if(v.diff > )
               let gender = {'1':'women','2':'men','3':'genall','4':'gay','5':'indy','6':'tom','7':'less'}
            $.each(arr, function (k, v) {
                (v == null) ? " " : v
                  //time
                let time;
                if(v.daydiff == "0"){
                    let bftime = v.timediff;
                    time = bftime.substring(0,2);
                    if(time == "00"){
                        time = bftime.substring(3,4);
                        time = time+" นาทีที่แล้ว";
                    }else{
                        time = bftime.substring(1,2);
                        time = time+" ชั่วโมงที่แล้ว";
                    }
                 
               }else if(Number(v.daydiff) <= 7){
                    let less7day = v.lastonline_time;
                    let dayless7 = less7day.substring(0,11);
                    let timeless7 = less7day.substring(11,16);
                    var d = new Date(dayless7);
                    time = "วัน"+dayNames[d.getDay()]+" เวลา "+timeless7+" น.";
               }else if(Number(v.daydiff) > 7){
                    var more7day = new Date( v.lastonline_time);
                    time = more7day.getDate() + " " + monthNamesThai[more7day.getMonth()] + " " + (more7day.getFullYear() + 543);
               }
                   //time
               //setgender
               let classgender;
                $.each(gender, function(k1,v1){
                    if(k1 == v.u_Gender_id){
                        classgender =v1;
                    }
                })
                   //setgender
                   //setimage
                let img;
                    ((v.img == null && v.pvc_img !='3') ? img = "assets/image/avatar.png" : img =  "assets/uploads/"+img )
              if(!login){
                  ((v.pvc_img == '1') ? img = "assets/uploads/"+v.pvc_img : img = "assets/image/avatar.png" )
              }
               //setimage
             
                rows +=
        "<div class='col-md-2 col-sm-6 p-0'>"+
           " <a href=''>"+
                "<div class='Usercard2'>"+
                    "<div class='content-user'>"+
                        "<img src='"+img+"' alt='' >"+
                        "<h5>"+v.User_id+" "+v.Name+"</h5>"+
                        "<div class='gender-age my-1'>"+
                            "<span class='label gender "+classgender+"'>"+v.Gender_name+"</span>"+
                            "<span class='label f8coloe p-1 m-1'>"+v.age+"</span>"+
                        "</div>"+
                        "<div class='userdescription'>"+v.Description+" </div>"+
                        "<div class='province-target text-left my-1'>"+
                            "<i class='fas fa-street-view'></i> "+v.Province_name+" <br>"+
                            "<i class='fas fa-search'></i> "+v.Target_name+
                        "</div>"+
                    "</div>"+
                    "<div class='content-socail '>"+
                        "<ul class='list-inline'>"+
                            "<li class='list-inline-item "+((v.facebook == null) ? "d-none" : " ")+" '><img src='assets/image/facebook.png' alt=''></li>"+
                            "<li class='list-inline-item "+((v.line_id == null) ? "d-none" : " ")+" '><img src='assets/image/line.png' alt=''></li>"+
                           " <li class='list-inline-item "+((v.phone == null) ? "d-none" : " ")+" '><img src='assets/image/phone-call.png' alt=''></li>"+
                            "<li class='list-inline-item "+((v.e_mail == null) ? "d-none" : " ")+" '><img src='assets/image/email.png' alt=''></li>"+
                        "</ul>"+
                    "</div>"+
                    "<div class='content-viewcount p-1'>"+
                       " <span class='pull-left'><i class='fa fa-bullhorn'></i> 1</span>"+
                       " <span class='float-right'>"+time+"</span>"+
                        "<div class='clearfix'></div>"+
                    "</div>"+
               " </div>"+
            "</a>"+
        "</div>";
            });
            }else if(isEmpty(arr) && total >=1){
                currentpage = 1;
                $(".fillter").submit();
            }
          if(total == 0){
            $('#found').html('0');
                    rows += 
                    "<div class='col text-center my-3'>" + 
                        "<h4>ไม่พบข้อมูล!</h4>"+
                    "</div>";
                    $(".pagination-row").hide();
          }
            $(".loopcontent").append(rows);
         }
     });   
     outdata = data;
 }
  function  writepagi(total){
    paginationtext = " ";
    $("[page]").empty();
    let page = total / 30 ;
    page = Math.ceil(page);
    totalpage =page;
    for(let i=1 ; i <= page ; i++){
        paginationtext +=
        "<li page='"+i+"' class='page-item "+((i == currentpage) ? "active" : ""  )+" ' ><a page='"+i+"' class='page-link btn-pagenumber' href='#'>"+i+"</a></li>";
    }
   $(".previous").after(paginationtext);
 
 }
} 