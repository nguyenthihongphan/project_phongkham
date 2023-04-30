$(document).ready(function(){

    //tên thuốc
        var tenthuoc=$("#tenthuoc");
            var error_tenthuoc=$("#error-tenthuoc");
            function checktenthuoc(){
                var re=/^([A-Z]{1}[a-z]*\s)*([A-Za-z0-9]*)$/;
                if(tenthuoc.val()===""){
                    error_tenthuoc.html("Tên thuốc bắt buộc");
                    return false;
                }
                if(!re.test(tenthuoc.val())){
                    error_tenthuoc.html("Viết hoa chữ cái đầu");
                    return false;
                }
                error_tenthuoc.html("");
                return true;
            }       
            tenthuoc.blur(checktenthuoc);
 //xuất xứ
 var xuatxu=$("#xuatxu");
 var error_xuatxu=$("#error-xuatxu");
 function checkxuatxu(){
     var re=/^([A-Z]{1}[a-z]*\s)*([A-Z]{1}[a-z]*)$/;
     if(xuatxu.val()===""){
         error_xuatxu.html("Xuất xứ bắt buộc");
         return false;
     }
     if(!re.test(xuatxu.val())){
         error_xuatxu.html("Viết hoa chữ cái đầu");
         return false;
     }
     error_xuatxu.html("");
     return true;
 }       
 xuatxu.blur(checkxuatxu);
     //đơn vị tính
 var donvitinh=$("#donvitinh");
 var error_donvitinh=$("#error-donvitinh");
 function checkdonvitinh(){
     var re=/^([0-9]{2,3}[A-Za-z]{2,3})$/;
     if(donvitinh.val()===""){
         error_donvitinh.html("Đơn vị tính bắt buộc");
         return false;
     }  
     if(!re.test(donvitinh.val())){
         error_donvitinh.html("Không vượt quá 1000");
         return false;
     }
     error_donvitinh.html("");
     return true;
 }       
 donvitinh.blur(checkdonvitinh);

 // giá
var gia=$("#gia");
var error_gia=$("#error-gia");
function checkgia(){
    var re=/^([0-9]{5,6})$/;
    if(gia.val()===""){
        error_gia.html("Giá tiền bắt buộc");
        return false;
    }
    if(!re.test(gia.val())){
        error_gia.html("Từ 10000 đồng đến 1000000 đồng");
        return false;
    }
    error_gia.html("");
    return true;
}       
gia.blur(checkgia);

    $("#save").click(function(){
        if(!checktenthuoc() | !checkxuatxu()| !checkdonvitinh() | !checkgia()){
            return false;
        }
    })

    })
    
    
    