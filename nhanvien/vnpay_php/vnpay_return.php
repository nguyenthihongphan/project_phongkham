<?php 
session_start();
include("../assets/login_tmd.php");
	
	$q= new login();
    $iduser=$_SESSION['id'];
// $layid = $_SESSION['id'];
$idlk=$q->luachon("select lichkham.id,chuyenkhoa.tenck,lichkham.trangthaithanhtoan, bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichkham.lichngaykham,lichkham.giokham,lichkham.trangthai from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id inner join chuyenkhoa on lichtrinh.idck= chuyenkhoa.id where lichtrinh.ngaykham>='$today' order by lichtrinh.ngaykham asc");
// $ten=$q->luachon("select tenbn from benhnhan where id='$iduser' limit 1");
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
        <title>THÔNG TIN THANH TOÁN</title>
        <!-- Bootstrap core CSS -->
        <link href="./assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="./assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="./assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Thông tin thanh toán</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã lịch khám:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">
                    <label >Tên bệnh nhân:</label>

                    <label><?php  echo $q->luachon("select benhnhan.tenbn from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$idlk' AND lichkham.idbn='$idbn' limit 1");?>
                 </label>
                </div>
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        // if ($secureHash == $vnp_SecureHash) {
                        //     if ($_GET['vnp_ResponseCode'] == '00') {
                        //         echo "<span style='color:blue'>GD Thành công</span>";
                        //     } else {
                        //         echo "<span style='color:red'>GD Không thành công</span>";
                        //     }
                        // } else {
                        //     echo "<span style='color:red'>Chữ ký không hợp lệ</span>";
                        // }
                        require_once("../../nhanvien/assets/db_config.php");
if(isset($_GET['vnp_Amount'])){
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTraNo = $_GET['vnp_TransactionNo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_OrderInfo =$_GET['vnp_OrderInfo'];
    $vnp_TxnRef =$_GET['vnp_TxnRef'];
    // $vnp_BankType =$_GET['vnp_BankType'];
    $trangthaithanhtoan = $_SESSION['trangthaithanhtoan'];
    $idlk=$_SESSION['id'];
    //update
    $update ="UPDATE lichkham set trangthaithanhtoan ='Đã thanh toán' where id='$vnp_TxnRef ' limit 1";
    // $update_query = "INSERT INTO thanhtoan(vnp_amount,vnp_txref,vnp_bankcode,vnp_transactionno,vnp_paydate,vnp_orderinfo) VALUE('$vnp_Amount','$vnp_TxnRef','$vnp_BankCode','$vnp_BankTraNo','$vnp_PayDate','$vnp_OrderInfo')";
    // $lichkham_query = mysqli_query($mysqli,$update_query);
    if($mysqli->query($update)== TRUE){
        echo "<span style='color:blue'>Giao dịch  Thành công</span>";

    }else{
        echo "<span style='color:red'>Giao dịch không thành công</span>";

    }
}
                        ?>

                    </label>
                    <h3> Thanh toán phí khám thành công cho bệnh nhân
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <a href="../cho_kham.php"><button class="btn btn-success" type="submit">Quay lại</button></a>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
<!-- 
require_once("../../Admin/assets/db_config.php");
if(isset($_GET['vnp_Amount'])){
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTraNo = $_GET['vnp_TransactionNo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_OrderInfo =$_GET['vnp_OrderInfo'];
    $vnp_TxnRef =$_GET['vnp_TxnRef'];
    // $vnp_BankType =$_GET['vnp_BankType'];
    $trangthaithanhtoan = $_SESSION['trangthaithanhtoan'];
    $idlk=$_SESSION['id'];
    //update
    $update ="UPDATE lichkham set trangthaithanhtoan =' Đã thanh toán' where '$idlk' limit 1";
    // $update_query = "INSERT INTO thanhtoan(vnp_amount,vnp_txref,vnp_bankcode,vnp_transactionno,vnp_paydate,vnp_orderinfo) VALUE('$vnp_Amount','$vnp_TxnRef','$vnp_BankCode','$vnp_BankTraNo','$vnp_PayDate','$vnp_OrderInfo')";
    // $lichkham_query = mysqli_query($mysqli,$update_query);
    if($mysqli->query($update)== TRUE){
        echo "<span style='color:blue'>GD Thành công</span>";

    }else{
        echo "<span style='color:red'>GD Không thành công</span>";

    }
}
                        ?> -->