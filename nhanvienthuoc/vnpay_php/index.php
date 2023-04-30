<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("../../nhanvienthuoc/assets/login_tmd.php");
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
    $iduser=$_SESSION['id'];
    // $layid = $_SESSION['id'];
    include("../../nhanvienthuoc/assets/db_config.php");
    
$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT tennv FROM nhanvien where id='$iduser' limit 1 ");
    
	}
else
{
	header('location:../../nhanvienthuoc/login.php');
	}

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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Hóa đơn thanh toán</title>
        <!-- Bootstrap core CSS -->

        <!-- Custom styles for this template -->
        <link href="../assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="../assets/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>
<div class="main-wrapper">
        <div class="header">
            <div class="header-left" style="width:300px">
                <a href="index.php" class="logo">
                    <img src="../assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="../assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span><?php echo $ten ?></span>
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
                        <a href="../donthuoc.php"><i class="fa fa-file"></i><span> Đơn thuốc</span></a>
                    </li>
                   
                    <li class="submenu">
                        <a href="#"><i class="fa fa-cart-plus"></i> <span> Thuốc</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                       	 	<li><a href="../danhmucthuoc.php">Danh mục thuốc</a></li>
                            <li><a href="../medicine.php">Thuốc</a></li>
                            <li><a href="../add-medicine.php">Thêm thuốc</a></li>
                            <li><a href="../edit-medicine.php">Cập nhật thuốc</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-commenting-o"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="../blog.php">Bài viết</a></li>
                            
                            <li><a href="../add-blog.php">Thêm bài viết</a></li>
                            <li><a href="../edit-blog.php">Sửa bài viết</a></li>
                        </ul>
                    </li>
                   
                    <li >
                        <a href="../profile.php"><i class="fa fa-user"></i><span> Thông tin cá nhân</span></a>
                    </li>
                     <li>
                        <a href="../thongke.php"><i class="fa fa-database"></i><span> Thống kê </span></a>
                    </li>
                    <li>
                        <a href="../lichsuthanhtoan.php"><i class="fa fa-money"></i><span> Thanh toán</span></a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="page-wrapper">
            <div class="content">
                
                <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Ngày hôm nay :
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right">
                            <?php 
                            $dem=1;
                        $today = date('Y-m-d');
                        echo $today;
                        ?>
                        </p>
                    </td>               
              
            </div>

        <?php require_once("./config.php"); 
        
      if($_GET){
        
        $id=$_GET["iddt"];
          $idbn=$_GET["idbn"];
        $action=$_GET["thanhtoan"];
        if($action=='Xem'){
        ?>           
       <div class="row">
              
              <section class="content col-lg-12 col-md-4 col-sm-6 col-xs-12">
              <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
          <h3 class="card-title"></h3>

       <div class="card-body ">
          
            <h3>Thanh toán hóa đơn thuốc</h3>
            <div class="table-responsive">
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
                    <div class="form-group col-md-6">
                        <label for="mahd">Mã hóa đơn</label>
                        <input class="form-control" readonly id="order_id" name="order_id" type="text"  value="<?php  echo $q->luachon("select hoadonthuoc.id from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>
                    </div>
</div>
<div class="row">
                    <div class="form-group col-md-6">
                        <label for="amount">Tổng tiền (VND)</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number" value="<?php  echo $q->luachon("select hoadonthuoc.tongtien from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="amount">Số thuốc</label>
                        <input class="form-control" id="sothuoc"
                               name="sothuoc" type="number" readonly value="<?php  echo $q->luachon("select hoadonthuoc.sothuoc from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>
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
                    <div class="form-group col-md-6">
                        <h3>Thông tin bệnh nhân</h3>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label >Họ và tên</label>
                        <input class="form-control" id="txt_billing_fullname"
                               name="txt_billing_fullname" readonly type="text" value="<?php  echo $q->luachon("select benhnhan.tenbn from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>     
                    </div>
                    <div class="form-group hidden col-md-6">
                        <label >Ma</label>
                        <input class="form-control" id="txt_billing_ma"
                               name="txt_billing_ma" readonly type="text" value="<?php  echo $q->luachon("select benhnhan.id from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>     
                    </div>
                    <div class="form-group col-md-6">
                        <label >Email</label>
                        <input class="form-control" id="txt_billing_email"
                               name="txt_billing_email" readonly type="text" value="<?php  echo $q->luachon("select benhnhan.email from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>     
                    </div>
</div>
<div class="row">

                    <div class="form-group col-md-6">
                        <label >Số điện thoại</label>
                        <input class="form-control" id="txt_billing_mobile"
                               name="txt_billing_mobile" readonly type="text" readonly value="0<?php  echo $q->luachon("select benhnhan.sdt from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>     
                    </div>
                    <div class="form-group col-md-6">
                        <label >Địa chỉ</label>
                        <input class="form-control" id="txt_billing_addr1"
                               name="txt_billing_addr1" readonly type="text" value="<?php  echo $q->luachon("select benhnhan.diachi from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>   
                    </div>
                    </div>
<div class="row">
                    <div class="form-group col-md-6">
                        <label >Trạng thái thanh toán</label>
                        <input class="form-control" id="txt_billing"
                               name="txt_trangthai" readonly type="text" value="<?php  echo $q->luachon("select hoadonthuoc.trangthaithanhtoan from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=$id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id where hoadonthuoc.idbn='$idbn'  limit 1");?>"/>     
                    </div>
</div>
<div class="form-group col-md-12">
    <center>
                    <!-- <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Post</button> -->
                    <input type="submit" name="redirect" id="redirect"  class="btn btn-primary" value="Tiếp tục thanh toán">
                    </center>
                </div>
                </form>
                <?php }
                }?>
            </div>
    
            <p>
                &nbsp;
            </p>
            <footer class="footer right">
              <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
       
        
    </body>
    <div class="../sidebar-overlay" data-reff=""></div>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/Chart.bundle.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/app.js"></script>

</html>
