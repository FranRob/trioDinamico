<?php

class Database{

    private $host = "localHost";
    private $dbname = "sistema_asistencias";
    private $userName = "root";
    private $password = "";

    public function conexion(){
        try{
            $conection = new PDO ("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->userName, $this->password);
            return $conection;
        }catch(PDOException $e){
            return $e ->getMessage();
            exit;
        }

    }

}

?>