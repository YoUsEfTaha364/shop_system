<?php

include __DIR__."/../handler/handler.php";

 
class DB
{

    private $dns = "mysql:host=localhost;dbname=shop;charset=utf8mb4";
    private $user = "root";
    private $pass = "";
    private $connect;

     

    public function connection()
    {
        $this->connect = new PDO($this->dns, $this->user, $this->pass);

        return $this->connect;
    }

     private function check_using_email($email)
    {
        $email = trim($email);

        $query = "select * from register where email=:email";
        $prep = $this->connection()->prepare($query);
        $prep->execute(["email" => $email]);
        $data = $prep->fetch(PDO::FETCH_ASSOC);
           
        if($data==false)
        {
            return false;

        }else{
            return true;
        }

    }


  
    public function register($arr){
        $array = $arr;
        $hashed_password = password_hash($array["password"], PASSWORD_BCRYPT);
        
        // Check if email exists
        $email_exists = $this->check_using_email($array["email"]);
    
       
        
        // If register_handler returns true (no errors), proceed with registration
        if(register_handler($array, $email_exists)){
            $query = "insert into register (name,email,password) values(:name,:email,:password)";
            $prep = $this->connection()->prepare($query);
            
            $prep->execute([
                ':name' => $array["name"],
                ':email' => $array["email"],
                ':password' => $hashed_password
            ]);
            
            header("Location: welcome.php");
            exit();
        }
    }

 
}