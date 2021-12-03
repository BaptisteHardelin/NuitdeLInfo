<?php
    session_start();
    $con = pg_connect("host=postgresql-sauveteur-de-dunkerque.alwaysdata.net port=5432 dbname=sauveteur-de-dunkerque_db user=sauveteur-de-dunkerque password=nuitinfo");
    if (!$con) {
        echo "Une erreur s'est produite.\n";
        exit;
      }
      
      $user = pg_query($con, "SELECT * FROM users WHERE uid='".$_SESSION['userID']."'");
      echo $_SESSION['userID'];
      $row = pg_fetch_row($user);
      echo $row[5];
      if ($row[5] == "admin") {
        $result = pg_query($con, "DELETE FROM users WHERE uid=".$_GET["uid"]."");
        header("Location: https://sauveteur-de-dunkerque.alwaysdata.net/admin.php");
        die();
      } else {
        header("Location: https://sauveteur-de-dunkerque.alwaysdata.net/connexion.html");
        die();
      }
?>		