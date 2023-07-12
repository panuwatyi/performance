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

    if($api_req == "POST"){
        $money   = $_POST["money"];
        if($db->genqr($money)){
            //echo $db->message("Sucessfully.",false);
        }else{
            //echo $db->message("Failed!!!",true);
        }
    }
?>