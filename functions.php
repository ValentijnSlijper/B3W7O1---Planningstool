<?php
  function DatabaseConnect(){

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
       return $conn;
       }
    catch(PDOException $e)
    {
       echo "Connection failed: " . $e->getMessage();
    }


  }

    function Characters(){
      $conn = DatabaseConnect();
      $query = $conn->prepare("SELECT * FROM characters");
      $query->execute();
      $result = $query->fetchAll();
      return $result;
    }

    function Characters1(){
      $query = $conn->prepare("SELECT * FROM characters");
      $query->execute();
      $result = $query->fetchAll();
      $query = $conn->prepare("SELECT * FROM characters WHERE id = :id");
      $query->execute([':id' => $_GET['id']]);
      $result1 = $query->fetch();
    }

    function CharacterCount(){
      $conn = DatabaseConnect();
      $query = $conn->prepare("SELECT COUNT(id) FROM characters");
      $aantal = $query->execute();
      $aantalItems = $query->fetch();
      return $aantalItems;
    }

    function Locations(){
      include("dbconnect.php");
        $query = $conn->prepare("SELECT * FROM locations");
        $query->execute();
        $location = $query->fetchAll();
        return $location;
    }

    function updateLocation(){
      $conn = DatabaseConnect();
      $query = $conn->prepare("UPDATE characters SET location = :locatie WHERE id = :id");
      $query->execute([':id' => $_GET['id'], ':locatie' => $_GET['locatie']]);

    }

    function locationName(){
      $conn = DatabaseConnect();
      $query = $conn->prepare("SELECT name FROM locations WHERE id = :locatie");
      $query->execute([':locatie' => $_GET['locatie']]);
      $locationName = $query->fetch();
      return $locationName;
    }



?>
