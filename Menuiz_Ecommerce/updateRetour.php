<!-- //
//FAIT PAR PIERRE
/ -->


<?php
require_once __DIR__ . '/Include/init.php';
require __DIR__ . '/layout/top.php';
require __DIR__ .'/Model/updateRetourModel.php';
$produitModel=new ModeleUpdateRetour(0);
$produitStatement=$produitModel->RecupProduit($_GET['id']);
$produit = $produitStatement->fetchAll();
techSavSecurity();






function update()
{
    if ($_SESSION['utilisateur']['role'] == 'Technicien SAV') {
        header('location: updateRetour.php');
    } else {
        header('HTTP/1.1 403 Forbidden');
        echo "Vous n'avez pas le droit d'acceder à cette page";
    }
};









 $id = null; if (!empty($_GET['id'])) {
     $id = $_REQUEST['id'];
 } if (null==$id) {
     header("Location: tableau.php");
 } if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
     // on initialise nos erreurs
     $statusError = null;
     $identifiantError = null;
     $commentaireError = null;

     // On assigne nos valeurs
     $status = $_POST["statu"];
     $identifiant = $_POST["idt"];
     $commentaire = $_POST["commentaire"];
   
     // On verifie que les champs sont remplis
     $valid = true;
     if (empty($status)) {
         $statusError = 'Please enter Name';
         $valid = false;
     }
     if (empty($identifiant)) {
         $identifiantError = 'Please enter firstname';
         $valid = false;
     }
     if (empty($commentaire)) {
         $commentaireError = 'Please enter Email Address';
         $valid = false;
     }

     // mise à jour des donnés
     if ($valid) {
         $updateModel = new ModeleUpdateRetour();
         $updateStatement = $updateModel->updateRetour($_POST['statu'], $_POST['idt'], $_POST['commentaire'], (int)$_GET['id']);
         $update = $updateStatement->fetchAll();
             
         header("Location: tableau.php");
     }
 }

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Crud-Update</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />

</head>
<body>

<form method="post">

<div class="container">

<h2>Modifier un contact</h2>
<br>
<br>
<br>
<br>
<div class="row">




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
<?php
$statusModel = new ModeleUpdateRetour();
$statusStatement = $statusModel->RecupStatus();
$statuss = $statusStatement->fetchAll();
?>

<select value="<?php echo $statu; ?>" name="statu" id="etat-select">
<?php
foreach ($statuss as $status) {
    echo'<option>' . $status['SVL_STATUS'] . '</option>';
}
echo '</select>';
?>

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
echo '<p class="description">'.$produit[0]['SVF_Product'].'</p>'; ?>
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

<div class="control-group">
<label class="control-label">Commentaire Technicien</label>


<div class="controls">
<label class="checkbox">



<input type="text"  id="input-commentaire" size="50" name="commentaire" 
 size="10"><?$produit[0]['SVF_COMM'] ?></input> 

<?php
// echo '<input type="text"  value="'.$commentaire;'" id="input-commentaire" size="50" name="commentaire"
//  size="10">'.$produit[0]['SVF_COMM'].'>';?>
</label>
</div>



</div>



<div class="control-group">
<label class="control-label">Id Technicien</label>


<div class="controls">
<label class="checkbox">
<?php
$techModel = new ModeleUpdateRetour();
$techStatement = $techModel->RecupTech();
$techs = $techStatement->fetchAll();
?>

<select value="<?php echo $identifiant; ?>" name="idt" id="tech-select">
<?php
foreach ($techs as $tech) {
    echo'<option >' . $tech['Usr_ID'] . '</option>';
}
echo '</select>';
?>

</label>
</div>


<div class="form-actions">
        <input type="submit" class="btn btn-success" name="submit" value="submit">
        <a class="btn" href="tableau.php">Retour</a>
</div>


</div>

</form>
</div>
</div>
</div>
<?php require __DIR__ . '/layout/bottom.php'; ?>
</body>
</html>