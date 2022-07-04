<!-- //
//FAIT PAR PIERRE
/ -->

<?php
require_once __DIR__ . '/Include/init.php';
require __DIR__ . '/layout/top.php';
require __DIR__ .'/Model/infosRetourModel.php';
$produitModel=new ModeleinfosRetour(0);
$produitStatement=$produitModel->RecupProduit($_GET['id']);
$produit = $produitStatement->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
    </head>

    <body>


<div class="container">



<div class="span10 offset1">


<div class="row">


<h2>Edition</h2>
<br>
<br>
<br>
<br>

</div>


<div class="form-horizontal" >


<div class="control-group">
<label class="control-label">N° de dossier</label>


<div class="controls">
<label class="checkbox">
<?php
 echo '<p class="description">'.$produit[0]['SVF_ID'].'</p>'; ?>
</label>
</div>


</div>




<div class="control-group">
<label class="control-label">Status</label>


<div class="controls">
<label class="checkbox">
<?php  echo '<p class="description">'.$produit[0]['SVL_STATUS'].'</p>'; ?>
</label>
</div>


</div>




<div class="control-group">
<label class="control-label">Date de Création</label>

<div class="controls">
<label class="checkbox">
<?php  echo '<p class="description">'.$produit[0]['SVF_CREATIONTIME'].'</p>'; ?>
</label>
</div>


</div>



<div class="control-group">
<label class="control-label">N° de commande</label>


<div class="controls">
<label class="checkbox">
<?php  echo '<p class="description">'.$produit[0]['OHR_NUMBER'].'</p>'; ?>
</label>
</div>


</div>





<div class="control-group">
<label class="control-label">N° Produit</label>


<div class="controls">
<label class="checkbox">
<?php
echo '<p class="description">'.$produit[0]['PRD_DESCRIPTION'].'</p>'; ?>
</label>
</div>


</div>



<div class="control-group">
<label class="control-label">Nom du technicien en charge</label>


<div class="controls">
<label class="checkbox">
<?php
echo '<p class="description">'.$produit[0]['nom'].'</p>'; ?>
</label>
</div>



</div>




<div class="control-group">
<label class="control-label">Commentaire du technicien</label>


<div class="controls">
<label class="checkbox">
<?php  echo '<p class="description">'.$produit[0]['SVF_COMM'].'</p>'; ?>
</label>
</div>


</div>




<div class="form-actions">
<a class="btn btn-secondary" href="tableau.php">Back</a>
</div>




</div>


</div>



</div>


<?php require __DIR__ . '/layout/bottom.php'; ?>
    </body>
</html>