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
<?php 
 $title = "";
 $data = " ";
 $typepara = " " ;
if(isset($_GET['t'])){
    $typepara = "t";
    $type = $_GET['t'];
   
    if($type == "search"){
        $title = "<i class='fas fa-search-plus'></i> ค้นหาเพื่อน";
        $data = "search";
    }
} 
if(isset($_GET['target'])){
    $target = $_GET['target'];
    $typepara = "target";
    $arr_target = [
        '1'=>'หาคู่',
        '2'=>'หาแฟน',
        '3'=>'หากิ๊ก',
        '4'=>'หาที่ปรึกษา',
        '5'=>'หาพี่ชาย',
        '6'=>'พาพี่สาว',
        '7'=>'หาน้องชาย',
        '8'=>'หาน้องสาว'
    ];
    foreach($arr_target as $key => $value){
        if($target == $key){
            $title = "<i class='fas fa-user-friends'></i> ".$value;
            $data = $key;
        }
    }
} 
if(isset($_GET['g'])){
    $typepara = "g";
    $arr_g = [
        'men'=>'ชาย',
        'women'=>'หญิง',
        'gay'=>'เกย์',
        'genall'=>'สาวสอง',
        'less'=>'เลสเบี้ยน',
        'indy'=>'ดี้',
        'tom'=>'ทอม'
    ];
    $g = $_GET['g'];
    foreach($arr_g as $key => $value){
        if($g == $key){
            $title = "<i class='fas fa-user-friends'></i> หาเพื่อน".$value;
            $data = $key;
        }
    }
}
if(isset($_GET['social'])){
    $typepara = "social";
    $arr_social = [
        'line'=>'ไลน์',
        'facebook'=>'เฟซบุ๊ก',
        'phone'=>'เบอร์โทรศัพท์'
    ];
    $social = $_GET['social'];
    foreach($arr_social as $key => $value){
        if($social == $key){
            $title = "<i class='fas fa-user-friends'></i> หาเพื่อนที่มี".$value;
            $data = $key;
        }
    }
}
    echo '<script type="text/javascript">';
    echo "var typepara = '$typepara';";
    echo "var data = '$data';";
	echo '</script>';
?>
<div class="container mt-2">
    <div class="row">
        <div class="col text-center">
                <h5> <?php echo $title; ?></h5>
        </div>
    </div>
    <div class="row">
        <form class="form-inline fillter mx-auto w-100">
            <input type="text" class="form-control f-sl-text   mb-2 mr-sm-2 " id="inlineFormInputName2" placeholder="คำค้น">

            <select class="form-control f-sl-socail  mb-2 mr-sm-2 " name="f-sl-socail" id="">
                <option value="">เลือกเฉพาะ</option>
                <option value="line">เพื่อนที่มีไลน์</option>
                <option value="facebook">เพื่อนที่มีเฟซบุ๊ก</option>
                <option value="phone">เพื่อนที่มีเบอร์โทร</option>
            </select>
            <select class="form-control f-sl-gender  mb-2 mr-sm-2 " name="f-sl-gender" id="">
                <option value="">เพศ</option>
                <?php while ($Search_row1 = mysqli_fetch_assoc($base_selectGender)) { ?>
                <option value="<?php echo $Search_row1['Gender_id']; ?>"><?php echo $Search_row1['Gender_name']; ?></option>
                <?php } ?>
               
            </select>
            <select class="form-control f-sl-age_first  mb-2 mr-sm-2 " name="f-sl-age_first" id="">
                <option value="">อายุ</option>
                <?php for ($i = 18; $i <= 80; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <label for="">ถึง</label>
            <select class="form-control ml-1 f-sl-age_last  mb-2 mr-sm-2 " name="f-sl-age_last" id="">
                <option value="">อายุ</option>
                <?php for ($i = 18; $i <= 80; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <select class="form-control   mb-2 f-sl-province mr-sm-2 " name="f-sl-province" id="">
                <option value="">จังหวัด</option>
                <?php while ($Search_row2 = mysqli_fetch_assoc($base_selectprovince)) { ?>
                    <option value="<?php echo $Search_row2['Province_id']; ?>"><?php echo $Search_row2['Province_name']; ?></option>
                <?php }?>
              
            </select>
            <select class="form-control f-sl-target mb-2 mr-sm-2 " name="f-sl-target" id="">
                <option value="">คนที่ต้องการ</option>
                <?php while ($Search_row3 = mysqli_fetch_assoc($base_seletarget)) { ?>
                    <option value="<?php echo $Search_row3['Target_id']; ?>"><?php echo $Search_row3['Target_name']; ?></option>
                <?php }?>
            </select>
            <button type="submit" class="btn btn-custom1 mb-2">ค้นหา</button>
        </form>
    </div>
    <div class="row loopcontent">
    
    </div>
</div>

</body>
<script src="assets/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/script/search.js"></script>
</html>
