<?php
class DbConfModel
{
    protected $pdo;
    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=BP15;charset=UTF8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}
