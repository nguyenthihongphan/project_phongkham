$(document).ready(function(){

    //ten
        var ten=$("#ten");
            var error_ten=$("#error-ten");
            function checkten(){
                var re=/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
                if(ten.val()===""){
                    error_ten.html("Họ và tên bắt buộc");
                    return false;
                }
                if(!re.test(ten.val())){
                   
                    error_ten.html("Viết hoa chữ cái đầu");
                    return false;
                    
                }        
            
            else{
                error_ten.html("");
                return true;
            } 
        }      
            ten.blur(checkten);
      //email
      var email=$(".email");
      var error_email=$(".error-email");
      function checkemail(){
          var re=/^([A-Za-z0-9])@(gmail.com)$/;
                      if(email.val()===""){
              error_email.html("Email bắt buộc");
              return false;
          }
          if(!re.test(email.val())){
              error_email.html("Viết đúng định dạng ");
              return false;
          }
          error_email.html("");
          return true;
      }
      email.blur(checkemail);
        //diachi
        var diachi=$("#diachi");
        var error_diachi=$("#error-diachi");
        function checkdiachi(){
            var re=/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ0-9][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ0-9][0-9aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][0-9aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
            if(diachi.val()===""){
                error_diachi.html("Địa chỉ bắt buộc");
                return false;
            }
            if(!re.test(diachi.val())){
                error_diachi.html("Viết hoa chữ cái đầu");
                return false;
            }
            error_diachi.html("");
            return true;
        }       
        diachi.blur(checkdiachi);
    //sdt
    var sdt=$("#sdt");
    var error_sdt=$("#error-sdt");
    function checksdt(){
        var re=/^([0-9]{9,})$/;
        if(sdt.val()===""){
            error_sdt.html("Số điện thoại bắt buộc");
            return false;
        }
        if(!re.test(sdt.val())){
            error_sdt.html("Nhập 9 số trở lên");
            return false;
        }
        error_sdt.html("");
        return true;
    }       
    sdt.blur(checksdt);
    
    //ngaysinh
    var ngaysinh=$("#ngaysinh");
    var error_ngaysinh=$("#error-ngaysinh");
    function checkngaysinh(){
        
        if(ngaysinh.val()===""){
            error_ngaysinh.html("Ngày sinh bắt buộc");
            return false;
        }
        var year= new Date(ngaysinh.val());
        if(year.getFullYear()>2005){
            error_ngaysinh.html("Yêu cầu trên 18 tuổi");
            return false;
        }
      error_ngaysinh.html("");
        return true;
    }
    ngaysinh.blur(checkngaysinh);
    //password
    var password=$("#password");
    var error_password=$("#error-password");
    function checkpassword(){
       rep= /^[a-zA-Z0-9]{5,}$/
        if(password.val()===""){
            error_password.html("Mật khẩu bắt buộc");
            return false;
        }
        if(!rep.test(password.val())){
            error_password.html("Mật khẩu nhập 5 ký tự trở lên");
            return false;
        }
      error_password.html("");
        return true;
    }
    password.blur(checkpassword);
    //email login
    // var email=$("#txtuser");
    // var error_email=$("#error-email");
    // function checkemail(){
    //     var re=/^([A-Za-z0-9])@(gmail.com)$/;
    //                 if(email.val()===""){
    //         error_email.html("Email bắt buộc");
    //         return false;
    //     }
    //     if(!re.test(email.val())){
    //         error_email.html("Viết đúng định dạng");
    //         return false;
    //     }
    //     error_email.html("");
    //     return true;
    // }
    // email.blur(checkemail);
        //username
        var username=$("#username");
        var error_username=$("#error-username");
        function checkusername(){
            var re=/^[a-zA-Z0-9]{5,}$/;
                        if(username.val()===""){
                error_username.html("Username bắt buộc");
                return false;
            }
            if(!re.test(username.val())){
                error_username.html("Nhập 5 ký tự trở lên");
                return false;
            }
            error_username.html("");
            return true;
        }
        username.blur(checkusername);
    
    $("#save").click(function(){
        if(!checkten() | !checkemail() | !checkdiachi()  | !checkngaysinh() | !checksdt() | !checkpassword()){
            // $("#tb").html("Vui lòng điền đầy đủ thông tin");
            // alert('dbhfbf')
            return false;
        }
    })
    // $("#nut").click(function(){
    //     if(!checkemail() |!checkpassword()){
    //         // $("#tb").html("Vui lòng điền đầy đủ thông tin");
    //         // alert('dbhfbf')
    //         return false;
    //     }
    // })
    })
    
    
    