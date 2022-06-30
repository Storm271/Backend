

<?php
require_once __DIR__ . '/Include/init.php';
require __DIR__ . '/layout/top.php';
require __DIR__ .'/Model/infosRetourModel.php';
$produitModel=new ModeleinfosRetour(0);
$produitStatement=$produitModel->RecupProduit($_GET['id']);
$produit = $produitStatement->fetchAll();


//  $id = null; if (!empty($_GET['PRD_ID'])) {
//      $id = $_REQUEST['PRD_ID'];
//  } if (null == $id) {
//      header("location:tableau.php");
//  } else {
//      //on lance la connection et la requete
//      RecupInfo();
//  }



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
    </head>

    <body>

<br />
<div class="container">


<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Edition</h3>
<p>

</div>
<p>



<br />
<div class="form-horizontal" >

<br />
<div class="control-group">
<label class="control-label">N° de dossier</label>

<br />
<div class="controls">
<label class="checkbox">
<?php
 echo '<p class="description">'.$produit[0]['SVF_ID'].'</p>'; ?>
</label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
<label class="control-label">Status</label>

<br />
<div class="controls">
<label class="checkbox">
<?php  echo '<p class="description">'.$produit[0]['SVL_STATUS'].'</p>'; ?>
</label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
<label class="control-label">Date de Création</label>

<br />
<div class="controls">
<label class="checkbox">
<?php  echo '<p class="description">'.$produit[0]['SVF_CREATIONTIME'].'</p>'; ?>
</label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
<label class="control-label">N° de commande</label>

<br />
<div class="controls">
<label class="checkbox">
<?php  echo '<p class="description">'.$produit[0]['OHR_NUMBER'].'</p>'; ?>
</label>
</div>
<p>

</div>

<p>


<br />
<div class="control-group">
<label class="control-label">N° Produit</label>

<br />
<div class="controls">
<label class="checkbox">
<?php
echo '<p class="description">'.$produit[0]['PRD_DESCRIPTION'].'</p>'; ?>
</label>
</div>
<p>

</div>
<p>

<br />
<div class="control-group">
<label class="control-label">Nom du technicien en charge</label>

<br />
<div class="controls">
<label class="checkbox">
<?php
echo '<p class="description">'.$produit[0]['nom'].'</p>'; ?>
</label>
</div>
<p>

</div>
<p>
<!-- 

<br />
<div class="control-group">
<label class="control-label">Metier</label>

<br />
<div class="controls">
<label class="checkbox">
<?php echo $data['metier']; ?>
</label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
<label class="control-label">Url</label>

<br />
<div class="controls">
<label class="checkbox">
<?php echo $data['url']; ?>
</label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
<label class="control-label">Comment</label>

<br />
<div class="controls">
<label class="checkbox">
<?php echo $data['comment']; ?>
</label>
</div>
<p>

</div>
<p> -->


<br />
<div class="form-actions">
<a class="btn btn-secondary" href="tableau.php">Back</a>
</div>
<p>



</div>
<p>

</div>
<p>


</div>
<p>
<!-- /container -->
<?php require __DIR__ . '/layout/bottom.php'; ?>
    </body>
</html>