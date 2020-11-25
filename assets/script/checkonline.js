$(document).ready(function () {
    console.log("hey");
    updatestatus();

    setInterval(updatestatus, 180000); //180000

});

function updatestatus() {
    let rows = '';
     $(".online_user").fadeOut('slow');
    console.log("called");
    data = { currentjs_id, action: "updatestatus" }
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {

            if (!isEmpty(result.respond)) {
                console.log("notempty");
                $.each(result.respond, function (k, v) {
                    let classgender;
                    let gender = { '1': 'women', '2': 'men', '3': 'genall', '4': 'gay', '5': 'indy', '6': 'tom', '7': 'less' };
                    ((v.Description == null) ? " " : v.Description) ;
                    $.each(gender, function (k1, v1) {
                        if (k1 == v.u_Gender_id) {
                            classgender = v1;
                        }
                    })
                   
                    rows +=
                        `<div class='col-md-3 col-sm-12 online_user'>
                    <a href=''>
                        <div class='Carduser'>
                            <div class='grid-item-left text-center'>
                                <img src='${img(v.pvc_img, v.img)}' alt='' class='w-100'>
                            <p class='online'>
                                <img  src='https://www.siamfans.com/media/img/user_online.gif' alt=''><span>ออนไลน์</span>
                            </p>
                            </div>
                            <div class='grid-item-right'>
                                <h5>${v.Name}</h5>
                                <div class='userdescription'>
                                    ${v.Description}
                                </div>
                                <div class='gender-age my-1'>
                                    <span class='label gender ${classgender}'>${v.Gender_name}</span>
                                    <span class='label'>${v.age}</span>
                                </div>
                                <div class='province-target'>
                                    <i class='fas fa-street-view'></i> ${v.Province_name} <br>
                                    <i class='fas fa-search'></i> ${v.Target_name}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>`
                })
            }
           
            $(".loopcontent_onlinepeople").append(rows);
        }
    });
}

function isEmpty(obj) {
    for (var key in obj) {
        if (obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
function img(pvc, imgname) {
    let val;
    if (imgname == null) {
        val = 'assets/image/avatar.png';
    } else {
        if (pvc == '1') {
            val = 'assets/uploads/' + imgname;
        } else if (pvc == '2') {
            if (login) {
                val = 'assets/uploads/' + imgname;
            } else {
                val = 'assets/image/avatar.png';
            }
        } else if (pvc == '3') {
            val = 'assets/image/avatar.png';
        }
    }
    return val;
}