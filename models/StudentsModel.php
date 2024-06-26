<?php
require dirname(dirname(__FILE__)).'/models/DbConfModel.php';
class StudentsModel extends DbConfModel
{

    function getAll(int $groupId){
        $query = $this->pdo->prepare("SELECT ID_APPRENANT, APPRENANT.NOM, APPRENANT.PRENOM, APPRENANT.EMAIL FROM `APPRENANT` INNER JOIN GROUPE USING(ID_GROUPE) INNER JOIN FORMATEUR USING(ID_FORMATEUR) WHERE ID_FORMATEUR = :ID;");
        $query->execute(array('ID'=>$groupId));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getOne(int $studentId){
        $query = $this->pdo->prepare("SELECT REALISER.ETAT, BRIEF.TITRE, REALISER.COMPLETE_DATE, DATE_DEBUT, DURATION,BRIEF.PIECE_JOINTE, LIEN,BRIEF.IMAG,BRIEF.ID_BRIEF FROM REALISER
        INNER  JOIN APPRENANT USING(ID_APPRENANT) INNER JOIN GROUPE USING (ID_GROUPE) INNER JOIN FORMATEUR USING (ID_FORMATEUR)
        INNER JOIN BRIEF USING (ID_BRIEF) 
        WHERE ID_APPRENANT = :ID;");
        $query->execute(array('ID'=>$studentId));
        return $query->fetchAll(PDO::FETCH_ASSOC);  
    }
    
    function getComp(int $idBrief){
        $query = $this->pdo->prepare("SELECT NOM AS N FROM COMPETENCE INNER JOIN CONCERNE USING(ID_COMPETENCE) WHERE ID_BRIEF = :ID");
        $query->execute(array('ID' => $idBrief));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
