<!-- //
//FAIT PAR PIERRE
/ -->

<?php
require_once __DIR__ . '/Include/init.php';
require __DIR__ . '/layout/top.php';
require __DIR__ .'/Model/updateRetourModel.php';
$id=0;
if (!empty($_GET['id'])) {
    $id=$_REQUEST['id'];
}
if (!empty($_POST)) {
    $id= $_POST['id'];
    $deleteModel = new ModeleDelete();
    $deleteStatement = $deleteModel->deleteFolder($_POST['id']);
    $delete = $deleteStatement->fetchAll();
    header("Location: tableau.php");
}
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
<h2>Supprimer un dossier</h2>
<br>
<br>
<br>
<br>

</div>

<form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      
Etes-vous sûr de vouloir supprimer le dossier n° <?php echo $id; ?> ?

<br>
<br>
<div class="form-actions">
                          <button type="submit" class="btn btn-danger">Oui</button>
                          <a class="btn btn-secondary" href="tableau.php">Non</a>
</div>
<p>

                    </form>
<p>
</div>
<p>

                 
</div>


<?php require __DIR__ . '/layout/bottom.php'; ?>
    </body>
</html>
