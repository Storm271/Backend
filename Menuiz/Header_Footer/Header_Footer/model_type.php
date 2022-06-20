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

    
    // récupere tous les types de produits
    function getAllTypes()
    {
        $con = getDatabaseConnexion();
        $requete = 'SELECT * from t_d_producttype_pty';
        $rows = $con->query($requete);
        return $rows;
    }

    // creer un type de produit
    function createType($description)
    {
        try {
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO t_d_producttype_pty (PTY_DESCRIPTION) 
					VALUES ('$description')";
            $con->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    //recupere un type de produit
    function readType($id)
    {
        $con = getDatabaseConnexion();
        $requete = "SELECT * from t_d_producttype_pty where PTY_ID = '$id' ";
        $stmt = $con->query($requete);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    //met à jour le type de produit
    function updateType($id, $description)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE t_d_producttype_pty set 
						PTY_DESCRIPTION = '$description'
						where PTY_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // suprime un type de produit
    function deleteType($id)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from t_d_producttype_pty where PTY_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
