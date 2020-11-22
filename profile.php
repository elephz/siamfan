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
    <link rel="stylesheet" href="assets/previewimg/ImgUploader/croppie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
</head>
<body>
<?php include "compostion/header.php";?>
<?php if($login){ ?>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-12 p-2">
            <?php include "compostion/left.php";?>
        </div>
        <div class="col-md-9 col-sm-12">
            <?php if (isset($_GET['p'])) {
	if ($_GET['p'] == 'setting') {
		include 'setting.php';
	}
	else if ($_GET['p'] == 'security') {
		include 'security.php';
	}else if ($_GET['p'] == 'privacy') {
		include 'privacy.php';
	}
}?>
        </div>
    </div>
</div>

</body>
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/previewimg/ImgUploader/croppie.min.js"></script>
<script src="assets/previewimg/ImgUploader/imguploader.bs.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
<script src="assets/script/profile.js"></script>
</html>
<?php } ?>