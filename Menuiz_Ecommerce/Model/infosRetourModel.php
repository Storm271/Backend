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
        $res = $this->idc->prepare("SELECT * FROM t_d_product_prd  where PRD_ID= ".$id."");
        $res->execute();
        return $res;
    }


    public function RecupProduit($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT * FROM T_D_Product_PRD where PRD_ID= ".$id."");
        $res->execute();
        return $res;
    }
}
