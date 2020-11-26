<?php include "api/command.php";?>
<?php include "api/searchcommane.php";?>
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
</head>
<body>
<?php include "compostion/header.php";?>
<div class="container mt-2">
    <div class="row">
        <div class="col text-center">
                <h5> <?php echo $title; ?></h5>
        </div>
    </div>

    <div class="row p-2">
        <form class="form-inline fillter mx-auto ">
            <input type="text" class="form-control f-sl-text   mb-2 mr-sm-2 " id="inlineFormInputName2" placeholder="คำค้น">

            <select class="form-control f-sl-socail  mb-2 mr-sm-2 " name="f-sl-socail" >
                <option value="">เลือกเฉพาะ</option>
                <option value="line">เพื่อนที่มีไลน์</option>
                <option value="facebook">เพื่อนที่มีเฟซบุ๊ก</option>
                <option value="phone">เพื่อนที่มีเบอร์โทร</option>
            </select>
            <select class="form-control f-sl-gender  mb-2 mr-sm-2 " name="f-sl-gender" >
                <option value="">เพศ</option>
                <?php while ($Search_row1 = mysqli_fetch_assoc($base_selectGender)) {?>
                <option value="<?php echo $Search_row1['Gender_id']; ?>"><?php echo $Search_row1['Gender_name']; ?></option>
                <?php }?>

            </select>
            <select class="form-control f-sl-age_first  mb-2 mr-sm-2 " name="f-sl-age_first" >
                <option value="">อายุ</option>
                <?php for ($i = 18; $i <= 80; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <label for="">ถึง</label>
            <select class="form-control ml-1 f-sl-age_last  mb-2 mr-sm-2 " name="f-sl-age_last" >
                <option value="">อายุ</option>
                <?php for ($i = 18; $i <= 80; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <select class="form-control   mb-2 f-sl-province mr-sm-2 " name="f-sl-province" >
                <option value="">จังหวัด</option>
                <?php while ($Search_row2 = mysqli_fetch_assoc($base_selectprovince)) {?>
                    <option value="<?php echo $Search_row2['Province_id']; ?>"><?php echo $Search_row2['Province_name']; ?></option>
                <?php }?>

            </select>
            <select class="form-control f-sl-target mb-2 mr-sm-2 " name="f-sl-target" >
                <option value="">คนที่ต้องการ</option>
                <?php while ($Search_row3 = mysqli_fetch_assoc($base_seletarget)) {?>
                    <option value="<?php echo $Search_row3['Target_id']; ?>"><?php echo $Search_row3['Target_name']; ?></option>
                <?php }?>
            </select>
            <button type="submit" class="btn btn-custom1 mb-2">ค้นหา</button>
        </form>
    </div>
    <div class="row my-2">
        <div class="col-md-6 col-sm-12">
           <span class='text-left'> พบ <span id='found'></span> รายการ </span>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
               <span>จัดเรียงตาม:</span>
               <select class='form-control d-inline-block w-50 float-right ml-2'  name="" id="order">
                    <option value="">จัดเรียงตาม</option>
                    <option value="lastpost">โพสล่าสุด</option>
                    <option value="poppular">ความนิยม</option>
                    <option value="lowtoup">อายุน้อยไปมาก</option>
                    <option value="uptolow">อายุมากไปน้อย</option>
               </select>
        </div>
    </div>
    <div class="row loopcontent">

    </div>
    <div class="row pagination-row">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item previous"><a class="page-link btn-control" control='left' href="#">Previous</a></li>

                <li class="page-item"><a class="page-link btn-control" control='right' href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
<?php include 'footer.php';?>
</body>
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/script/search.js"></script>
<script src="assets/script/checkonline.js"></script>
<script>
var obj = JSON.parse('<?php echo json_encode($obj) ?>');
var agearr = JSON.parse('<?php echo json_encode($agearr) ?>');
</script>
</html>
