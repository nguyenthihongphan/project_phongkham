<?php
header('Content-Type: text/html; charset=utf-8');
	$conn = mysqli_connect("localhost","pkgd","123456","phongkham");
	$id = $_GET["id"];
	
	//câu lệnh delete
	$sql = "delete from benhnhan where id='$id'";
	if (mysqli_query($conn,$sql))//Nếu thành công chuyển về file ds
	{
		header('location: patients.php');
	}
	else{//lỗi
		$result = "Xóa chưa thành công". mysqli_error($conn);
	}
//ngắt kết nối
mysqli_close($conn);
?>