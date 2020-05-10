<?php
  include("functions.php");


  $id = $_POST ['characterId'];
  $locationid = $_POST ['locatie'];
  updateLocation($id, $locationid);

header('Location: character.php?id=' . $id);

 ?>
