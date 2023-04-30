

<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass']))
{
	include("login_tmd.php");
	
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass']);
	}
else
{
	header('location:index1.php');
	}

$iduser=$_SESSION['id'];
$layid = $_SESSION['username'];
$ten=$q->luachon("select tenbn from benhnhan where id='$iduser' limit 1");
$idbn=$q->luachon("select id from benhnhan where id='$iduser' limit 1");
include("../Admin/assets/db_config.php");
date_default_timezone_set('Asia/ho_chi_minh');
        
$today = date('Y-m-d');
 $userrow = $mysqli->query("select * from benhnhan where username='$layid'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["id"];
    $username=$userfetch["tenbn"];

    $layid = $_GET["idlk"];
    ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lịch hẹn khám</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
 <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-3 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-5 col-md-5">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> phannguyen2246@gmail.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i>0374389835</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="inner-form">
                                <div class="input-field">
                                  <input class="form-control" id="choices-text-preset-values" type="text" placeholder="Tim kiem..." />
                                  <a><i class="ti-search btn-search"></i></a>             
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-1 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                      <img src="../Admin/assets/img/logo-dark.png" alt="" width="50px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-5">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index1.php">Trang chủ</a></li>
                                         <li class=" dropdown has-arrow">
                <a href="#" class="dropdown-toggle " data-toggle="dropdown">
Lịch hẹn khám
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" style="margin-left:5px" href="booking.php">Đặt lịch</a>
                     <a class="dropdown-item" style="margin-left:5px" href="appointment.php">Lịch hẹn của tôi</a>
                      <a class="dropdown-item" style="margin-left:5px" href="benhan.php?id=<?php echo $idbn?>">Bệnh án của tôi</a>
                </div>
            </li>
                                        <li><a href="about.php">Giới thiệu</a></li>                                                               
                                         <li><a href="blog.php">Tin tức</a></li>
                                         <li><a href="price.php">Bảng giá</a></li>
                                        <li><a href="doctors.php">Đội ngũ bác sĩ</a></li>
                                        <li><a href="contact.php">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="../Admin/assets/img/user.jpg" width="24">
                        <span class="status online"></span>
                    </span>
                    <span><?php echo $ten; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                    <a class="dropdown-item" href="profile.php?id=">Thông tin cá nhân</a>

                </div>
            </li>
        </ul>
        
    </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
<body>

                <div class="page-wrapper">
        
            <div class="content" >
                <div class="row " style="margin-right: 200px;">
                 <div class="col-md-12 " >             
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
            // today.setDate(today.getDate()+7);

                                $toda = mktime(0,0,0,date("m"), date("d")-1,date("Y"));
                                $today1=date('Y-m-d',$toda)

                                ?>
                                </p>
                            </td>       
                        </tr>
                 </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title"><b>Thay đổi lịch khám</b></h4>
                        <hr>
                    </div>
                </div>
              
                <div class="container">               
                 <form enctype="multipart/form-data" method="post" >
                 <div class="row col-md-12 center" >
                 <div class="col-md-2">                                                 
                <div class="form-group">
                <label>Mã lịch hẹn</label>
                <input type="text" readonly  class="form-control" name="" id="" value="<?php  echo $q->luachon("select lichkham.id from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.idbn='$idbn' AND lichkham.id='$layid' limit 1");?>">
           
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Ngày đặt khám </label>
                <input class="form-control" readonly type="text" value="<?php  echo $q->luachon("SELECT lichkham.lichngaykham from lichkham where lichkham.idbn='$idbn' AND lichkham.id='$layid'")?>" name="gio">                                    
                </div>
            </div>
            
                    <div class="col-md-6">                                                 
                <div class="form-group">
                <label>Họ tên bệnh nhân</label>
                <input type="text" readonly  class="form-control" name="tenbn" id="tenbn" value="<?php  echo $q->luachon("select benhnhan.tenbn from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.idbn='$idbn' AND lichkham.id='$layid' limit 1");?>">
           
            </div>
            </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                <label for="title">Chuyên khoa:</label>
                <input type="text" readonly  class="form-control" name="tenbn" id="tenbn" value="<?php  echo $q->luachon("select chuyenkhoa.tenck from lichkham inner join chuyenkhoa on lichkham.idck=chuyenkhoa.id where lichkham.idbn='$idbn' AND lichkham.id='$layid' limit 1");?>">
                <input type="text" hidden readonly  class="form-control" name="tenbn" id="tenbn" value="<?php  echo $idck= $q->luachon("select chuyenkhoa.id from lichkham inner join chuyenkhoa on lichkham.idck=chuyenkhoa.id where lichkham.idbn='$idbn' AND lichkham.id='$layid' limit 1");?>">
                
            </div>
</div>

<div class="col-md-6">
            <div class="form-group">
                <label for="title">Bác sĩ:</label>
                <select name="bacsi" class="form-control" >
                <option value="<?php  echo $idbs=$q->luachon("select bacsi.id from lichkham inner join bacsi on lichkham.idbs=bacsi.id where lichkham.id='$layid' limit 1");?>"><?php  echo $q->luachon("select bacsi.tenbs from lichkham inner join bacsi on lichkham.idbs=bacsi.id where lichkham.idbn='$idbn' AND lichkham.id='$layid' limit 1");?></option>
                    <option value="">--- Bác sĩ ---</option>
                    <?php
                        require('../nhanvien/assets/db_config.php');
                        $sql = "SELECT bacsi.id, bacsi.tenbs FROM bacsi inner join chuyenkhoa on bacsi.idck=chuyenkhoa.id where chuyenkhoa.id=$idck order by bacsi.id"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            
                            echo "<option value='".$row['id']."'>".$row['tenbs']."</option>";
                        }
                    ?>
                </select>
            </div>             
            </div>

            <div class="col-sm-6">
             <div class="form-group">
             <label for="title">Chọn ngày khám :</label>
                <select name="idlt"  class="form-control" >
                <!-- <option value="<?php  echo $q->luachon("SELECT lichtrinh.id, lichtrinh.ngaykham, TIME(lichtrinh.gioketthuc) AS gioketthuc,TIME(lichtrinh.giobatdau) AS giobatdau FROM lichtrinh inner join lichkham on lichtrinh.id = lichkham.idlt WHERE lichkham.idbn='$idbn' AND lichtrinh.idbs = '$idbs' AND lichkham.id='$layid'")?> "> -->
                <?php
                        require('../nhanvien/assets/db_config.php');
                        $sql="SELECT lichtrinh.ngaykham, TIME(lichtrinh.gioketthuc) AS gioketthuc,TIME(lichtrinh.giobatdau) AS giobatdau FROM lichtrinh inner join lichkham on lichtrinh.id = lichkham.idlt WHERE lichkham.idbn='$idbn' AND lichtrinh.idbs = '$idbs' AND lichkham.id='$layid'";
                         $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo '<option value="'.$row['id'].' ">'.$row['ngaykham'].' Từ '.substr($row['giobatdau'],0,5).' - '.substr($row['gioketthuc'],0,5).'</option>'; 

                        }
                    ?>
<!-- </option> -->
                </select>
            </div>
            </div>
          
            <div class="col-sm-3">
                <div class="form-group">
                <label>Chọn giờ khám cụ thể </label>
                <input class="form-control" type="text" class="giokham" id="time" name="giokham" />

            </div>
            </div>
           
            <div class="col-sm-3">
                <div class="form-group">
                <label>Phí dịch vụ (VNĐ)</label>
                <input class="form-control" readonly value="150000" type="text" id="phidichvu" name="phidichvu" />
              
            </div>
            </div>
              
            <div class="col-sm-6">
                <div class="form-group">
               
                <input class="form-control" hidden value="Chưa khám" placeholder="trangthai" type="text" id="trangthai" name="trangthai" />
              
            </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
               
                <input class="form-control" hidden value="Đã thanh toán" placeholder="trangthai" type="text" id="trangthaithanhtoan" name="trangthaithanhtoan" />
              
            </div>
            </div>
            <!-- <?php
            session_start();
$mytime = 120;
if(!isset($_SESSION['time']))
{
	$_SESSION['time'] = time();
	}
else{
	$diff = time()-$_SESSION['time'];
	$diff = $mytime-$diff;
	$hours = floor($diff/60);
	$minute = (int)($diff/60);
	$second = $diff%60;
	
	$show = "Thời gian còn lại: 0".$hour." giờ ".$minute." phút ".$second ." giây";
	
	if($diff==0 || $diff<0)
	{
		echo'<p style="margin-left:50px; font-size: 16px">Hết thời gian cập nhật</p>';
		}
		else{
			echo '<p style="margin-left:50px; font-size: 16px">'. $show.'</p>';
			}
}
?>
         -->
            <div class="col-md-6">                              
                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="sua" name="sua" value="Sửa lịch khám"/>
</div>
            
            <?php
	switch ($_POST['sua'])
	{		
		case'Sửa lịch khám':
	{	
        $idsua= $_REQUEST['id'];
		$tenck= $_REQUEST['chuyenkhoa'];
		$tenbs=$_REQUEST['bacsi'];
        $tenbn=$_REQUEST['tenbn'];	
		$ngaykham =$_REQUEST['ngaykham'];
        $giokham =$_REQUEST['giokham'];
        $gio =$_REQUEST['gio'];
		$giobatdau =$_REQUEST['giobatdau'];
		$gioketthuc =$_REQUEST['gioketthuc'];	
        $trangthai =$_REQUEST['trangthai'];
        $phidichvu=$_REQUEST['phidichvu'];
        $idlt=$_REQUEST['idlt'];
		if($idsua>0)		  
		{
            if($gio ==$today1 || $gio==$today){
                if($q->themxoasua("update lichkham set  idbs='$tenbs', lichngaykham='$today', giokham='$giokham',phidichvu='$phidichvu' where id='$layid' limit 1 ")==1)

                {	
                    echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="dathanhtoan.php";</script>';
                    }
                else
                {
                    echo'<span class="text-danger"> Cập nhật không thành công</span>';
                }
		    }		
        else{
            echo '<script language="javascript">alert("Thay đổi lịch khám không thành công do quá hạn 24 giờ thay đổi lịch theo quy định của phòng khám!"); window.location="edit-appointment.php?id='.$idbn.'&idlk='.$layid.'";</script>';
        }
    }
    else			
		{
            echo '<span class="text-danger">Vui lòng nhập đầy đủ thông tin</span>';
			}
	break;	
	}
}
?>
                <div class="sidebar-overlay" data-reff=""></div>
         <!-- JS here -->
         <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" integrity="sha512-WlaNl0+Upj44uL9cq9cgIWSobsjEOD1H7GK1Ny1gmwl43sO0QAUxVpvX2x+5iQz/C60J3+bM7V07aC/CNWt/Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>
    $(document).ready(function(){
    $('#time').timepicker({
        timeFormat: 'H:mm p',
        interval: 60,
        minTime: '8',
        maxTime: '16:00pm',
        defaultTime: '08',
        startTime: '08:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
        });
    });

</script>
</body>

<script type="text/javascript">
         $(document).ready(function(){
 
    $("select[name='bacsi']").on('change', function(){
        var idbs = $(this).val();
        if(idbs){
            $.ajax({
                type:'POST',
                url:'getAjax_edit_lk.php',
                data:'idbs='+idbs,
                success:function(html){
                    $("select[name='idlt']").html(html);
                }
            }); 
        }else{
            $("select[name='idlt']").html('<option value="">Chọn ngày khám</option>'); 
        }
    });
});
       </script>
<!-- appointments23:20-->
</html>