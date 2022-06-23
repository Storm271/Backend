<?php
    $pdo;
    if (!isset($pdo)) {
        $pdo=getDatabaseConnexion();
    }
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
    // récupere tous les types de paiements
    function getAllPaymentTypes()
    {
        $con = getDatabaseConnexion();
        $requete = 'SELECT * from t_d_paymenttype_pmt';
        $rows = $con->query($requete);
        return $rows;
    }

    // creer un type de paiement
    function createPaymentType($payment)
    {
        try {
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO t_d_paymenttype_pmt (PMT_WORDING) 
					VALUES ('$payment')";
            $con->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    //recupere un type de paiement
    function readPaymentType($id)
    {
        $con = getDatabaseConnexion();
        $requete = "SELECT * from t_d_paymenttype_pmt where PMT_ID = '$id' ";
        $stmt = $con->query($requete);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    //met à jour le type de paiement
    function updatePaymentType($id, $payment)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE t_d_paymenttype_pmt set 
						PMT_WORDING = '$payment'
						where PMT_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // suprime un type de paiement
    function deletePaymentType($id)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from t_d_paymenttype_pmt where PMT_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
