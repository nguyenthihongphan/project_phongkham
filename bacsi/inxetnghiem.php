<?php
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
    include_once('./tcpdf_6_2_13/tcpdf/tcpdf.php');

	include("../Admin/assets/login_tmd.php");
	include('db-connect.php');
	$q= new login();
	$bs= new loginbs();
	$bs->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:../Admin/login.php');
	}
    
  
include("../Admin/assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$bs->luachon("SELECT bacsi.tenbs from bacsi where id='$iduser' limit 1");
$idbs=$bs->luachon("SELECT id from bacsi where id='$iduser' limit 1");
$sdtbs=$bs->luachon("SELECT sdt from bacsi where id='$iduser' limit 1");
$ebs=$bs->luachon("SELECT email from bacsi where id='$iduser' limit 1");
$ckbs=$bs->luachon("SELECT chuyenkhoa.tenck from bacsi inner join chuyenkhoa on bacsi.idck = chuyenkhoa.id where bacsi.id='$iduser' limit 1");


$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     
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
 .selectt {
           
            display: none;
         
        }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Phòng khám đa khoa</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css"  href="../Admin/assets/css/style.css">
</head>
<?php

        if($_GET){
            mysql_set_charset('utf8',$mysqli);
          $id=$_GET["id"];
          $action=$_GET["action"];
          include("./QR-code/phpqrcode/qrlib.php");
  $path = './QR-code/images/';
  $qrcode = $path.time().".png";                    
  QRcode::png("http://localhost:8888/phongkhamgiadinh/nhanvienthuoc/thanhtoan.php?action=thanhtoan&&idbn=$idbn&&iddt=$id",$qrcode);


          if($action=='inxetnghiem'){
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);  
            //$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
            $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            $pdf->SetDefaultMonospacedFont('times');  
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
            $pdf->setPrintHeader(false);  
            $pdf->setPrintFooter(false);  
            $pdf->SetAutoPageBreak(TRUE, 10);  
           
            $lang = 'vi';
  // $pdf->SetFont(($lang == 'zh' ? 'cid0cs' : 'Helvetica'), 'I', 8);
            $pdf->SetFont('dejavusans', '', 10, '', true);  
            $pdf->setLanguageArray($lang);
            $pdf->AddPage(); //default A4
            //$pdf->AddPage('P','A5'); //when you require custome page size 
            $sqlmain= "select * ,phieuxetnghiem.ngayxn, phieuxetnghiem.id,phieukhambenh.ketluandieutri, phieuxetnghiem.idpkb from phieuxetnghiem inner join benhnhan on phieuxetnghiem.idbn=benhnhan.id inner join phieukhambenh on phieuxetnghiem.idpkb=phieukhambenh.idpkb  where phieuxetnghiem.idbs='$idbs' AND phieuxetnghiem.id=$id AND phieuxetnghiem.idbn=benhnhan.id  ";
                    
            $inv_det_results= $mysqli->query($sqlmain); 
            // $row=$result->fetch_assoc(); 
            
              if($inv_det_results->num_rows>0){
              for( $x=0; $x<$inv_det_results->num_rows;$x++){
            // $inv_det_results = mysqli_query($con,$inv_det_query);    
        
            $row = $inv_det_results->fetch_assoc();
            $idpkb=$row['idpkb'];
            $idxn=$row['id'];
            $idbn=$row['idbn'];
            $tenbn=$row['tenbn'];
            $loaixn=$row["loaixn"];
            $ketquaxn=$row["ketquaxn"];
            $ngayxn=$row["ngayxn"];  
            $ngaykham=$row["ngaykham"];           
            $email=$row['email'];
            $sdt=$row['sdt'];
            $ngaysinh=$row['ngaysinh'];
            $ketluandieutri=$row['ketluandieutri'];
            $diachi=$row['diachi'];
              $dem=1;

              $content= '';
            $content.= '
            <html>
            <head>
              <meta charset="utf-8">
              <meta content="width=device-width, initial-scale=1" name="viewport">
              <title>Sequra - Faktura</title>
              <style>
              </style>
            </head>
            <body>
              <style>
                @import url(https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic);
            /** GLOBAL **/
            
            html, body {
              height: 100%;
              background: #002336;
              width: 100%;
              margin: 0;
              padding: 0;
              left: 0;
              top: 0;
              font-size: 10px;
            }
            * {
              font-family: dejavusans;
              color: #333447;
            }
            /* TYPOGRAPHY */
            
            h1 {
              font-size: 2.5rem;
            }
            h2 {
              font-size: 2rem;
            }
            h3 {
              font-size: 1.375rem;
            }
            h4 {
              font-size: 1.125rem;
            }
            h5 {
              font-size: 1rem;
            }
            h6 {
              font-size: 0.875rem;
            }
            p {
              font-size: 1.125rem;
              font-weight: 200;
              line-height: 1.8;
            }
            .font-light {
              font-weight: 300;
            }
            .font-regular {
              font-weight: 400;
            }
            .font-heavy {
              font-weight: 700;
            }
            /* POSITIONING */
            
            .left {
              text-align: left;
            }
            .right {
              float: right;
              text-align: right;
            }
            .center {
              text-align: center;
              margin-left: auto;
              margin-right: auto;
            }
            .justify {
              text-align: justify;
            }
            /** standard padding**/
            
            .no-padding {
              padding: 0px;
            }
            .standard-padding {
              padding: 20px;
            }
            .standard-padding-right {
              padding-right: 20px;
            }
            .standard-padding-left {
              padding-left: 20px;
            }
            .standard-padding-right {
              padding-left: 20px;
            }
            .standard-padding-top {
              padding-top: 20px;
            }
            .standard-padding-bottom {
              padding-bottom: 20px;
            }
         //    .container {
         //      width: 100%;
         //      margin-left: auto;
         //      margin-right: auto;
         //    }
            .row {
              position: relative;
              width: 100%;
            }
            .row [class^="col"] {
              float: left;
              margin: 0.5rem 2%;
              min-height: 0.125rem;
            }
            .row::after {
              content: "";
              display: table;
              clear: both;
            }
            .hidden-sm {
              display: none;
            }
            .invoice-box {
              background: #ffffff;
              max-width: 900px;
              margin: 20px auto;
              padding: 10px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
              font-size: 16px;
              line-height: 24px;
              color: #002336;
            }
            .title {
              margin-bottom: 0px;
              padding-bottom: 0px;
              margin-left: 10px;
              margin-right: 10px;
              font-weight: bold;
              border-bottom: 1px solid #8B8B8B;
              margin-bottom: 4px;
            }
            .infoblock {
              margin-left: 10px;
              margin-right: 10px;
              margin-top: 0px;
              padding-top: 0px;
            }
            .titles {
              padding-top: 4px;
              margin-top: 20px;
              background: #DCDCDC;
              font-weight: bold;
            }
            @media only screen and (max-width: 600px) {
              .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
              }
              .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
              }
            }
            /** RTL **/
            
            .rtl {
              direction: rtl;
            }
            .rtl table {
              text-align: right;
            }
            .rtl table tr td:nth-child(2) {
              text-align: left;
            }
            .eqWrap {
              display: flex;
            }
            .eq {
              padding: 10px;
            }
            .item:nth-of-type(odd) {
              background: #F9F9F9;
            }
            .item:nth-of-type(even) {
              background: #fff;
            }
            .equalHW {
              flex: 1;
            }
            .equalHM {
              width: 32%;
            }
            .equalHMR {
              width: 32%;
              margin-bottom: 2%;
            }
            table.table {
              width: 100%;
              margin-top: 20px;
              border-collapse: collapse;
              border:1px solid #dded;
            }
            table.tablee {
              width: 100%;
              margin-top: 20px;
              border-collapse: collapse;
            }
            .table th, .table td {
              text-align: left;
              padding: 0.25em;
              border-bottom: 1px solid #DDD;
            }
            .table tr {
              border-bottom: 1px solid #DDD;
            }
           
            button:hover {
              box-shadow: 0 0 4px rgba(3, 3, 3, 0.8);
              opacity: 0.9;
            }
              </style>
                  <div class="row" style="display:flex;flex-direction: row-reverse;">
                  <table class="tablee">
                      <tr class="item" id="ProductList">
                        <td id="Product"><span id="ProuductName">  <div class="  logo-block">
                        <a href=""><img src="../Admin/assets/img/logo-dark.png" style="width:100%; width:80px; margin-left:50px"></a>
                      </div></span></td>
                      <td><span id="ProductUnit"> <span></span></span></td>



                      <td id="Product"><span id="ProuductName"> <span style="display:inline-block;margin-right:60px;"><strong>Mã khám bệnh: '.$idpkb.' </strong></span><br>
                      <span style="display:inline-block;margin-right:60px;"><strong>Mã phiếu xét nghiệm: '.$id.' </strong></span><br>
                      <span style="display:inline-block;margin-right:60px;"><strong>Ngày khám: '.$ngaykham.' </strong></span>

                     </span></td>

                    

                        
                      </tr>
                      </table>
                   
                      <div class="watermark">
                  <span id="watermark" style="font: size 13px;"><b>PHÒNG KHÁM ĐA KHOA ĐP</b></span>
                  </div>
                      <div class="equalHW eq contact-info-block">
                      <span>Địa chỉ: Nguyễn Văn Bảo,Gò Vấp,HCM</span><br>
                                            
                        <span id="AccountEmail">Email: phongkhamdp@gmail.com </span><br>
                        <span id="AccountPhone">Số điện thoại: 0374389835</span>
                      </div>
                      
                   
                  
                    <div class="row" style="margin:20px;font-size:15px; text-align:center">
                        <div class="equalHW eq nomargin-nopadding title">
                          PHIẾU XÉT NGHIỆM
                        </div>
                       
                      </div>
                      
                      <div class="row" style="font-size:12px;">
                     <span  id="ProductName">Họ và tên bệnh nhân : '.$tenbn.'</span><br>
                           
                           
                            <span id="AccountProject">Email: '.$email.'</span><br>
                            <span id="CustomerAddress">Địa chỉ: '.$diachi.'</span><br>
                            <span id="CustomerPostalCode">Số điện thoại: 0'.$sdt.'</span><br>
                            <span id="CustomerCountry">Ngày sinh: '.$ngaysinh.'</span><br>
                            <span id="CustomerCountry">Ngày xét nghiệm: '.$ngayxn.'</span><br>

                          </div>
                          <div class="equalHW eq nomargin-nopadding title" style="font-size:12px;">
                          KẾT QUẢ XÉT NGHIỆM
                        </div>
                      <div class="row" style="font-size:12px;" >
                        <span id="CustomerName">Loại xét nghiệm: '.$loaixn.'</span><br>
                        <span id="AccountProject">Kết quả xét nghiệm: '.$ketquaxn.'</span><br>
                        <span id="CustomerPostalCode">Kết luận điều trị: '.$ketluandieutri.'</span><br>
                        <span id="CustomerPostalCode">Ghi chú:......................................................................................................................
                        ..................................................................................................................................... </span><br>

 </div>
 
  </div>
                    <div class="row">
                         
                       
                      <div class="center">
                      <span>TPHCM, ngày....tháng....năm 2023</span><br><br>
                      <span><strong>Bác sĩ</strong></span>
                      <span><strong>Ký tên</strong></span> <br><br><br><br><br>
                      <span>'.$ten.'</span>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </body>
            </html>'
             ;
             
            }
            
            }
             $pdf->writeHTML($content);
             $datetime=date('dmY_hms');
 $file_name = "phieuxetnghiem_".$datetime.".pdf";
 ob_end_clean();
 
             $pdf->Output($file_name, 'I');
 
             }
         
             
 
           
         }
 ?>