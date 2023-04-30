<?php 
session_start();

	include("./assets/login_tmd.php");
	$q= new login();



$iduser=$_SESSION['id'];
$layid = $_SESSION['id'];
$ten=$q->luachon("select tennv from nhanvien where id='$iduser' limit 1");
include('./assets/qlthuoc.php');
// include("../Admin/assets/db_config.php");
$p = new qlthuoc();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
  include("assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT tennv FROM nhanvien where id=9 limit 1 ");
$idnv=$q->luachon("SELECT id FROM nhanvien where id=9 limit 1 ");

	$employeerow = $mysqli->query("select  * from  thuoc ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Thanh toán hóa đơn thuốc</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span><?php echo $ten ?></span>
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
                        <a href="donthuoc.php"><i class="fa-solid fa-receipt"></i><span> Đơn thuốc</span></a>
                    </li>
                   
                    <li class="submenu">
                        <a href="#"><i class="fa-solid fa-capsules"></i> <span> Thuốc</span> <span class="menu-arrow"></span></a>
                         <ul style="display: none;">
                       	 	<li><a href="danhmucthuoc.php">Danh mục thuốc</a></li>
                            <li><a href="medicine.php">Thuốc</a></li>
                            <li><a href="add-medicine.php">Thêm thuốc</a></li>
                            <li><a href="edit-medicine.php">Cập nhật thuốc</a></li>
                        </ul>
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
                        <a href="profile.php"><i class="fa fa-user"></i><span> Thông tin cá nhân</span></a>
                    </li>
                     <li>
                        <a href="thongke.php"><i class="fa fa-database"></i><span> Thống kê </span></a>
                    </li>
                    <li>
                        <a href="lichsuthanhtoan.php"><i class="fa fa-money"></i><span> Thanh toán</span></a>
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
           <div class="row">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Thanh toán</p>
           </div>
           <?php
            if($_GET){
              $id=$_GET["iddt"];
              $idbn=$_GET["idbn"];
              $action=$_GET["action"];          
              if($action=='thanhtoan'){
           $sqlmain= "select *, thuoc.lieuluong,phieukhambenh.ketluandieutri,hoadonthuoc.trangthaithanhtoan,hoadonthuoc.id,benhnhan.tenbn, donthuoc.ngaylap,chitietdonthuoc.slthuoc,chitietdonthuoc.gia,chitietdonthuoc.idthuoc, thuoc.tenthuoc from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=donthuoc.id inner join chitietdonthuoc on donthuoc.id=chitietdonthuoc.iddt inner join thuoc on chitietdonthuoc.idthuoc=thuoc.id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id inner join phieukhambenh on benhnhan.id= phieukhambenh.idbn where hoadonthuoc.iddt=$id AND hoadonthuoc.idbn=$idbn AND hoadonthuoc.ngaylap=donthuoc.ngaylap limit 1 ";
          // $sqlmain="select *,benhnhan.tenbn,benhnhan.sdt,benhnhan.diachi, benhnhan.email, benhnhan.ngaysinh, donthuoc.ngaylap,chitietdonthuoc.slthuoc,chitietdonthuoc.gia,chitietdonthuoc.idthuoc, thuoc.tenthuoc from chitietdonthuoc inner join donthuoc on donthuoc.id=chitietdonthuoc.iddt inner join hoadonthuoc on donthuoc.id=hoadonthuoc.iddt inner join thuoc on chitietdonthuoc.idthuoc=thuoc.id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id where donthuoc.id='$id' order by donthuoc.id asc";
//$sqlmain="select * from chitietdonthuoc order by iddt='$id' desc";
            // select *,benhnhan.tenbn, donthuoc.ngaylap,chitietdonthuoc.slthuoc,chitietdonthuoc.gia,chitietdonthuoc.idthuoc, thuoc.tenthuoc from hoadonthuoc inner join donthuoc on hoadonthuoc.iddt=donthuoc.id inner join chitietdonthuoc on donthuoc.id=chitietdonthuoc.iddt inner join thuoc on chitietdonthuoc.idthuoc=thuoc.id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id where iddt='$id' 
            // $result= $mysqli->query($sqlmain);
            // $row=$result->fetch_assoc();
            $inv_det_results= $mysqli->query($sqlmain); 
            // $row=$result->fetch_assoc(); 
            
              if($inv_det_results->num_rows>0){
              for( $x=0; $x<$inv_det_results->num_rows;$x++){
            // $inv_det_results = mysqli_query($con,$inv_det_query);    
        
            $row = $inv_det_results->fetch_assoc();
            $idhd=$row['id'];
            $idbn=$row['idbn'];
            $tenbn=$row['tenbn'];
            $slthuoc=$row['slthuoc'];
            $gia=$row['gia'];
            $tongtien=$row['tongtien'];
            $thanhtien=$row['thanhtien'];
            $sothuoc=$row['sothuoc'];
            $ngaylap=$row['ngaylap'];
            $tenthuoc=$row['tenthuoc'];
            $lieuluong=$row['lieuluong'];
            $email=$row['email'];
            $sdt=$row['sdt'];
            $ngaysinh=$row['ngaysinh'];
            $ketluandieutri=$row['ketluandieutri'];
            $trangthaithanhtoan=$row['trangthaithanhtoan'];
            $diachi=$row['diachi'];
              $dem=1;

echo'<div class="row">
              
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
                              <h3 class="text-uppercase">Mã hóa đơn: '.$idhd.'</h3>
                              <ul class="list-unstyled">
                                  <li>Ngày khám: <span>'.$ngaylap.'</span></li>
                                  
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6 col-lg-6 ">
      
        <h4>Họ và tên bệnh nhân:  '.$tenbn.' </h4>
        <ul class="list-unstyled">          
          <li>Mã bệnh nhân: <span>0'.$idbn.'</span></li>
          <li>Kết quả khám bệnh: <span>'.$ketluandieutri.'</span></li>
        </ul>
        </div>
                
        </div>
      <div class="col-sm-12" style="text-align:center;">
      <h2>Đơn thuốc</h2>
      </div>
      <p>Trạng thái :</p> <input name="trangthaithanhtoan" style="border:none" readonly id="trangthaithanhtoan" value="'.$trangthaithanhtoan.'"> 
                        <p>Số thuốc : '.$sothuoc.'</p><br>
                      
                        </div>
                      </div>
                      <table class="table">
                      <tr class="titles">
                        <th>Số</th>
                        <th>Tên thuốc</th>
                        <th>Số lượng</th>
                        <th>Liều lượng</th>
                        <th>Thành tiền(VND)</th>
                        <th>Đơn vị</th>
                        
                      </tr>            
                     ';
          $sqlmain1="select *,bacsi.tenbs, thuoc.lieuluong ,thuoc.donvitinh,benhnhan.tenbn,benhnhan.sdt,benhnhan.diachi, benhnhan.email, benhnhan.ngaysinh, donthuoc.ngaylap,chitietdonthuoc.slthuoc,chitietdonthuoc.gia,chitietdonthuoc.idthuoc, thuoc.tenthuoc from chitietdonthuoc inner join donthuoc on donthuoc.id=chitietdonthuoc.iddt inner join hoadonthuoc on donthuoc.id=hoadonthuoc.iddt inner join thuoc on chitietdonthuoc.idthuoc=thuoc.id inner join benhnhan on hoadonthuoc.idbn=benhnhan.id inner join bacsi on donthuoc.idbs=bacsi.id where donthuoc.id='$id' order by donthuoc.id asc";

                        $results = mysqli_query($mysqli,$sqlmain1);    
		while($row = mysqli_fetch_array($results, MYSQLI_ASSOC))
		{	
      $slthuoc=$row['slthuoc'];
      $gia=$row['gia'];
      $tongtien=$row['tongtien'];
      $thanhtien=$row['thanhtien'];
      $sothuoc=$row['sothuoc'];
      $ngaylap=$row['ngaylap'];
      $tenthuoc=$row['tenthuoc'];
      $lieuluong=$row['lieuluong'];

      $tenbs=$row['tenbs'];
      $donvi=$row['donvitinh'];
		echo'

                        <tr class="item" id="ProductList">
                        <td><span id="">'.$dem++.'<span></span></span></td>
                          <td id="Product"><span id="ProuductName">'.$row['tenthuoc'].'</span></td>
                          <td><span class="center" id="ProductNumUnits">'.$slthuoc.'</span></td>
                          <td><span class="center" id="ProductNumUnits">'.$lieuluong.'</span></td>
                          <td><span id="ProductUnit">'.$gia.'<span></span></span></td>
                          <td><span id="ProductUnit">'.$donvi.'<span></span></span></td>

                      

                          
                        </tr>
                        ';
                     
    }
               
echo' </table>

                    <div class="col-md-12  row">
                          <table class="right" style="font-size:16px">
                          <tr>
                          <td><span style="display:inline-block;margin-right:10px;"><strong>Tổng tiền:</strong></span></td>
                          <td><span id="InvoceTotalVat"></span> <span id="InvoiceCurrency1">'.$tongtien.' VND</span><br></td>
                        </tr>
                           
                          </table>
                          </div>
                          
                          </div>
                          <div class="col-md-12 row">
                          <div class="col-md-6 ">
                          <span><strong>Bác sĩ kê đơn</strong></span>
                          <div class="col-md-6 ">
                          <span>'.$tenbs.'</span>
                          </div>
                      </div>
                      <div class="col-md-6 text-right ">
                      <span><strong>Nhân viên thuốc</strong></span> <br><br>
                      <span>'.$ten.'</span>
                      </div>
                    </div>
                  </div>
                 '
                 ;
  }
}
              }
            }
            // <button class="btn btn-danger "><a class="text-light" href="./vnpay_php/index.php?thanhtoan=Xem&iddt='.$id.'&idbn='.$idbn.'" >Thanh toán VNPAY </a></button>
            // &nbsp;&nbsp;&nbsp
          ;?>
                  <input type="submit"  class="btn btn-danger" data-dismiss="modal" id="thanhtoan" name="thanhtoan" value="Thanh toán VNPAY"/>


                  <input type="submit"  class="btn btn-success" data-dismiss="modal" id="thanhtoan" name="thanhtoan" value="Thanh toán tiền mặt"/>
              
             
             
                </div>
              </div>
         
          <?php
            switch ($_POST['thanhtoan'])
            {
              case'Thanh toán tiền mặt':
            {	
              

              $trangthaithanhtoan=$_REQUEST['trangthaithanhtoan'];
              // $idpkb =$_REQUEST['idpkb'];
              
              
              if( $trangthaithanhtoan!='')
              {		if($trangthaithanhtoan=='Chưa thanh toán'){
                if($q->themxoasua("UPDATE hoadonthuoc set trangthaithanhtoan='Đã thanh toán',idnv=9 where id=$idhd order by id limit 1")){
                  echo '<script >alert("Thanh toán thành công!"); window.location="lichsuthanhtoan.php";</script>';

                } else{
                  echo'<script >alert("Thanh toán thất bại!")</script>';
                }
            }
            else{
                echo'<script >alert("Thanh toán thất bại! Có thể hóa đơn đã thanh toán")</script>';
            }
             }
           
            else
            
          {echo 'Vui lòng nhập đầy đủ';
            }
            
            }
            case'Thanh toán VNPAY':
                {	
                  
    
                  $trangthaithanhtoan=$_REQUEST['trangthaithanhtoan'];
                  // $idpkb =$_REQUEST['idpkb'];
                  
                  
                  if( $trangthaithanhtoan!='')
                  {		if($trangthaithanhtoan=='Chưa thanh toán'){
                  echo '<script >alert("Tiến hành thanh toán VNPAY!"); window.location="./vnpay_php/index.php?thanhtoan=Xem&iddt='.$id.'&idbn='.$idbn.'";</script>';

                   
                }
                else{
                    echo'<script >alert("Thanh toán thất bại! Có thể hóa đơn đã thanh toán")</script>';
                }
                 }
               
                else
                
              {echo 'Vui lòng nhập đầy đủ';
                }
                
                }
                break;
        }

 ?>
</body>
<div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</html>