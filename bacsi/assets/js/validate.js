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
      var email=$("#email");
      var error_email=$("#error-email");
      function checkemail(){
          var re=/^([\w]*[\w\.]*(?!\.)@gmail.com)$/;
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
       //SDT
       var sdt=$("#sdt");
       var error_sdt=$("#error-sdt");
       function checksdt(){
           var re=/^(0)\d{9}$/;
                       if(sdt.val()===""){
               error_sdt.html("Số điện thoại bắt buộc");
               return false;
           }
           if(!re.test(sdt.val())){
               error_sdt.html("Tối đa 10 chữ số 0XXXXXXXXX ");
               return false;
           }
           error_sdt.html("");
           return true;
       }
       sdt.blur(checksdt);
       var ngaysinh=$("#ngaysinh");
       var error_ngaysinh=$("#error-ngaysinh");
       function checkngaysinh(){
           
           if(ngaysinh.val()===""){
               error_ngaysinh.html("Ngày sinh bắt buộc");
               return false;
           }
           var year= new Date(ngaysinh.val());
           if(year.getFullYear() ==0000 | year.getFullYear() ==000){
               error_ngaysinh.html("Yêu cầu đúng định dạng");
               return false;
           }
           if(year.getFullYear() >1998){
               error_ngaysinh.html("Yêu cầu trên 25 tuổi");
               return false;
           }
         error_ngaysinh.html("");
           return true;
       }
       ngaysinh.blur(checkngaysinh);
    })