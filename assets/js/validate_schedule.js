$(document).ready(function(){

//kiểm tra ngày tham gia
var txtn=$("#ngaykham");
var ktn=$("#error-ngaykham");
function ktran(){
if(txtn.val()==""){
    ktn.html("Ngày khám bắt buộc nhập!");
    return false;
} 
var day= new Date(txtn.val());
var today= new Date();
today.setDate(today.getDate()+1);
if(day <today){
    ktn.html("Ngày đăng ký khám lớn hơn ngày hiện tại!");
    return false;
}

ktn.html("");
return true;
}
txtn.blur(ktran)
// số lượng
var soluong=$("#soluong");
var error_soluong=$("#error-soluong");
function checksoluong(){
    var re=/^([0-9]{1,2})$/;
    if(soluong.val()===""){
        error_soluong.html("Số lượng bắt buộc");
        return false;
    }
    if(!re.test(soluong.val())){
        error_soluong.html("Không quá 100 số bệnh nhân");
        return false;
    }
    error_soluong.html("");
    return true;
}       
soluong.blur(checksoluong);

})