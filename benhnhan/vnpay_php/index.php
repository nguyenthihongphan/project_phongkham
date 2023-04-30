<?php 
session_start();
include("../login_tmd.php");
	
	$q= new login();
    $iduser=$_SESSION['id'];
// $layid = $_SESSION['id'];
$idlk=$q->luachon("select lichkham.id,chuyenkhoa.tenck,lichkham.trangthaithanhtoan, bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichkham.lichngaykham,lichkham.giokham,lichkham.trangthai from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id inner join chuyenkhoa on lichtrinh.idck= chuyenkhoa.id where lichtrinh.ngaykham>='$today' order by lichtrinh.ngaykham asc");
$ten=$q->luachon("select tenbn from benhnhan where id='$iduser' limit 1");
$idbn=$q->luachon("select id from benhnhan where id='$iduser' limit 1");
include("../../Admin/assets/db_config.php");
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
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="./assets/bootstrap.min.css" rel="stylesheet"/>
        <link href="../../Admin/assets/db" rel="stylesheet"/>


        <!-- Custom styles for this template -->
        <link href="./assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="./assets/jquery-1.11.3.min.js"></script>
    </head>

    <body>
        <?php require_once("./config.php"); 
        
      if($_GET){
        
        $id=$_GET["id"];
        $idlk=$_GET["idlk"];
        $action=$_GET["thanhtoan"];
        if($action=='Xem'){
        ?>             
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Thanh toán VNPAY</h3>
            </div>
            <h3>Thanh toán phí dịch vụ</h3>
            <div class="table-responsive">
                <form action="./vnpay_create_payment.php" id="create_form" method="post">       

                    <div class="form-group">
                        <label for="language">Loại thanh toán </label>
                        <select name="order_type" id="order_type" class="form-control">
                            <!-- <option value="topup">Nạp tiền điện thoại</option> -->
                            <option value="billpayment">Thanh toán hóa đơn</option>
                            <!-- <option value="fashion">Thời trang</option> -->
                            <!-- <option value="other">Khác - Xem thêm tại VNPAY</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Mã lịch khám</label>
                        <input class="form-control" readonly id="order_id" name="order_id" type="text"  value="<?php  echo $q->luachon("select lichkham.id from lichkham inner join benhnhan on lichkham.idbn='$idbn' where lichkham.id='$idlk'  limit 1");?>"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Phí dịch vụ</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number" readonly value="<?php  echo $q->luachon("select phidichvu from lichkham where id='$idlk' AND idbn='$idbn' limit 1");?>"/>
                    </div>
                    <div class="form-group" >
                        <label for="order_desc">Nội dung thanh toán</label>
                           <textarea class="form-control"  cols="20" id="order_desc" name="order_desc" rows="2">Nội dung thanh toán</textarea>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thời hạn thanh toán</label>
                        <input class="form-control" id="txtexpire"
                               name="txtexpire" type="text" value="<?php echo $expire; ?>"/>
                    </div>
                    <div class="form-group">
                        <h3>Thông tin bệnh nhân</h3>
                    </div>
                    <div class="form-group">
                        <label >Họ và tên</label>
                        <input class="form-control" id="txt_billing_fullname"
                               name="txt_billing_fullname" readonly type="text" value="<?php  echo $q->luachon("select benhnhan.tenbn from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>             
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" id="txt_billing_email"
                               name="txt_billing_email" readonly type="text" value="<?php  echo $q->luachon("select benhnhan.email from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>   
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" id="txt_billing_mobile"
                               name="txt_billing_mobile" readonly type="text"value="0<?php  echo $q->luachon("select benhnhan.sdt from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>   
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" id="txt_billing_addr1"
                               name="txt_billing_addr1" readonly type="text" value="<?php  echo $q->luachon("select benhnhan.diachi from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>"/>   
                    </div>
                    <div class="form-group">
                        <label>trang thái thanh toán</label>
                        <input class="form-control" id="txt_billing"
                               name="txt_trangthai" type="text" value="<?php  echo $q->luachon("select lichkham.trangthaithanhtoan from lichkham where  id='$idlk' AND idbn='$idbn' limit 1");?>"/>   
                    </div>
                    <!-- <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Post</button> -->
                    <input type="submit" name="redirect" id="redirect" class="btn btn-primary" value="Tiếp tục thanh toán">
     
                </form>
                <?php }
                }?>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
              <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
       
         


    </body>
</html>
