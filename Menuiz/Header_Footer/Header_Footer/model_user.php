<?php
    
    function getDatabaseConnexion()
    {
        try {
            $user = "root";
            $pass = "";
            $pdo = new PDO('mysql:host=localhost;dbname=menuiz', $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    
    // récupere tous les users
    function getAllUsers()
    {
        $con = getDatabaseConnexion();
        $requete = 'SELECT * from t_d_user_usr';
        $rows = $con->query($requete);
        return $rows;
    }

    // creer un user
    function createUser($nom, $prenom, $email, $password, $pseudo)
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

    //recupere un user
    function readUser($id)
    {
        $con = getDatabaseConnexion();
        $requete = "SELECT * from t_d_user_usr where USR_ID = '$id' ";
        $stmt = $con->query($requete);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    //met à jour le user
    function updateUser($id, $nom, $prenom, $email, $password, $pseudo)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE t_d_user_usr set 
						USR_LASTNAME = '$nom',
						USR_FIRSTNAME = '$prenom',
						USR_MAIL = '$email',
                        USR_PASSWORD = '$password',
                        username = '$pseudo'
						where USR_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // suprime un user
    function deleteUser($id)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from t_d_user_usr where USR_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
