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
    <title>In hồ sơ bệnh án</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css"  href="../Admin/assets/css/style.css">
</head>
<?php

        if($_GET){
            // mysql_set_charset('utf8',$mysqli);
            $id=$_GET["idba"];
            $idbn=$_GET["idbn"];
          $action=$_GET["action"];
          if($action=='inchitiethosobenhan'){
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
            $sqlmain= "select *, benhnhan.id,benhnhan.nghenghiep, benhnhan.gioitinh,phieukhambenh.ketluandieutri, benhnhan.tenbn,benhnhan.ngaysinh,phieukhambenh.xetnghiem, phieukhambenh.lydo, phieukhambenh.chuandoan, benhnhan.diachi, benhnhan.email, benhnhan.sdt from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join phieukhambenh on benhan.idpkb=phieukhambenh.idpkb where benhan.id= '$id'";
            $result= $mysqli->query($sqlmain); 
            // $row=$result->fetch_assoc(); 
            
              if($result->num_rows>0){
              for( $x=0; $x<$result->num_rows;$x++){
            // $result = mysqli_query($con,$inv_det_query);    
        
            $row = $result->fetch_assoc();
            $tenba=$row["tenba"];
            $tenbn=$row["tenbn"];
            $idbnn=$row["idbn"];
            $sdt=$row["sdt"];
            $lydo=$row["lydo"];
            $chandoan=$row["chuandoan"];
            $ngaysinh=$row["ngaysinh"];
            $xetnghiem=$row["xetnghiem"];
            $diachi=$row["diachi"];
            $gioitinh=$row["gioitinh"];
            $email=$row["email"];
            $chuandoan=$row["chuandoan"];
            $kqdieutri=$row["ketluandieutri"];
            $ngaykham=$row["ngaykham"];
            $idpkbb=$row["idpkb"];
            $nghenghiep=$row["nghenghiep"];

            $content= '';
            $content.= '
            <style>
           
            .right {
              float: right;
              text-align: right;
            }

table {
  width: 100%;
}
.list-unstyled {
  text-decoration:none;
}
.border{
  border-bottom: 1px solid #dddd;

}
</style>
</head>
<body>

<table>

  <tr>
  <td>
<img src="../Admin/assets/img/logo-dark.png" class="inv-logo" style="width:50px" alt=""><br>

<p><h3>PHÒNG KHÁM ĐA KHOA ĐP</h3></p>
<p>Địa chỉ: Nguyễn Văn Bảo,Gò Vấp,HCM</p>
<p>Số điện thoại: 0374389835</p>
<p>GST No:120</p>

</td>

  
    <td>
    <div class="right">
    <h3 class="text-uppercase">Mã bệnh án :  '.$id.'</h3>
    <h4 class="">Mã khám bệnh :  '.$idpkbb.'</h4>

        <p>Ngày khám:'.$ngaykham.'</p>

    </div>
    </td>
  </tr>

</table>
<hr>
<table>

  <tr>
  <td>
  <h4>Họ tên bệnh nhân:   '.$tenbn.' </h4>
                                                     
                                                         
    <p>Mã bệnh nhân: <span>0'.$idbn.'</span></p>
    <p>Giới tính:  '.$gioitinh.'</p>
    <p>Địa chỉ:  '.$diachi.'</p>
    <p>Số điện thoại: 0'.$sdt.'</p>
    <p>Email:  '.$email.'</p>
    <p>Ngày sinh:  '.$ngaysinh.'</p>
    <p>Nghề nghiệp:  '.$nghenghiep.'</p>
</td>

  
    <td>
    <p>
    Lý do khám: '.$lydo.'
</p>
<p>
    Chuẩn đoán khám bệnh:  '.$chandoan.'
</p>
<p>  Tình trạng xét nghiệm:  '.$xetnghiem.'</p>

    </td>
  </tr>

</table>

      <div class="col-sm-12" style="text-align:center;">
      <h2>Bệnh án '.$tenba.'</h2>
      </div>
      </div>
                  
      <div class="col-sm-12" style="border: solid 1px #aaaa; padding:15px" >
      <h4  class="border"> Khám bệnh:</h4>
      <ul class="list-unstyled">
        <p><b>Ngày khám bệnh:</b>  '.$ngaykham.'</p>
        <p><b>Lý do khám bệnh:</b>  '.$lydo.'</p>
        <p><b>Chẩn đoán trước khám bệnh:</b>  '.$chandoan.'</p>
        <p><b>Hình thức: '.$xetnghiem.'</b></p>
        <p><b>Kết quả sau khi khám bệnh:</b>  '.$kqdieutri.'</p>
        <p><b>Ghi chú: </b> ............................................................................................................................................................................................................................................................. 
        </p>
      </ul>';
                                         
                                        //   <!-- Xét nghiệm -->
                                          
           $sqlmain1= "select *,phieuxetnghiem.ketquaxn,phieuxetnghiem.ngayxn,phieuxetnghiem.loaixn, benhnhan.tenbn,benhnhan.ngaysinh,phieukhambenh.xetnghiem, phieukhambenh.lydo, phieukhambenh.chuandoan, benhnhan.diachi, benhnhan.email, benhnhan.sdt from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join phieukhambenh on benhan.idpkb=phieukhambenh.idpkb inner join phieuxetnghiem on phieukhambenh.idpkb=phieuxetnghiem.idpkb where benhan.id= '$id'";
           $result1= $mysqli->query($sqlmain1);
           $row=$result1->fetch_assoc();
           $tenba=$row["tenba"];
           $idpkbb=$row["idpkb"];
           $loaixn=$row["loaixn"];
           $tenbn=$row["tenbn"];
           $idbn=$row["idbn"];
           $sdt=$row["sdt"];
           $lydo=$row["lydo"];
           $chandoan=$row["chuandoan"];
           $ngayxn=$row["ngayxn"];
           $xetnghiem=$row["xetnghiem"];
           $kqxn=$row["ketquaxn"];
         
          $content.='              
                                         <h4 class="border"> Kết quả xét nghiệm:</h4>
                                         <ul class="list-unstyled">
                                             <p><b>Ngày xét nghiệm:</b>  '.$ngayxn.'</p>
                                             <p><b>Chẩn đoán:</b>  '.$chandoan.'</p>
                                             <p><b>Loại xét nghiệm:</b>  '.$loaixn.'</p>
                                             <p><b>Kết quả xét nghiệm:</b>  '.$kqxn.'</p>
                                             <p><b>Ghi chú:</b> ............................................................................................................................................................................................................................................................. 
                                             </p>
                                         </ul>';
                                         
                                                            //    <!-- Siêu âm -->
                                                             
           $sqlmain2= "select *, phieusieuam.ngaysa, phieusieuam.chandoan, phieusieuam.mota, phieusieuam.kqsa, benhnhan.tenbn,benhnhan.ngaysinh,phieukhambenh.xetnghiem, phieukhambenh.lydo, phieukhambenh.chuandoan, benhnhan.diachi, benhnhan.email, benhnhan.sdt from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join phieukhambenh on benhan.idpkb=phieukhambenh.idpkb inner join phieusieuam on phieukhambenh.idpkb=phieusieuam.idpkb where benhan.id= '$id'";
           $result2= $mysqli->query($sqlmain2);
           $row=$result2->fetch_assoc();
           $tenba=$row["tenba"];
           $idpkbb=$row["idpkb"];
           $loaixn=$row["loaixn"];
           $kqsa=$row["kqsa"];
           $loaisa=$row["loaisa"];
           $idbn=$row["idbn"];
           $mota=$row["mota"];
           $lydo=$row["lydo"];
           $chandoansa=$row["chandoan"];
           $ngaysa=$row["ngaysa"];
           $xetnghiem=$row["xetnghiem"];
          $content.='
                                         <h4  class="border"> Kết quả siêu âm:</h4>
                                         <ul class="list-unstyled">
                                             <p><b>Ngày siêu âm:</b>  '.$ngaysa.'</p>
                                             <p><b>Chẩn đoán:</b>  '.$chandoansa.'</p>
                                             <p><b>Loại siêu âm:</b>  '.$loaisa.'</p>
                                             <p><b>Mô tả tổn thương:</b>  '.$mota.'</p>
                                             <p><b>Kết quả siêu âm:</b>  '.$kqsa.'</p>
                                             <p><b>Ghi chú:</b> ............................................................................................................................................................................................................................................................. 
                                             </p>
                                         </ul>
                                         </div>
                                         <div><br>
                                         <h4  class="border"> Tái khám:</h4>
                                         <ul class="list-unstyled">
                                             <p><b>Ngày tái khám:</b>  Ngày.....tháng.....năm 2023</p>
                                             <p><b>Giờ cụ thể (nếu có):.....giờ.....phút</p>
                                             <p><b>Ghi chú:</b> ............................................................................................................................................................................................................................................................. 
                                             <div class="row invoice-payment">
                                                 <div class="col-sm-8">
                                                 </div>
                                                 <div class="col-sm-4">
                                                     <div class="m-b-20">
                                                         <p style="text-align:center">........., ngày.....tháng.....năm....</p>
                                                         <p style="text-align:center">Bác sĩ  '.$ckbs.' </p>
                                                         
                                                         <p style="text-align:center"> <i>Ký tên</i></p>
                                                         <br><br>
                                                         <h4 style="text-align:center">  '.$ten.'</h4>
                                                     </div>
                                                 </div>
                                             </div>
         
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    </div>
                  </div>
                 </form>
           </div>
         
          </div>
                       </section>
                  </div>';
              }
            }
               
             $pdf->writeHTML($content);
             $datetime=date('dmY_hms');
 $file_name = "benhan_".$datetime.".pdf";
 ob_end_clean();
 
             $pdf->Output($file_name, 'I');
 
          }              
        }
        
    
          ?>