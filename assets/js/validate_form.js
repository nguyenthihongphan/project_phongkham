var error_date_format = jQuery.validator.format("Nhập đúng định dạng ngày");
$.validator.addMethod("dateCheck", function (value, element) {
  if (value == "") {
      return true;
  }
  var date = value.split("/");
  var year = date[0];
  var month = date[1];
  var day = date[2];
  if (year.length != 4 || month.length != 2 || day.length != 2) {
      return false;
  }
  var date = new Date(year, month - 1, day);
  if (date.getFullYear() == year && date.getMonth() + 1 == month && date.getDate() == day) {
      return true;
  }
  return false;
}, error_date_format);
$.validator.messages.dateCheck = function (param, input) {
  $data = $(input).data('label');
  return error_date_format($data);
};
$(document).ready(function(){
    
        $("#ngaysinh").datepicker({
          numberOfMonths: 1,
          showButtonPanel: true,
          dateFormat: 'yy-mm-dd',
          
        });
    
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
        //   var re=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
                      if(email.val()===""){
              error_email.html("Email bắt buộc");
              return false;
          }
           
        // if(!re.test(email.val()) ){
        //         error_email.html("Viết đúng định dạng email ");
        //         return false;
           
        //   }
          else{
          error_email.html("");
          return true;
          }
          
      }
      email.blur(checkemail);
        //diachi
        var diachi=$("#diachi");
        var error_diachi=$("#error-diachi");
        function checkdiachi(){
            // var re=/^[A-Za-z0-9\s][a-z0-9\s]+[A-Za-z0-9\s]$/
            // var re=/^[0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴ\s]{1,}[aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz][0-9aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
            if(diachi.val()===""){
                error_diachi.html("Địa chỉ bắt buộc");
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
    //
    
    //ngaysinh

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
        if(year.getFullYear() >=2005){
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
        if(password.val() ===""){
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
     //re password
    //  var password=$("#password").value;
     var password_confirmation=$("#password_confirmation");
     var error_repassword=$("#error-repassword");
     function checkrepassword(){
         if(password_confirmation.val() ===password.val()){
             error_repassword.html("");
             return true;
         }
         else{
       error_repassword.html("Mật khẩu không trùng khớp");
         return false;
     }
    }
     password_confirmation.blur(checkrepassword);
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
        var Max_Length = 255;
        var fields = [
            "email",
        ];
        var email=$("#email");
      var error_email=$("#error-email");      
          var re=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        $(function () {
            function checkMaxLength(event) {
                $("#" + event.target.getAttribute("id")).siblings().remove();
                var length = $("#" + event.target.getAttribute("id")).val().length;
                if(email.val()===""){
                    $("#" + event.target.getAttribute("id")).after("<span class='text-danger' style='font-size: 13px;'>Email bắt buộc</span>");
                }
                if (length > Max_Length) {
                    $("#" + event.target.getAttribute("id")).after("<br><span class='text-danger' style='font-size: 13px;'>Email nhập tối đa「"+Max_Length +"」ký tự (hiện tại là " + length + " ký tự ）</span>");
                }             
                if(!re.test(email.val()) && email.val()!=""){
                    $("#" + event.target.getAttribute("id")).after("<span class='text-danger' style='font-size: 13px;'>Nhập đúng định dạng email</span>");
                }
                if(re.test.fields){
                    $("#" + event.target.getAttribute("id")).after("<p style='color:red'>ok</p>");
                }
            }
            for (var i = 0; i < fields.length; i++) {
                $("#" + fields[i]).keyup(function(e) {
                    checkMaxLength(e);
                });
            }
        }); 
//check họ và tên
var Max_Length = 255;
var fieldten = [
    "ten",
];
var ten=$("#ten");
var error_ten=$("#error-ten");      
var reten=/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ0-9][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ0-9][0-9aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][0-9aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;
$(function () {
    function checkMaxLength(event) {
        $("#" + event.target.getAttribute("id")).siblings().remove();
        var length = $("#" + event.target.getAttribute("id")).val().length;
        if(ten.val()===""){
            $("#" + event.target.getAttribute("id")).after("<br><span class='text-danger' style='font-size: 13px;'>Họ và tên bắt buộc nhập </span>");
        }
        if (length > Max_Length) {
            $("#" + event.target.getAttribute("id")).after("<br><span class='text-danger' style='font-size: 13px;'>Họ và tên nhập tối đa「"+Max_Length +"」ký tự (hiện tại là " + length + " ký tự ）</span>");
        }             
        if(!reten.test(ten.val())){
            $("#" + event.target.getAttribute("id")).after("<span class='text-danger' style='font-size: 13px;'>Viết hoa mỗi chữ cái đầu</span>");
        }
       
    }
    for (var i = 0; i < fieldten.length; i++) {
        $("#" + fieldten[i]).keyup(function(e) {
            checkMaxLength(e);
        });
    }
}); 
//check địa chỉ
var Max_Length = 255;
var Min_Length = 3;

var fielddiachi = [
    "diachi",
];
var diachi=$("#diachi");
var error_diachi=$("#error-diachi");      
var rediachi=/^[0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴ\s]{1,}[aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz][0-9aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [0-9AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZaàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*$/;

$(function () {
    function checkMaxLengthdiachi(event) {
        $("#" + event.target.getAttribute("id")).siblings().remove();
        var length = $("#" + event.target.getAttribute("id")).val().length;
        if(diachi.val()===""){
            $("#" + event.target.getAttribute("id")).after("<br><span class='text-danger' style='font-size: 13px;'>Địa chỉ bắt buộc nhập </span>");
        }
        if (length > Max_Length) {
            $("#" + event.target.getAttribute("id")).after("<br><span class='text-danger' style='font-size: 13px;'>Địa chỉ nhập tối đa「"+Max_Length +"」ký tự (hiện tại là " + length + " ký tự ）</span>");
        }
        if (length < Min_Length) {
            $("#" + event.target.getAttribute("id")).after("<br><span class='text-danger' style='font-size: 13px;'>Địa chỉ nhập tối thiểu「"+Min_Length +"」ký tự (hiện tại là " + length + " ký tự ）</span>");
        }            
        if(!rediachi.test(diachi.val())){
            $("#" + event.target.getAttribute("id")).after("<span class='text-danger' style='font-size: 13px;'>Không chứa ký tự đặt biệt</span>");
        }
       
    }
    for (var i = 0; i < fielddiachi.length; i++) {
        $("#" + fielddiachi[i]).keyup(function(e) {
            checkMaxLengthdiachi(e);
        });
    }
}); 
        
    }); 
   