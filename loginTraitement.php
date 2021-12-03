<?php
    $con = pg_connect("host=postgresql-sauveteur-de-dunkerque.alwaysdata.net port=5432 dbname=sauveteur-de-dunkerque_db user=sauveteur-de-dunkerque password=nuitinfo");
    if (!$con) {
        echo "Une erreur s'est produite.\n";
        exit;
      }
      
      $result = pg_query($con, "SELECT * FROM users WHERE mail='".$_POST['mail']."'");
      if (!$result) {
        echo "Une erreur s'est produite.\n";
        exit;
      }
      $row = pg_fetch_row($result);
      if ($row[4] == $_POST['mdp']) {
        session_start();
        $_SESSION['userID'] = $row[0];
        header("Location: https://sauveteur-de-dunkerque.alwaysdata.net");
        die();
      } else {
        header("Location: https://sauveteur-de-dunkerque.alwaysdata.net/connexion.html");
        die();
      }  
?>