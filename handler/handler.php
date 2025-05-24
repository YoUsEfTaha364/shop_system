<?php

session_start();



if (!function_exists('register_handler')){

function register_handler($array,$email_val) {

    
     
    $errors=[];
      
      if(strlen($array["name"])<3){
        $errors+=["name"=>"name must be at least 3 chars"];
      }
    
      if(strlen($array["password"])<8){
        $errors+=["password"=>"password must be at least 8 chars"];
      }

      
       
      if($email_val==true){
        $errors["email"]="email is used before enter another";
      }

     
   
     if($errors){
         $_SESSION["errors"]=$errors;
         $_SESSION["data"]=$array;

         var_dump($errors);exit();
        
     }else {
     
        return true;
       
     }
  }
}

  // function signin($array){

  // }




?>