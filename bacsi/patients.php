<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("../Admin/assets/login_tmd.php");
	include('db-connect.php');
	$q= new login();
	$bs= new loginbs();
	$bs->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:../Admin/login.php');
	}
include("../Admin/assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$bs->luachon("SELECT bacsi.tenbs from bacsi where id='$iduser' limit 1");
$idbs=$bs->luachon("SELECT id from bacsi where id='$iduser' limit 1");


?>
 
 <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
		.overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    opacity: 1;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
    
  }
  
  .popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 50%;
    position: relative;
    transition: all 5s ease-in-out;
  }
  
  .popup h2 {
    margin-top: 0;
    color: #333;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: var(--primarycolorhover);
  }
  .popup .content {
    max-height: 30%;
    overflow: auto;
  }
  
  @media screen and (max-width: 700px){
    .box{
      width: 70%;
    }
    .popup{
      width: 70%;
    }
  }


</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Danh sách bệnh nhân</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css" href="../Admin/assets/css/style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
</head>
<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo">
                <img src="../Admin/assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng khám Đa Khoa ĐP</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="../Admin/assets/img/user.jpg" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span><?php echo $ten; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../Admin/login.php">Đăng xuất</a>
                </div>
            </li>
        </ul>
        
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a>
                    </li>
                    <li class="submenu">
                            <a href="#" id="menu_patien"><i class="fa fa-calendar-week"></i><span> Lịch hẹn khám</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="appointment.php">Lịch khám</a></li>
                               <li><a href="hisappointment.php">Lịch sử khám</a></li>
                            </ul>
                        </li> 
                        <li class="submenu">
                            <a href="#" id="menu_patient"><i class="fa fa-receipt"></i><span> Phiếu khám bệnh</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="phieukhambenh.php">Phiếu khám bệnh</a></li>
                               <li><a href="phieuxetnghiem.php">Phiếu xét nghiệm</a></li>
                               <li><a href="phieusieuam.php">Phiếu siêu âm</a></li>

                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="medicine.php"><i class="fa fa-file-invoice"></i><span>Kê đơn thuốc</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <!-- <li><a href="medicine.php">Kê đơn thuốc</a></li> -->
                               <li><a href="timkiemthuoc.php">Hóa đơn thuốc</a></li>
                            </ul>
                        </li>  
                  
                       <li >
                        <a href="schedule.php"><i class="fa fa-calendar"></i><span> Lịch trình của tôi </span></a>
                    </li>
                    <li class="submenu">
                            <a href="patients.php" id="menu_patient"><i class="fa fa-users"></i> <span> Thông tin bệnh nhân</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="patients.php">Bệnh nhân</a></li>
                               <li><a href="benhan.php">Bệnh án</a></li>
                            </ul>
                        </li>
                     
                    <li>
                        <a href="doctor.php?ten=<?php echo $ten ?>"><i class="fa fa-user-md"></i><span>Thông tin cá nhân</span></a>
                    </li> 
                    <li><?php
                        echo '<a href="thongke.php?idbs='.$idbs.'"><i class="fa-solid fa-chart-simple"></i> <span>Thống kê</span></a>';
                    ?>
                        </li>   
                </ul>
            </div>
        </div>
    </div>

        <div class="page-wrapper">
        
            <div class="content">
            <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Ngày hôm nay:
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right">
                            <?php 
                        date_default_timezone_set('Asia/ho_chi_minh');

                        $today = date('Y-m-d');
                        echo $today;
                        ?>
                        </p>
                <div class="row">
                 <div class="col-md-12 col-sm-12">

                     <div class="col-lg-8 offset-lg-2">
                        <form enctype="multipart/form-data" method="post">
                           <div class="row">
                               <div class="col-sm-5">
                        
                            <?php
                                echo '<datalist id="patient">';
                                $list11 = $mysqli->query($sqlmain);
                              

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row=$list11->fetch_assoc();
                                    $tenbn=$row["tenbn"];
                                    $email=$row["email"];
                                    echo "<option value='$tenbn'><br/>";
                                    echo "<option value='$email'><br/>";
                                };

                            echo ' </datalist>';
?>
                            
                      
                       </div>
                    
                        </form>
                        </div>
                   
                    </div>
                  
                       
                
               
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
 
                        <form action="" method="post">
                        
                       
                    <?php       

                    $da="Đã khám";
                    $chua="Chưa khám";
                    // $current="Bệnh nhân của tôi";
                    if($_POST){

                        if(isset($_POST["timkiem"])){
                            $keyword=$_POST["Tìm kiếm"];
                            
                            $sqlmain= "select *,benhnhan.tenbn from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn inner join lichtrinh on lichtrinh.id=lichkham.idlt where benhnhan.email='$keyword' or benhnhan.tenbn='$keyword' or benhnhan.tenbn like '%$keyword%' order by lichkham.id";
                            
                        }
                        
                        if(isset($_POST["Lọc"])){
                            if($_POST["showonly"]=='all'){
                                $sqlmain= "select * from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn inner join lichtrinh on lichtrinh.id=lichkham.idlt where lichkham.idbs='$idbs'";                              
                                $current="Bệnh nhân của tôi";
                            }
                            elseif($_POST["showonly"]=='da'){
                        $sqlmain= "select * from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn inner join lichtrinh on lichtrinh.id=lichkham.idlt where lichkham.idbs='$idbs' AND lichkham.trangthai='Đã khám'";

                                $da="Đã khám";
                                $current="Đã khám";
                            }
                            else{
                                
                                $sqlmain= "select * from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn inner join lichtrinh on lichtrinh.id=lichkham.idlt where lichkham.idbs='$idbs' AND lichkham.trangthai='Chưa khám'";
        
                                        $chua="Chưa khám";
                                        $current="Chưa khám";
                                    }
                                }
                    }else{
                        $sqlmain= "select * from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn inner join lichtrinh on lichtrinh.id=lichkham.idlt where lichkham.idbs='$idbs'";
                        $current="Bệnh nhân của tôi";
                    }
                    ?>
                    </td>
                        <td width="20%">
                        <select name="showonly" id="" class="box filter-container-items form-control" style="width:90% ;height: 37px;margin: 0;" >
                                    <option value="" disabled selected hidden><?php echo $current   ?></option><br/>
                                    <option value="da">Đã khám</option><br/>
                                    <option value="chua">Chưa khám</option><br/>
                                    <option value="all">Bệnh nhân của tôi</option><br/>
                                    

                        </select>
                    </td>
                    <td width="50%">
                        <input type="submit"  name="Lọc" value=" Lọc" class=" btn-primary btn">
                        
                    </td>
                    
                        <td width="20%" style="padding: 0;margin-top: 10px;text-align: right;">
                        <input type="search" style="margin-top: 20px" name="timkiem" class="text-right form-control" placeholder="Tìm kiếm bệnh nhân " list="patient">&nbsp;&nbsp;

                    </td>
                    <td width="5%">
                    <input type="Submit" value="Tìm kiếm"class="login-btn btn-primary btn" >
                        </form>
                    </td>
                    </tr>
                            </table>

                        </center>
                    
                    
                </tr>

                  <br>
                 <div class="row">
                <div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
                        <thead>
                        <tr>
                        <th>
                               STT
                                
                                </th>
                                <th>
                               Tên bệnh nhân
                                
                                </th>
                                
                                <th>
                                Số điện thoại
                                </th>
                                <th >
                                    Email
                                </th>
                                <th>Tình trạng</th>
                               
                                <th >
                                    
                                    Lựa chọn
                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php
                                $dem=1;
                                
                                $result= $mysqli->query($sqlmain);
                                //echo $sqlmain;
                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="7">
                                    
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có bệnh nhân nào</p>
                                   
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $id=$row["idbn"];
                                    $dob=$row["sdt"];
                                    $name=$row["tenbn"];
                                    $email=$row["email"];
                                    $tinhtrang=$row["trangthai"];
                                    
                                    
                                    echo '<tr>
                                    <td>'.                                       
                                        substr($dem,0,5)
                                        .'</td >
                                        <td> &nbsp;'.
                                        substr($name,0,35)
                                        .'</td>
                                        
                                        <td>
                                            0'.substr($dob,0,10).'
                                        </td>
                                        <td>
                                        '.substr($email,0,20).'
                                         </td>
                                        <td>
                                        '.substr($tinhtrang,0,20).'
                                        </td>
										
                                        <td >
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=xem&id='.$id.'" class="text-light"><button  class="btn btn-success">Xem chi tiết</button></a>
                                       
                                        </div>
                                        </td>
                                    </tr>';
                                    $dem++;
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='xem'){
        
            $sqlmain1= "select *, lichkham.lichngaykham, lichkham.idbs, lichkham.giokham, lichkham.trangthai from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn where benhnhan.id=$id AND  lichkham.idbs=$idbs";
            $result1= $mysqli->query($sqlmain1);
            $row=$result1->fetch_assoc();
            $name=$row["tenbn"];
            $email=$row["email"];
            $nic=$row["gioitinh"];
            $dob=$row["ngaysinh"];
            $tele=$row["sdt"];
            $address=$row["diachi"];
            $lichngaykham=$row["lichngaykham"];


            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <a class="close" href="patients.php">&times;</a>
                        <div class="content">

                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Xem chi tiết.</p><br><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Mã bệnh nhân: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$id.'<br><br>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Tên: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$email.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">giới tính: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$nic.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Số điện thoại: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$tele.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Địa chỉ: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            '.$address.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Ngày sinh: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$dob.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                                '.$lichngaykham.'<br><br>
                            </td>
                            
                        </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="patients.php"><input type="button" value="OK" class="login-btn btn-primary btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        
    }
};

?>
</div>

       
</body>
</html>
 <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>

           
 