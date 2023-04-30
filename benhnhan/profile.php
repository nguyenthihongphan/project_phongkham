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
$layid = $_SESSION['id'];
$ten=$q->luachon("select tenbn from benhnhan where id='$iduser' limit 1");
$idbn=$q->luachon("select id from benhnhan where id='$iduser' limit 1");

include("../Admin/assets/db_config.php");
date_default_timezone_set('Asia/ho_chi_minh');
        
$today = date('Y-m-d');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thông tin cá nhân</title>
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
</head>

<body>
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "101582302753251");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
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
                                <a href="index.html">
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
                    <a class="dropdown-item" href="../benhnhan/logout.php">Đăng xuất</a>
                    <a class="dropdown-item" href="../benhnhan/profile.php">Thông tin cá nhân</a>

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
<section class="contact-section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-2 offset-lg-2">
                        <h4 class="page-title center">Thông tin cá nhân</h4>
                      
                    </div>
                </div>
               <hr>
                <div class="row">
                    <div class="col-sm-12">
                           <form enctype="multipart/form-data" method="post">
                           <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Họ và tên<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="tenbn" name="tenbn"  value="<?php  echo $q->luachon("select tenbn from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
                       		<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="usename" name="usename"  value="<?php  echo $q->luachon("select username from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email"  value="<?php  echo $q->luachon("select email from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="pass" name="pass"  value="<?php  echo $q->luachon("select password from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
                               
                             <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input class="form-control" type="date" id="ngaysinh" name="ngaysinh"  value="<?php  echo $q->luachon("select ngaysinh from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
                              <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Giới tính</label><br>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nam" <?php if( $q->luachon("select gioitinh from benhnhan where tenbn='$ten' limit 1")=="Nam"){ echo"checked";}?>/>Nam
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nữ" <?php if( $q->luachon("select gioitinh from benhnhan where tenbn='$ten' limit 1")=="Nữ"){ echo"checked";}?>/>Nữ
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input class="form-control" type="text" id="diachi" name="diachi"  value="<?php  echo $q->luachon("select diachi from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="text" id="sdt" name="sdt"  value="0<?php  echo $q->luachon("select sdt from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
                              
                             
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nghề nghiệp</label>
                                        <input class="form-control" type="text" id="nghenghiep" name="nghenghiep"  value="<?php  echo $q->luachon("select nghenghiep from benhnhan where tenbn='$ten' limit 1");?>" >
                                    </div>
                                </div>
                           
                             </div>
                            <div class="m-t-20 text-center">
                               
                                <input type="submit"  class="btn btn-primary submit-btn"  name="sua" value="Cập nhật"/>
                            </div>
     <?php

	switch ($_POST['sua'])
	{
		case'Cập nhật':
	{
		$idsua=$_REQUEST['id'];
		$tenbn=$_REQUEST['tenbn'];
		$usename =$_REQUEST['usename'];
		$pass=$_REQUEST['pass'];
		$gioitinh=$_REQUEST['gioitinh'];
		$ngaysinh =$_REQUEST['ngaysinh'];
		$sdt=$_REQUEST['sdt'];
		$email=$_REQUEST['email'];
		$diachi=$_REQUEST['diachi'];
		$nghenghiep=$_REQUEST['nghenghiep'];
		if($tenbn!='')
		{		
				 if($q->themxoasua("update benhnhan set tenbn='$tenbn', gioitinh='$gioitinh', ngaysinh='$ngaysinh', username='$usename',password= '$pass', sdt='$sdt', email='$email', diachi='$diachi', nghenghiep='$nghenghiep' where tenbn='$ten' limit 1 ")==1)
				
				{	
					echo '<script >alert("Cập nhật thành công!"); window.location="profile.php";</script>';
					}
				else
				{
					 echo' Cập nhật không thành công';
					
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
        </section>


    
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


    
<!-- MODAL END -->
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

     <!--  -->
     <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" integrity="sha512-WlaNl0+Upj44uL9cq9cgIWSobsjEOD1H7GK1Ny1gmwl43sO0QAUxVpvX2x+5iQz/C60J3+bM7V07aC/CNWt/Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    
    <script type="text/javascript">
         $(document).ready(function(){

	
    $("select[name='chuyenkhoa']").on('change', function(){
        var idck = $(this).val();
        var post_id= 'id='+ idck
    
        if(idck){
            $.ajax({
                type:'POST',
                url:'../nhanvien/getAjax.php',
                data:post_id,
                success:function(html){
                    $("select[name='bacsi']").html(html);
                    $("select[name='idlt']").html('<option value="">Chọn ngày khám</option>'); 
                }
            }); 
        }else{
            $("select[name='bacsi']").html('<option value="">Chọn chuyên khoa</option>');
            $("select[name='idlt']").html('<option value="">Chọn ngày khám</option>'); 
        }
    });
    
    $("select[name='bacsi']").on('change', function(){
        var idbs = $(this).val();
        if(idbs){
            $.ajax({
                type:'POST',
                url:'../nhanvien/getAjax.php',
                data:'idbs='+idbs,
                success:function(html){
                    $("select[name='idlt']").html(html);
                }
            }); 
        }else{
            $("select[name='idlt']").html('<option value="">Chọn bác sĩ</option>'); 
        }
    });
});
       </script>
  </body>

  </html>