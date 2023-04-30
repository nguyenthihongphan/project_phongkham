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
    <title>Phòng Khám Đa Khoa ĐP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script> 
$(document).ready(function() {
$('.navbar a.dropdown-toggle').on('click', function(e) {
var $el = $(this);
var $parent = $(this).offsetParent(".dropdown-menu");
$(this).parent("li").toggleClass('open');
if(!$parent.parent().hasClass('nav')) {
$el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
}
$('.nav li.open').not($(this).parents("li")).removeClass("open");
return false;
});
});</script>
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
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="index.html">
   <img src="../Admin/assets/img/logo-dark.png" alt="" width="50px">
</a>
</div>

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="index1.php">Trang chủ</a></li>
<li><a href="about.php" target="_blank">Giới thiệu</a></li>
<li>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Lịch hẹn khám <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="booking.php">Đặt lịch</a></li>
<li class="divider"></li>
<li>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Lịch hẹn của tôi <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="#">Đã thanh toán</a></li>
<li class="divider"></li>
<li><a href="#">Chưa thanh toán</a></li>
</ul>
</li>
<li class="divider"></li>
<li><a href="benhan.php">Bệnh án của tôi</a></li>

</ul>
</li>
<li><a href="blog.php" target="_blank">Tin tức</a></li>
<li><a href="doctors.php" target="_blank">Đội ngũ bác sĩ</a></li>
<li><a href="pricet.php" target="_blank">Bảng giá</a></li>
<li><a href="contactt.php" target="_blank">Liên hệ</a></li>
<li>
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
                    <a class="dropdown-item" href="../benhnhan/profile.php?id=<?php echo $idbn ?>">Thông tin cá nhân</a>

                </div>
            </li>
        </ul>
        </li>
         <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
</ul>
</li>

</ul>
</div>
</div>
</div>
                    </div>
                </div>
            </div>
           
        </div>
    </header>
    <!-- header-end -->

 <!-- slider_area_start -->
 <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Chăm sóc sức khỏe</span> <br>
                                    Cho gia đình bạn </h3>
                                <p>Phòng khám luôn quan tâm đến sức khỏe của gia đình bạn<br> </p>
                                <a href="benhnhan/schedule.php" class="boxed-btn3">Đặt lịch hẹn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Sức khỏe tốt hơn</span> <br>
                                    cho gia đình hạnh phúc hơn  </h3>
                                <p>Hãy liên hệ đễ được giải đáp thắc mắc cho sức khỏe gia đình bạn <br> 
                                <a href="./benhnhan/contact.php" class="boxed-btn3">Liên hệ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Quan tâm nhiều hơn đến sức khỏe của bạn</span> <br>
                                     </h3>
                                <p>Tìm hiểu thêm để sức khỏe không còn làm gia đình bạn lo lắng<br> </p>
                                <a href="./benhnhan/blog.php" class="boxed-btn3 ">Tìm hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
 <!-- Consultation Section Begin -->
 <section class="consultation" >
    <div class="container">
        <div class="row">
        <div class="col-lg-4">
                <div class="consultation__form">
                    <div class="section-title">                   
                        <h2>Tra cứu bệnh án</h2>
                    </div>
                    <form action="#" >
                       <?php
require_once 'QR-code/phpqrcode/qrlib.php';
$path = 'QR-code/images/';
$qrcode = $path.time().".png";

QRcode::png("http://localhost:8888/phongkhamgiadinh/benhnhan/benhan?id=$idbn",$qrcode);
echo "<img src= '".$qrcode."'>";
?>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="consultation__text">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="consultation__text__item">
                                <div class="section-title">
                                  
                                    <h2>Phòng Khám Đa Khoa ĐP <b></b></h2>
                                </div>
                                <p> Phòng khám tự hào là nơi tập hợp của các bác sĩ giỏi, 
                                    tâm huyết với nghề. Và đặc biệt là sự đa văn hóa. Ngôn ngữ 
                                    không là rào cản trong giao tiếp ở các phòng khám.</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="consultation__form">
                    <div class="section-title">                   
                    <button type="button" class="btn btn-light py-3 px-6" style="border: 2px solid blue;" data-toggle="modal" data-target="#exampleModal">
Đặt lịch hẹn
</button>
                    </div>
                   
                </div>
    </div>
          
        </div>
    </div>
</section>
    <!-- service_area_start -->
    <div class="service_area">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-electrocardiogram"></i>
                        </div>
                        <h3>Tra cứu kết quả xét nghiệm</h3>
                        <p>Điền đầy đủ thông tin khi tra cứu</p>
                        <a href="#test-form" class="boxed-btn3-white popup-with-form">Tra cứu</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-emergency-call"></i>
                        </div>
                        <h3>Nhiệt tình</h3>
                        <p>Từng nhân viên luôn nỗ lực, cống hiến hết mình, thăm khám cho người bệnh một cách chu đáo, tận tình, không ngại gian khổ, khó khăn.
                        </p>
                        
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-first-aid-kit"></i>
                        </div>
                        <h3>Chính xác</h3>
                        <p>
                            Mọi thứ đều phải được thực hiện một cách chính xác từ những động tác tiêm truyền, lấy máu, chẩn đoán, kê đơn, vô khuẩn… đến những thủ thuật</p>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- Chooseus Section Begin -->
    <section class="chooseus spad">
        <div class="container ">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55" style="margin-top: 20px;">
                        <h3>Lĩnh vực khám</h3>
                        
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-3 col-md-6 col-sm-6 consultation__form consultation__form">
                    <div class="chooseus__item">
                        <img src="img/icons/ci-1.png" alt="">
                        <h5>Dịch vụ khám chữa bệnh tại nhà</h5>
                        <p>Hiện nay, mô hình này đã khá phổ biến, nhờ tính tiện ích và sự đáp ứng cao nên đã được áp dụng thành công ở rất nhiều quốc gia. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 consultation__form ">
                    <div class="chooseus__item">
                        <img src="img/icons/ci-2.png" alt="">
                        <h5>Tiêm chủng</h5>
                        <p>Những ngày cả thế giới lao đao bởi đại dịch Covid-19, người ta mới thấy được tầm quan trọng của việc tiêm vắc xin phòng bệnh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 consultation__form">
                    <div class="chooseus__item">
                        <img src="img/icons/ci-3.png" alt="">
                        <h5>Lấy mẫu xét nghiệm tại nhà</h5>
                        <p>Thăm khám và thực hiện các thủ thuật tại nhà như lấy máu chăm sóc người bệnh lớn tuổi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 consultation__form">
                    <div class="chooseus__item">
                        <img src="img/icons/ci-4.png" alt="">
                        <h5>Khám bảo hiểm y tế</h5>
                        <p>Luôn phục vụ cộng đồng, hoạt động khám thường niên</p>
                    </div>
                </div>
               
            </div>
        
        </div>
    </section>
    <!-- Chooseus Section End -->

    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Tin tức</h3>
                        <p>Cập nhật tin tức hằng ngày</p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php echo $q->tintuc("select * from tintuc");?>
                
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/3.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Bảo vệ gia đình bạn</a></h3>
                            <p>kiểm tra sức khỏe cho người nhà đặt biệt là người già.</p>
                            <a href="./blog.html" class="learn_more">Đọc thêm</a>
                        </div>
                    </div>
                </div>
               
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/5.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Đặt lịch</a></h3>
                            <p>Đặt lịch khám để có thể trao đổi trực tiếp.</p>
                            <a href="blog.php" class="learn_more">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/6.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Khảo sát</a></h3>
                            <p>Khám online tạo cảm giác thoải mái.</p>
                            <a href="blog.php" class="learn_more">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->


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
                <h3>Đặt lịch</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <input id="datepicker" placeholder="Ngày ứng với bác sĩ">
                        </div>
                        <div class="col-xl-6">
                            <input id="datepicker2" placeholder="Thời gian phù hợp bác sĩ">
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Select Department">Dịch vụ</option>
                                <option value="1">Dịch vụ 1</option>
                                <option value="2">Dịch vụ 2</option>
                                <option value="3">Dịch vụ 3</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Doctors">Chọn bác sĩ</option>
                                <option value="1">Mirazul Alom</option>
                                <option value="2">Monzul Alom</option>
                                <option value="3">Azizul Isalm</option>
                            </select>
                            
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Tên bệnh nhân">
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Số điện thoại">
                        </div>
                        <div class="col-xl-12">
                            <input type="email"  placeholder="Email">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Đặt lịch</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->
<!-- MODAL -->



<div class="modal fade" id="exampleModal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true" class="fa fa-close"></span>
</button>
</div>
<div class="row ">
<div class="col-md-4 d-flex">
<div class="modal-body p-5 img d-flex" style="background-image: url(../assets/img/bs.jpg);height:470px;">
</div>
</div>
<div class="col-md-8 d-flex">
<div class="modal-body p-5 d-flex align-items-center">
<div class="text w-100 py-5">
<h2 class="mb-0">Đặt lịch hẹn</h2>
<br>
<form enctype="multipart/form-data" method="post" >
<div class="col-md-12">
                                 <div class="form-group">
                <select name="chuyenkhoa" style="width:250px"  class="chuyenkhoa form-control">
                    <option value="">--- Chọn chuyên khoa ---</option>
                    <?php                  
                        $sql = "SELECT * FROM chuyenkhoa"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenck']."</option>";
                        }
                    ?>
                </select>
            </div>
</div>
<div class="col-md-6" >
    <div class="form-group">
                <select name="bacsi" style="width:250px" class="form-control" >
                <option  style="width:100px">--- Chọn bác sĩ khám ---</option>
                </select>
            </div>             
            </div>
<div class="col-md-6">
             <div class="form-group">
                <select name="idlt" class="form-control"  style="width:250px">
                <option>--- Chọn lịch trình ---</option>
                </select>
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <input hidden style="width:23px"  type="text" value="150000" class=" form-control"  name="phidichvu" />
              
            </div>
            </div>
          
            <div class="col-md-6">
                <div class="form-group">
                <input placeholder=" Chọn giờ khám cụ thể" style="width:250px"  type="time" class="giokham form-control" id="time" name="giokham" />
              
            </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
               
                <input class="form-control" hidden value="Chưa khám"  type="text" id="trangthai" name="trangthai" />
              
            </div>
            <div class="col-sm-6">
                <div class="form-group">
               
                <input class="form-control" hidden value="Chưa thanh toán"  type="text" id="trangthaithanhtoan" name="trangthaithanhtoan" />
              
            </div>
            <?php
            switch ($_POST['them'])
	{		
		case'Đặt lịch':
	{	
		$tenck= $_REQUEST['chuyenkhoa'];
		$tenbs=$_REQUEST['bacsi'];	
		$ngaykham =$_REQUEST['ngaykham'];
        $giokham =$_REQUEST['giokham'];
		$giobatdau =$_REQUEST['giobatdau'];
		$gioketthuc =$_REQUEST['gioketthuc'];	
        $trangthai =$_REQUEST['trangthai'];
        $trangthaithanhtoan =$_REQUEST['trangthaithanhtoan'];
        $phidichvu=$_REQUEST['phidichvu'];
        $idlt=$_REQUEST['idlt'];
		
		if($tenbs!='' && $tenck!='')
		{		
				if($q->themxoasua("INSERT INTO lichkham(idck,idbn,idbs,giokham,lichngaykham,phidichvu,trangthai,trangthaithanhtoan,idlt) VALUES ('$tenck' ,'$idbn', '$tenbs', '$giokham', '$today','$phidichvu','$trangthai','$trangthaithanhtoan','$idlt')")==1)
				{	
					echo '<script >alert("Đăng ký thành công!"); window.location="appointment.php";</script>';					
					}
				else
				{
					echo' Đăng ký không thành công';
				}			
		}		
			else			
		{echo '<span class="text-danger">Vui lòng nhập đầy đủ thông tin</span>';
			}
	break;	
	}
}
?>
           <br><br>
            <div class="m-t-20 text-center">                              
                <input type="submit" style="width:110px;border:solid 1px blue" class="btn btn-light submit-btn px-3" id="them" name="them" value="Đặt lịch"/>
            </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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
       <script>
$(document).ready(function(){
$('.dropdown-submenu a.test').on("click", function(e){
$(this).next('ul').toggle();
e.stopPropagation();
e.preventDefault();
});
});
</script>
  </body>

  </html>
<style>
@media (min-width: 767px) {
.navbar-nav .dropdown-menu .caret { transform: rotate(-90deg);}
}
</style>