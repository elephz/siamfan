<?php include "command/indexcommand.php";?>
<?php if (isset($_SESSION["admin_id"])) { 
    $adminnamd = $_SESSION["admin_name"];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Siam fan | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
 
  <!-- Daterange picker -->

  <!-- summernote -->
  
  <link rel="stylesheet" href="css/csscustom.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link logout">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include("aside.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $alluse['countuser']; ?></h3>
                <p>สมาชิกทั้งหมด</p>
              </div>
              <div class="icon">
                  <i class="fas fa-user-friends"></i>
              </div>
              <a href="alluser?p=all" class="small-box-footer">เพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $newuse['countuser']; ?></h3>
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                <p>สมาชิกใหม่วันนี้</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">เพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $reportuser->num_rows; ?></h3>
                <p>สมาชิกถูกรายงาน</p>
              </div>
              <div class="icon">
                <i class="fas fa-address-card"></i>
              </div>
              <a href="report" class="small-box-footer">เพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $banuse['countuser']; ?></h3>
                <p>สมาชิกที่ถูกบล็อก</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-slash"></i>
              </div>
              <a href="alluser?p=block" class="small-box-footer">เพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  รายงานการเข้าสู่ระบบ
                </h3>
                <!-- <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div> -->
              </div><!-- /.card-header -->
              <div class="card-body">
                <canvas id="graphCanvas" class='w-100'></canvas>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          

           
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-list-alt"></i>
                  อนุมัติบัญชีผู้ดูและระบบ
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
               <table class='table'>
                <thead>
                  <tr>
                    <th></th>
                    <th>ชื่อ </th>
                    <th> อีเมล์</th>
                    <th>วันที่สมัคร</th>
                  </tr>
                </thead>
                <tbody>
                <?php  while ($adminlist = mysqli_fetch_assoc($admin)) {?>
                       <tr>
                       <td>
                         <button class="btn btn-light" jud='yes' id='<?php echo $adminlist['admin_id']; ?>'> <i class="fas fa-check"></i> </button>
                        
                         <button class="btn btn-light" jud='no' id='<?php echo $adminlist['admin_id']; ?>'> <i class="fas fa-times"></i></button>
                        </td>
                        <td><?php echo $adminlist['name']; ?></td>
                        <td><?php echo $adminlist['e_mail']; ?></td>
                        <td><?php echo DateThai($adminlist['created_date']); ?></td>
                        </tr> 
                <?php } ?>
                </tbody>
               </table>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
               
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
           
            <!-- /.card -->

          
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>





<!-- Tempusdominus Bootstrap 4 -->



<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="asstes/script/logout.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>

$(document).ready(function(){
  showGraph();
function showGraph(){
    {
      var dayThai = ["อาทิตย์","จันทร์","อังคาร","พุทธ","พฤหัส","ศุกร์","เสาร์"];
      data = {action:"graph"}
      $.ajax({
            type: "POST",
            url: "command/backendAPI.php",
            data: data,
            dataType: 'json',
            cache: false,
            success: function (result) { 
            let name = [];
            let score = [];
            let data = result.respond;
            let o =1;
            // $.each(dayobg,function(k,v){
            //     console.log(k,v);
               
            //   o++;
            // });
          
            $.each(data,function(k,v){
                var d = new Date(k);
                name.push(dayThai[d.getMonth()]);
                score.push(v);
            });
            console.log(score);
            console.log(name);
            let i = 0;
            console.log(score);
            console.log(name);
            let chartdata = {
                labels: name,
                datasets: [{
                        label: 'จำนวนผู้เข้าใช้งาน(ที่ไม่ซ้ำกัน)',
                        backgroundColor: '#102526',
                        borderColor: '#666',
                        hoverBackgroundColor: '#0d0d0d',
                        hoverBorderColor: '#666666',
                        data: score
                }]
            };

            let graphTarget = $('#graphCanvas');
            let barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata,
            })
            } });
    }
}

$("body").on("click", ".btn-light", function (e) { 
    let jud = $(this).attr('jud');
    let id = $(this).attr('id');
    let tr = $(this).closest('tr');
    data = {jud,id,action:'judadmin'}
    $.ajax({
            type: "POST",
            url: "command/backendAPI.php",
            data: data,
            dataType: 'json',
            cache: false,
            success: function (result) {
               if(result.status){
                swal("", "บันทึกสำเร็จ", "success");
                tr.fadeOut(1000);
               }else{
                swal("", "บันทึกไม่สำเร็จ", "error");
               }
            }
        });
});
});
</script>
</body>
</html>
<?php  }else{
   header("Location: login.php ");
} ?>
