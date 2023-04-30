<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("./assets/login_tmd.php");
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:login.php');
	}
include("assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT tennv FROM nhanvien where id='$iduser' limit 1 ");
include('./assets/qlbs.php');
$p = new qlbs();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Thông tin lịch trình bác sĩ</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">   
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo">
                <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar-menu"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span><?php echo $ten; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
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
                    <li>
                        <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Bác sĩ</span></a>
                    </li>
                    <li>
                        <a href="patients.php"><i class="fa fa-users"></i> <span>Bệnh nhân</span></a>
                    </li>
                    <li class="submenu">
                       <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Lịch hẹn khám</span><span class="menu-arrow"></span></a>
                         <ul style="display: none;">
                       		
                            <li><a href="cho_kham.php">Chờ khám</a></li>
                            <li><a href="cho_thanh_toan.php">Chờ thanh toán</a></li>
                            <li><a href="ls_kham.php">Lịch sử khám</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="schedule.php"><i class="fa fa-calendar-check"></i> <span>Lịch trình </span></a>
                    </li>
                    <li>
                        <a href="hosobenhan.php"><i class="fa fa-file"></i> <span>Hồ sơ bệnh án </span></a>
                    </li>
					
                    <li class="submenu">
                        <a href="#"><i class="fa fa-commenting-o"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="blog.php">Bài viết</a></li>
                            <li><a href="add-blog.php">Thêm bài viết</a></li>
                            <li><a href="edit-blog.php">Sửa bài viết</a></li>
                            <li><a href="myblog.php">Bài viết của tôi</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="profilenv.php"><i class="fa fa-user"></i> <span> Thông tin cá nhân </span></a>
                    </li>
                    <li >
                        <a href="thongke.php"><i class="fa-solid fa-chart-simple"></i> <span> Thống kê </span></a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
     <div class="page-wrapper">
        
            <div class="content">
                <div class="row">
                 <div class="col-md-12">                                   
                        <tr >
                            <td width="25%">
                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Ngày hôm nay :
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right;">
                                    <?php 
                                date_default_timezone_set('Asia/ho_chi_minh');
                                $today = date('Y-m-d');
                                echo $today;
                                ?>
                                </p>
                            </td>       
                        </tr>
                 </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">                             
          <?php
		  	$p->loadchitietbs("select bacsi.tenbs, bacsi.chucvu,bacsi.diachi, bacsi.id, bacsi.idck,bacsi.linhvuc,bacsi.anh, bacsi.gioitinh, bacsi.ngaysinh, bacsi.email, bacsi.sdt, bacsi.sdt, chuyenkhoa.tenck from bacsi inner join chuyenkhoa on bacsi.idck = chuyenkhoa.id where bacsi.id ='$layid' order by id desc");
		  	
		    $sqlmain= "select id,soluong,ngaykham, TIME(gioketthuc) AS gioketthuc, TIME(giobatdau) AS  giobatdau from lichtrinh where lichtrinh.idbs='$layid' and lichtrinh.ngaykham>='$today' order by lichtrinh.ngaykham asc ";
		
		  ?>               
        </div>
        <div class="row">       
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Lịch trình cá nhân</span> 
                </p>
                
                <div class="progress rounded" style="height: 5px;"></div>
                  <table class="table table-border table-striped custom-table mb-0">
					<thead>
                        <tr>
                            <th>Lịch trình khám</th>
                            <th>Thời gian khám</th> 
                            <th>Mã lịch trình</th>                              
                            <th>Số lượng khám</th>
                            <th>Lựa chọn</th>
                        </tr>     
                        </thead>
                        <tbody>
                            <?php
                                $result= $mysqli->query($sqlmain);
                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="5">
                                    <br><br><br><br>
                                    <center>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có lịch trình nào!</p>
                                  </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                   $idlt=$row["id"];								   
                                    $ngaykham=$row["ngaykham"];
                                    $giobatdau=$row["giobatdau"];
									$idbs=$row["idbs"];
                                    $gioketthuc=$row["gioketthuc"];
									$soluong=$row["soluong"];									 
									echo'<tr>
									<td>'.substr($ngaykham,0,25).'</td>
									
									<td>'.substr($giobatdau,0,5).' - '.substr($gioketthuc,0,5).'</td>
									
									<td>'.$idlt.'</td>
									<td>'.substr($soluong,0,5).'</td>
									<td>
                                     <a href="?action=Xem&idlt='.$row["id"].' &id='.$layid.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-view"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Xem chi tiết</font></button></a>
                                        </td>                                        
                                    </tr>';                                    
                                }
                            }                                 
                            ?> 
                            </tbody>
                        </table>
                </div>               
              </div>
              <?php    
    if($_GET){
        $idlt=$_GET["idlt"];      
        $action=$_GET["action"];
       if($action=='Xem'){
            $row=$result->fetch_assoc();
            $sqlmain12= "select * from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id inner join lichtrinh on lichkham.idlt=lichtrinh.id where lichtrinh.id='$idlt' AND lichtrinh.ngaykham>='$today' ";
            $result12= $mysqli->query($sqlmain12);
            echo '
            <div id="popup1" class="overlay" style="z-index:111">
                    <div class="popup" style="width: 70%; ">
                    <center>
                        <h2></h2>
                        <a class="close" href="profilebs.php?id='.$layid.'">&times;</a>
                        <div class="content">  
                        </div>
                        <div class="abc scroll" style="display: absolute;justify-content: center;">
                        <div class="col-lg-11">
                        <div>
                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Xem thông tin chi tiết</p><br><br>                        
                        </div>
        <div class="card mb-4">
          <div class="card-body text-left">       
		<div class="row">
                                           
                        <table width="100%" class="sub-table scrolldown add-doc-form-container" >                          
                            <tr>
                            <td colspan="4">
                                <center>
                                  <div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">								
                                 <thead>
                                 <div> <h4>Thông tin lịch hẹn khám bệnh nhân</h4></div><br>
                                 <tr>   
                                        <th> Mã bệnh nhân</th>
                                         <th>Tên bệnh nhân</th>
                                         <th>Số điện thoại</th>
                                         <th >Thời gian khám</th>  
                                         <th >Mã lịch hẹn</th>                                                   
                                 </thead>
                                 <tbody>
                                 </div>
                                 </div>
                               </div>';
                                         $result12= $mysqli->query($sqlmain12);                
                                         if($result12->num_rows==0){
                                             echo '<tr>
                                             <td colspan="7">
                                             <br><br><br><br>
                                             <center>                                             
                                             <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có bệnh nhân nào</p>                                           
                                             </center>
                                             <br><br><br><br>
                                             </td>
                                             </tr>';                                            
                                         }
                                         else{
                                         for ( $x=0; $x<$result12->num_rows;$x++){
                                             $row=$result12->fetch_assoc();
                                             $malich=$row["id"];
                                             $pid=$row["idbn"];
                                             $pgio=$row["giokham"];
                                             $pname=$row["tenbn"];
                                             $ptel=$row["sdt"];
                                             
                                             echo '<tr style="text-align:left;">
                                                <td>
                                                '.substr($pid,0,15).'
                                                </td>
                                                 <td>'.
                                                 
                                                 substr($pname,0,30)
                                                 .'</td >
                                                 <td>
                                                 0'.substr($ptel,0,25).'
                                                 </td>
                                                 <td>
                                                 '.$pgio.'                                                 
                                                 </td>
                                                 <td>
                                                 '.$malich.'                                                 
                                                 </td>
                                                 
                                             </tr>';  
                                         }
                                     }
                                    echo '</tbody>               
                                 </table>
                                 </div>
                                 </center>
                            </td> 
                         </tr>
                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>';  
    }
}
    ?>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div>
        
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>