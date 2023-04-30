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
include("../Admin/assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT bacsi.tenbs from bacsi where id='$iduser' limit 1");
$idbs=$q->luachon("SELECT bacsi.id from bacsi where id='$iduser' limit 1");


?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Phòng khám đa khoa</title>
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
                <img src="../Admin/assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
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


                                $patientrow = $mysqli->query("select  benhnhan.id from  benhnhan inner join lichkham on lichkham.idbn=benhnhan.id where lichkham.idbs='$idbs';");                    
								
                                $doctorrow = $mysqli->query("select  * from  bacsi where tenbs ='$ten';");
                                $appointmentrow = $mysqli->query("select  * from  lichkham inner join lichtrinh on lichkham.idlt=lichtrinh.id where lichtrinh.ngaykham>='$today' AND lichkham.trangthai='Chưa khám' AND lichkham.trangthaithanhtoan='Đã thanh toán';");
                                $schedulerow = $mysqli->query("select  * from  lichtrinh where ngaykham='$today';");


                                ?>
                                </p>
                            </td>       
                        </tr>
                <tr>
                   <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-users"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $patientrow->num_rows  ?></h3>
                                <span class="widget-title2">Bệnh nhân<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-calendar-week"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php    echo  $appointmentrow->num_rows  ?></h3>
                                <span class="widget-title3">Lịch hẹn <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
				
				<div class="row">
					<div class="col-6 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Lịch hẹn khám sắp tới</h4> <a href="appointment.php" class="btn btn-primary float-right">Xem tất cả</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										  <thead>
                                            
                                        <tr>
                                                <th class="table-headin">
                                                    
                                                
                                               Mã lịch trình
                                                
                                                </th>
                                                
                                                <th class="table-headin">
                                                Ngày 
                                                </th>
                                                <th class="table-headin">
                                                    
                                                    Thời gian
                                                    
                                                </th>
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                            $nextweek=date("Y-m-d",strtotime("+1 week"));
                $sqlmain= "select lichkham.phidichvu,lichkham.trangthai, lichkham.id,bacsi.tenbs,benhnhan.tenbn,lichkham.idbn, lichtrinh.ngaykham,lichkham.giokham,lichkham.lichngaykham from lichkham inner join lichtrinh on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id  where lichtrinh.ngaykham>='$today' and lichtrinh.ngaykham<='$nextweek' and lichkham.trangthai='Chưa khám'  and lichkham.trangthaithanhtoan='Đã thanh toán' order by lichtrinh.ngaykham desc ";

                                                $result= $mysqli->query($sqlmain);
                
                                                if($result->num_rows==0){
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                   
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có lịch trình nào</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Xem tất cả &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                    
                                                }
                                                else{
                                                for ( $x=0; $x<$result->num_rows;$x++){
                                                    $row=$result->fetch_assoc();
                                                    $scheduleid=$row["id"];
                                                    $title=$row["idck"];
                                                    $docname=$row["tenbs"];
													
                                                    $scheduledate=$row["ngaykham"];
                                                    $scheduletime=$row["giokham"];
                                                    $nop=$row["soluong"];
                                                    echo '<tr>
                                                        <td style="padding:20px;"> &nbsp;'.
                                                        substr($scheduleid,0,30)
                                                        .'</td>
														 
                                                        <td style="padding:20px;font-size:13px;">
                                                        '.substr($scheduledate,0,10).'
                                                        </td>
                                                        <td style="text-align:center;">
                                                            '.substr($scheduletime,0,5).'
                                                        </td>

                
                                                       
                                                    </tr>';
                                                    
                                                }
                                            }
                                                 
                                            ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-6 col-md-6 col-lg-6 col-xl-6">

                            <img src="./assets/img/bs.jpg" width="100%" alt="">
                        </div>
                    
                  
				</div>
				
          
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>

</body>



</html>