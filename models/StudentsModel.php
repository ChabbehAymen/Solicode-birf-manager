<?php
require dirname(dirname(__FILE__)).'/models/DbConfModel.php';
class StudentsModel extends DbConfModel
{

    function getAll(int $groupId){
        
        $query = $this->pdo->prepare("SELECT ID_APPRENANT, APPRENANT.NOM, APPRENANT.PRENOM, APPRENANT.EMAIL FROM `APPRENANT` INNER JOIN GROUPE USING(ID_GROUPE) INNER JOIN FORMATEUR USING(ID_FORMATEUR) WHERE ID_FORMATEUR = :ID;");
        $query->execute(array('ID'=>$groupId));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
