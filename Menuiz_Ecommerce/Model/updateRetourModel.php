<!-- //
//FAIT PAR PIERRE
/ -->


<?php

class ModeleUpdateRetour
{
    private $idc;
    private function connexion()
    {
        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz2", 'root', '');
    }
    



    public function updateRetour($statu, $identifiant, $commentaire, $idsvf)
    {
        $this->connexion();
        $query = "UPDATE t_d_savfile_svf 
       SET Usr_ID = ".$identifiant." ,
        SVF_COMM = :commentaire, 
        SVL_ID = (SELECT SVL_ID from t_d_savdetails_svl WHERE  SVL_STATUS = :statu)
        where SVF_ID= ".$idsvf.";"
        ;

        echo $query;


        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':statu' => $statu,
            ':commentaire' => $commentaire
        ]);
        return $stmt;
    }
    
    public function RecupProduit($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT SVF_ID, SVF_COMM, SVL_STATUS, SVF_CREATIONTIME, OHR_NUMBER,SVF_Product, CONCAT(USR_FIRSTNAME, ' ', USR_LASTNAME) as nom, t_d_user_usr.USR_ID FROM t_d_user_usr
    join t_d_savfile_svf on t_d_savfile_svf.Usr_ID = t_d_user_usr.Usr_ID
    join t_d_savdetails_svl on t_d_savdetails_svl.SVL_ID = t_d_savfile_svf.SVL_ID
    join t_d_orderheader_ohr on t_d_orderheader_ohr.OHR_ID = t_d_savfile_svf.OHR_ID 
    where SVF_ID= ".$id."");
        $res->execute();
        return $res;
    }

    public function RecupStatus()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT  SVL_STATUS FROM t_d_savdetails_svl");
        $res->execute();
        return $res;
    }

    public function RecupTech()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT  Usr_ID FROM t_d_savfile_svf");
        $res->execute();
        return $res;
    }
}

class ModeleDelete
{
    private $idc;
    private function connexion()
    {
        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz2", 'root', '');
    }
    
    //Fonction pour afficher tous les produits
    public function deleteFolder($idsvf)
    {
        $this->connexion();
        $res = $this->idc->prepare("DELETE FROM t_d_savfile_svf  where SVF_ID= ".$idsvf.";");
        $res->execute();
        return $res;
    }
}
