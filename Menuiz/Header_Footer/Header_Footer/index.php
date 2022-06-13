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
<body>   
 <?php
 // HEADER
 include "header.php";
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


// Zone test
include "panier.php";

        echo '<div class="zone-produits">';
        
            echo '<div class="produits">';
            echo '<div class ="container-image">';
                    echo '<img src="https://ceklo.fr/wp-content/uploads/2020/04/Portail-aluminium-battant-BRAVO-7016-ceklo.jpg"/>';
            echo '</div> ';
            echo '<p class="titre"> Produit A </p>';
            echo '<p class="prix"> Prix </p>';
           
        echo '<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, \'\', 
        \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;"  class="add-to-cart btn btn-primary">Ajouter au panier</a>';
        echo '</div>';

        echo '<div class="produits">';
        echo '<div class ="container-image">';
                echo '<img src="https://ceklo.fr/wp-content/uploads/2020/04/Portail-aluminium-battant-BRAVO-7016-ceklo.jpg"/>';
        echo '</div> ';
        echo '<p class="titre"> Produit A </p>';
        echo '<p class="prix"> Prix </p>';
        echo '<a href="" class="add-to-cart btn btn-primary">Ajouter au panier</a>';
    
    echo '</div>';

    echo '<div class="produits">';
    echo '<div class ="container-image">';
            echo '<img src="https://ceklo.fr/wp-content/uploads/2020/04/Portail-aluminium-battant-BRAVO-7016-ceklo.jpg"/>';
    echo '</div> ';
    echo '<p class="titre"> Produit A </p>';
    echo '<p class="prix"> Prix </p>';
    echo '<a href="" class="add-to-cart btn btn-primary">Ajouter au panier</a>';

echo '</div>';

echo '<div class="produits">';
echo '<div class ="container-image">';
        echo '<img src="https://ceklo.fr/wp-content/uploads/2020/04/Portail-aluminium-battant-BRAVO-7016-ceklo.jpg"/>';
echo '</div> ';
echo '<p class="titre"> Produit A </p>';
echo '<p class="prix"> Prix </p>';
echo '<a href="" class="add-to-cart btn btn-primary">Ajouter au panier</a>';

echo '</div>';

echo '<div class="produits">';
echo '<div class ="container-image">';
        echo '<img src="https://ceklo.fr/wp-content/uploads/2020/04/Portail-aluminium-battant-BRAVO-7016-ceklo.jpg"/>';
echo '</div> ';
echo '<p class="titre"> Produit A </p>';
echo '<p class="prix"> Prix </p>';
echo '<a href="" class="add-to-cart btn btn-primary">Ajouter au panier</a>';

echo '</div>';

echo '<div class="produits">';
echo '<div class ="container-image">';
        echo '<img src="https://ceklo.fr/wp-content/uploads/2020/04/Portail-aluminium-battant-BRAVO-7016-ceklo.jpg"/>';
echo '</div> ';
echo '<p class="titre"> Produit A </p>';
echo '<p class="prix"> Prix </p>';
echo '<a href="" class="add-to-cart btn btn-primary">Ajouter au panier</a>';

echo '</div>';

echo '<div class="produits">';
echo '<div class ="container-image">';
        echo '<img src="https://ceklo.fr/wp-content/uploads/2020/04/Portail-aluminium-battant-BRAVO-7016-ceklo.jpg"/>';
echo '</div> ';
echo '<p class="titre"> Produit A </p>';
echo '<p class="prix"> Prix </p>';
echo '<a href="" class="add-to-cart btn btn-primary">Ajouter au panier</a>';

echo '</div>';


       
echo '</div>;';
   // Fin Zone Test
   

   
    // FOOTER
     include "footer.php";
?>





<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>