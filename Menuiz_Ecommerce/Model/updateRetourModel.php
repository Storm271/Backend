<?php
function getDatabaseConnexion()
{
    try {
        $user = "root";
        $pass = "";
        $pdo = new PDO('mysql:host=localhost;dbname=menuiz2', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function updateRetour($status, $commentaire)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO t_d_user_usr (SVL_STATUS, SVF_COMM) 
                VALUES ('$status', '$commentaire' )";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function update($nom, $prenom, $email, $password, $pseudo)
{
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO t_d_user_usr (USR_LASTNAME, USR_FIRSTNAME, USR_MAIL, USR_PASSWORD, username) 
                VALUES ('$nom', '$prenom', '$email', '$password', '$pseudo' )";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
