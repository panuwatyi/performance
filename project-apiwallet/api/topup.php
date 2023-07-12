<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
   header("Access-Control-Allow-Headers: X-Requested-With");
   header("Content-Type: application/json");

   require_once("../class/database.php");

   $db = new database();
   $db->Connect();

    //REQUEST Method 4 type : GET,PUT,POST,DELEST
   $api_req = $_SERVER["REQUEST_METHOD"];

   //$id = intval($_GET['ids'] ?? '');

//    if($api_req == "GET"){
//        if($id != 0){
//            // Call API : users/id
//            //$data = $db->getUser($id);
//        }else{
//            // Call API : users/
//            $data = $db->getAllBank(); // $data is array
//        }
//        echo json_encode($data); //return json data
//    }

    if($api_req == "POST"){
        $c_user_phone   = $_POST["c_user_phone"];
        $f_user_balance   = $_POST["f_user_balance"];
        $i_atype_accouttype_id   = $_POST["i_atype_accouttype_id"];
        if($db->topup($c_user_phone, $f_user_balance, $i_atype_accouttype_id)){
            echo $db->message("Top up Sucessfully.",false);
        }else{
            echo $db->message("Failed to Top up!!!",true);
        }
    }

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