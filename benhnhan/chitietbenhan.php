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


    //echo $userid;
    //echo $username;


  
    ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Chi tiết bệnh án</title>
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
                                <ul class="nav">                                   
                            <li class="nav-item"><a class="active" href="index1.php">Trang chủ</a></li>
                                                        <li class=" dropdown has-arrow link-item">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown">Lịch hẹn khám </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item link-item" style="padding-left:5px" href="booking.php">Đặt lịch</a>
                                    <a class="dropdown-item" style="padding-left:5px" href="benhan.php?id=<?php echo $idbn ?>">Bệnh án của tôi</a>
                                    <a class="dropdown-submenu dropdown-toggle  dropdown-item has-arrow link-item dropdown" style="cursor:pointer;padding-left:5px;" data-toggle="dropdown" >Lịch hẹn của tôi<i class="fa fa-arrow"></i> </a>
                                    <ul class="dropdown-menu " style="margin-left:20px">
                        
                                    <li> <a href="dathanhtoan.php">Đã thanh toán</a></li>
                                    <li> <a href="chuathanhtoan.php">Chưa thanh toán</a></li>
                                    </ul>

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
         <div class="content">
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
            $idbn=$row["idbn"];
			$tenbs=$row["tenbs"];
            $ids=$row["idbs"];
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
                                  <h2><?php echo $tenba ?></h2>
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
                                    <li><b>Ghi chú:</b>............................................................................................................................................................................................................................................................. 
                                    </li>
								</ul>
                                 <!-- Xét nghiệm -->
                                 <?php
  $sqlmain1= "select *,phieuxetnghiem.ketquaxn,phieuxetnghiem.ngayxn,phieuxetnghiem.loaixn, benhnhan.tenbn,benhnhan.ngaysinh,phieukhambenh.xetnghiem, phieukhambenh.lydo, phieukhambenh.chuandoan, benhnhan.diachi, benhnhan.email, benhnhan.sdt from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join phieukhambenh on benhan.idpkb=phieukhambenh.idpkb inner join phieuxetnghiem on phieukhambenh.idpkb=phieuxetnghiem.idpkb where benhan.id= '$id'";
  $result1= $mysqli->query($sqlmain1);
  $row=$result1->fetch_assoc();
  $tenba=$row["tenba"];
  $idpkbb=$row["idpkb"];
  $loaixn=$row["loaixn"];
  $tenbn=$row["tenbn"];
  $idbn=$row["idbn"];
  $tenbs=$row["tenbs"];
  $idbs=$row["idbs"];
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
                                    <li><b>Ghi chú:</b>............................................................................................................................................................................................................................................................. 
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
  $loaisa=$row["loaisa"];
  $lydo=$row["lydo"];
  $chandoansa=$row["chandoan"];
  $ngaysa=$row["ngaysa"];
  $xetnghiem=$row["xetnghiem"];
 ?>   
                                <h4>Kết quả siêu âm:</h4><hr>
                                <ul class="list-unstyled">
                                    <li><b>Ngày siêu âm:</b> <?php echo $ngaysa ?></li>
                                    <li><b>Loại siêu âm:</b> <?php echo $loaisa?></li>
                                    <li><b>Chẩn đoán:</b> <?php echo $chandoansa ?></li>
                                    <li><b>Mô tả tổn thương:</b> <?php echo $mota ?></li>
                                    <li><b>Kết quả siêu âm:</b> <?php echo $kqsa ?></li>
                                    <li><b>Ghi chú:</b>............................................................................................................................................................................................................................................................. 
                                    </li>
								</ul>
                                </div>
                                <div><br>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-8">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="m-b-20">
                                                <p style="text-align:center">........., ngày.....tháng.....năm 2023</p>
                                                <p style="text-align:center">Bác sĩ <?php echo $ckbs ?> </p>
                                                
                                                <p style="text-align:center"> <i>Ký tên</i></p>
                                                <br><br>
                                                <h4 style="text-align:center"> <?php echo $tenbs ?></h4>
                                            </div>
                                        </div>
                                    </div>

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
   <!-- footer start -->
    <footer class="footer">
    
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                       Liên kết mạng xã hội
                                </h3>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/profile.php?id=100086572583223">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <br>
                                    <br>
                                </div>
    							 <div class="socail_links">
                                    <ul>
                                        <li>
                                            <p>Đặt lịch ngay </p>
                                
    										<img src="img/datkham.png" width="100px" height="100px"/>
                                        </li>
                                        <li>
                                      		&emsp;
                                            &emsp;
                                           
                                        </li>
                                        <li>
                                           <p align="center">Fanpage </p>
                                
    										<img src="img/pk.png" width="100px" height="100px"/>
                                        </li>
                                        
                                    </ul>
                                    <br>
                                    <br>
                                </div>
                        
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-5">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                       Giờ làm việc
                                </h3>
                                <p> Đặt lịch: 7:00 - 16:00</p>
                                <p> Giờ làm việc: 7:00 – 23:00</p>
								<p> Hotline: 0374389835</p>
								<p> Đặt lịch khám : 0325 930 787</p>
								<br>
                                <h3 class="footer_title">
                                      Thông tin thêm
                                </h3>
                                <ul>
                                    <li><a href="#">Đặt lịch khám</a></li>
                                    <li><a href="#">Tin tức</a></li>
                                    <li><a href="#">Tuyển dụng</a></li>
                                    <li><a href="#">Quy định chính sách</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                  PHÒNG KHÁM ĐA KHOA ĐP
                                </h3>
                                <p>
                                    12 Nguyễn Văn Bảo phường 4 Gò Vấp <br>
                                    Hotline: 0374389835 <br>
                                    Email: phannguyen2246@gmail.com
                                </p>
                                <img  width="120px" height="50px"src="img/logo-da-thong-bao-bo-cong-thuong-mau-xanh.png"/>
                                <br>
                                <br>
                                    <div id="map" style="width:500px;height:300px;">
           <!-- Code chèn bản đồ ở đây -->
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.85763127015!2d106.68531071458948!3d10.822205292290436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528e5496d03cf%3A0xa5b8e7395ec636b9!2zMTIgTmd1eeG7hW4gVsSDbiBC4bqjbywgUGjGsOG7nW5nIDQsIEjhu5MgQ2jDrSBNaW5oLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1679146622359!5m2!1svi!2s" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
                                   

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                              
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Bởi Huỳnh Thị Xuân Đào 19445321 <br>Nguyễn Thị Hồng Phấn 19438171  <i class="fa fa-heart-o" aria-hidden="true"></i>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<!-- footer end  -->
<!-- link that opens popup -->
    
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
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
    
</body>
</html>
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
