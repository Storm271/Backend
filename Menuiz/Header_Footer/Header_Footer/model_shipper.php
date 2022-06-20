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

    
    // récupere tous les transporteurs
    function getAllShippers()
    {
        $con = getDatabaseConnexion();
        $requete = 'SELECT * from t_d_expeditiontype_ety';
        $rows = $con->query($requete);
        return $rows;
    }

    // creer un transporteur
    function createShipper($shipper)
    {
        try {
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO t_d_expeditiontype_ety (ETY_WORDING) 
					VALUES ('$shipper')";
            $con->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    //recupere un transporteur
    function readShipper($id)
    {
        $con = getDatabaseConnexion();
        $requete = "SELECT * from t_d_expeditiontype_ety where ETY_ID = '$id' ";
        $stmt = $con->query($requete);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    //met à jour le transporteur
    function updateShipper($id, $shipper)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE t_d_expeditiontype_ety set 
						ETY_WORDING = '$shipper'
						where ETY_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // suprime un transporteur
    function deleteShipper($id)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from t_d_expeditiontype_ety where ETY_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
