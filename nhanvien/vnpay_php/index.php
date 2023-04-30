<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("../../nhanvien/assets/login_tmd.php");
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:login.php');
	}
include("../../nhanvien/assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT tennv FROM nhanvien where id='$iduser' limit 1 ");
// include('../../nhanvien/assets/qllt.php');
// $p = new qllt();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>
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
  label{
    font-size: 15px;
 }
 input{
    font-size: 20px;
 }
 </style>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Hóa đơn thanh toán</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="../assets/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo">
                <img src="../../nhanvien/assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
            </a>
        </div>
        <a id="toggle_btn" style="margin-top:15px" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar-menu"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="../../nhanvien/assets/img/user.jpg" width="24" alt="Admin">
                        <span class="" ></span>
                    </span>
                    <span><?php echo $ten; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../logout.php">Đăng xuất</a>
                </div>
            </li>
        </ul>
        
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li>
                        <a href="../index.php"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a>
                    </li>
                    <li>
                        <a href="../doctors.php"><i class="fa fa-user-md"></i> <span>Bác sĩ</span></a>
                    </li>
                    <li>
                        <a href="../patients.php"><i class="fa fa-users"></i> <span>Bệnh nhân</span></a>
                    </li>
                    <li class="submenu">
                       <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Lịch hẹn khám</span><span class="menu-arrow"></span></a>
                         <ul style="display: none;">
                       		
                            <li><a href="../cho_kham.php">Chờ khám</a></li>
                            <li><a href="../cho_thanh_toan.php">Chờ thanh toán</a></li>
                            <li><a href="../ls_kham.php">Lịch sử khám</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="../schedule.php"><i class="fa fa-calendar-check"></i> <span>Lịch trình </span></a>
                    </li>
                    <li>
                        <a href="../hosobenhan.php"><i class="fa fa-file"></i> <span>Hồ sơ bệnh án </span></a>
                    </li>
					
                    <li class="submenu">
                        <a href="#"><i class="fa fa-commenting-o"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="../blog.php">Bài viết</a></li>
                            <li><a href="../add-blog.php">Thêm bài viết</a></li>
                            <li><a href="../edit-blog.php">Sửa bài viết</a></li>
                            <li><a href="../myblog.php">Bài viết của tôi</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="../profilenv.php"><i class="fa fa-user"></i> <span> Thông tin cá nhân </span></a>
                    </li>
                    <li >
                        <a href="../thongke.php"><i class="fa-solid fa-chart-simple"></i> <span> Thống kê </span></a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        
        <div class="content">
           
             <div class="col-md-12 row"> 
        <?php require_once("./config.php"); 
        
      if($_GET){
        
        $idbn=$_GET["idbn"];
        $idlk=$_GET["idlk"];
        $action=$_GET["thanhtoan"];
        if($action=='Xem'){
        ?>          
        <div class="container">
           
            <h3>Thanh toán phí dịch vụ</h3>
            <form action="./vnpay_create_payment.php" id="create_form" method="post">       
<div class="row">
                    <div class="form-group col-md-6">
                        <label for="language">Loại thanh toán </label>
                        <select name="order_type" id="order_type" class="form-control">
                            <!-- <option value="topup">Nạp tiền điện thoại</option> -->
                            <option value="billpayment">Thanh toán hóa đơn</option>
                            <!-- <option value="fashion">Thời trang</option> -->
                            <!-- <option value="other">Khác - Xem thêm tại VNPAY</option> -->
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="order_id">Mã lịch khám</label>
                        <input class="form-control" readonly id="order_id" name="order_id" type="text"  value="<?php  echo $q->luachon("select lichkham.id from lichkham inner join benhnhan on lichkham.idbn='$idbn' where lichkham.id='$idlk'  limit 1");?>"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="amount">Phí dịch vụ</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number" readonly value="<?php  echo $q->luachon("select phidichvu from lichkham where id='$idlk' AND idbn='$idbn' limit 1");?>"/>
                    </div>
</div>
<div class="row">
                    <div class="form-group col-md-6">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngân hàng NCB</option>
                            <option value="AGRIBANK"> Ngân hàng Agribank</option>
                            <option value="SCB"> Ngân hàng SCB</option>
                            <option value="SACOMBANK">Ngân hàng SacomBank</option>
                            <option value="EXIMBANK"> Ngân hàng EximBank</option>
                            <option value="MSBANK"> Ngân hàng MSBANK</option>
                            <option value="NAMABANK"> Ngân hàng NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                            <option value="HDBANK">Ngân hàng HDBank</option>
                            <option value="DONGABANK"> Ngân hàng Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngân hàng VPBank</option>
                            <option value="MBBANK"> Ngân hàng MBBank</option>
                            <option value="ACB"> Ngân hàng ACB</option>
                            <option value="OCB"> Ngân hàng OCB</option>
                            <option value="IVB"> Ngân hàng IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
</div>
<div class="row">
                    <div class="form-group col-md-6">
                        <label >Thời hạn thanh toán</label>
                        <input class="form-control" id="txtexpire"
                               name="txtexpire" type="text" value="<?php echo $expire; ?>"/>
                    </div>
                    
                    <div class="form-group col-md-6" >
                        <label for="order_desc">Nội dung thanh toán</label>
                           <textarea class="form-control"  cols="20" id="order_desc" name="order_desc" rows="2">Nội dung thanh toán</textarea>
                    </div>
</div>
</div>

                    <div class="form-group">
                        <h3>Thông tin bệnh nhân</h3>
                    </div><hr>
                    <div class="row">
                     <div class="col-md-6"> 
                    <div class="form-group">
                        <label >Họ và tên</label>
                        <input class="form-control" id="txt_billing_fullname"
                               name="txt_billing_fullname" readonly  type="text" value="<?php  echo $q->luachon("select benhnhan.tenbn from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>             
                    </div>
                     </div>
                    <div class="col-md36"> 

                    <div class="form-group">
                        <label >Email</label>
                        <input class="form-control" id="txt_billing_email"
                               name="txt_billing_email" readonly  type="text" value="<?php  echo $q->luachon("select benhnhan.email from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>   
                    </div>
                    </div>
                    <div class="col-md-3"> 

                    <div class="form-group">
                        <label >Số điện thoại</label>
                        <input class="form-control" id="txt_billing_mobile"
                               name="txt_billing_mobile" readonly  type="text"value="0<?php  echo $q->luachon("select benhnhan.sdt from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>   
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label >Địa chỉ</label>
                        <input class="form-control" id="txt_billing_addr1"
                               name="txt_billing_addr1" readonly  type="text" value="<?php  echo $q->luachon("select benhnhan.diachi from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>   
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label >Trạng thái thanh toán</label>
                        <input class="form-control" id="txt_billing"
                               name="txt_trangthai" readonly type="text" value="<?php  echo $q->luachon("select trangthaithanhtoan from lichkham where  id='$idlk' AND idbn='$idbn' limit 1");?>"/>   
                    </div>
                    </div>
                    <div class="col-md-12"> <center>
                    <!-- <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Post</button> -->
                    <input type="submit" name="redirect" id="redirect" class="btn btn-primary" value="Tiếp tục thanh toán">
                    </center>
                </div>
        </form>
                <?php }
                }
                ?>
            <footer class="footer">
              <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>
             </div>
            </div>
        </div>
    </div>
</div>
</body>

           
            <div class="../sidebar-overlay" data-reff=""></div>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../assets/js/app.js"></script>
<!-- datetime picker -->
       
         


    
</html>
