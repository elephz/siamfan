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