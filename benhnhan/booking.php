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
    <title>Đăng ký lịch khám</title>
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
   
<body>
 <div class="page-wrapper">
         <div class="content">
         <div class="row">
                 <div class="col-md-12"> 
                 <div class="col-md-11">                      
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
                       			 $sqlmain1=$mysqli->query("select * from benhan where idbn='$idbn'");
                        ?>
                        </p>
                    </td>
                </tr>
                </div>
                <br>
               
                <div class="row">
            <div class="col-md-4 d-flex">
            <div class="modal-body p-5 img d-flex" style="background-image: url(../assets/img/bs.jpg); height:470px;">
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
                            <select name="chuyenkhoa" style="width:550px"  class="chuyenkhoa form-control">
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
                            <select name="bacsi" style="width:550px" class="form-control" >
                            <option  style="width:100px">--- Chọn bác sĩ khám ---</option>
                           
                            </select>
                        </div>             
                        </div>
            <div class="col-md-6">
                         <div class="form-group">
                            <select name="idlt" class="form-control"  style="width:550px">
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
                            <input placeholder=" Chọn giờ khám cụ thể" style="width:550px"  type="text" class="giokham form-control" id="time" name="giokham" />
                          
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
                    $count=$q->luachon("select COUNT(lichkham.id) as count from lichkham inner join lichtrinh on lichkham.idlt=lichtrinh.id where lichkham.idlt=$idlt ");
                    $soluong=$q->luachon("select soluong from lichtrinh where id=$idlt ");
            
                    if($tenbs!='' && $tenck!='')
		            {		if($count < $soluong){
                    	
                                if($q->themxoasua("INSERT INTO lichkham(idck,idbn,idbs,giokham,lichngaykham,phidichvu,trangthai,trangthaithanhtoan,idlt) VALUES ('$tenck' ,'$idbn', '$tenbs', '$giokham', '$today','$phidichvu','$trangthai','$trangthaithanhtoan','$idlt')")==1)
                                {	
                                    echo '<script >alert("Đăng ký thành công!"); window.location="chuathanhtoan.php";</script>';					
                                    }
                                else
                                {
                                    echo' Đăng ký không thành công';
                                }
                            }
                            else{
                                echo '<script >alert("Đã đủ số lượng khám, vui lòng chọn lịch khác!");</script>';					
                
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
</div>
</div>
    </body>
    <br>
    
    <br>
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
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="../nhanvien/assets/js/timepicker.js"></script>
  
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

