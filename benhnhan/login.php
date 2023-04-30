<?php
include('login_tmd.php');
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
    <link rel="stylesheet" href="../benhnhan/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
</head>
<style>
    .error{
        color: red;
    }
</style>
<body>

        <div class="main">
        <div class="container">
            <div class="signup-content">
            
                <div class="signup-img">
                    <img src="../assets/img/banner/dang-ky-kham-benh-online.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>ĐĂNG NHẬP</h2>                       
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="text" name="txtuser" id="txtuser" />
                            <span id="error-email" class="text-danger" style="font-size: 13px;"></span>
                            </div>                           
                        <div class="form-group">
                        <label for="password">Mật khẩu :</label>
                            <input type="password" name="txtpass" id="password">
                            <span id="error-password" class="text-danger" style="font-size: 13px;"></span>
                        </div>
                        <div class="form-group">
                        <p class="text-right"> Bạn chưa có tài khoản? &nbsp; <a href="register.php"> Đăng ký ngay</a></p>
                        <p class="text-right"> <a href="forgetpass.php">Quên mật khẩu?</a></p>                      
                     </div>
                     
                        <div class="form-submit">
                        <input type="submit" name="nut" id="nut" value="Đăng nhập" class="submit btn btn-success account-btn"/>
                        </div>
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
                                            header ('location:index1.php');  
									  
                                          }
                                        else
                                        {
                                        echo "<script>alert('Đăng nhập không thành công!')</script>";
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
                    </form>
                </div>
            </div>
        </div>
       
    </div>
    
			</div>
        </div>
    </div>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="../assets/js/validate.js"></script>

</body>
</html>
