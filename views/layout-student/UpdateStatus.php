<?php 
session_start();
    if(isset($_GET['Lien']))
    {
        if($_GET['Lien'] == "")
        {
            echo $_GET['Lien'];
            $Connexion = new PDO('mysql:host=localhost;dbname=bp15', "root", "A20002024");
            $StatementBrief = $Connexion->prepare("
            update realiser set lien =null where id_brief =:id_brief  and id_apprenant = :IdApprenant
            ");
            $StatementBrief->execute(
                [
                    "id_brief"=>$_GET['idBrief'],
                    "IdApprenant"=>$_SESSION['user']['id']
                ]
            );
            $StatementBrief = $Connexion->prepare("
            update realiser set Etat = \"Doing\" where id_brief = :id_brief and id_apprenant = :IdApprenant
            ");
            $StatementBrief->execute(
                [
                    "id_brief"=>$_GET['idBrief'],
                    "IdApprenant"=>$_SESSION['user']['id']
                ]
            );
        }else
        {
            $Connexion = new PDO('mysql:host=localhost;dbname=bp15', "root", "A20002024");
            $StatementBrief = $Connexion->prepare("
            update realiser set lien =:lien where id_brief =:id_brief  and id_apprenant = :IdApprenant
            ");
            $StatementBrief->execute(
                [
                    "lien"=>$_GET['Lien'],
                    "id_brief"=>$_GET['idBrief'],
                    "IdApprenant"=>$_SESSION['user']['id']
                ]
            );
            $StatementBrief = $Connexion->prepare("
            update realiser set Etat = \"Done\" where id_brief = :id_brief and id_apprenant = :IdApprenant
            ");
            $StatementBrief->execute(
                [
                    "id_brief"=>$_GET['idBrief'],
                    "IdApprenant"=>$_SESSION['user']['id']
                ]
            );
        }
    }
    else
    {
        $Connexion = new PDO('mysql:host=localhost;dbname=bp15', "root", "A20002024");
        $StatementBrief = $Connexion->prepare("
        update realiser set Etat = \"Doing\" where id_brief = :id_brief and id_apprenant = :IdApprenant
        ");
        $StatementBrief->execute(
            [
                "id_brief"=>$_GET['idBrief'],
                "IdApprenant"=>$_SESSION['user']['id']
            ]
        );
    }
    









?>