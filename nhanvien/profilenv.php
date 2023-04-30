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
                <form enctype="multipart/form-data" method="post">
                        <h4 class="page-title">Thông tin cá nhân</h4>             
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                       <section class="text-center"  style="padding:0;">
                  <img style="border-radius:50%; width:200px; height:200px; oject-fit: cover" class="porfile-pic" src="../Admin/assets/img/<?php echo $q->luachon("select anh from nhanvien where tennv='$ten' limit 1");?>" alt="">
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
                                        <input class="form-control" type="text" id="username" name="username"  value="<?php  echo $q->luachon("select username from nhanvien where tennv='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="email" name="email" value="<?php  echo $q->luachon("select email from nhanvien where tennv='$ten' limit 1");?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="pass" name="pass"  value="<?php  echo $q->luachon("select password from nhanvien where tennv='$ten' limit 1");?>" >
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="">
                                            <input type="date" class="form-control " id="ngaysinh" name="ngaysinh"  value="<?php  echo $q->luachon("select ngaysinh from nhanvien where tennv='$ten' limit 1");?>">
                                        </div>
                                    </div>
                                </div>
                              <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Giới tính:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nam" <?php if( $q->luachon("select gioitinh from nhanvien where tennv='$ten' limit 1")=="Nam"){ echo"checked";}?>/>Nam
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nữ" <?php if( $q->luachon("select gioitinh from nhanvien where tennv='$ten' limit 1")=="Nữ"){ echo"checked";}?>/>Nữ
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Địa chỉ</label>
												<input type="text" class="form-control" id="diachi" name="diachi"  value="<?php  echo $q->luachon("select diachi from nhanvien where tennv='$ten' limit 1");?>">
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="tel" id="sdt" name="sdt"  value="0<?php  echo $q->luachon("select sdt from nhanvien where tennv='$ten' limit 1");?>">
                                    </div>
                                </div>
                              
                             <div class="col-sm-6">
                             <div class="form-group">
                                <label>Chức vụ</label>
                                <input class="form-control" type="text" id="chucvu" name="chucvu" readonly	 value="<?php echo $q->luachon("select chucvu from nhanvien where tennv='$ten' limit 1");?>"/>
                            </div>
                            </div>
                            
                                <input class="form-control" hidden type="text" id="phanquyen" name="phanquyen" readonly	 value="<?php echo $q->luachon("select phanquyen from nhanvien where tennv='$ten' limit 1");?>"/>
                          
                                <div class="col-sm-6">
                            <div class="form-group">
                            <div class="m-t-20 text-center">
                               
                               <input type="submit"  class="btn btn-primary submit-btn"  name="sua" value="Cập nhật"/>
                           </div>
                            </div>
                            </div>
                        </div>    
        <?php 
switch ($_POST['sua'])
{
    case'Cập nhật':
{
    $idsua=$_REQUEST['id'];
    $username =$_REQUEST['username'];
    $tennv =$_REQUEST['tennv'];
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
             if($q->themxoasua("update nhanvien set tennv='$tennv', gioitinh='$gioitinh', ngaysinh='$ngaysinh', username='$username',password='$pass', sdt='$sdt', chucvu='$chucvu', email='$email', diachi='$diachi', phanquyen='$phanquyen' where tennv='$ten' limit 1 ")==1)
            //  and $q->themxoasua("update taikhoan set ten='$tennv', username='$username', password=$pass',phanquyen='$phanquyen' where ten='$tennv'")==1)
            
            {	
                echo '<script language="javascript">alert("Cập nhật thành công!"); </script>';
               echo header('location:profilenv.php');
                }
            else
            {
                echo' <b style="color:red;font-size:16px;font-family:calibri ;">Cập nhật không thành công</b>';
             
            }
        }
        else
        
    {
        echo '<b style="color:red;font-size:16px;font-family:calibri ;">
        Vui lòng nhập đầy đủ thông tin! </b>';
        }
    }

break;

}
}
?>
                           </div>

</form>
</div>
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