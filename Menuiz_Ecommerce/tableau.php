<?php
require_once __DIR__ . '/Include/init.php';
require __DIR__ . '/layout/top.php';
require __DIR__ .'/Model/tableauModel.php';
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

<br />
<div class="container">

<br />
<div class="row">

<br />
<h2>tableau retours S.A.V</h2>
<p>

</div>
<p>


<br />
<div class="row">
  
<br />
<div class="table-responsive">

<br />
<table class="table table-hover table-bordered">

<br />
<thead>

<th>N° Dossier</th>
<p>
<th>Status</th>
<p>
<th>Date de création</th>
<p>
<th>N° de commande</th>
<p>
<th>N° Produit</th>
<p>
<th>Technicien en charge</th>
<p>
<th>Détail</th>
<p>
<th>Modification</th>
<p>


</thead>

<tbody>
                        
<?php


$tableauModel = new ModeleTableau();
$tableauStatement = $tableauModel->RecupInfo();
$tableaux = $tableauStatement->fetchAll();


 //on formule notre requete
 foreach ($tableaux as $tableau) {
     //on cree les lignes du tableau avec chaque valeur retournée
     echo '<br /><tr>';
     echo'<td>' . $tableau['SVF_ID'] . '</td><p>';
     echo'<td data-status="{{'. $tableau['SVL_STATUS'] .'}}" class="status">' . $tableau['SVL_STATUS'] . '</td><p>';
     echo'<td>' . $tableau['SVF_CREATIONTIME'] . '</td><p>';
     echo'<td>' . $tableau['OHR_NUMBER'] . '</td><p>';
     echo'<td>' . $tableau['SVF_Product'] . '</td><p>';
     echo'<td>' . $tableau['nom'] . '</td><p>';
     echo '<td>';
     echo '<a class="btn btn-secondary" href="infosRetour.php?id=' . $tableau['SVF_Product'] . '">Read</a>';// un autre td pour le bouton d'edition
     echo '</td><p>';
     echo '<td>';
     echo '<a class="btn btn-success" href="updateRetour.php?id=' . $tableau['SVF_Product'] . '">Update</a>';// un autre td pour le bouton d'update
     echo '</td><p>';
     //  echo'<td>';
    //  echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
    //  echo '</td><p>';
    //  echo '</tr><p>';
 }
?>    
</tbody>
<p>
</table>
<p>
</div>
<p>
</div>
<p>
</div>
<p>
<?php
require __DIR__ . '/layout/bottom.php';
?>
</body>
</html>