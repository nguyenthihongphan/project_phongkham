<?php
header('Content-Type: text/html; charset=utf-8');
	$conn = mysqli_connect("localhost","pkgd","123456","phongkham");
	
		$id = $_GET["idlk"];


	
	//câu lệnh delete
	$sql = "DELETE FROM lichkham where id= '$id' ";
	if (mysqli_query($conn,$sql))//Nếu thành công chuyển về file ds
	{
		header('location:cho_thanh_toan.php');
	}
	else{//lỗi
		$result = "Xóa không thành công". mysqli_error($conn);
	}
//ngắt kết nối
mysqli_close($conn);
?>