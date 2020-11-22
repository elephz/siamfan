$(document).ready(function () {
    console.log("type ="+typepara);
    console.log("data ="+data);
    console.log("loginstatus ="+login);
   
   
});
$("body").on("submit", ".fillter", function (e) {
    e.preventDefault();
  let text = $(".f-sl-text").val();
  let socail = $(".f-sl-socail").val();
  let gender = $(".f-sl-gender").val();
  let age_first = $(".f-sl-age_first").val();
  let age_last = $(".f-sl-age_last").val();
  let province = $(".f-sl-province").val();
  let target = $(".f-sl-target").val();
  let all = {text,socail,gender,age_first,age_last,province,target}
  $(".loopcontent").html('');
    search(all)
})
function search(fil = {}){
    let rows = "";
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
            let gender = {'1':'women','2':'men','3':'genall','4':'gay','5':'indy','6':'tom','7':'less'}
            $.each(arr, function (k, v) {
                (v == null) ? " " : v
                let classgender;
                $.each(gender, function(k1,v1){
                    if(k1 == v.u_Gender_id){
                        classgender =v1;
                    }
                })
                let image ;
              if(!login){
                  ((v.pvc_img == '1') ? image = "assets/uploads/"+v.pvc_img : image = "assets/image/avatar.png" )
              }

                rows +=
        "<div class='col-md-2 col-sm-6 p-0'>"+
           " <a href=''>"+
                "<div class='Usercard2'>"+
                    "<div class='content-user'>"+
                        "<img src='"+image+"' alt='' >"+
                        "<h5>"+v.Name+"</h5>"+
                        "<div class='gender-age my-1'>"+
                            "<span class='label gender "+classgender+"'>"+v.Gender_name+"</span>"+
                            "<span class='label'>"+v.age+"</span>"+
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
            $(".loopcontent").append(rows);


        }

    });   
}