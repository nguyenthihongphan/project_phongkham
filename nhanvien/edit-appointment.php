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
include('./assets/qllt.php');
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
    <title>Quản lí lịch hẹn</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
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
                </div><br>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Sửa lịch khám</h4>
                    </div>
                </div>
                <div class="row">
                 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">                      
                            <div class="row">
                            <div class="col-md-6">
                <div class="form-group">
                <label>Chọn bệnh nhân</label>
                <input type="text" readonly  class="form-control" name="tenbn" id="tenbn" value="<?php  echo $q->luachon("select benhnhan.tenbn from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$layid' limit 1");?>">
                
                <!-- <select name="tenbn" class="form-control" style="width:350px">
                <option>Tên bệnh nhân</option>
                <?php
                        require('./assets/db_config.php');
                        $sql = "SELECT * FROM benhnhan"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenbn']."</option>";
                        }
                    ?>
                </select> -->
            </div>
</div>
                                <div class="col-md-6">
                                 <div class="form-group">
                <label for="title">Chuyên khoa:</label>
                <input type="text" readonly  class="form-control" name="tenbn" id="tenbn" value="<?php  echo $q->luachon("select chuyenkhoa.tenck from lichkham inner join chuyenkhoa on lichkham.idck=chuyenkhoa.id where lichkham.id='$layid' limit 1");?>">
                <input type="text" hidden readonly  class="form-control" name="tenbn" id="tenbn" value="<?php  echo $idck= $q->luachon("select chuyenkhoa.id from lichkham inner join chuyenkhoa on lichkham.idck=chuyenkhoa.id where lichkham.id='$layid' limit 1");?>">
                
            </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
                <label for="title">Bác sĩ:</label>
                <select name="bacsi" class="form-control" style="width:350px">
                <option value="<?php  echo $idbs=$p->luachon("select bacsi.id from lichkham inner join bacsi on lichkham.idbs=bacsi.id where lichkham.id='$layid' limit 1");?>"><?php  echo $q->luachon("select bacsi.tenbs from lichkham inner join bacsi on lichkham.idbs=bacsi.id where lichkham.id='$layid' limit 1");?></option>
                    <option value="">--- Bác sĩ ---</option>
                    <?php
                        require('./assets/db_config.php');
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
             <label for="title">Lịch trình của bác sĩ:</label>
                <select name="idlt"  class="form-control" style="width:350px">
                <!-- <option value="<?php  echo $p->luachon("SELECT lichtrinh.id, lichtrinh.ngaykham, TIME(lichtrinh.gioketthuc) AS gioketthuc,TIME(lichtrinh.giobatdau) AS giobatdau FROM lichtrinh inner join lichkham on lichtrinh.id = lichkham.idlt WHERE lichtrinh.idbs = '$idbs' AND lichkham.id='$layid'")?> "> -->
                <?php
                        require('./assets/db_config.php');
                        $sql="SELECT lichtrinh.ngaykham, TIME(lichtrinh.gioketthuc) AS gioketthuc,TIME(lichtrinh.giobatdau) AS giobatdau FROM lichtrinh inner join lichkham on lichtrinh.id = lichkham.idlt WHERE lichtrinh.idbs = '$idbs' AND lichkham.id='$layid'";
                         $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo '<option value="'.$row['id'].' ">'.$row['ngaykham'].' Từ '.substr($row['giobatdau'],0,5).' - '.substr($row['gioketthuc'],0,5).'</option>'; 

                        }
                    ?>
<!-- </option> -->
                </select>
            </div>
            </div>
          
            <div class="col-sm-6">
                <div class="form-group">
                <label>Chọn giờ khám cụ thể </label>
                <input class="form-control" value="<?php echo $q->luachon("select TIME(giokham) AS giokham from lichkham where id=$layid") ?>" type="text" class="giokham" id="time" name="giokham" />
              
            </div>
            </div>
           
            <div class="col-sm-6">
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
               
                <input class="form-control" hidden value="Chưa thanh toán" placeholder="trangthai" type="text" id="trangthaithanhtoan" name="trangthaithanhtoan" />
              
            </div>
            </div>

        
            <div class="m-t-20 text-center">                              
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
		$giobatdau =$_REQUEST['giobatdau'];
		$gioketthuc =$_REQUEST['gioketthuc'];	
        $trangthai =$_REQUEST['trangthai'];
        $phidichvu=$_REQUEST['phidichvu'];
        $idlt=$_REQUEST['idlt'];
		if($idsua>0)		  
		  			{
				
				 if($p->themxoasua("update lichkham set  idbs='$tenbs', lichngaykham='$today', giokham='$giokham',phidichvu='$phidichvu' where id='$idsua' limit 1 ")==1)

				{	
					echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="cho_kham.php";</script>';
					}
				else
				{
					echo'<span class="text-danger"> Cập nhật không thành công</span>';
				}
		}		
				
			else			
		{echo '<span class="text-danger">Vui lòng nhập đầy đủ thông tin</span>';
			}
	break;	
	}
}
?>
                <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
<!-- datetime picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>
<script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
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
            $("select[name='idlt']").html('<option value="">Chọn lịch trình</option>'); 
        }
    });
});
       </script>
<!-- appointments23:20-->
</html>