<?php
$host="localhost";
$user="root";
$password="";
$db="service";
$con = new mysqli($host,$user,$password,$db);

 if($con->connect_errno)
     {
         die("ERROR : -> ".$con->connect_error);
     }


?>