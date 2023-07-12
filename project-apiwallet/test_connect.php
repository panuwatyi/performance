<?php

    require_once "class/database.php"; 
    $db = new database(); 
    $db->Connect(); 

    //สมัคร
    $db->Register("0555555555","1234","panuwat.yi@psru.ac.th");
    print_r($db->getAllUser());

    //เพิ่ม Statement 
    $db->newStatement("Transfer");
    $db->newStatement("Topup");
    $db->newStatement("GetPaid");

    //เพิ่ม Accouttype
    // $db->newAccouttype("Bank");
    // $db->newAccouttype("Promptpay");
    // $db->newAccouttype("Wallet");
    
    //เติมเงิน    เบอร์บัญชีเรา / จำนวน / ไอดี 1 = เติมเงิน (ประเภทธุรกรรม)
    //$db->topup("0967717454","500","1");

    //โอน      เบอร์บัญชีเรา / เลขบัญชีที่โอน / จำนวนเงิน / ไอดี 2 = Promptpay (ประเภทบัญชี) 
    //db->transfer("0555555555", "1165150802", "100", "2");
    

?>