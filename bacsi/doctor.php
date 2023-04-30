<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("../Admin/assets/login_tmd.php");
	include('db-connect.php');
	$bs= new loginbs();
	$bs->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);

	$q= new login();
	}
else
{
	header('location:../Admin/login.php');
	}

$iduser=$_SESSION['id'];
$ten=$bs->luachon("SELECT tenbs
FROM bacsi where id='$iduser' limit 1");
$layid = $_SESSION['id'];
$phanquyen=$q->luachon("select phanquyen from bacsi limit 1");
$chucvu=$q->luachon("select chucvu from bacsi limit 1");
$anh=$q->luachon("select anh from bacsi where tenbs='$ten' limit 1");
include('../Admin/assets/qlbs.php');
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
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Thông tin cá nhân</title>
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
        <div class="header-left">
            <a href="index.php" class="logo">
                <img src="../Admin/assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng khám</span>
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
             <form enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Thông tin cá nhân</h4>
                    </div>
                </div>
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                       <section class="text-center"  style="padding:0;">
                  <img style="border-radius:50%; width:200px; height:200px; oject-fit: cover" class="porfile-pic" src="../Admin/assets/img/<?php echo $anh; ?>" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form enctype="multipart/form-data" method="post">
                           <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Họ và tên<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="tenbs" name="tenbs"  value="<?php  echo $q->luachon("select tenbs from bacsi where tenbs='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="usename" name="usename"  value="<?php  echo $q->luachon("select username from bacsi where tenbs='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="email" name="email" value="<?php  echo $p->luachon("select email from bacsi where tenbs='$ten' limit 1");?>">
                                        <span id="error-email" class="text-danger"  style="font-size: 13px;"></span>
                                    
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="pass" name="pass"  value="<?php  echo $q->luachon("select password from bacsi where tenbs='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               
                             
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="">
                                            <input type="date" class="form-control " id="ngaysinh" name="ngaysinh"  value="<?php  echo $p->luachon("select ngaysinh from bacsi where tenbs='$ten' limit 1");?>">
                                            <span id="error-ngaysinh" class="text-danger"  style="font-size: 13px;"></span>
                                        
                                        </div>
                                    </div>
                                </div>
                              <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Giới tính:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nam" <?php if( $p->luachon("select gioitinh from bacsi where tenbs='$ten' limit 1")=="Nam"){ echo"checked";}?>/>Nam
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nữ" <?php if( $p->luachon("select gioitinh from bacsi where tenbs='$ten' limit 1")=="Nữ"){ echo"checked";}?>/>Nữ
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Địa chỉ</label>
												<input type="text" class="form-control" id="diachi" name="diachi"  value="<?php  echo $p->luachon("select diachi from bacsi where tenbs='$ten' limit 1");?>">
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="tel" id="sdt" name="sdt"  value="0<?php  echo $p->luachon("select sdt from bacsi where tenbs='$ten' limit 1");?>">
                                        <span id="error-sdt" class="text-danger"  style="font-size: 13px;"></span>

                                    </div>
                                </div>
                               <div class="col-sm-6">
							<div class="form-group">
                                <label>Chuyên khoa</label>&nbsp;&nbsp;
                             
                                 <?php
								 $idck = $p->luachon("select idck from bacsi where tenbs='$ten' limit 1");
								 $p->loadcombo_chuyenkhoa("select id, tenck from chuyenkhoa order by id asc",$idckhoa);
								 
								 ?>
								 <label for="txtid"></label>    
								  <input class="form-control" type="hidden" name="txtid" id="txtid" value="<?php  echo $layid ;?>" />
    
                            </div>
                            </div>
                             <div class="col-sm-6">
                             <div class="form-group">
                                <label>Phân quyền</label>
                                <input class="form-control" type="text" id="phanquyen" name="phanquyen" readonly value="<?php echo $phanquyen ;?>"/>
                            </div>
                            </div>
                             <div class="col-sm-6">
                             <div class="form-group">
                                <label>Chức vụ</label>
                                <input class="form-control" type="text" id="chucvu" name="chucvu" readonly	 value="<?php  echo $chucvu ;?>"/>
                            </div>
                            </div>
                             <div class="col-sm-12">
                            <div class="form-group">
                                <label>Lĩnh vực</label>
                                <textarea class="form-control" rows="3" cols="30" id="linhvuc" name="linhvuc"><?php  echo $p->luachon("select linhvuc from bacsi where tenbs='$ten' limit 1");?></textarea>
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                               <button class=" btn btn-primary submit-btn text-light"><a href="index.php" class="text-light">Quay lại</button>
                        </div>
                            </div>
                            <div class="col-sm-6 text-center">
                            <div class="form-group">
                                <input type="submit"  class="btn btn-primary submit-btn"  name="sua" value="Cập nhật"/>
                            </div>
                         </div>
                         <?php

	switch ($_POST['sua'])
	{
		case'Cập nhật':
	{
		$idsua=$_REQUEST['id'];
		$idckhoa=$_REQUEST['chuyenkhoa'];
		$tenbs=$_REQUEST['tenbs'];
		$usename =$_REQUEST['usename'];
		$pass=$_REQUEST['pass'];
		$gioitinh=$_REQUEST['gioitinh'];
		$ngaysinh =$_REQUEST['ngaysinh'];
		$sdt=$_REQUEST['sdt'];
		$phanquyen=$_REQUEST['phanquyen'];
		$chucvu=$_REQUEST['chucvu'];
		$linhvuc =$_REQUEST['linhvuc'];
		$email=$_REQUEST['email'];
		$diachi=$_REQUEST['diachi'];
		if($sdt!='')
		{		
			if($tenbs!='')		  
		  			{
				 if($p->themxoasua("update bacsi set tenbs='$tenbs', gioitinh='$gioitinh', ngaysinh='$ngaysinh', username='$usename',password= '$pass', sdt='$sdt', linhvuc='$linhvuc', chucvu='$chucvu', email='$email', diachi='$diachi', phanquyen='$phanquyen', idck='$idckhoa' where tenbs='$ten' limit 1 ")==1
				 and $p->themxoasua("update taikhoan set ten='$tenbs', username='$usename', password='$pass',phanquyen='$phanquyen' where ten='$tenbs'")==1)
				
				{	
					echo '<script language="javascript">alert("Cập nhật thành công!"); </script>';
					echo header('location:doctor.php');
					}
				else
				{
					 echo' Cập nhật không thành công';
					
				}
			}
			else
			
		{echo 'Vui lòng nhập đầy đủ';
			}
		}

	break;
	
	}
}
?>
</form>
</div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="./assets/js/validate.js"></script>

 <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>
