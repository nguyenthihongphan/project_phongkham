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
    <link rel="shortcut icon" type="image/x-icon" href="../Admin/assets/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/style.css">

</head>

<body>
 
        <div class="header">
            <div class=" col-md-5"   >
                <a href="#"  class="logo">
                    <img src="../Admin/assets/img/logo.png"height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
                </a>
            </div>
            
        </div>
       
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="" method="POST" class="form-signin">
						<div class="account-logo">
                            <a href="#"><img src="../Admin/assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="account-center text-center">
                           <h3> Bác sĩ</h3>
                        </div>
                        <div align="center">
					
                   
  </div>
                        <div class="form-group">
                            <label>Tên đăng nhập:</label>
                            <input type="text" name="username" id="username" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                         <div class="form-group">
                         <p class=""> <a href="../user.php">Quay lại</a></p>
                         </div>
                          <div class="form-group">
                         	<?php
                       
                          switch($_POST['nut'])
                          {
                              case 'Đăng nhập':
                              {
                                  $user=$_REQUEST['username'];
                                  $pass=$_REQUEST['password'];
                                  if($user!=''&&$pass!='')
                                  {
                                      if($p->mylogin($user,$pass)==1)
                                      { 
                                           header('location:index.php');
									  
                                          }
                                        else
                                        {
                                        echo '<b style="color:red;font-size:16px;font-family:calibri ;">Nhập sai username hoặc password!</b> ';
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
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/app.js"></script>
</body>


</html>