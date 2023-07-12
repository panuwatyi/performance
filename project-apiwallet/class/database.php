<?php
    require_once "config.php";

    // Class connect + operation database
    // extends : สามารถใช้ function ของ Class config ได้
    // public , private

    
    class database extends config {
    // private const DB_HOST   = "localhost";
    // private const DB_USER   = "root";
    // private const DB_PWD    = "";
    // private const DB_NAME   = "db_cpewallet";

    private const DB_HOST   = "localhost";  
    private const DB_USER   = "cp497605_wl";
    private const DB_PWD    = "Q6bJ]+c&J*5O";
    private const DB_NAME   = "cp497605_wachiral";

    private $dsn = "mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME ;
    protected $conn = null ;

    private $X = 0;

    public function setX($val){
        $this->X = $val;
    }
    public function getX(){
        return $this->X;
    }
        public function Connect(){
            try{
        
                //Connect database
                $this->conn = new PDO($this->dsn,self::DB_USER,self::DB_PWD);
                //กำหนดโหมดในการดึงผลลัพธ์จากฐานข้อมูล แบบ -FETCH_ASSOC 
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE ,PDO::FETCH_ASSOC);
                
                //echo "Connect Database Successfully.";
            }catch(PDOException $err){
                die("Connection Failed:".$err->getMessage());
            }
            return $this->conn;
        }

        //function Register : Add new User
        public function Register($c_user_phone, $c_user_pwd, $c_user_email)
        {
            $sql = "SELECT c_user_phone FROM tb_users_info WHERE c_user_phone = :c_user_phone";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["c_user_phone" => $c_user_phone]);
            $num = $stm->rowCount();
            if ($num > 0) {
                return false;
            } else {
                $idCardExists = true;
                $i_user_idcard = 0;
        
                while ($idCardExists) {
                    $i_user_idcard = mt_rand(1000000000, 2147483647);
        
                    $sqlCheck = "SELECT i_user_idcard FROM tb_users_info WHERE i_user_idcard = :i_user_idcard";
                    $stmCheck = $this->conn->prepare($sqlCheck);
                    $stmCheck->execute(["i_user_idcard" => $i_user_idcard]);
                    $numCheck = $stmCheck->rowCount();
        
                    if ($numCheck === 0) {
                        $idCardExists = false;
                    }
                }
        
                $sqlInsert = "INSERT INTO tb_users_info (c_user_phone, c_user_pwd, c_user_email, i_user_idcard)
                              VALUES (:c_user_phone, :c_user_pwd, :c_user_email, :i_user_idcard)";
                $stmInsert = $this->conn->prepare($sqlInsert);
                $stmInsert->execute([
                    "c_user_phone" => $c_user_phone,
                    "c_user_pwd" => $c_user_pwd,
                    "c_user_email" => $c_user_email,
                    "i_user_idcard" => $i_user_idcard
                ]);
                // echo $c_user_phone;
                // echo $c_user_pwd;
                // echo $c_user_email;
                // echo $i_user_idcard;
                return true;
            }
        }
        
        

        //function Login
        public function Login($c_user_phone, $c_user_pwd)
        {
            if ($c_user_phone) {
                $sql = "SELECT * FROM tb_users_info WHERE c_user_phone=:c_user_phone AND c_user_pwd=:c_user_pwd";
                $stm = $this->conn->prepare($sql);
                $stm->execute(["c_user_phone" => $c_user_phone, "c_user_pwd" => $c_user_pwd]);
                $row = $stm->fetch();
                if ($row) {
                    echo $row['c_user_phone'];
                    echo $row['c_user_pwd'];
                    echo "Login Success";
                } else {
                    echo "Invalid credentials";
                }
            } else {
                echo "Login Fail";
            }
        }
        public function deluser($id){
            $sql = " DELETE FROM tb_users_info WHERE c_user_phone= :id ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["id"=>$id]);
            return true;
        }


        // function getUserData After Login : 0 input parameter
        public function getUser($c_user_phone){
            $sql = " SELECT * FROM tb_users_info WHERE c_user_phone= :c_user_phone " ;
            $stm = $this->conn->prepare($sql);
            $stm->execute(["c_user_phone"=>$c_user_phone]);
            $rows = $stm->fetchAll();
            return $rows;
        }

        //function updateUser : updateUser Info Page
        public function updateUser($c_user_phone,$i_user_idcard){
            $sql = " UPDATE tb_users_info
                    SET i_user_idcard=:i_user_idcard
                    WHERE c_user_phone = :c_user_phone ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["c_user_phone"=>$c_user_phone,"i_user_idcard"=>$i_user_idcard]);
            return true;
        }

        //function getAllUser : GetAllUserData
        public function getAllUser(){
            $sql = " SELECT * FROM tb_users_info " ;
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $rows = $stm->fetchAll();
            return $rows;
        }

        public function getAllBank(){
            $sql = " SELECT * FROM tb_banks " ;
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $rows = $stm->fetchAll();
            return $rows;
        }

        public function getAllStaemattype(){
            $sql = " SELECT * FROM tb_statement_type " ;
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $rows = $stm->fetchAll();
            return $rows;
        }

        public function getAllAccouttype(){
            $sql = " SELECT * FROM tb_accout_type " ;
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $rows = $stm->fetchAll();
            return $rows;
        }

        public function newBanks($name){
            $sql = " INSERT INTO tb_banks(c_banks_name)
                    VALUES (:uname) ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["uname"=>$name]);
            return true;
        }

        //function Add Statement : Add new Statement
        public function newStatement($i_stype_statetype_id, $c_stype_statetype_desp){
            $sql = " INSERT INTO tb_statement_type(i_stype_statetype_id, c_stype_statetype_desp)
                    VALUES (:i_stype_statetype_id, :c_stype_statetype_desp) ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["i_stype_statetype_id"=>$i_stype_statetype_id, "c_stype_statetype_desp"=>$c_stype_statetype_desp]);
            return true;
        }

        public function updateStatement($i_stype_statetype_id,$c_stype_statetype_desp){
            $sql = " UPDATE tb_statement_type
                    SET i_stype_statetype_id=:i_stype_statetype_id,c_stype_statetype_desp=:c_stype_statetype_desp
                    WHERE i_stype_statetype_id = :i_stype_statetype_id ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["i_stype_statetype_id"=>$i_stype_statetype_id, "c_stype_statetype_desp"=>$c_stype_statetype_desp]);
            return true;
        }

        //function Add Accout type : Add new Accout type
        public function newAccouttype($name){
            $sql = " INSERT INTO tb_accout_type(c_atype_accouttype_desp)
                    VALUES (:name) ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["name"=>$name]);
            return true;
        }
        public function delAccouttype($id){
            $sql = " DELETE FROM tb_accout_type WHERE i_atype_accouttype_id= :id ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["id"=>$id]);
            return true;
        }

        public function delbank($id){
            $sql = " DELETE FROM tb_banks WHERE i_banks_bank_id= :id ";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["id"=>$id]);
            return true;
        }

        //function topup : Add Balance
        public function topup($c_user_phone, $f_user_balance, $i_atype_accouttype_id)
        {
            $sql = "SELECT f_user_balance FROM tb_users_info WHERE c_user_phone = :c_user_phone";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["c_user_phone" => $c_user_phone]);
            $row = $stm->fetch();
            $existing_balance = $row['f_user_balance'];
        
            $new_balance = $existing_balance + $f_user_balance;
        
            $sql_update = "UPDATE tb_users_info
                           SET f_user_balance = :new_balance
                           WHERE c_user_phone = :c_user_phone";
            $stm_update = $this->conn->prepare($sql_update);
            $stm_update->execute(["new_balance" => $new_balance, "c_user_phone" => $c_user_phone]);
        
            $sql_insert = "INSERT INTO tb_users_statement(i_stype_statetype_id, i_atype_accouttype_id, f_ustate_money, c_user_phone, c_ustate_status)
                           VALUES (2, :i_atype_accouttype_id, :f_user_balance, :c_user_phone, 0)";  //i_stype_statetype_id = 2 Topup
            $stm_insert = $this->conn->prepare($sql_insert);
            $stm_insert->execute(["i_atype_accouttype_id" => $i_atype_accouttype_id, "f_user_balance" => $f_user_balance, "c_user_phone" => $c_user_phone]);
            return true;
        }
        
        //function transfer : Transfer Money
        public function transfer($c_user_phone, $i_user_idcard, $f_user_balance, $i_atype_accouttype_id) //โอนไม่เกินจำนวนเงินที่มี ทำเงื่อนไขใน Action Flutter flow
        {
            $sql = "SELECT f_user_balance,i_user_idcard FROM tb_users_info WHERE c_user_phone = :c_user_phone";
            $stm = $this->conn->prepare($sql);
            $stm->execute(["c_user_phone" => $c_user_phone]);
            $row = $stm->fetch();
            $iduserget = $row['i_user_idcard'];
            $existing_balance = $row['f_user_balance'];

            $sql3 = "SELECT c_user_phone FROM tb_users_info WHERE i_user_idcard = :i_user_idcard";
            $stm3 = $this->conn->prepare($sql3);
            $stm3->execute(["i_user_idcard" => $i_user_idcard]);
            $row3 = $stm3->fetch();
            $idcard = $row3['c_user_phone'];
            
            if($existing_balance>=$f_user_balance){
                //i_atype_accouttype_id status 1 = Bank, 2 = promtpay, 3 = wallet 
                // 1Bank = use idcard , 2promtpay&3wallet = use phone
                if($i_atype_accouttype_id == 1){

                    $sql2 = "SELECT f_user_balance FROM tb_users_info WHERE i_user_idcard = :i_user_idcard";
                    $stm2 = $this->conn->prepare($sql2);
                    $stm2->execute(["i_user_idcard" => $i_user_idcard]);
                    $row2 = $stm2->fetch();
                    $existing_balance2 = $row2['f_user_balance'];
                    $new_balance = $existing_balance - $f_user_balance;
                    $new_balance2 = $existing_balance2 + $f_user_balance;

                    //Transfer balance
                    $sql_update = "UPDATE tb_users_info
                                SET f_user_balance = :new_balance
                                WHERE c_user_phone = :c_user_phone";
                    $stm_update = $this->conn->prepare($sql_update);
                    $stm_update->execute(["new_balance" => $new_balance, "c_user_phone" => $c_user_phone]);

                    //Get balance
                    $sql_update2 = "UPDATE tb_users_info
                                SET f_user_balance = :new_balance2
                                WHERE i_user_idcard = :i_user_idcard";
                    $stm_update2 = $this->conn->prepare($sql_update2);
                    $stm_update2->execute(["new_balance2" => $new_balance2, "i_user_idcard" => $i_user_idcard]);

                    //state ment
                    $sql_insert = "INSERT INTO tb_users_statement(i_stype_statetype_id, i_atype_accouttype_id, i_ustate_accout_no, f_ustate_money, c_user_phone, c_ustate_status)
                                    VALUES (1, :i_atype_accouttype_id, :i_user_idcard, :f_user_balance, :c_user_phone, 0)";
                    $stm_insert = $this->conn->prepare($sql_insert);
                    $stm_insert->execute(["i_atype_accouttype_id" => $i_atype_accouttype_id, "i_user_idcard" => $i_user_idcard, "f_user_balance" => $f_user_balance, "c_user_phone" => $c_user_phone]);
                
                    $sql_insert2 = "INSERT INTO tb_users_statement(i_stype_statetype_id, i_atype_accouttype_id, i_ustate_accout_no, f_ustate_money, c_user_phone, c_ustate_status)
                                    VALUES (3, :i_atype_accouttype_id, :i_ustate_accout_no, :f_user_balance, :idcard, 0)";
                    $stm_insert2 = $this->conn->prepare($sql_insert2);
                    $stm_insert2->execute(["i_atype_accouttype_id" => $i_atype_accouttype_id, "i_ustate_accout_no" => $iduserget, "f_user_balance" => $f_user_balance, "idcard" => $idcard]);
                    return true;
                }else if($i_atype_accouttype_id == 2 | $i_atype_accouttype_id == 3){
                    $sql2 = "SELECT f_user_balance FROM tb_users_info WHERE c_user_phone = :i_user_idcard";
                    $stm2 = $this->conn->prepare($sql2);
                    $stm2->execute(["i_user_idcard" => $i_user_idcard]);
                    $row2 = $stm2->fetch();
                    $existing_balance2 = $row2['f_user_balance'];
                    $new_balance = $existing_balance - $f_user_balance;
                    $new_balance2 = $existing_balance2 + $f_user_balance;

                    //Transfer balance
                    $sql_update = "UPDATE tb_users_info
                                SET f_user_balance = :new_balance
                                WHERE c_user_phone = :c_user_phone";
                    $stm_update = $this->conn->prepare($sql_update);
                    $stm_update->execute(["new_balance" => $new_balance, "c_user_phone" => $c_user_phone]);

                    //Get balance
                    $sql_update2 = "UPDATE tb_users_info
                                SET f_user_balance = :new_balance2
                                WHERE c_user_phone = :i_user_idcard";
                    $stm_update2 = $this->conn->prepare($sql_update2);
                    $stm_update2->execute(["new_balance2" => $new_balance2, "i_user_idcard" => $i_user_idcard]);

                    //state ment
                    $sql_insert = "INSERT INTO tb_users_statement(i_stype_statetype_id, i_atype_accouttype_id, i_ustate_accout_no, f_ustate_money, c_user_phone, c_ustate_status)
                                    VALUES (1, :i_atype_accouttype_id, :i_user_idcard, :f_user_balance, :c_user_phone, 0)";
                    $stm_insert = $this->conn->prepare($sql_insert);
                    $stm_insert->execute(["i_atype_accouttype_id" => $i_atype_accouttype_id, "i_user_idcard" => $i_user_idcard, "f_user_balance" => $f_user_balance, "c_user_phone" => $c_user_phone]);
                
                    $sql_insert2 = "INSERT INTO tb_users_statement(i_stype_statetype_id, i_atype_accouttype_id, i_ustate_accout_no, f_ustate_money, c_user_phone, c_ustate_status)
                                    VALUES (3, :i_atype_accouttype_id, :i_ustate_accout_no, :f_user_balance, :i_user_idcard, 0)";
                    $stm_insert2 = $this->conn->prepare($sql_insert2);
                    $stm_insert2->execute(["i_atype_accouttype_id" => $i_atype_accouttype_id, "i_ustate_accout_no" => $c_user_phone, "f_user_balance" => $f_user_balance, "i_user_idcard" => $i_user_idcard]);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        function genqr($money) {
            $url = "https://api.qrserver.com/v1/create-qr-code/";
            $data = $url . "?size=150x150&data=" . urlencode($money);
            //echo '<img src="' . $data . '" alt="QR Code">';
            return $data;
        }
        
    }
?>