<?php
require_once(dirname(dirname(__FILE__))."/models/DbConfModel.php");
class LoginModel extends  DbConfModel 
{

    public function getTeachersByEmail(string $email): array|bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM FORMATEUR WHERE EMAIL = :email");
        $stmt->bindParam("email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudentByEmail(string $email): array|bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM APPRENANT WHERE EMAIL = :email");
        $stmt->bindParam("email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
