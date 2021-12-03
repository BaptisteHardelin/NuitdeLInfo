<?php
    echo $_POST['prenom'];
    $con = pg_connect("host=postgresql-sauveteur-de-dunkerque.alwaysdata.net port=5432 dbname=sauveteur-de-dunkerque_db user=sauveteur-de-dunkerque password=nuitinfo");
    if (!$con) {
    echo "Une erreur s'est produite.\n";
    exit;
    }

    $query = "INSERT INTO users (prenom,nom,mail,mdp,role) VALUES('".$_POST['prenom']."','".$_POST['nom']."','".$_POST['mail']."','".$_POST['mdp']."','sauveteur')";
    if (pg_query($con,$query))
    {
        echo "saved";
    }
    else
    {
        echo "error insering data";
    }
?>