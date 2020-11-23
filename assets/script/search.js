$(document).ready(function () {
    console.log("type ="+typepara);
    console.log("data ="+data);
    console.log("loginstatus ="+login);
    run();
});


function run(){
    let all = {}
    let outdata = {}
    let rows = " "
    let paginationtext = " ";
    let currentpage = 1;
    let order ;
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
  
   all = {text,socail,gender,age_first,age_last,province,target,currentpage}
//   let page = $("[active]").attr("page");
//   sessionStorage.site = all;
$(".loopcontent").html('');
paginationtext = " ";
     search(all);
});

$("body").on("change", "#order", function (e) {
        let val = $(this).val();
        order = val;
       
});


$("body").on("click", ".btn-pagenumber", function (e) {
    e.preventDefault();
    // console.log(sessionStorage.site);
    let page = $(this).attr("page");
    currentpage = page;
    $(".fillter").submit();
})
$("body").on("click", ".btn-control", function (e) {
    
    e.preventDefault();
    currentpage =  Number(currentpage);
  
    let val = $(this).attr("control");
    console.log(val);
    if(val == 'left'){currentpage --; console.log("left");};
    if(val == 'right'){ currentpage++ ;    console.log("right");};
    console.log(currentpage);
    if(currentpage <= 0){
        currentpage = 1;
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
                //setdata
                $('#found').html(total)
                writepagi(total); //pagination
               
               let gender = {'1':'women','2':'men','3':'genall','4':'gay','5':'indy','6':'tom','7':'less'}
            $.each(arr, function (k, v) {
                (v == null) ? " " : v
                let classgender;
                $.each(gender, function(k1,v1){
                    if(k1 == v.u_Gender_id){
                        classgender =v1;
                    }
                })
                let img;
                    ((v.img == null && v.pvc_img !='3') ? img = "assets/image/avatar.png" : img =  "assets/uploads/"+img )
              if(!login){
                  ((v.pvc_img == '1') ? img = "assets/uploads/"+v.pvc_img : img = "assets/image/avatar.png" )
              }
             
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
                       " <span class='float-right'>11 ชั่วโมงที่แล้ว</span>"+
                        "<div class='clearfix'></div>"+
                    "</div>"+
               " </div>"+
            "</a>"+
        "</div>";
            });
           
            }else{
                rows += 
                    "<div class='col text-center my-3'>" + 
                        "<h4>ไม่พบข้อมูล!</h4>"+
                    "</div>";
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
    for(let i=1 ; i <= page ; i++){
        paginationtext +=
        "<li page='"+i+"' class='page-item "+((i == currentpage) ? "active" : ""  )+" ' ><a page='"+i+"' class='page-link btn-pagenumber' href='#'>"+i+"</a></li>";
    }
   $(".previous").after(paginationtext);
 
 }
} 