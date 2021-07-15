<?php
   
   $hostname="localhost";
   $username="root";
   $pass="";
   $dbname="hpe";
   $conn=mysqli_connect($hostname,$username,$pass,$dbname);
   if(!$conn){

  echo "Error".mysqli_connect_error("connection failed");
}
   }
?>