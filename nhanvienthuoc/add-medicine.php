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
    <title>Quản lý thuốc</title>
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Thêm thuốc</h4>
                    </div>
                </div>
                <div class="row">
 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">
                       
                            <div class="row">
                            
<div class="col-sm-6">
 			<?php $idloai = $p->luachon("select idloai from thuoc where id='$layid' limit 1 ");?>
            <div class="form-group">
                <label for="title"> Loại thuốc:</label>
                <select  name="loai" class="form-control" style="width:350px">
                       
                <option><?php  echo $p->luachon("select loaithuoc.tenloaithuoc from loaithuoc, thuoc where loaithuoc.id=thuoc.idloai && thuoc.id='$layid'");?></option>
                
                    <?php
                        require('./assets/db_config.php');
                        $sql = "SELECT * FROM loaithuoc "; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenloaithuoc']."</option>";
                        }
                    ?>


                
                </select>
            </div>
            </div>         
            <div class="col-sm-6">
             <div class="form-group">
                    <label>Tên thuốc</label>
                    <input class="form-control" type="text" id="tenthuoc" name="tenthuoc" />
                    <span id="error-tenthuocc" class="text-danger" style="font-size: 13px;"></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                        <label>Hoạt chất</label>
                        <input class="form-control" type="text" id="hoatchat" name="hoatchat" />
                
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Công dụng</label>
                        <input class="form-control" type="text" id="congdung" name="congdung" />
                
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Ngày sản xuất</label>
                        <input class="form-control" type="date" id="ngaysx" name="ngaysx" />
                
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Hạn dùng</label>
                        <input class="form-control" type="text" id="handung" name="handung" />
               
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Thương hiệu</label>
                        <input class="form-control" type="text" id="thuonghieu" name="thuonghieu"/>
             
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Nhà sản xuất</label>
                        <input class="form-control" type="text" id="nhasx" name="nhasx"/>
               
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Nơi sản xuất</label>
                        <input class="form-control" type="text" id="noisx" name="noisx" />
                <span id="error-xuatxu" class="text-danger" style="font-size: 13px;"></span>
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Đối tượng sử dụng</label>
                        <input class="form-control" type="text" id="doituongsd" name="doituongsd"/>
                
                    </div>
            </div>
           
            <div class="col-sm-6">
                <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" type="text" id="gia" name="gia" />
                <span id="error-gia" class="text-danger" style="font-size: 13px;"></span>
                    </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                        <label>Đơn vị tính</label>
                        <input class="form-control" type="text" id="donvitinh" name="donvitinh" />
                
                    </div>
            </div>
           <div class="col-sm-6">
                <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" type="text" id="sl" name="sl" />
                
                    </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                        <label>Số đăng ký</label>
                        <input class="form-control" type="text" id="sodangky" name="sodangky" />
                
                    </div>
            </div>
             </div>
                            <div class="m-t-20 text-center">                               
                                <input type="submit"  class="btn btn-primary submit-btn"  id="them" name="them" value="Thêm thuốc"/>
                            </div>
   <?php

	switch ($_POST['them'])
	{
		
		case'Thêm thuốc':
	{	$id= $_REQUEST['id'];
		$loai = $_REQUEST['loai'];
		$tenthuoc =$_REQUEST['tenthuoc'];
		$hoatchat =$_REQUEST['hoatchat'];
		$congdung =$_REQUEST['congdung'];
		$ngaysx =$_REQUEST['ngaysx'];
		$handung =$_REQUEST['handung'];
		$thuonghieu =$_REQUEST['thuonghieu'];
		$nhasx =$_REQUEST['nhasx'];
		$noisx =$_REQUEST['noisx'];
		$doituongsd =$_REQUEST['doituongsd'];
		$sodangky =$_REQUEST['sodangky'];
		$gia =$_REQUEST['gia'];
		$donvitinh =$_REQUEST['donvitinh'];
		$sl =$_REQUEST['sl'];
		if($tenthuoc!=''&& $donvitinh!='')
		{		
				 if($p->themxoasua("INSERT INTO thuoc(tenthuoc,idloai,hoatchat,congdung,ngaysx,handung,thuonghieu,nhasx,noisx,doituongsd,sodangky,gia,donvitinh,sl) VALUES ('$tenthuoc','$loai','$hoatchat','$congdung','$ngaysx','$handung','$thuonghieu','$nhasx','$noisx','$doituongsd','$sodangky','$gia','$donvitinh','$sl')")==1)
{	
					echo '<script >alert("Thêm thành công!"); window.location="medicine.php";</script>';
					
					}
	
				else
				{
					echo' Tạo không thành công';
				}
		}
			else
			
		{echo 'Vui lòng nhập đầy đủ';
			}
		}

	break;
	
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
