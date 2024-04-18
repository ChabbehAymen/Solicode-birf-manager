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

    public function getStudentAccount(int $studentID){
        $query = $this->pdo->prepare("SELECT * FROM APPRENANT WHERE ID_APPRENANT = :ID");
        $query->execute(array('ID'=>$studentID));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBrief(mixed $params){
        $query = $this->pdo->prepare("SELECT ID_BRIEF, LIEN, COMPLETE_DATE, TITRE, DATE_DEBUT, DATE_AJOUTE, PIECE_JOINTE, DATE(DATE_DEBUT+BRIEF.DURATION) AS END_DATE, DATEDIFF( DATE(DATE_DEBUT+DURATION), NOW()) AS REST_DAYS, ETAT , IMAG, NOM_GROUPE
        FROM REALISER INNER JOIN BRIEF USING(ID_BRIEF) INNER JOIN GROUPE USING(ID_FORMATEUR) INNER JOIN APPRENANT USING (ID_APPRENANT)
        WHERE ID_APPRENANT = :ID and ID_BRIEF = :bID;");
        $query->execute(array('ID'=>$params['ID'], 'bID'=>$params['bID']));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompetence(int $briefID){
        $query = $this->pdo->prepare("SELECT NOM AS N, DESCRIPTION AS D FROM COMPETENCE INNER JOIN CONCERNE USING(ID_COMPETENCE) WHERE ID_BRIEF = :ID");
        $query->execute(array('ID' => $briefID));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWorkingOnBriefs(int $studetnID){
        $query = $this->pdo->prepare("SELECT ID_BRIEF, ETAT, TITRE, DATEDIFF( DATE(DATE_DEBUT+DURATION), NOW()) AS REST_DAYS 
        FROM REALISER INNER JOIN BRIEF USING (ID_BRIEF) 
        WHERE ID_APPRENANT = :ID AND ETAT = 'TODO' OR ETAT = 'DOING'");
        $query->execute(array('ID' => $studetnID));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus(int $briefId){}

    public function updateUrl(int $briefId){}

}