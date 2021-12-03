<?php
$con = pg_connect("host=postgresql-sauveteur-de-dunkerque.alwaysdata.net port=5432 dbname=sauveteur-de-dunkerque_db user=sauveteur-de-dunkerque password=nuitinfo");
if (!$con) {
    echo "Une erreur s'est produite.\n";
    exit;
}
session_start();
if($_SESSION['userID'] === NULL){
    header("location: https://sauveteur-de-dunkerque.alwaysdata.net");
    die();
}

$user = pg_query($con, "select * from users where uid='".$_SESSION['userID']."'");
$row = pg_fetch_row($user);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Logo_de_la_Soci%C3%A9t%C3%A9_Nationale_de_Sauvetage_en_Mer_%28SNSM%29.svg/1200px-Logo_de_la_Soci%C3%A9t%C3%A9_Nationale_de_Sauvetage_en_Mer_%28SNSM%29.svg.png" type="image/png">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <title>Acceuil</title>
</head>
<body>
    <header>
        <a href=" https://baptistehardelin.github.io/NuitDeLinfoChristmasEgg/"><img src="assets/logo/icon.png" alt="icon" /> </a> 
        <h1>Sauveteur en mer</h1>
        <nav>
            <ul>
                <li><a href="index.php">Sauveteurs</a>
                    <ul class="sous">
                        <li><a href="https://sauveteurdudunkerquois.fr/tableau-d-honneur/">Tableau d'honneur</a></li>
                        <li><a href="https://sauveteurdudunkerquois.fr/nos-sauveteurs/">Qui etaient t'ils ?</a></li>
                        <li><a href="https://sauveteurdudunkerquois.fr/les-acteurs/">que faisaient t'ils ?</a></li>
                        <li><a href="https://sauveteurdudunkerquois.fr/gratifications/">Gratifications</a></li>
                    </ul></li>
                <li><a href="inedx.php">Sortie en Mer</a>
                    <ul class="sous">
                        <li><a href="https://sauveteurdudunkerquois.fr/18eme-siecle/">18'eme</a></li>
                        <li><a href="https://sauveteurdudunkerquois.fr/19eme-siecle/">19'eme</a></li>
                        <li><a href="https://sauveteurdudunkerquois.fr/20e-siecle/">20'eme</a></li>
                        <li><a href="https://sauveteurdudunkerquois.fr/snsm-xxie/">21'eme</a></li>
                    </ul>
                </li>
                <li><a href="index.php">Stations</a>
                    <ul class="sous">
                        <li><a href="https://fr.wikipedia.org/wiki/Dunkerque" target="_blank">dunkerque</a></li>
                        <li><a href="https://fr.wikipedia.org/wiki/Gravelines" target="_blank">Gravelines</a></li>
                        <li><a href="https://fr.wikipedia.org/wiki/Malo-les-Bains" target="_blank">Malo-Les-Bains</a></li>
                    </ul></li><?php

                    if($_SESSION['userID'] === NULL){
                        echo "<li><a href=\"connexion.html\">Se connecter</a></li>";
                    }else{
                        echo"<li><a href=\"profil.php\">Mon profil</a>";
                        echo "<ul class=\"sous\"><li><a href=\"./killSession.php\">Se deconnecter</a></li>";
                        if($row[5] == "admin"){
                        echo "<li><a href=\"./admin.php\">Menu admin</a></li>";
                        }
                        echo "</li></ul>";
                    }
                ?>
            </ul>
        </nav>

    </header>
    <main>
        <p>
            Bienvenue sur le site des sauveteurs du dunkerquois.
            Ce site rend hommage aux femmes, hommes et enfants qui ont realise des actes de sauvetages en milieu aquatique.
            Ces sauveteurs, habitants du dunkerquois (de Bray-Dunes a Grand-Fort-Philippe), 
            ont participe a plus de 900 sauvetages en mer et plus de 1100 sauvetages individuels. 
            oeuvrant avec courage, abnegation et souvent au mepris du risque ils meritent amplement que leurs actes soient perennises.
        </p>
    </main>
    <footer id="contact">
        <a href="https://www.facebook.com/groups/938396409644949" target="_blank"><img src="assets/logo/fb.png" alt="icon facebook"></a>
        <p>Contactez-nous</p>
        <a href="https://twitter.com/boutelierphili1" target="_blank"><img src="assets/logo/icone twitter.png" alt="icon twitter"></a>
    </footer>
</body>
</html>