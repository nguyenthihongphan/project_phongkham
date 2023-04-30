<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký tài khoản</title>
<meta charset="UTF-8">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="../benhnhan/style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
</head>
<style>
    .error{
        color: red;
    }
    label,
  input{
    border: 0;
    margin-bottom: 3px;
    display: block;
    width: 100%;
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
                    <form method="POST" class="register-form" id="validation">
                        <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
                        <div class="form-group">
                        <span id="tb" class="text-danger" style="font-size: 13px;"></span>

</div>
                            <div class="form-group">
                                Họ và tên :
                                <input type="text" name="ten" id="ten" />
                                <span id="error-ten" class="text-danger"  style="font-size: 13px;"></span>
                            </div>
                            <div class="form-group">
                            <label for="ngaysinh">Ngày sinh :</label>
                            <input type="text" name="ngaysinh" id="ngaysinh">
                            <span id="error-ngaysinh" class="text-danger" style="font-size: 13px;"></span>

                        </div>
                            <div class="form-group">
                            Email:
                            <input type="text" name="username" name="email" id="email">
                            <span id="error-email" class="text-danger" style="font-size: 13px;"></span>
                        </div>
                        
                       
                        <div class="form-group">
                            Địa chỉ:
                            <input type="text" name="diachi" id="diachi" />
                            <span id="error-diachi" class="text-danger " style="font-size: 13px;"></span>

                        </div>
                       
                        <div class="form-group">
                            <label for="password">Mật khẩu :</label>
                            <input type="password" name="password" id="password" >
                            <span id="error-password" class="text-danger" style="font-size: 13px;" ></span>

                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Nhập lại mật khẩu :</label>
                            <input type="password" name="password_confirmation" id="password_confirmation">
                            <span id="error-repassword" class="text-danger" style="font-size: 13px;"></span>
                        </div>
                       
                        
                        <div class="form-group">
                            <label for="sdt">Số điện thoại :</label>
                            <input type="sdt" name="sdt" id="sdt">
                            <span id="error-sdt" class="text-danger" style="font-size: 13px;"></span>
                        </div>
                        <div class="form-radio">
                            <label>Giới tính: </label>
                            <div class="form-radio-item">
                            <label class="container">
                            <input type="radio" name="gioitinh" checked id="gioitinh">Nam
                            <span class="checkmark"></span>
                            </label>
                            </div>
                            <div class="form-radio-item">

                            <label class="container">
                            <input type="radio" name="gioitinh" id="gioitinh">Nữ
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                       
                        <?php require 'xuly.php';?>
                        <div class="form-submit">
                            <button type="submit" id="save" value="Đăng ký" class=" btn btn-danger" name="dangky" >Đăng ký</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>

    </div>
<p align="center"> Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
 </div>
			</div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<!-- datetime picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>


<script src="../assets/js/validate_form.js"></script>

</body>
</html>

