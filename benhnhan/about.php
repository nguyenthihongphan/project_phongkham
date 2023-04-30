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
    <title>Giới thiệu</title>
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
    <!-- header start -->
    
<!-- Messenger Plugin chat Code -->
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
                    <a class="dropdown-item" href="login.php">Đăng xuất</a>
                     <a class="dropdown-item" href="profile.php?id=<?php echo $idbn ?>">Thông tin cá nhân</a>
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
      <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_4 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Giới thiệu</h3>
                        <p><a href="index.html">Trang chủ/</a> Giới thiệu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="img/about/1.png" alt="">
                        </div>
                        <div class="thumb_2">
                            <img src="img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Chào bạn đến phòng khám đa khoa ĐP</h2>
                        <h3>Nơi chăm sóc sức khỏe của bạn</h3>
                        <p>Phòng khám đa khoa ĐP sẽ là nơi chịu trách nhiệm về sức khỏe của từng cá nhân trong cộng đồng dân cư, trong gia đình.</p>
                            <li> <i class="flaticon-right"></i> Xử lý cấp cứu nội - ngoại khoa thông thường: Cao huyết áp, ngộ độc thức ăn, xử lý vết thương phần mềm, chấn thương xương khớp...</li>
                            <li> <i class="flaticon-right"></i> Khám điều trị các bệnh mạn tính: Cao huyết áp, tiểu đường, rối loạn lipide,...</li>
                            <li> <i class="flaticon-right"></i> Khám tư vấn , điều trị các rối loạn tâm lý: Rối loạn lo âu, trầm cảm,... </li>
                            <li> <i class="flaticon-right"></i> Khám kiểm tra sức khỏe tổng quát định kỳ. </li>
                            <li> <i class="flaticon-right"></i> Chích ngừa phòng bệnh.</li>
                            <li> <i class="flaticon-right"></i> Tư vấn sức khỏe.</li>

                        </ul>
                       
                    </div>
                </div>
            </div>
            <br><hr><br>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="business_info">
                        <div class="icon">
                            <i class="flaticon-first-aid-kit"></i>
                        </div>
                        <h3>Trách nhiệm của phòng khám đa khoa Đ	P</h3>
                        <li><i class="fa fa-check-circle"></i>Quản lý sức khỏe : Ký hợp đồng dịch vụ bác sĩ gia đình với bệnh nhân.</li>
                        <li><i class="fa fa-check-circle"></i> Phát hiện và xử lý các vấn đề sức khỏe của bệnh nhân tại nhà, tại cộng đồng.</li>
                        <li><i class="fa fa-check-circle"></i>Khám điều trị các bệnh cấp tính thông thường tại Phòng Khám hay Tại Nhà bệnh nhân.</li>
                        <li><i class="fa fa-check-circle"></i>Chăm sóc dự phòng bảo vệ sức khỏe: Tư Vấn Sức Khỏe, Tầm Soát Bệnh, Khám Sức Khỏe Định Kỳ, Chích Ngừa Phòng Bệnh.</li>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="business_thumb">
                        <img src="img/about/business.png" alt="">
                    </div>
                </div>
            </div>
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
<!-- link that opens popup -->

<!-- form itself end-->
<form id="test-form" class="white-popup-block mfp-hide">
<div class="popup_box ">
    <div class="popup_inner">
        <h3>Make an Appointment</h3>
        <form action="#">
            <div class="row">
                <div class="col-xl-6">
                    <input id="datepicker" placeholder="Pick date">
                </div>
                <div class="col-xl-6">
                    <input id="datepicker2" placeholder="Suitable time">
                </div>
                <div class="col-xl-6">
                    <select class="form-select wide" id="default-select" class="">
                        <option data-display="Select Department">Department</option>
                        <option value="1">Eye Care</option>
                        <option value="2">Physical Therapy</option>
                        <option value="3">Dental Care</option>
                    </select>
                </div>
                <div class="col-xl-6">
                    <select class="form-select wide" id="default-select" class="">
                        <option data-display="Doctors">Doctors</option>
                        <option value="1">Mirazul Alom</option>
                        <option value="2">Monzul Alom</option>
                        <option value="3">Azizul Isalm</option>
                    </select>
                </div>
                <div class="col-xl-6">
                    <input type="text"  placeholder="Name">
                </div>
                <div class="col-xl-6">
                    <input type="text"  placeholder="Phone no.">
                </div>
                <div class="col-xl-12">
                    <input type="email"  placeholder="Email">
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="boxed-btn3">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
</form>
<!-- form itself end -->
    
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
        </script>
    </body>
    
    </html>
    