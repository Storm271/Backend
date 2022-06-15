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

 echo '<div class="zone-produits">';


// include "functions.php";


$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "menuiz";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from T_D_Product_PRD where PRD_DESCRIPTION like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<form action="page_produit.php" method="GET">';
        echo '<div name ="idProduit" id="produit'.$row['PRD_ID'].'" class="produits">';
        echo '<div class ="container-image">';
        echo '<a href="page_produit.php?idProduit='.$row['PRD_ID'].'"><img src="'.$row['PRD_PICTURE'].'"/>';
        echo '</a></div> ';
        echo '<p class="titre">'.$row['PRD_DESCRIPTION'].'</p>';
        echo '<p class="prix">'.$row['PRD_PRICE'].' </p>';

        echo '<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, \'\', 
\'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;"  class="add-to-cart btn btn-primary">Ajouter au panier</a>';
        echo '</div>';
        echo '</form>';
    }
} else {
    echo "0 records";
}

$conn->close();





















// $produitModel=new ModeleProduct(0);
// $produitStatement=$produitModel-> RechercheProduits($recherche);$_GET['idProduit']
// $produits = $produitStatement->fetchAll();

// // On affiche chaque produit un à un


// foreach ($produits as $produit) {
//     echo '<form action="page_produit.php" method="GET">';
//     echo '<div name ="idProduit" id="produit'.$produit['PRD_ID'].'" class="produits">';
//     echo '<div class ="container-image">';
//     echo '<a href="page_produit.php?idProduit='.$produit['PRD_ID'].'"><img src="'.$produit['PRD_PICTURE'].'"/>';
//     echo '</a></div> ';
//     echo '<p class="titre">'.$produit['PRD_DESCRIPTION'].'</p>';
//     echo '<p class="prix">'.$produit['PRD_PRICE'].' </p>';

//     echo '<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, \'\',
// \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;"  class="add-to-cart btn btn-primary">Ajouter au panier</a>';
//     echo '</div>';
//     echo '</form>';
// }



include "footer.php";
?>





<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>