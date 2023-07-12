<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
   header("Access-Control-Allow-Headers: X-Requested-With");
   header("Content-Type: application/json");
   
   require_once("../class/database.php");

   $db = new database();
   $db->Connect();

   class BankAccount {
       private $name;
       private $idcard;
   
       public function __construct($name, $idcard) {
           $this->name = $name;
           $this->idcard = $idcard;
       }
   
       public function getAccountNumber() {
           return $this->name;
       }
   
       public function getBalance() {
           return $this->idcard;
       }
   
       public function deposit($amount) {
           $this->idcard += $amount;
       }
   
       public function withdraw($amount) {
           if ($amount <= $this->idcard) {
               $this->idcard -= $amount;
           } else {
               echo "Insufficient funds";
           }
       }
   
       public function transfer($amount, $recipientAccount) {
           if ($amount <= $this->idcard) {
               $this->idcard -= $amount;
               $recipientAccount->deposit($amount);
           } else {
               echo "Insufficient funds";
           }
       }
   }
   
//    // สร้างบัญชีธนาคารสองบัญชี
//    $account1 = new BankAccount("1234567890", 1000);
//    $account2 = new BankAccount("0987654321", 500);
   
   // แสดงยอดเงินก่อนทำรายการ
   echo "Account 1 Balance: " . $account1->getBalance() . "\n";
   echo "Account 2 Balance: " . $account2->getBalance() . "\n";
   
   // โอนเงินจากบัญชี 1 ไปยังบัญชี 2
   $transferAmount = 200;
   $account1->transfer($transferAmount, $account2);
   
   // แสดงยอดเงินหลังโอนเงิน
   echo "Account 1 Balance: " . $account1->getBalance() . "\n";
   echo "Account 2 Balance: " . $account2->getBalance() . "\n";
   
   // เติมเงินในบัญชี 2
   $depositAmount = 300;
   $account2->deposit($depositAmount);
   
   // แสดงยอดเงินหลังเติมเงิน
   echo "Account 2 Balance: " . $account2->getBalance() . "\n";
   
   // รับเงินจากบัญชี 2
   $withdrawAmount = 100;
   $account2->withdraw($withdrawAmount);
   
   // แสดงยอดเงินหลังรับเงิน
   echo "Account 2 Balance: " . $account2->getBalance() . "\n";
   
   ?>





//    require_once("../class/database.php");

//    $db = new database();
//    $db->Connect();

//     //REQUEST Method 4 type : GET,PUT,POST,DELEST
//    $api_req = $_SERVER["REQUEST_METHOD"];

//    $id = intval($_GET['ids'] ?? '');

//    if($api_req == "GET"){
//        if($id != 0){
//            // Call API : users/id
//            //$data = $db->getUser($id);
//        }else{
//            // Call API : users/
//            $data = $db->getAllUser(); // $data is array
//        }
//        echo json_encode($data); //return json data
//    }
//     if($api_req == "POST"){
//         $c_user_phone   = $_POST["c_user_phone"];
//         $c_user_pwd  = $_POST["c_user_pwd"];
//         $c_user_email  = $_POST["c_user_email"];
//         if($db->Register($c_user_phone,$c_user_pwd,$c_user_email)){
//             echo $db->message("Register Sucessfully.",false);
//         }else{
//             echo $db->message("Failed to Register!!!",true);
//         }
//     }

    // if($api_req == "DELETE"){
    //     if($id != 0){ // Have id value from Call request API
    //         if($db->delUser($id)){ //DELETE Success.
    //             echo $db->message("Delete User Successfully.",false); 
    //         }else{
    //             echo $db->message("Failed to Dedete Users.",true);
    //         }
    //     }else{
    //         echo $db->message("User ID not found!!!",true);
    //     }
    // }

    // //Update User Data
    // if($api_req == "PUT"){
    //     parse_str(file_get_contents("php://input"),$_put);
    //     //... $_POST , Call Request API from-encode
    //     $id     = $_put["id"];
    //     $name   = $_put["name"];
    //     $email  = $_put["email"];
    //     $phone  = $_put["phone"];
    //     if($id != 0){
    //         if($db->updateUser($id,$name,$email,$phone)){
    //             echo $db->message("Update User Sucessfully.",false);
    //             //print_r($post_input);
    //         }else{
    //             echo $db->message("Failed to Update User!!!",true);
    //         }
    //     }else{
    //         echo $db->message("User ID not found!!!",true);
    //     }
    // }

   
?>