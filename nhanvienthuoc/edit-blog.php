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
$phanquyen=$q->luachon("select phanquyen from nhanvien limit 1");
$chucvu=$q->luachon("select chucvu from nhanvien limit 1");
include('./assets/qlblog.php');
$p = new qlblog();
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
    <title>Sửa bài viết</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
                        <h4 class="page-title">Chỉnh sửa bài viết</h4>
                    </div>
                </div>
               
 			 
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form enctype="multipart/form-data" method="post">
                        	<?php $id_danhmuc = $p->luachon("select id_danhmuc from tintuc where id='$layid' limit 1 ");?>
            <div class="form-group">
                <label for="title"> Danh mục:</label>
                <select  name="danhmuc" class="form-control" style="width:350px">
                       
                <option><?php  echo $p->luachon("select danhmuc.tendanhmuc from danhmuc, tintuc where danhmuc.id=tintuc.id_danhmuc && tintuc.id='$layid'");?></option>
                
                    <?php
                        require('./assets/db_config.php');
                        $sql = "SELECT * FROM danhmuc "; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tendanhmuc']."</option>";
                        }
                    ?>


                
                </select>
            </div>
                  
                            <div class="form-group">
                                <label>Tên tin tức</label>
                                <input class="form-control" type="text" id="tentintuc" name="tentintuc" value="<?php  echo $p->luachon("select tentintuc from tintuc where id='$layid' limit 1");?>"/>
                            </div>
                            <div class="form-group">
                                <label>Tên tiêu đề</label>
                                <input class="form-control" type="text" id="tieude" name="tieude" value="<?php  echo $p->luachon("select tieude from tintuc where id='$layid' limit 1");?>"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Hình ảnh</label>
                               
                                   <div class="upload-input">
												<label for="myfile"></label>
    											<input  type="file" class="form-control" name="myfile" id="myfile"/><?php  echo $p->luachon("select anh from tintuc where id='$layid' limit 1");?>
							</div>
                            </div>
                            
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea cols="30" rows="6" class="form-control" id="noidung" name="noidung"><?php  echo $p->luachon("select noidung from tintuc where id='$layid' limit 1");?></textarea>
                            </div>
                           <div class="form-group">
                                <label>Người đăng</label>
                                <input class="form-control" type="text" id="nguoidang" name="nguoidang" readonly value="<?php  echo $p->luachon("select nguoidang from tintuc where id='$layid' limit 1");?>"/>
                            </div>
                            <div class="m-t-20 text-center">
                                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="capnhat" name="capnhat" value="Cập nhật bài viết"/>
                            </div>
 <?php

	switch ($_POST['capnhat'])
	{
		case'Cập nhật bài viết':
	{	
		$idsua=$_REQUEST['id'];
		$tentintuc =$_REQUEST['tentintuc'];
		$noidung=$_REQUEST['noidung'];
		$danhmuc =$_REQUEST['danhmuc'];
		$tieude =$_REQUEST['tieude'];
		$name=$_FILES['myfile']['name'];
		$type=$_FILES['myfile']['type'];
		$size=$_FILES['myfile']['size'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		
		if($name!='' && $tentintuc!='')
		{						
			$name=time()."_".$name;
			if($p->uploadfile($name,$tmp_name,"../Admin/assets/img")==1)
			{
			  	if($idsua>0)		  
		  			{
				  if($p->themxoasua("UPDATE tintuc set tentintuc='$tentintuc',tieude='$tieude', id_danhmuc='$danhmuc', noidung='$noidung', anh='$name' where id='$idsua' limit 1")==1)
			  			{
				 			 echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="myblog.php";</script>';
				  		}
					else
						{
					echo '<script language="javascript">alert("Cập nhật không thành công!");';
						}
			 		 }
			  else
			  		{
				 echo '<script language="javascript">alert("Cập nhật không thành công!");';
			  		}
			}
		 else
		 {
			 echo '<script language="javascript">alert("Vui lòng chọn file!");';
			 }
		}
		else{
			 echo '<script language="javascript">alert("Vui lòng điền đầy đủ!");';
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
    <script src="assets/js/tagsinput.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>