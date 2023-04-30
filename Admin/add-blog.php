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
$phanquyen=$q->luachon("select phanquyen from bacsi limit 1");
$chucvu=$q->luachon("select chucvu from bacsi limit 1");
include('./assets/qlblog.php');
$p = new qlblog();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
	
                                date_default_timezone_set('Asia/ho_chi_minh');
        
                                $today = date('Y-m-d');
                                echo $today;
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Thêm bài viết</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/tagsinput.css">
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
                        <h4 class="page-title">Thêm bài viết</h4>
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
                                <input class="form-control" name="tentintuc" type="text">
                            </div>
                            <div class="form-group">
                                <label>Tên tiêu đề</label>
                                <input class="form-control" name="tieude" type="text">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <div>
                                    <input  class="form-control" name="myfile" type="file">
                                    <small class="form-text text-muted">Tối đa kích thước tệp: 50 MB. Hình ảnh được phép: jpg, gif, png. Chỉ tối đa 10 hình ảnh.</small>
                                </div>
                                
                            </div>
                           
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea cols="30" rows="6" name="noidung" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ngày đăng</label>
                                <input class="form-control" name="ngaydang" type="date" value="<?php  echo $today ?>">
                            </div>
                            <div class="form-group">
                                <label>Người đăng</label>
                                <input class="form-control" name="nguoidang" readonly type="text" value="<?php  echo $ten ?>">
                            </div>
                           
                             <div class="m-t-20 text-center">
                                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="them" name="them" value="Thêm bài viết"/>
                            </div>
                             <?php

	switch ($_POST['them'])
	{
		case'Thêm bài viết':
	{	
		
		$tentintuc =$_REQUEST['tentintuc'];
		$tieude= $_REQUEST['tieude'];
		$noidung=$_REQUEST['noidung'];
		$danhmuc =$_REQUEST['danhmuc'];
		$nguoidang =$_REQUEST['nguoidang'];
		$ngaydang =$_REQUEST['ngaydang'];
		$name=$_FILES['myfile']['name'];
		$type=$_FILES['myfile']['type'];
		$size=$_FILES['myfile']['size'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		
		if($name!='' && $tentintuc!='')
		{						
			$name=time()."_".$name;
			if($p->uploadfile($name,$tmp_name,"assets/img")==1)
			{
			  	
				  if($p->themxoasua("INSERT INTO tintuc(tentintuc,tieude,id_danhmuc,noidung,anh,nguoidang,ngaydang,tinhtrang) VALUES ('$tentintuc','$tieude','$danhmuc','$noidung', '$name', '$nguoidang', '$ngaydang',1)")==1)
			  			{
				 			echo '<script >alert("Thêm thành công!"); window.location="blog.php";</script>';
					
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
			
		{echo 'Vui lòng nhập đầy đủ';
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