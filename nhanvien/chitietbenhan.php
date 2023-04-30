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
include('./assets/qlbn.php');
$p = new qlbn();
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
    <title>Chi tiết bệnh án</title>
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
                </div>
            
        
         <?php 
        
        if($_GET){
          
          $id=$_GET["idba"];
          $idbn=$_GET["idbn"];
          $action=$_GET["action"];
          if($action=='Xemchitiet'){
          
            $sqlmain= "select *, benhnhan.id,benhnhan.nghenghiep, benhnhan.gioitinh,phieukhambenh.ketluandieutri, benhnhan.tenbn,benhnhan.ngaysinh,phieukhambenh.xetnghiem, phieukhambenh.lydo, phieukhambenh.chuandoan, benhnhan.diachi, benhnhan.email, benhnhan.sdt from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join phieukhambenh on benhan.idpkb=phieukhambenh.idpkb where benhan.id= '$id'";
            $result= $mysqli->query($sqlmain);
            $row=$result->fetch_assoc();
            $tenba=$row["tenba"];
            $tenbn=$row["tenbn"];
            $idbnn=$row["idbn"];
            $sdt=$row["sdt"];
            $lydo=$row["lydo"];
            $chandoan=$row["chuandoan"];
            $ngaysinh=$row["ngaysinh"];
            $xetnghiem=$row["xetnghiem"];
            $diachi=$row["diachi"];
            $gioitinh=$row["gioitinh"];
            $email=$row["email"];
            $chuandoan=$row["chuandoan"];
            $kqdieutri=$row["ketluandieutri"];
            $ngaykham=$row["ngaykham"];
            $idpkbb=$row["idpkb"];
            $nghenghiep=$row["nghenghiep"];

          ?>  

         <div class="row">
              
              <section class="content col-lg-12 col-md-4 col-sm-6 col-xs-12">

 <!-- Default box -->
 <div class="card card-outline card-primary rounded-0 shadow">
   <div class="card-header">
     <h3 class="card-title"></h3>

  <div class="card-body ">
       
        <form method="post">
       
         <div class="row">
                    <div class=" col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src="../Admin/assets/img/logo-dark.png" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li><h3>PHÒNG KHÁM ĐA KHOA ĐP</h3></li>
                                            <li>Địa chỉ: Nguyễn Văn Bảo,Gò Vấp,HCM</li>
                                            <li>Số điện thoại: 0374389835</li>
                                            <li>GST No:120</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Mã bệnh án : <?php echo $id ?></h3>
                                            <h4 class="">Mã khám bệnh : <?php echo $idpkbb ?></h4>
                                            <ul class="list-unstyled">
                                                <li>Ngày khám: <span><?php  echo $ngaykham ?></span></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 ">
										
											<h4>Họ và tên bệnh nhân:  <?php echo $tenbn ?> </h4>
											<ul class="list-unstyled">
												
												<li>Mã bệnh nhân: <span>0<?php echo $idbn ?></span></li>
												<li>Giới tính: <?php echo $gioitinh ?></li>
												<li>Địa chỉ: <?php echo $diachi ?></li>
												<li>Số điện thoại: 0<?php echo $sdt ?></li>
												<li>Email: <?php echo $email ?></li>
												<li>Ngày sinh: <?php echo $ngaysinh ?></li>
												<li>Nghề nghiệp: <?php echo $nghenghiep ?></li>

											</ul>
										
                                    </div>
                                    <div class="col-sm-6 col-lg-6 ">
										<div class="invoices-view">
											<span class="text-muted"></span>
											<ul class="list-unstyled invoice-payment-details">
												<li>
													Lý do khám:<?php echo $lydo ?>
												</li>
                        <li>
													Chuẩn đoán khám bệnh: <?php echo $chandoan ?>
												</li>
                                                <li>Tình trạng xét nghiệm: <?php echo $xetnghiem ?></li>
												
											</ul>
										</div>
                
                                    </div>
                                  <div class="col-sm-12" style="text-align:center;">
                                  <h2>Bệnh án <?php echo $tenba ?></h2>
                                  </div>
                                </div>
                                               
                                <div class="col-sm-12" style="border: solid 1px #aaaa; padding:15px" >
								<h4>Khám bệnh:</h4><hr>
                                <ul class="list-unstyled">
                                    <li><b>Ngày khám bệnh:</b> <?php echo $ngaykham ?></li>
                                    <li><b>Lý do khám bệnh:</b> <?php echo $lydo ?></li>
                                    <li><b>Chẩn đoán trước khám bệnh:</b> <?php echo $chandoan ?></li>
                                    <li><b>Tình trạng:</b> <?php echo $xetnghiem ?></li>
                                    <li><b>Kết quả sau khi khám bệnh:</b> <?php echo $kqdieutri ?></li>
                                    <li><b>Ghi chú: </b>............................................................................................................................................................................................................................................................. 
                                    </li>
								</ul>
                                 <!-- Xét nghiệm -->
                                 <?php
  $sqlmain1= "select *,phieuxetnghiem.ketquaxn,phieuxetnghiem.ngayxn,phieuxetnghiem.loaixn, benhnhan.tenbn,benhnhan.ngaysinh,phieukhambenh.xetnghiem, phieukhambenh.lydo, phieukhambenh.chuandoan, benhnhan.diachi, benhnhan.email, benhnhan.sdt from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join phieukhambenh on benhan.idpkb=phieukhambenh.idpkb inner join phieuxetnghiem on phieukhambenh.idpkb=phieuxetnghiem.idpkb where benhan.id = '$id'";
  $result1= $mysqli->query($sqlmain1);
  $row=$result1->fetch_assoc();
  $tenba=$row["tenba"];
  $idpkbb=$row["idpkb"];
  $loaixn=$row["loaixn"];
  $tenbn=$row["tenbn"];
  $idbn=$row["idbn"];
  $sdt=$row["sdt"];
  $lydo=$row["lydo"];
  $chandoan=$row["chuandoan"];
  $ngayxn=$row["ngayxn"];
  $xetnghiem=$row["xetnghiem"];
  $kqxn=$row["ketquaxn"];

 ?>                
								<h4>Kết quả xét nghiệm:</h4><hr>
                                <ul class="list-unstyled">
                                    <li><b>Ngày xét nghiệm:</b> <?php echo $ngayxn ?></li>
                                    <li><b>Chẩn đoán:</b> <?php echo $chandoan ?></li>
                                    <li><b>Loại xét nghiệm:</b> <?php echo $loaixn ?></li>
                                    <li><b>Kết quả xét nghiệm:</b> <?php echo $kqxn ?></li>
                                    <li><b>Ghi chú: </b>............................................................................................................................................................................................................................................................. 
                                    </li>
								</ul>
                                                      <!-- Siêu âm -->
                                                      <?php
  $sqlmain2= "select *, phieusieuam.ngaysa, phieusieuam.chandoan, phieusieuam.mota, phieusieuam.kqsa, benhnhan.tenbn,benhnhan.ngaysinh,phieukhambenh.xetnghiem, phieukhambenh.lydo, phieukhambenh.chuandoan, benhnhan.diachi, benhnhan.email, benhnhan.sdt from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join phieukhambenh on benhan.idpkb=phieukhambenh.idpkb inner join phieusieuam on phieukhambenh.idpkb=phieusieuam.idpkb where benhan.id= '$id'";
  $result2= $mysqli->query($sqlmain2);
  $row=$result2->fetch_assoc();
  $tenba=$row["tenba"];
  $idpkbb=$row["idpkb"];
  $loaixn=$row["loaixn"];
  $kqsa=$row["kqsa"];
  $idbn=$row["idbn"];
  $mota=$row["mota"];
  $lydo=$row["lydo"];
  $chandoansa=$row["chandoan"];
  $ngaysa=$row["ngaysa"];
  $xetnghiem=$row["xetnghiem"];
 ?>   
                                <h4>Kết quả siêu âm:</h4><hr>
                                <ul class="list-unstyled">
                                    <li><b>Ngày siêu âm:</b> <?php echo $ngaysa ?></li>
                                    <li><b>Chẩn đoán:</b> <?php echo $chandoansa ?></li>
                                    <li><b>Mô tả tổn thương:</b> <?php echo $mota ?></li>
                                    <li><b>Kết quả siêu âm:</b> <?php echo $kqsa ?></li>
                                    <li><b>Ghi chú:  </b>............................................................................................................................................................................................................................................................. 
                                    </li>
								</ul>
                                </div>
                                <div><br>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
           </div>
         </div>
        </form>
  </div>

 </div>
              </section>
         </div>
       
         <?php
           }
            
    
}?>
    </div>
</div>
</body>

</html>
 
    <div class="sidebar-overlay" data-reff=""></div>
    <!-- <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script> -->
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>
    <script src=
"https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
<!-- datetime picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>
<script type="">
    $(document).ready(function(){
            $("#ngaykham").datepicker({
          numberOfMonths: 1,
          showButtonPanel: true,
          dateFormat: 'yy-mm-dd',
          
        });
    });

</script>
</body>
</html>