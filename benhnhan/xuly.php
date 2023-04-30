<?php
// header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'pkgd', '123456', 'phongkham') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$verify_password= trim($_POST['password_confirmation']);
$ten = trim($_POST['ten']);
$gioitinh = trim($_POST['gioitinh']);
$email = trim($_POST['email']);
$ngaysinh = trim($_POST['ngaysinh']);
$diachi = trim($_POST['diachi']);
$sdt = trim($_POST['sdt']);
$nghenghiep = trim($_POST['nghenghiep']);

if (empty($username)) {
$errorUser = "Vui lòng nhập email"; 
}
if (empty($ten)) {
$errorTen = "Vui lòng nhập tên"; 
}
if (empty($password)) {
$errorPass = "Password không trùng khớp"; 
}
// Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
if ( $password != $verify_password )
{
echo '<script language="javascript">alert("Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu."); window.location="register.php";</script>';
exit;
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM benhnhan WHERE username = '$username'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Email đã tồn tại!"); window.location="register.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO benhnhan (tenbn,username, password,gioitinh,ngaysinh,sdt,email,nghenghiep,diachi) VALUES ('$ten','$username',md5('$password'),'$gioitinh','$ngaysinh','$sdt','$username','$nghenghiep','$diachi')";


// $sql2 ="SELECT id from benhnhan where id order by id desc limit 1";
// $sql1 ="INSERT INTO benhan (idbn) VALUES('$sql2')";
echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="login.php";</script>';

if (mysqli_query($conn, $sql)){
    // mysqli_query($conn,"UPDATE benhan set idbn ='$sql2'");
// $result = mysqli_query($conn, $sql);

echo "Tên người dùng: ".$_POST['ten']."<br/>";
echo "Username đăng nhập: ".$_POST['username']."<br/>";
echo "Mật khẩu: " .$_POST['password']."<br/>";


}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
}
}
}
?>