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

    
    // récupere toutes les adresses
    function getAllAdresses()
    {
        $con = getDatabaseConnexion();
        $requete = 'SELECT * from t_d_address_adr';
        $rows = $con->query($requete);
        return $rows;
    }

    // creer une adresse
    function createAdress($prenom, $nom, $adresse1, $adresse2, $adresse3, $zipcode, $ville, $pays, $email, $telephone)
    {
        try {
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO t_d_address_adr (ADR_FIRSTNAME, ADR_LASTNAME, ADR_LINE1, ADR_LINE2, ADR_LINE3, ADR_ZIPCODE, ADR_CITY, ADR_COUNTRY, ADR_MAIL, ADR_PHONE) 
					VALUES ('$prenom', '$nom', '$adresse1', '$adresse2', '$adresse3', '$zipcode', '$ville', '$pays', '$email', '$telephone' )";
            $con->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    //recupere une adresse
    function readAdress($id)
    {
        $con = getDatabaseConnexion();
        $requete = "SELECT * from t_d_address_adr where ADR_ID = '$id' ";
        $stmt = $con->query($requete);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

  
    // suprime une adresse
    function deleteAdress($id)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from t_d_address_adr where ADR_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
