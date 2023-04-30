<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('database.inc.php');
$txt=mysqli_real_escape_string($con,$_POST['txt']);
$sql="select reply from chatbot_hints where question like '%$txt%'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$html=$row['reply'];
}else{
	$html="Sorry not be able to understand you";
}
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,phanquyen) values('$txt','$added_on','0')");
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,phanquyen) values('$html','$added_on','1')");
echo $html;
?>