<!-- //
//FAIT PAR PIERRE
/ -->


<?php

class dossier
{
    private $idc;
    private function connexion()
    {
        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz2", 'root', '');
    }

    //Fonction pour afficher un user par rapport à son identifiant
    // public function RecupUser($id)
    // {
    //     $this->connexion();
    //     $res = $this->idc->prepare("SELECT USR.*,UTY_TYPE FROM T_D_USER_USR USR inner join T_D_USERTYPE_UTY UTY
    //     on USR.UTY_ID=UTY.UTY_ID
    //     where USR_ID= '" . $id . "'");
    //     $res->execute();
    //     return $res;
    // }

    //Fonction pour afficher un user par rapport à son mail
    public function RecupUserByMail($mail)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR.*,UTY_TYPE  as 'role'  FROM T_D_USER_USR USR inner join T_D_USERTYPE_UTY UTY
    on USR.UTY_ID=UTY.UTY_ID
     where USR_MAIL= '" . $mail . "'");
        $res->execute();
        return $res;
    }



    //Fonction pour recup le nombre d'utilisateurs pour un mail
    public function RecupCountUsers($mail)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT count(*) FROM T_D_USER_USR 
     where USR_MAIL= '" . $mail . "'");
        $res->execute();
        $nb = $res->fetchColumn();
        return $nb;
    }

    public function RecupTech()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT  CONCAT(USR_FIRSTNAME, ' ', USR_LASTNAME) as nom FROM t_d_user_usr");
        $res->execute();
        return $res;
    }




    public function InsertDossier(
        // $commentaire,
        $date,
        $idTech,
        $idCommande,
        $produit
        // $idStatus
    ) {
        $this->connexion();
        $query = 'INSERT INTO t_d_savfile_svf
        (
            --  SVF_COMM,
        SVF_CREATIONTIME,
        USR_ID,
        OHR_ID,
        SVF_Product,
        SVL_ID)
         VALUES (
            -- :commentaire,
            :dates,
            :idTech,
            :idCommande,
            :produit,
            1
            
        )'; //par défaut on le met en type utilisateur Technicien S.A.V

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            // ':commentaire' => $commentaire,
            ':dates' => $date,
            ':idTech' => $idTech,
            ':idCommande' => $idCommande,
            ':produit' => $produit
        ]);

        // on retourne le dernier id
        return $id = $this->idc->lastInsertId();
        ;
    }

    public function RecupTechId()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR_ID  CONCAT(USR_FIRSTNAME, ' ', USR_LASTNAME) as nom FROM t_d_user_usr");
        $res->execute();
        return $res;
    }

    public function RecupProduit()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT ohr_id,prd.PRD_ID,ODT_QUANTITY as quantitéCommandée,prd.quantite,ODT_QUANTITY * prd.quantite as QuantityTotal from t_d_orderdetails_odt odt inner join ( SELECT prd.PRD_ID as prd_id,prd.PRD_ID as kit, prd.PRD_CODE, prd.PRD_DESCRIPTION , 1 as quantite FROM t_d_product_prd prd where pty_id=1 union all select prd.PRD_ID as prd_id,kit.prd_id_kit as kit,prd.PRD_CODE, prd.PRD_DESCRIPTION , kit.KIT_QUANTITY as quantite from t_d_product_prd prdkit inner join t_d_productkit_kit kit on prdkit.prd_id=PRD_ID_KIT inner join t_d_product_prd prd on kit.PRD_ID_COMPONENT=prd.PRD_ID where prdkit.PTY_ID=2) prd on odt.prd_id=prd.kit");
        $res->execute();
        return $res;
    }
}
