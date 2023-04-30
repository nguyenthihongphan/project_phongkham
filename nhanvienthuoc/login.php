<?php
include('./assets/login_tmd.php');
$p= new login();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập tài khoản</title>
<meta charset="UTF-8">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
 
        <div class="header">
            <div class="">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
                </a>
            </div>
            
        </div>
       
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="" method="POST" class="form-signin">
						<div class="account-logo">
                            <a href="index.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        
                        <div class="form-group">
                        <h4>Nhân viên</h4>
						
  </div>
                        <div class="form-group">
                            <label>Tên đăng nhập:</label>
                            <input type="text" name="txtuser" id="txtuser" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="password" name="txtpass" id="txtpass" class="form-control">
                        </div>
                        <div class="form-group">
                        <a href="../user.php">Quay lại</a>
                        </div>
                        <div class="form-group">
                        <?php
                          switch($_POST['nut'])
                          {
                              case 'Đăng nhập':
                              {
                                  $user=$_REQUEST['txtuser'];
                                  $pass=$_REQUEST['txtpass'];
                                  if($user!=''&&$pass!='')
                                  {
                                      if($p->mylogin($user,$pass)==1)
                                      { 
                                            header ('location:index.php');  
                                          }
                                        else
                                        {
                                        echo '<b style="color:red;font-size:16px;font-family:calibri ;">Đăng nhập không thành công! </b> ';
                                            }
                                      }
                                 else
                                    {
                                        echo '<b style="color:red;font-size:16px;font-family:calibri ;">
                             Vui lòng nhập đầy đủ email và mật khẩu! </b> ';
                                        }
                                  break;
                                  }
                              }
                          ?>
                          </div>
                        <div class="form-group text-center">
                         <input type="submit" name="nut" id="nut" value="Đăng nhập" class="btn btn-primary account-btn"/>
                          
                        </div>
                       
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


</html>