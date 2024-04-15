<?php
class ReportHandler
{
    static public $INCORRECT_PASS = 0;

    static public $NO_USER_FOUND= 1;


    static function setRepoet(int $report){
        $_SESSION['report'] = $report;
    }

    static function getReport(): mixed
    {
        return $_SESSION['report']?? null;
    }

    static function dropReportSession(){
        unset($_SESSION['report']);
    }
}
