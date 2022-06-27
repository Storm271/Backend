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
<th>Détail</th>
<p>
<th>Email</th>
<p>
<th>Comment</th>
<p>
<th>metier</th>
<p>
<th>Url</th>
<p>
<th>Edition</th>
<p>

</thead>



<tbody>
                        
<?php


$tableauModel = new ModeleTableau();
$tableauStatement = $tableauModel->lireTable();
$tableaux = $tableauStatement->fetchAll();


 //on formule notre requete
 foreach ($tableaux as $tableau) {
     //on cree les lignes du tableau avec chaque valeur retournée
     echo '<br /><tr>';
     echo'<td>' . $tableau['PRD_ID'] . '</td><p>';
     echo'<td>' . $tableau['PRD_DESCRIPTION'] . '</td><p>';
     echo'<td>' . $tableau['PRD_GUARANTEE'] . '</td><p>';
     echo'<td>' . $tableau['PRD_PRICE'] . '</td><p>';
     //  echo'<td>' . $tableau['PRD_DEFINITION'] . '</td><p>';
     //  echo'<td>' . $row['pays'] . '</td><p>';
     //  echo'<td>' . $row['comment'] . '</td><p>';
     //  echo'<td>' . $row['metier'] . '</td><p>';
     //  echo'<td>' . $row['url'] . '</td><p>';
     echo '<td>';
     echo '<a class="btn" href="infosRetour.php?id=' . $tableau['PRD_ID'] . '">Read</a>';// un autre td pour le bouton d'edition
     echo '</td><p>';
     //  echo '<td>';
    //  echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update
    //  echo '</td><p>';
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