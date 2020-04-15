<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dynamische_applicatie";

//<!-- laad hier via php de juiste contentpagina in (vanuit de pages map) in. Welke geselecteerd moet worden kun je uit de URL halen (URL_Params).-->
if(isset($_GET['subject'])){
   $subject = $_GET['subject'];
} else {
   $subject = 1;
}

try {
   $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo "Connected successfully";
   }
catch(PDOException $e)
{
   echo "Connection failed: " . $e->getMessage();
}
 ?>
