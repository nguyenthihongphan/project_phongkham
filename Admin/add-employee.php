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
	header('location: index.php');
	}
$iduser=$_SESSION['id'];
$layid = $_SESSION['id'];
$ten=$q->luachon("select ten from taikhoan where id='$iduser' limit 1");
$phanquyen=$q->luachon("select phanquyen from nhanvien limit 1");
$chucvu=$q->luachon("select chucvu from nhanvien limit 1");
include('./assets/qlnv.php');
$p = new qlnv();
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
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo" >
                <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
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
                    <li >
                        <a href="employees.php"><i class="fa-solid fa-clipboard-user"></i> <span> Nhân viên </span></a>
                    </li>
                    <li>
                        <a href="patients.php"><i class="fa fa-users"></i> <span>Bệnh nhân</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-calendar"></i> <span> Lịch khám</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="appointments.php">Lịch hẹn khám</a></li>
                            <li><a href="hisappointment.php">Lịch đã khám</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Lịch trình bác sĩ</span></a>
                    </li>
                    <li>
                        <a href="hosobenhan.php"><i class="fa fa-file"></i> <span>Hồ sơ bệnh án</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-commenting-o"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="blog.php">Bài viết</a></li>
                            <li><a href="duyet_blog.php">Duyệt bài đăng</a></li>
                            <li><a href="add-blog.php">Thêm bài viết</a></li>
                            <li><a href="edit-blog.php">Sửa bài viết</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="thongke.php"><i class="fa-solid fa-chart-simple"></i><span> Thống kê </span></a>
                    </li>
                    
                    
                    <li >
                        <a href="reset.php"><i class="fa fa-lock"></i><span> Reset mật khẩu</span></a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
        <div class="page-wrapper">
            <div class="content">
                
                <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Ngày hôm nay :
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right">
                            <?php 
                            $dem=1;
                        $today = date('Y-m-d');
                        echo $today;
                        ?>
                        </p>
                    </td>               
                </tr>  
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Thêm nhân viên</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
             <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">
                       
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Họ và tên<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="ten" name="tennv" >
                                        <span id="error-ten" class="text-danger" style="font-size: 13px;"></span>          
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="usename" name="usename"  value="<?php  echo $q->luachon("select username from nhanvien where id='$layid' limit 1");?>">
                                        <span id="error-username" class="text-danger" style="font-size: 13px;"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email">
                                        <span id="error-email" class="text-danger" style="font-size: 13px;"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="password" name="pass"  value="<?php  echo $q->luachon("select password from nhanvien  where id='$layid' limit 1");?>">
                                        <span id="error-password" class="text-danger" style="font-size: 13px;"></span>
                                    </div>
                                </div>
                                
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="">
                                            <input type="date" class="form-control" name="ngaysinh" >
                                            <span id="error-ngaysinh" class="text-danger" style="font-size: 13px;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Giới tính:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" checked  class="form-check-input" id="gioitinh" name="gioitinh" value="Nam">Nam
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio"  class="form-check-input" id="gioitinh" name="gioitinh" value="Nữ">Nữ
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Địa chỉ</label>
												<input type="text" class="form-control" id="diachi" name="diachi" >
                                                <span id="error-diachi" class="text-danger" style="font-size: 13px;"></span>
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="tel" id="sdt" name="sdt" >
                                        <span id="error-sdt" class="text-danger" style="font-size: 13px;"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Ảnh đại diện</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="assets/img/user.jpg">
											</div>
											<div class="upload-input">
												<label for="myfile"></label>
    											<input  type="file" class="form-control" name="myfile" id="myfile"/>

											</div>
										</div>
									</div>
                                    </div>
                             <div class="col-sm-6">
							
                             <div class="form-group">
                                <label>phan quyen</label>
                                <input class="form-control" type="text" id="phanquyen" name="phanquyen" readonly value="<?php echo $phanquyen ;?>"/>
                            </div>
                           </div>
                            <div class="col-sm-6">
                             <div class="form-group">
                                <label>Chức vụ</label>
                                <input class="form-control" readonly type="text" id="chucvu" name="chucvu" value="<?php echo $chucvu ;?>"/>
                            </div>
                           </div>
                           
                            
                            <div class="m-t-20 text-center">
                               
                                <input type="submit"   class="btn btn-primary submit-btn" data-dismiss="modal" id="them" name="them" value="Tạo nhân viên"/>
                            </div>
   <?php

	switch ($_POST['them'])
	{
		case'Tạo nhân viên':
	{	
		$tennv=$_REQUEST['tennv'];
		$usename =$_REQUEST['usename'];
		$pass =$_REQUEST['pass'];
		$gioitinh=$_REQUEST['gioitinh'];
		$ngaysinh =$_REQUEST['ngaysinh'];
		$sdt=$_REQUEST['sdt'];
		$chucvu = $_REQUEST['chucvu'];
		$phanquyen =$_REQUEST['phanquyen'];
		$email=$_REQUEST['email'];
		$diachi=$_REQUEST['diachi'];
		$name=$_FILES['myfile']['name'];
		$type=$_FILES['myfile']['type'];
		$size=$_FILES['myfile']['size'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		if($name!='' && $tennv!='')
		{		$name=time()."_".$name;
			if($p->uploadfile($name,$tmp_name,"assets/img")==1)
		{		
			
				if($p->themxoasua("INSERT INTO nhanvien( password,username,anh,tennv,gioitinh,ngaysinh,sdt,chucvu,email,diachi,phanquyen) VALUES (MD5('$pass'),'$usename','$name','$tennv','$gioitinh','$ngaysinh','$sdt','$chucvu' ,'$email','$diachi','$phanquyen')")==1) if($p->themxoasua("insert into taikhoan (ten,username, password,phanquyen) values('$tennv','$usename',MD5('$pass'),'$phanquyen')")==1)
				{	
					echo '<script >alert("Thêm thành công!"); window.location="employees.php";</script>';
					
					}
				else
				{
					echo' Tạo không thành công';
				}
			
		}
		else
			
		{echo 'upload không thành công';
			}
			}
			else
			
		{echo ' <span class="text-danger">Vui lòng nhập đầy đủ thông tin</span>';
			}

	break;
	
	}
}
?>
 </form>
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
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../assets/js/validate.js"></script>
	
</body>


<!-- add-employee24:07-->
</html>
