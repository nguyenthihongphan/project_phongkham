<?php
header('Content-Type: text/html; charset=utf-8');
	$conn = mysqli_connect("localhost","pkgd","123456","phongkham");
	
		$id = $_GET["idbs"];


	
	//câu lệnh delete
	$sql = "DELETE FROM bacsi where id= '$id'";
	if (mysqli_query($conn,$sql))//Nếu thành công chuyển về file ds
	{
		header('location: doctors.php');
	}
	else{//lỗi
		$result = "Xóa chưa thành công". mysqli_error($conn);
	}
//ngắt kết nối
mysqli_close($conn);
?>