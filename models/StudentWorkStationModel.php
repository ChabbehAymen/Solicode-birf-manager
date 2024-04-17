<?php
require dirname(dirname(__FILE__)).'/models/DbConfModel.php';

class StudentWorkStationModel extends DbConfModel
{
    public function getAllProjects(int $idStudent){
        $query = $this->pdo->prepare("SELECT ID_BRIEF, LIEN, COMPLETE_DATE, TITRE, DATE_DEBUT, DATE_AJOUTE, PIECE_JOINTE,ETAT,  DATE(DATE_DEBUT+BRIEF.DURATION) AS END_DATE, IMAG, NOM_GROUPE
        FROM REALISER INNER JOIN BRIEF USING(ID_BRIEF) INNER JOIN GROUPE USING(ID_FORMATEUR) INNER JOIN APPRENANT USING (ID_APPRENANT)
        WHERE ID_APPRENANT = :ID");
        $query->execute(array('ID'=>$idStudent));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBrief(mixed $params){
        $query = $this->pdo->prepare("SELECT ID_BRIEF, LIEN, COMPLETE_DATE, TITRE, DATE_DEBUT, DATE_AJOUTE, PIECE_JOINTE, DATE(DATE_DEBUT+BRIEF.DURATION) AS END_DATE,ETAT , IMAG, NOM_GROUPE
        FROM REALISER INNER JOIN BRIEF USING(ID_BRIEF) INNER JOIN GROUPE USING(ID_FORMATEUR) INNER JOIN APPRENANT USING (ID_APPRENANT)
        WHERE ID_APPRENANT = :ID and ID_BRIEF = :bID;");
        $query->execute(array('ID'=>$params['ID'], 'bID'=>$params['bID']));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCurrentWorkingBrief(int $idStudent){
        $query = $this->pdo->prepare("SELECT ID_BRIEF, LIEN, COMPLETE_DATE, TITRE, DATE_DEBUT, DATE_AJOUTE, PIECE_JOINTE,ETAT,  DATE(DATE_DEBUT+BRIEF.DURATION) AS END_DATE, IMAG, NOM_GROUPE
        FROM REALISER INNER JOIN BRIEF USING(ID_BRIEF) INNER JOIN GROUPE USING(ID_FORMATEUR) INNER JOIN APPRENANT USING (ID_APPRENANT)
        WHERE ID_APPRENANT = :ID AND ETAT = 'TODO' OR ETAT = 'DOING'");
        $query->execute(array('ID'=>$idStudent));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
