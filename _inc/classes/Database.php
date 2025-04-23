<?php

class Database{
    private $host = "localhost";
    private $db = "gamestudio_db";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8";
    private $pdo; //bude sluzit na spojenie

    public function __construct(){
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            //PDO::ERRMODE_EXCEPTION - chyba sa vyhodi do vynimky (idealne)
            //PDO::ERRMODE_WARNING - vyhodi velky warning
            //PDO::ERRMODE_SILENT - nevypise chybu
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    public function __destruct(){
        $this->pdo = null;
    }

    public function getConnection(){
        return $this->pdo;
    }


}

?>