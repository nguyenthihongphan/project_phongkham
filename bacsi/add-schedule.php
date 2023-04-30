<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("../Admin/assets/login_tmd.php");
	include('db-connect.php');
	$q= new login();
	$bs= new loginbs();
	$bs->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:../Admin/login.php');
	}
include("../Admin/assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$bs->luachon("SELECT bacsi.tenbs from bacsi where id='$iduser' limit 1");
$idbs=$bs->luachon("SELECT bacsi.id from bacsi where id='$iduser' limit 1");
$idck=$bs->luachon("select idck from bacsi inner join chuyenkhoa on bacsi.idck =chuyenkhoa.id where tenbs='$ten'");


?>

<!DOCTYPE html>
<html lang="en">
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


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Lịch trình của tôi</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css" href="../Admin/assets/css/style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="datepicker/jquery-ui.css">
<script src="datepicker/jquery-1.10.2.js"></script>
<script src="datepicker/jquery-ui.js"></script>
</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" width="300px">
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
    <?php 
                                date_default_timezone_set('Asia/ho_chi_minh');       
                                $today = date('Y-m-d');
                                echo $today;
                        ?>
 <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 offset-lg-2">
                        <h4 class="page-title">Thêm lịch trình</h4>
                    </div>
                </div>
                 <form name="frm_book_a_slot" enctype="multipart/form-data" method="post" >
                                <div class="row">                 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Số lượng khám <span class="text-danger">*</span></label>
                                        <input class="form-control"  type="number" id="soluong" name="soluong">
                                    </div>
                                </div>
                   
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Chọn ngày<span class="text-danger">*</span></label>
                                 <input type="date" name="ngaykham" id="ngaykham" class=" form-control">
                                               
                                                </div>
                                              </div> 
                                              <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Giờ bắt đầu<span class="text-danger">*</span></label>
                                                 <input type="text" name="giobatdau" id="request_time"   class="form-control" onkeydown="return false" >                                                
                                    </div>
                                    </div>                              
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Giờ kết thúc<span class="text-danger">*</span></label>
                                                 <input type="text" name="gioketthuc" id="request_time1"   class="form-control" onkeydown="return false" >
                                                 <br><br>
                                    </div>
                                    </div>
                                </div>                                                                          		
									<input type="submit" name="submit" id="btn_submit" style="color:#fff" value="Tạo lịch trình" class="btn btn-success">                 
</br>
</br> 
            <?php
  	switch ($_POST['submit'])
	{
		
		case'Tạo lịch trình':
	{	

		$request_times =$_REQUEST['giobatdau'];
		$request_timee=$_REQUEST['gioketthuc'];
		$request_date =$_REQUEST['ngaykham'];
		$soluong =$_REQUEST['soluong'];
		
		if($soluong!='')
		{		
            if($request_date>$today)
            {
				if($q->themxoasua("INSERT INTO lichtrinh(idck,idbs,ngaykham,giobatdau,gioketthuc,soluong) VALUES ('$idck' ,'$idbs','$request_date','$request_date $request_times','$request_date $request_timee','$soluong')")==1)
				{	
					echo '<script >alert("Thêm thành công!"); window.location="schedule.php";</script>';
					
					}
				else
				{
					echo' Tạo không thành công';
				}
            }
            else
            {
                echo' <span class="text-danger">Chọn lịch lớn hơn ngày hôm nay</span>';
            }
        }
			else
			
		{echo ' <span class="text-danger">Vui lòng nhập đầy đủ</span>';
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
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/select2.min.js"></script>
	<script src="../Admin/assets/js/moment.min.js"></script>
    <script src="../Admin/assets/js/app.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" integrity="sha512-WlaNl0+Upj44uL9cq9cgIWSobsjEOD1H7GK1Ny1gmwl43sO0QAUxVpvX2x+5iQz/C60J3+bM7V07aC/CNWt/Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</body>
<!-- Date -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script>
  $(document).ready(function(){
$('#request_time').timepicker({
    timeFormat: 'H:mm:ss p',
    interval: 60,
    minTime: '08',
    maxTime: '13:00pm',
    defaultTime: '08',
    startTime: '08:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
    });
    $('#request_time1').timepicker({
    timeFormat: 'H:mm:ss p',
    interval: 60,
    minTime: '14',
    maxTime: '22:00pm',
    defaultTime: '14',
    startTime: '14:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
    });
    
    
    $("#ngaykhaam").datepicker({
      numberOfMonths: 1,
      showButtonPanel: true,
      dateFormat: 'Y-m-d',
      
    });
    });
        
</script>
</html>

  