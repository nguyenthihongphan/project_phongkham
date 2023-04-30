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
include('./assets/qllt.php');
include("../Admin/assets/db_config.php");
$p = new qllt();
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
    <title>Thêm lịch trình</title>
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
                        $lichtrinh =$mysqli->query("select lichtrinh.id,chuyenkhoa.tenck,bacsi.tenbs,lichtrinh.ngaykham,TIME(lichtrinh.gioketthuc) AS gioketthuc, TIME(lichtrinh.giobatdau) AS  giobatdau from lichtrinh inner join chuyenkhoa on lichtrinh.idck=chuyenkhoa.id inner join bacsi on lichtrinh.idbs=bacsi.id where lichtrinh.ngaykham>='$today'order by lichtrinh.idck asc ");
                        ?>
                        </p>
                    </td>               
                </tr>  
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Thêm lịch trình</h4>
                    </div>
                </div>
                <div class="row">
                 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">                      
                            <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group">
                <label for="title">Chuyên khoa:</label>
                <select name="bchuyenkhoa" class="form-control chuyenkhoa">
                    <option value="">--- Chọn chuyên khoa ---</option>
                    <?php
                        require('./assets/db_config.php');
                        $sql = "SELECT * FROM chuyenkhoa"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenck']."</option>";
                        }
                    ?>
                </select>
            </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
                <label for="title">Bác sĩ:</label>
                <select name="bbacsi" class="form-control" style="width:350px">
                <option>Chọn bác sĩ</option>
                </select>
            </div>             
            </div>
            <div class="col-sm-6 row">
            <div class="col-md-6">
                    <div class="form-group">
                    <label>Số lượng khám</label>                   
                <input class="form-control" type="text" id="soluong" name="soluong" />
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                <label>Ngày khám</label>
                <input class="form-control" type="date" id="ngaykham" name="ngaykham" />
                <span id="error-ngaykham" class="text-danger" style="font-size: 13px;"></span>
            </div>
            </div>
            </div>
            <div class="col-md-6 row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Thời gian từ</label>                   
                <input class="form-control" type="text" id="giobatda" name="giobatdau" />
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label>đến</label>
                    <input class="form-control" type="text" id="gioketthu" name="gioketthuc" />
                </div>
                </div>
            </div>
            <?php
	switch ($_POST['them'])
	{		
		case'Tạo lịch trình':
	{	
		$tenck= $_REQUEST['bchuyenkhoa'];
		$tenbs=$_REQUEST['bbacsi'];		
		$ngaykham =$_REQUEST['ngaykham'];
		$giobatdau =$_REQUEST['giobatdau'];
		$gioketthuc =$_REQUEST['gioketthuc'];	
        $soluong =$_REQUEST['soluong'];	
		
		if($ngaykham!='' && $soluong!='')
		{		
				if($p->themxoasua("INSERT INTO lichtrinh(idck,idbs,ngaykham,giobatdau,gioketthuc,soluong) VALUES ('$tenck' , '$tenbs', '$ngaykham', '$ngaykham $giobatdau', '$ngaykham $gioketthuc','$soluong')")==1)
				{	
					echo '<script >alert("Thêm thành công!"); window.location="schedule.php";</script>';					
					}
				else
				{
					echo' Tạo không thành công';
				}			
		}		
			else			
		{echo '<span class="text-danger">Vui lòng nhập đầy đủ thông tin</span>';
			}
	break;	
	}
}
?>
            <div class="m-t-20 text-center">                              
                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="them" name="them" value="Tạo lịch trình"/>
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
    <!--Datepicker  -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<!-- timepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="./assets/js/timepicker.js"> </script>
<script type="text/javascript">
$(document).ready(function()
{
$("select[name='bchuyenkhoa']").change(function()
{
var idck=$(this).val();
var post_id = 'id='+ idck;

$.ajax
({
        type: "POST",
        url: "ajax.php",
        data: post_id,
        cache: false,
        success: function(datas)
        {
        $("select[name='bbacsi']").html(datas);
        } 
        });
    });
});
</script>
</body>

</html>
