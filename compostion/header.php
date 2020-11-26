<?php
if (isset($_SESSION["User_id"])) {
	$login = true;
	$current_id = $_SESSION["User_id"];
	$current_Name = $_SESSION["Name"];
	echo '<script type="text/javascript">';
	echo "var currentjs_id = '$current_id';";
	echo "var login = true;";
	echo '</script>';
} else {
	$login = false;
	echo '<script type="text/javascript">';
	echo "var currentjs_id = null;";
	echo "login = false;";
	echo '</script>';
}
?>
<div class="container-fluid d-block first-container">

            <nav class="container navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="index">
                    <img src="https://www.siamfans.com/media/logo/logo_201901201547964616.png" alt="" width="200">
                </a>
                <div class="d-none  ml-auto d-sm-block d-none d-md-block">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link">หน้าแรก</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            หาเพื่อน
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                $arr_header_gender = array('women', 'men', 'genall', 'gay', 'indy', 'tom', 'less');
                                $i = 0;
                                $arr = [];
                                while ($row = mysqli_fetch_assoc($select_gender)) {?>
                                    <a class="dropdown-item" href="search?g=<?php echo $arr_header_gender[$i]; ?>"><?php echo $row['Gender_name']; ?></a>
                                    <?php
                                    array_push($arr,$row);
                                $i++;
                                }
                                ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="search?t=search">ค้นหาเพื่อน</a>
                            </div>
                        </li>
                        <?php if ($login) {?>
                            <a href="#" class="nav-item nav-link">บัญชีของฉัน</a>
                        <?php } else {?>
                            <a href="login" class="nav-item nav-link">เข้าสู่ระบบ</a>
                        <?php }?>
                    </div>
                </div>
            </nav>
            <?php if($login){ ?>
          <div class="mobile-uer">
              <a href="profile?p=setting">
                <h1> <i class="far fa-id-card"></i></h1>
               </a>
          </div>
                        <?php } ?>
            <nav role="navigation" class='burger d-none'>
                <div id="menuToggle">
                   
                    <input type="checkbox" />
                   
                    <span></span>
                    <span></span>
                    <span></span>
           
                    <ul id="menu">
                        <?php foreach($arr as $key => $val){ ?>
                        <a href="search?g=<?php echo $arr_header_gender[$key];  ?>"><li><?php echo $val['Gender_name'];  ?></li></a>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
</div>
