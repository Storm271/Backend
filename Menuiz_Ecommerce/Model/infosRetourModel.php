<?php


class ModeleinfosRetour
{
    private $idc;
    private function connexion()
    {
        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz2", 'root', '');
    }

    //Fonction pour afficher tous les produits
    public function RecupInfo()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT SVF_ID, SVL_STATUS, SVF_CREATIONTIME, OHR_NUMBER,SVF_Product, CONCAT(USR_FIRSTNAME, ' ', USR_LASTNAME) as nom, t_d_user_usr.USR_ID FROM t_d_user_usr
   join t_d_savfile_svf on t_d_savfile_svf.Usr_ID = t_d_user_usr.Usr_ID
   join t_d_savdetails_svl on t_d_savdetails_svl.SVL_ID = t_d_savfile_svf.SVL_ID
   join t_d_orderheader_ohr on t_d_orderheader_ohr.OHR_ID = t_d_savfile_svf.OHR_ID");
        $res->execute();
        return $res;
    }


    public function RecupProduit($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT SVF_ID, PRD_DESCRIPTION, SVL_STATUS, SVF_CREATIONTIME, OHR_NUMBER,SVF_Product, CONCAT(USR_FIRSTNAME, ' ', USR_LASTNAME) as nom, t_d_user_usr.USR_ID FROM t_d_user_usr
        join t_d_savfile_svf on t_d_savfile_svf.Usr_ID = t_d_user_usr.Usr_ID
        join t_d_savdetails_svl on t_d_savdetails_svl.SVL_ID = t_d_savfile_svf.SVL_ID
        join t_d_orderheader_ohr on t_d_orderheader_ohr.OHR_ID = t_d_savfile_svf.OHR_ID 
        join t_d_product_prd on t_d_product_prd.PRD_ID = t_d_orderheader_ohr.PRD_ID
        where SVF_Product= ".$id."");
        $res->execute();
        return $res;
    }
}
