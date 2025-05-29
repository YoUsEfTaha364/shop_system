<?php
include "config/DB.php";
include "handler/handler.php";

 $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
 $arr=["name"=>$name,
       "email"=>$email,
       "password"=>$password];
       
echo "yousef";

echo "yousef is the king";

       
       $ob=new DB;


$ob->register($arr);










?>