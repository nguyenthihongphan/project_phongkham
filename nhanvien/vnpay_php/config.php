<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// include("../../Admin/assets/db_config.php");

$vnp_TmnCode = "C55STVEP"; //Website ID in VNPAY System
$vnp_HashSecret = "SCMTAXZFNUBPBABKMUDLCDHEFQHRGCTR"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost:8888/phongkhamgiadinh/nhanvien/vnpay_php/vnpay_return.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
