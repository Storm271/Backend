<?php
require_once __DIR__ .'/Include/init.php';
require __DIR__ .'/Model/creationDossierModel.php';


$errors = [];
$commentaire = $date = $ip = $idTech = $idCommande = $idStatus = '';

$userM=new dossier();
if (!empty($_POST)) {
    sanitizePost();
    extract($_POST);
    
 
    
    if (empty($_POST['dates'])) {
        $errors[] = 'La date de création de dossier est obligatoire';
    }

    if (empty($_POST['idTech'])) {
        $errors[] = "L'ID du technicien en charge est obligatoire";
    }

    if (empty($_POST['idCommande'])) {
        $errors[] = "L'ID de la commande concernée est obligatoire";
    }
    
    
    
    if (empty($error)) {
        $userID=$userM->InsertDossier(
            // $_POST['commentaire'],
         $_POST['dates'],
            $_POST['idTech'],
            $_POST['idCommande']
        );
        //   echo $userID;
     
        setFlashMessage('Votre dossier est créé . ');
        header('Location: tableau.php');
        die;
    }
}

require __DIR__ .'/layout/top.php';

if (!empty($errors)) :
?>
<div class="alert alert-danger">
    <h5 class="alert-heading">Le formulaire contient des erreurs</h5>
    <?= implode('<br>', $errors);  ?>
</div>
<?php
endif;
$techModel = new dossier();
$techStatement = $techModel->RecupTech();
$techs = $techStatement->fetchAll();
?>

<h1>Nouveau dossier</h1>
<form method="post" class="inscrip_form">
   
    <div class="form-group">
        <label>N° de commande</label>
        <input type="text" name="idCommande" class="form-control" value="<?= $idCommande; ?>">
    </div>

    <div class="form-group">
        <label>Date de création du dossier</label>
        <input type="datetime-local" name="dates" class="form-control" value="<?= $date ?>">
    </div>

    <div class="form-group">
        <label>ID du technicien en charge</label>
        <input type="text" name="idTech" class="form-control" value="<?= $idTech; ?>">
    </div>

    <!-- <div class="form-group">
        <label>Commentaire</label>
        <input type="text" name="Commentaire" class="form-control" value="<?= $Commentaire; ?>">
    </div> -->
  


    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>
<script>
var test = '<?= 'test' ?>;
</script>        
<?php
require __DIR__ .'/layout/bottom.php';
?>