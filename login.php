<?php include "api/command.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siam Fan</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
</head>
<body>
   <?php include "compostion/header.php";?>
    <div class="container my-5">
        <div class="row my-3">
            <div class="col text-center">
                <span class='warning'>คำเตือน: ห้ามนำข้อมูลส่วนตัวผู้อื่นมาโพสต์โดยเด็ดขาด เพราะทางเว็บไซต์มีการบันทึก IP ผู้โพสต์ในระบบของผู้ดูแล สามารถติดตามตัวผู้กระทำผิดมาลงโทษได้</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-12 p-5">
                <h1 class='big-title'>Siamfan</h1>
                <h2 class='sub-title'>Siamfan ช่วยให้คุณหาเพื่อนใหม่ ๆ ทั่วประเทศไทย</h2>
            </div>
            <div class="col-md-1 "></div>
            <div class="col-md-5 col-sm-12 ">
                <div class="card mx-auto cardshadow ">
                    <div class="card-header card-underline p-5">
                        <form class='w-100 mx-auto text-center'>
                            <div class="form-group text-left">
                                <label for="email" >Username:</label>
                                <input type="text" class="form-control" id='username' placeholder="Enter Username" required >
                            </div>

                            <div class="form-group text-left">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id='password' placeholder="Enter password" required >
                            </div>
                            <button  class="btn-custom1 py-2 px-4 w-75 btn-f-login">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center ">
                        <button data-toggle="modal" data-target="#modal_register" type="submit" class="btn-custom1 py-3 px-4 w-50 ">New accout</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <b>สมัครสมาชิก</b> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class='w-100 mx-auto' id='register-form'>
                        <div class="form-group">
                            <label for="email">Username:</label>
                            <input type="text" class="form-control" name='username' id='regis-us' placeholder="Enter Username" required >
                        </div>

                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name='password' id='psw' placeholder="Enter password" id="pwd" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirm Password:</label>
                            <input type="password" class="form-control" id='cfpsw' placeholder="Enter password" id="pwd" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Firstname:</label>
                            <input type="text" class="form-control" name='firstname' placeholder="Enter Firstname" required >
                        </div>
                        <div class="form-group">
                            <label for="email">Lasttname:</label>
                            <input type="text" class="form-control" name='lastname' placeholder="Enter Lasttname" required>
                        </div>
                        <input type="hidden" name='action' value='register'>
                        <button type="submit" class="btn-custom1 py-2 px-4 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
    </div>

</body>
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
<script src="assets/script/index.js"></script>
<script src="assets/script/checkonline.js"></script>
</html>