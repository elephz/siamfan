$(document).ready(function () {
    console.log("type =" + typepara);
    console.log("data =" + data);
    console.log("loginstatus =" + login);
    run(typepara, data);


});


function run(typepara, data) {
    var monthNamesThai = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    var dayNames = ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์"];
    let all = {}
    let rows = " "
    let paginationtext = " ";
    let currentpage = 1;
    let order;
    let totalpage;

    if (typepara == 't' && data == 'search') {
        search();
    }
    else if (typepara == 'g') {
        let gender = {
            '1': 'women', '2': 'men', '3': 'genall',
            '4': 'gay', '5': 'indy', '6': 'tom', '7': 'less'
        }
        let genderid;
        $.each(gender, function (k, v) {
            if (data == v) {
                genderid = k;
            }
        });
        let element = $(".f-sl-gender");
            setdata(genderid, element)
    } else if (typepara == 'target') {
        let element = $(".f-sl-target");
        setdata(data, element)
    } else if (typepara == 'province') {
        let element = $(".f-sl-province");
        setdata(data, element)
    } else if (typepara == 'age') {
        let element1 = $(".f-sl-age_first");
        let element2 = $(".f-sl-age_last");
        let element3 = $(".f-sl-gender");
        setdataage(agearr[0], agearr[1], data, element1, element2, element3)
    } else if (typepara == 'social') {
        let element = $(".f-sl-socail");
        console.log("infunction" + data);
        setdata(data, element)
    }

    if (!isEmpty(obj)) {
        console.log(obj);
        var doSome = new Promise(function (resolve, reject) {
            $.each(obj, function (k, v) {
                if (k == "age-f") {
                    $(".f-sl-age_first").val(v);
                    all.age_first = v;
                }
                if (k == "age-l") {
                    $(".f-sl-age_last").val(v);
                    all.age_last = v;
                }
                if (k == "gender") {
                    $(".f-sl-gender").val(v);
                    all.gender = v;
                }
                if (k == "target") {
                    $(".f-sl-target").val(v);
                    all.target = v;
                }
                if (k == "text") {
                    $(".f-sl-text").val(v);
                    all.text = v;
                }
                if (k == "province") {
                    $(".f-sl-province").val(v);
                    all.province = v;
                }
                if (k == "social") {
                    $(".f-sl-socail").val(v);
                    all.socail = v;
                }
            })
            resolve(true);
        });
        doSome.then(function (value) {
            $('.fillter').submit();
        });
    }
    function setdata(val, element) {
        var setdata = new Promise(function (resolve, reject) {
            element.val(val);
            resolve(true);
        });
        setdata.then(function (value) {
            $('.fillter').submit();
        });
    }
    function setdataage(val1, val2, genderid, element1, element2, elegender) {
        var setdata = new Promise(function (resolve, reject) {
            element1.val(val1);
            element2.val(val2);
            elegender.val(genderid);
            resolve(true);
        });
        setdata.then(function (value) {
            $('.fillter').submit();
        });
    }
    $("body").on("submit", ".fillter", function (e) {
        e.preventDefault();
        let text = $(".f-sl-text").val();
        let socail = $(".f-sl-socail").val();
        let gender = $(".f-sl-gender").val();
        let age_first = $(".f-sl-age_first").val();
        let age_last = $(".f-sl-age_last").val();
        let province = $(".f-sl-province").val();
        let target = $(".f-sl-target").val();
        all = { order, text, socail, gender, age_first, age_last, province, target, currentpage }
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
        currentpage = Number(currentpage);
        let val = $(this).attr("control");
        if (val == 'left') { currentpage--;  };
        if (val == 'right') { currentpage++;  };
        console.log(currentpage);
        if (currentpage <= 0) {
            currentpage = 1;
            return
        }
        if (currentpage > totalpage) {
            currentpage = totalpage;
            return
        }
        $(".fillter").submit();
    })

    function search(fil = {}) {
        rows = "";
        paginationtext = "";
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
                let arr2 = result.respond.arr2;
                if (!isEmpty(arr)) {

                    $('#found').html(total)
                    writepagi(total); //pagination

                    // if(v.diff > )
                    let gender = { '1': 'women', '2': 'men', '3': 'genall', '4': 'gay', '5': 'indy', '6': 'tom', '7': 'less' }
                    $.each(arr, function (k, v) {
                        (v == null) ? " " : v
                        //time
                        let time;
                        if (v.daydiff == "0") {
                            let bftime = v.dff;
                            bftime = String(bftime);
                            time = bftime.substring(0, 2);
                            if(Number(v.diff) < 3){
                                time = "<span class='online'><img  src='https://www.siamfans.com/media/img/user_online.gif' alt=''><span>ออนไลน์</span></span>";
                            }
                            else if (Number(v.diff) < 60) {
                                // time = bftime;
                                time = v.timediff.substring(3, 5)+ " นาทีที่แล้ว";
                                    if(v.timediff.substring(3, 4) == '0'){
                                        time = v.timediff.substring(4, 5)+' นาทที่แล้ว';
                                    }
                                // time = v.timediff;
                            } else {
                                time = v.timediff.substring(0, 2);
                                    if(v.timediff.substring(0, 1) == "0"){
                                        time = v.timediff.substring(1, 2);
                                    }
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
                        //setgender


                        //setimage
                        let i = 0;
                        rows +=

                            "<div class='col-md-2 col-sm-6 col-6 p-0'>" +
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
                            " <span class='pull-left'><i class='fa fa-bullhorn'></i> "+arr2[i++]+"</span>" +
                            " <span class='float-right'>" + time + "</span>" +
                            "<div class='clearfix'></div>" +
                            "</div>" +
                            " </div>" +
                            "</a>" +
                            "</div>";
                    });
                } else if (isEmpty(arr) && total >= 1) {
                    currentpage = 1;
                    $(".fillter").submit();
                }
                if (total == 0) {
                    $('#found').html('0');
                    rows +=
                        "<div class='col text-center my-3'>" +
                        "<h4>ไม่พบข้อมูล!</h4>" +
                        "</div>";
                    $(".pagination-row").hide();
                }
                if (total < 30) {
                    $(".pagination-row").hide();
                }
                $(".loopcontent").append(rows);
            }
        });
        outdata = data;
    }
    function writepagi(total) {
        paginationtext = " ";
        $("[page]").empty();
        let page = total / 30;
        page = Math.ceil(page);
        totalpage = page;
        for (let i = 1; i <= page; i++) {
            paginationtext +=
                "<li page='" + i + "' class='page-item " + ((i == currentpage) ? "active" : "") + " ' ><a page='" + i + "' class='page-link btn-pagenumber' href='#'>" + i + "</a></li>";
        }
        $(".previous").after(paginationtext);

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
}
function isEmpty(obj) {
    for (var key in obj) {
        if (obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

// after delete all
id,price,stock,name,count
// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];
    
    // Constructor
    function Item(name, price, count) {
      this.name = name;
      this.price = price;
      this.count = count;
    }
    
    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }
    
      // Load cart
    function loadCart() {
      cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
      loadCart();
    }
    
  
    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};
    
    // Add to cart
    obj.addItemToCart = function(name, price, count) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count ++;
          saveCart();
          return;
        }
      }
      var item = new Item(name, price, count);
      cart.push(item);
      saveCart();
    }
    // Set count from item
    obj.setCountForItem = function(name, count) {
      for(var i in cart) {
        if (cart[i].name === name) {
          cart[i].count = count;
          break;
        }
      }
    };
    // Remove item from cart
    obj.removeItemFromCart = function(name) {
        for(var item in cart) {
          if(cart[item].name === name) {
            cart[item].count --;
            if(cart[item].count === 0) {
              cart.splice(item, 1);
            }
            break;
          }
      }
      saveCart();
    }
  
    // Remove all items from cart
    obj.removeItemFromCartAll = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart.splice(item, 1);
          break;
        }
      }
      saveCart();
    }
  
    // Clear cart
    obj.clearCart = function() {
      cart = [];
      saveCart();
    }
  
    // Count cart 
    obj.totalCount = function() {
      var totalCount = 0;
      for(var item in cart) {
        totalCount += cart[item].count;
      }
      return totalCount;
    }
  
    // Total cart
    obj.totalCart = function() {
      var totalCart = 0;
      for(var item in cart) {
        totalCart += cart[item].price * cart[item].count;
      }
      return Number(totalCart.toFixed(2));
    }
  
    // List cart
    obj.listCart = function() {
      var cartCopy = [];
      for(i in cart) {
        item = cart[i];
        itemCopy = {};
        for(p in item) {
          itemCopy[p] = item[p];
  
        }
        itemCopy.total = Number(item.price * item.count).toFixed(2);
        cartCopy.push(itemCopy)
      }
      return cartCopy;
    }
  
    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
  })();
  
  
  // *****************************************
  // Triggers / Events
  // ***************************************** 
  // Add item
  $('.add-to-cart').click(function(event) {
    event.preventDefault();
    var name = $(this).data('name');
    var price = Number($(this).data('price'));
    shoppingCart.addItemToCart(name, price, 1);
    displayCart();
  });
  
  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
  });
  
  
  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
      output += "<tr>"
        + "<td>" + cartArray[i].name + "</td>" 
        + "<td>(" + cartArray[i].price + ")</td>"
        + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
        + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
        + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
        + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
        + " = " 
        + "<td>" + cartArray[i].total + "</td>" 
        +  "</tr>";
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
  }
  
  // Delete item button
  
  $('.show-cart').on("click", ".delete-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
  })
  
  
  // -1
  $('.show-cart').on("click", ".minus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCart(name);
    displayCart();
  })
  // +1
  $('.show-cart').on("click", ".plus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.addItemToCart(name);
    displayCart();
  })
  
  // Item count input
  $('.show-cart').on("change", ".item-count", function(event) {
     var name = $(this).data('name');
     var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
  });
  
  displayCart();
  



