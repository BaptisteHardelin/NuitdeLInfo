<?php
    echo "<center>";
    echo "<link rel=\"stylesheet\" href=\"./assets/css/style_admin.css\">";
    $con = pg_connect("host=postgresql-sauveteur-de-dunkerque.alwaysdata.net port=5432 dbname=sauveteur-de-dunkerque_db user=sauveteur-de-dunkerque password=nuitinfo");
    if (!$con) {
        echo "Une erreur s'est produite.\n";
        exit;
      }
      echo "<h1>Liste des utilisateurs</h1>";
      $result = pg_query($con, "SELECT * FROM users");
      if (!$result) {
        echo "Une erreur s'est produite.\n";
        exit;
      }
?>

<html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>ID</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
        <?php
         while ($row = pg_fetch_row($result)) {
            echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[5]</td>";
            echo "<td class=\"text-center\"><a href=\"./supprimerUser.php?uid=$row[0]\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span> Del</a></td>";
            echo "</tr>";
         }
        ?>
    </table>
    </div>
</div>
</html>
