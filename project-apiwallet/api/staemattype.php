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

   $id = intval($_GET['ids'] ?? '');

   if($api_req == "GET"){
       if($id != 0){
           // Call API : users/id
           //$data = $db->getUser($id);
       }else{
           // Call API : users/
           $data = $db->getAllStaemattype(); // $data is array
       }
       echo json_encode($data); //return json data
   }
    if($api_req == "POST"){
        $i_stype_statetype_id = $_POST["id"];
        $c_stype_statetype_desp   = $_POST["name"];
        if($db->newStatement($i_stype_statetype_id, $c_stype_statetype_desp)){
            echo $db->message("Add New staemat type Sucessfully.",false);
        }else{
            echo $db->message("Failed to New staemat type!!!",true);
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

    //Update User Data
    if($api_req == "PUT"){
        parse_str(file_get_contents("php://input"),$_put);
        //... $_POST , Call Request API from-encode
        $i_stype_statetype_id     = $_put["id"];
        $c_stype_statetype_desp   = $_put["name"];
        if($i_stype_statetype_id != 0){
            if($db->updateStatement($i_stype_statetype_id, $c_stype_statetype_desp)){
                echo $db->message("Update User Sucessfully.",false);
                //print_r($post_input);
            }else{
                echo $db->message("Failed to Update staemat type!!!",true);
            }
        }else{
            echo $db->message("staemat type ID not found!!!",true);
        }
    }

   
?>