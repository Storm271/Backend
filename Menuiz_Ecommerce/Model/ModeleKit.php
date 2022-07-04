<?php
// fait par magali 
class ModeleKit
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    function recupKitbyId()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT PRD_ID, PRD_DESCRIPTION from t_d_product_prd where PTY_ID=2");
        $res->execute();
        return $res;

    }
    function detailsKit()
    {
        $this-> connexion();
        $res = $this -> idc->prepare("SELECT PRD_ID, PRD_ID_COMPONENT, PRD_DESCRIPTION FROM t_d_product_prd INNER JOIN t_d_productkit_kit WHERE PRD_ID=PRD_ID_COMPONENT;");
        $res-> execute();
        return $res;
    }
    function quantityProductByKit()
{
    $this->connexion();
    $res = $this -> idc -> prepare("SELECT PRD_ID_COMPONENT, KIT_QUANTITY, PRD_ID, PRD_DESCRIPTION FROM t_d_productkit_kit INNER JOIN t_d_product_prd WHERE PRD_ID_COMPONENT= PRD_ID");
    $res -> execute();
    return $res;
}
}

?>