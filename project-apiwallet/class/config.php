<?php
//Global Function
class config{

    //Function message
    //Input parameter 2 param: content , error status
    //Output 1 output : json data
    public function message($content,$error_status){
        return json_encode(['message' => $content,'error' => $error_status]);
    }
}

?>