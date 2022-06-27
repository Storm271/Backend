<?php


class ModeleTableau
{
    private $idc;
    private function connexion()
    {
        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz2", 'root', '');
    }

    //Fonction pour afficher tous les produits
    public function lireTable()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT * FROM T_D_Product_PRD");
        $res->execute();
        return $res;
    }
}
