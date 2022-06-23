<?php
 
session_start();
include "model_shipper.php";
include "model_paymentType.php";


if ($_SESSION["connecter"] != "yes") {
    header("location:login.php");
    exit();
}
if (date("H") < 18) {
    $bienvenue = "Bonjour et bienvenue "  .
$_SESSION["prenom_nom"];
} else {
    $bienvenue = "Bonsoir et bienvenue "  .
$_SESSION["prenom_nom"];
}
@$nom = $_POST["nom"];
        @$prenom = $_POST["prenom"];
        @$pseudo = $_POST["pseudo"];
        @$password = $_POST["password"];
        @$passwordConf = $_POST["passconf"];
        @$pass_crypt = md5($_POST["password"]);
        @$email = $_POST["email"];
        @$valider = $_POST["valider"];
        $erreur = "";
        if (isset($valider)) {
            include("connexion.php");
            $verify = $pdo->prepare("select * from t_d_user_usr where username=? and USR_PASSWORD=? limit 1");
            $verify->execute(array($pseudo, $pass_crypt));
            $user = $verify->fetchAll();
            if (count($user) > 0) {
                $_SESSION["prenom_nom"] = $pseudo;
                // ucfirst(strtolower($user[0]["prenom"])) .
                // " "  .  strtoupper($user[0]["nom"]);
                $_SESSION["connecter"] = "yes";
                header("location:session.php");
            } else {
                $erreur = "Mauvais login ou mot de passe!";
            }
        } ?>


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






        <body  onLoad="document.fo.login.focus()">
        <h1>Informations de livraison</h1>
        <div  class="erreur"><?php  echo  $erreur  ?></div>
        <form  name="form"  method="post"  action="">

        <input  type="text"  name="prenom"  placeholder="Prenom"  /><br  />
        <input  type="text"  name="nom"  placeholder="Nom"  /><br  />
        <input  type="number"  name="zip"  min="5" max="5"  placeholder="Code postal"  /><br  />
        <input  type="text"  name="nom"  placeholder="Nom"  /><br  />

        <form action="#">
      <label for="shippers">Transporteur</label>
      <select name="shippers" id="shippers">
      <option></option>
        <?php
        $shippers = getAllShippers();
        foreach ($shippers as $shipper) {
            echo '<option value="'.$shipper['ETY_ID'].'">'.$shipper['ETY_WORDING'].'</option>';
        }
        ?>        
      </select>
      <input type="submit" value="Submit" />

      <label for="paiement">Moyen de paiement</label>
      <select name="paiement" id="paiements">
      <option></option>
        <?php
        $paiementTypes = getAllPaymentTypes();
        foreach ($paiementTypes as $paiementType) {
            echo '<option value="'.$paiementType['PMT_ID'].'">'.$paiementTypes['PMT_WORDING'].'</option>';
        }
        ?>        
      </select>
      <input type="submit" value="Submit" />



</form>









        <input  type="submit"  name="valider"  value="S'authentifier"  />











        <a  href="inscription.php">Créer votre Compte</a>












        </form>



        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        </body>
       



















    











  <?php
    



    // function getDatabaseConnexion()
    // {
    //     try {
    //         $user = "root";
    //         $pass = "";
    //         $pdo = new PDO('mysql:host=localhost;dbname=menuiz', $user, $pass);
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $pdo;
    //     } catch (PDOException $e) {
    //         print "Erreur !: " . $e->getMessage() . "<br/>";
    //         die();
    //     }
    // }

    
    // // récupere tous les users
    // function getAllUsers()
    // {
    //     $con = getDatabaseConnexion();
    //     $requete = 'SELECT * from t_d_user_usr';
    //     $rows = $con->query($requete);
    //     return $rows;
    // }

    // // creer un user
    // function createUser($nom, $prenom, $mail)
    // {
    //     try {
    //         $con = getDatabaseConnexion();
    //         $sql = "INSERT INTO t_d_user_usr (USR_LASTNAME, USR_FIRSTNAME, USR_MAIL)
    // 				VALUES ('$nom', '$prenom', '$mail' )";
    //         $con->exec($sql);
    //     } catch (PDOException $e) {
    //         echo $sql . "<br>" . $e->getMessage();
    //     }
    // }

    // //recupere un user
    // function readUser($id)
    // {
    //     $con = getDatabaseConnexion();
    //     $requete = "SELECT * from t_d_user_usr where USR_ID = '$id' ";
    //     $stmt = $con->query($requete);
    //     $row = $stmt->fetchAll();
    //     if (!empty($row)) {
    //         return $row[0];
    //     }
    // }

    // //met à jour le user
    // function updateUser($id, $nom, $prenom, $mail)
    // {
    //     try {
    //         $con = getDatabaseConnexion();
    //         $requete = "UPDATE t_d_user_usr set
    // 					USR_LASTNAME = '$nom',
    // 					USR_FIRSTNAME = '$prenom',
    // 					USR_MAIL = '$mail'
    // 					where USR_ID = '$id' ";
    //         $stmt = $con->query($requete);
    //     } catch (PDOException $e) {
    //         echo $sql . "<br>" . $e->getMessage();
    //     }
    // }

    // // suprime un user
    // function deleteUser($id)
    // {
    //     try {
    //         $con = getDatabaseConnexion();
    //         $requete = "DELETE from t_d_user_usr where USR_ID = '$id' ";
    //         $stmt = $con->query($requete);
    //     } catch (PDOException $e) {
    //         echo $sql . "<br>" . $e->getMessage();
    //     }
    // }
