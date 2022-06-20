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

    
    // récupere tous les produits
    function getAllProducts()
    {
        $con = getDatabaseConnexion();
        $requete = 'SELECT * from t_d_product_prd';
        $rows = $con->query($requete);
        return $rows;
    }

    // creer un produit
    function createProduct($supplier, $type, $nom, $guarantee, $picture, $price, $definition, $rating)
    {
        try {
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO t_d_product_prd (SPL_ID, PTY_ID, PRD_DESCRIPTION, PRD_GUARANTEE, PRD_PICTURE, PRD_PRICE, PRD_DEFINITION, average_rating) 
					VALUES ('$supplier', '$type', '$nom', '$guarantee', '$picture', '$price', '$definition', '$rating' )";
            $con->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    //recupere un produit
    function readProduct($id)
    {
        $con = getDatabaseConnexion();
        $requete = "SELECT * from t_d_product_prd where PRD_ID = '$id' ";
        $stmt = $con->query($requete);
        $row = $stmt->fetchAll();
        if (!empty($row)) {
            return $row[0];
        }
    }

    //met à jour un produit
    function updateProduct($id, $supplier, $type, $nom, $guarantee, $picture, $price, $definition, $rating)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE t_d_product_prd set 
						SPL_ID = '$supplier',
						PTY_ID = '$type',
						PRD_DESCRIPTION = '$nom',
                        PRD_GUARANTEE = '$guarantee',
                        PRD_PICTURE = '$picture',
                        PRD_PRICE = '$price',
                        PRD_DEFINITION = '$definition',
                        average_rating = '$rating'
						where PRD_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // suprime un produit
    function deleteProduct($id)
    {
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from t_d_product_prd where PRD_ID = '$id' ";
            $stmt = $con->query($requete);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
