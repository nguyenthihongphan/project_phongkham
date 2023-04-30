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
$ten=$q->luachon("SELECT tennv FROM nhanvien where id='$iduser' limit 1 ");
include('./assets/qlthuoc.php');
include("assets/db_config.php");
$p = new qlthuoc();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
	$medicinerow = $mysqli->query("select  * from  thuoc ");
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
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
                <a href="index.php" class="logo">
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
                        <a href="donthuoc.php"><i class="fa-solid fa-receipt"></i><span> Đơn thuốc</span></a>
                    </li>
                   
                    <li class="submenu">
                        <a href="#"><i class="fa-solid fa-capsules"></i> <span> Thuốc</span> <span class="menu-arrow"></span></a>
                         <ul style="display: none;">
                       	 	<li><a href="danhmucthuoc.php">Danh mục thuốc</a></li>
                            <li><a href="medicine.php">Thuốc</a></li>
                            <li><a href="add-medicine.php">Thêm thuốc</a></li>
                            <li><a href="edit-medicine.php">Cập nhật thuốc</a></li>
                        </ul>
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
                        <a href="profile.php"><i class="fa fa-user"></i><span> Thông tin cá nhân</span></a>
                    </li>
                     <li>
                        <a href="thongke.php"><i class="fa fa-database"></i><span> Thống kê </span></a>
                    </li>
                    <li>
                        <a href="lichsuthanhtoan.php"><i class="fa fa-money"></i><span> Thanh toán</span></a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
 				<form enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Thông tin cá nhân</h4>
                    </div>
                </div>
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                       <section class="text-center"  style="padding:0;">
                  <img style="border-radius:50%; width:200px; height:200px; oject-fit: cover" class="porfile-pic" src="assets/img/<?php echo $anh; ?>" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form enctype="multipart/form-data" method="post">
                           <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Họ và tên<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="tennv" name="tennv"  value="<?php  echo $q->luachon("select tennv from nhanvien where tennv='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="usename" name="usename"  value="<?php  echo $q->luachon("select username from nhanvien where tennv='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="email" name="email" value="<?php  echo $p->luachon("select email from nhanvien where tennv='$ten' limit 1");?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="pass" name="pass"  value="<?php  echo $q->luachon("select password from nhanvien where tennv='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               
                             
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="">
                                            <input type="date" class="form-control " id="ngaysinh" name="ngaysinh"  value="<?php  echo $p->luachon("select ngaysinh from nhanvien where tennv='$ten' limit 1");?>">
                                        </div>
                                    </div>
                                </div>
                              <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Giới tính:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nam" <?php if( $p->luachon("select gioitinh from nhanvien where tennv='$ten' limit 1")=="Nam"){ echo"checked";}?>/>Nam
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nữ" <?php if( $p->luachon("select gioitinh from nhanvien where tennv='$ten' limit 1")=="Nữ"){ echo"checked";}?>/>Nữ
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Địa chỉ</label>
												<input type="text" class="form-control" id="diachi" name="diachi"  value="<?php  echo $p->luachon("select diachi from nhanvien where tennv='$ten' limit 1");?>">
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="tel" id="sdt" name="sdt"  value="0<?php  echo $p->luachon("select sdt from nhanvien where tennv='$ten' limit 1");?>"/>
                                    </div>
                                </div>
                              
                             <div class="col-sm-6">
                             <div class="form-group">
                                <label>Phân quyền</label>
                                <input class="form-control" type="text" id="phanquyen" name="phanquyen" readonly value="<?php  echo $p->luachon("select phanquyen from nhanvien where tennv='$ten' limit 1");?>"/>
                            </div>
                            </div>
                             <div class="col-sm-6">
                             <div class="form-group">
                                <label>Chức vụ</label>
                                <input class="form-control" type="text" id="chucvu" name="chucvu" readonly	 value="<?php  echo $p->luachon("select chucvu from nhanvien where tennv='$ten' limit 1");?>"/>
                            </div>
                            </div>
                             
                             </div>
                            <div class="m-t-20 text-center">
                               
                                <input type="submit"  class="btn btn-primary submit-btn"  name="sua" value="Cập nhật"/>
                            </div>
                         
    <?php

	switch ($_POST['sua'])
	{
		case'Cập nhật':
	{
		$idsua=$_REQUEST['id'];
		$tennv=$_REQUEST['tennv'];
		$usename =$_REQUEST['usename'];
		$pass=$_REQUEST['pass'];
		$gioitinh=$_REQUEST['gioitinh'];
		$ngaysinh =$_REQUEST['ngaysinh'];
		$sdt=$_REQUEST['sdt'];
		$phanquyen=$_REQUEST['phanquyen'];
		$chucvu=$_REQUEST['chucvu'];
		$email=$_REQUEST['email'];
		$diachi=$_REQUEST['diachi'];
		if($sdt!='')
		{		
			if($tennv!='')		  
		  			{
				 if($p->themxoasua("update nhanvien set tennv='$tennv', gioitinh='$gioitinh', ngaysinh='$ngaysinh', username='$usename',password= '$pass', sdt='$sdt', chucvu='$chucvu', email='$email', diachi='$diachi', phanquyen='$phanquyen' where tennv='$ten' limit 1 ")==1
				 and $p->themxoasua("update taikhoan set ten='$tennv', username='$usename', password='$pass',phanquyen='$phanquyen' where ten='$tennv'")==1)
				
				{	
					echo '<script >alert("Cập nhật thành công!"); window.location="profile.php";</script>';
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
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/js/validate_medicine.js"></script>

	<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
				$('#datetimepicker4').datetimepicker({
                    format: 'LT'
                });
            });


</script>
</body>


<!-- edit-schedule24:07-->
</html>
