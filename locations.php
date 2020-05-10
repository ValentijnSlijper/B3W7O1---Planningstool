<?php

include("functions.php");
    $location = Locations();
    $LocationA = LocationCount();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alle Locaties</title>
    <link href="resources/css/style2.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="head">
      <h1>Alle <?php echo $LocationA[0]; ?> locations uit de database</h1>
    </div>

      <div class="main">
        <div class="locations"
        <?php
          foreach ($location as $row) {?>
            <p><?php echo $row['name']?></p>

        <?php } ?>

      </div>
      <div class="addlocation">
        
      </div>

    </div>

    <footer><p>&copy; Valentijn Slijper <?php echo date("Y"); ?></p></footer>

  </body>
</html>
