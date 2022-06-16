<?php session_start();
// include 'DBController.php';
// $db_handle = new DBController();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>
<body >   
    
 <?php

 
 // HEADER
 
 
 include "header.php";
 if ($_SESSION["connecter"] != "yes") {
     header("location:login.php");
     exit();
 }
if (date("H") < 18) {
    $bienvenue = "Bonjour et bienvenue "  .
$_SESSION["prenom_nom"];
} else {
    $bienvenue = "Bonsoir et bienvenue "  .
$_SESSION["prenom_nom"];
}
?>
<h2 class="bienvenue"><?php  echo  $bienvenue  ?></h2>

<?php
 
 if (isset($_SESSION["name"])) {
     echo '<H1 class="form-legend">Bienvenue ' . $_SESSION["name"] . ' !</H1>';
     echo '<br /><br /><a href="logout.php">Se déconnecter</a>';
 }


    echo "<main>";

            echo '<div id="admin-box" class="box-container">';
            echo '<div class="adminPage">';
            echo '<div class="fold-container shadow form-admin">';
            echo "<H1 class='form-legend'>Bienvenue Administrateur</H1>";
            echo '</div>';
            echo '</div>';
            echo '<div class="adminPage">';
            echo '<div  class="fold-container shadow form-admin">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo "</main>";

      
?>

<a class="voirPanier" href="panier.php"> Voir panier </a>
    <form action="page_recherche.php" method="post" class="searchZone">
           
            
            <input type="text" value="" id="searchBar" name="search" />
           
            <input type="submit" name="login" class="btn btn-info" value="Recherche"/>
        </form>

        


<!-- // Zone test -->
    </div>
<?php

        echo '<div id="zone-produits">';

include "produits.php";





   // Fin Zone Test
   

   
    // FOOTER
     include "footer.php";
?>





<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>