<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "sale_invoice";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
          return $conn;
         }
         
        function CloseCon($conn)
         {
         $conn -> close();
         }
?>