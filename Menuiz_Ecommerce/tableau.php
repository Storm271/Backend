<!-- //
//FAIT PAR PIERRE
/ -->


<?php
require_once __DIR__ . '/Include/init.php';
require __DIR__ . '/layout/top.php';
require __DIR__ .'/Model/tableauModel.php';
hotlineTechSecurity();
techSavSecurity();

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud en php</title>
        
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        	<link href="css/responsive.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        <style>
           .status[data-status="non traité"]:after {
            color : blue

            }
</style>
    </head>
    <body>


<div class="container">


<h2>Tableau retours S.A.V</h2>
<br>
<br>
<br>


<div id="nouveauDoss">
<a class="btn btn-success" href="creationDossier.php">Nouveau Dossier</a>
</div>
<br>


<div class="row">
  

<div class="table-responsive">


<table class="table table-hover table-bordered">


<thead>

<th>N° Dossier</th>

<th>Status</th>

<th>Date de création</th>

<th>N° de commande</th>

<th>N° Produit</th>

<th>Technicien en charge</th>

<th>Détail</th>

<th>Modification</th>

<th>Suppression</th>



</thead>

<tbody>
                        
<?php


$tableauModel = new ModeleTableau();
$tableauStatement = $tableauModel->RecupInfo();
$tableaux = $tableauStatement->fetchAll();


 //on formule notre requete
 foreach ($tableaux as $tableau) {
     //on cree les lignes du tableau avec chaque valeur retournée
     echo '<tr>';
     echo'<td>' . $tableau['SVF_ID'] . '</td>';
     echo'<td data-status="{{'. $tableau['SVL_STATUS'] .'}}" class="status">' . $tableau['SVL_STATUS'] . '</td>';
     echo'<td>' . $tableau['SVF_CREATIONTIME'] . '</td>';
     echo'<td>' . $tableau['OHR_NUMBER'] . '</td>';
     echo'<td>' . $tableau['SVF_Product'] . '</td>';
     echo'<td>' . $tableau['nom'] . '</td>';
     echo '<td>';
     echo '<a class="btn btn-secondary" href="infosRetour.php?id=' . $tableau['SVF_ID'] . '">Read</a>';// un autre td pour le bouton d'edition
     echo '</td>';
     echo '<td>';
     echo '<a class="btn btn-success" href="updateRetour.php?id=' . $tableau['SVF_ID'] . '">Update</a>';// un autre td pour le bouton d'update
     echo '</td>';
     echo'<td>';
     echo '<a class="btn btn-danger" href="delete.php?id=' . $tableau['SVF_ID'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
     echo '</td>';
     echo '</tr>';
 }
?>    
</tbody>

</table>

</div>

</div>

</div>

<?php
require __DIR__ . '/layout/bottom.php';
?>
</body>
</html>