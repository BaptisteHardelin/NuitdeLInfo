<?php
    session_start();
    $con = pg_connect("host=postgresql-sauveteur-de-dunkerque.alwaysdata.net port=5432 dbname=sauveteur-de-dunkerque_db user=sauveteur-de-dunkerque password=nuitinfo");
    if (!$con) {
        echo "Une erreur s'est produite.\n";
        exit;
      }
      
      $user = pg_query($con, "SELECT * FROM users WHERE uid='".$_SESSION['userID']."'");
      $row = pg_fetch_row($user);
        $result = pg_query($con, "UPDATE users SET prenom='".$_POST['prenom']."', nom='".$_POST['nom']."', mail='".$_POST['mail']."', mdp='".$_POST['mdp']."' WHERE uid='".$_POST['uid']."'");
        header("Location: https://sauveteur-de-dunkerque.alwaysdata.net/profil.php");
        die();
?>